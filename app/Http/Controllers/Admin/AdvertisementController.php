<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class AdvertisementController extends Controller
{
    public function index(): View
    {
        $advertisements = Advertisement::query()
            ->where('type', 'popup')
            ->latest()
            ->paginate(12);

        return view('admin.advertisements.index', compact('advertisements'));
    }

    public function create(): View
    {
        return view('admin.advertisements.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateAdvertisement($request);
        $validated['type'] = 'popup';

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('advertisements', 'public');
        }

        Advertisement::create($validated);

        return redirect()
            ->route('admin.advertisements.index')
            ->with('success', 'Advertisement created successfully.');
    }

    public function edit(Advertisement $advertisement): View
    {
        return view('admin.advertisements.edit', compact('advertisement'));
    }

    public function update(Request $request, Advertisement $advertisement): RedirectResponse
    {
        $validated = $this->validateAdvertisement($request, true);
        $validated['type'] = 'popup';

        if ($request->hasFile('image')) {
            if ($advertisement->image && Storage::disk('public')->exists($advertisement->image)) {
                Storage::disk('public')->delete($advertisement->image);
            }

            $validated['image'] = $request->file('image')->store('advertisements', 'public');
        }

        $advertisement->update($validated);

        return redirect()
            ->route('admin.advertisements.index')
            ->with('success', 'Advertisement updated successfully.');
    }

    public function destroy(Advertisement $advertisement): RedirectResponse
    {
        if ($advertisement->image && Storage::disk('public')->exists($advertisement->image)) {
            Storage::disk('public')->delete($advertisement->image);
        }

        $advertisement->delete();

        return redirect()
            ->route('admin.advertisements.index')
            ->with('success', 'Advertisement deleted successfully.');
    }

    public function toggleStatus(Advertisement $advertisement): RedirectResponse
    {
        $advertisement->update([
            'status' => $advertisement->status === 'active' ? 'inactive' : 'active',
        ]);

        return redirect()
            ->route('admin.advertisements.index')
            ->with('success', 'Advertisement status updated.');
    }

    public function editTicker(): View
    {
        $ticker = Advertisement::query()->firstOrNew(
            ['type' => 'marquee'],
            [
                'title' => '',
                'redirect_url' => null,
                'status' => 'inactive',
            ]
        );

        return view('admin.advertisements.ticker', compact('ticker'));
    }

    public function updateTicker(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'redirect_url' => [
                'nullable',
                'string',
                'max:2048',
                function (string $attribute, mixed $value, \Closure $fail): void {
                    if ($value === null || $value === '') {
                        return;
                    }

                    $isExternal = filter_var($value, FILTER_VALIDATE_URL) !== false;
                    $isInternal = str_starts_with($value, '/');

                    if (! $isExternal && ! $isInternal) {
                        $fail('The ' . $attribute . ' must be a valid URL or start with /.');
                    }
                },
            ],
            'status' => ['required', Rule::in(['active', 'inactive'])],
        ]);

        Advertisement::query()->updateOrCreate(
            ['type' => 'marquee'],
            [
                'title' => $validated['title'],
                'redirect_url' => $validated['redirect_url'] ?? null,
                'status' => $validated['status'],
                'start_date' => now()->toDateString(),
                'end_date' => '2099-12-31',
                'description' => null,
                'image' => null,
                'button_text' => null,
            ]
        );

        return redirect()
            ->route('admin.advertisements.ticker.edit')
            ->with('success', 'Ticker advertisement updated successfully.');
    }

    private function validateAdvertisement(Request $request, bool $isUpdate = false): array
    {
        $imageRule = $isUpdate ? 'nullable' : 'required';

        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => [$imageRule, 'image', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
            'button_text' => ['nullable', 'string', 'max:100'],
            'redirect_url' => [
                'nullable',
                'string',
                'max:2048',
                function (string $attribute, mixed $value, \Closure $fail): void {
                    if ($value === null || $value === '') {
                        return;
                    }

                    $isExternal = filter_var($value, FILTER_VALIDATE_URL) !== false;
                    $isInternal = str_starts_with($value, '/');

                    if (! $isExternal && ! $isInternal) {
                        $fail('The ' . $attribute . ' must be a valid URL or start with /.');
                    }
                },
            ],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
            'status' => ['required', Rule::in(['active', 'inactive'])],
        ]);
    }
}
