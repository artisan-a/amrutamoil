<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdminAccess
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (! $user || ! $user->canAccessAdminPanel()) {
            return $this->redirectWithPermissionError($request);
        }

        return $next($request);
    }

    protected function redirectWithPermissionError(Request $request): RedirectResponse
    {
        $previousUrl = url()->previous();
        $currentUrl = $request->fullUrl();

        if ($previousUrl && $previousUrl !== $currentUrl) {
            return redirect()->back()->with('error', 'You do not have permission to access that page.');
        }

        return redirect()->route('home')->with('error', 'You do not have permission to access that page.');
    }
}
