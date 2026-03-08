<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'message' => 'required|string',
            'product_id' => 'nullable|exists:products,id'
        ]);

        Inquiry::create($validatedData);

        return back()->with('success', 'Your inquiry has been submitted successfully! We will contact you soon.');
    }
}