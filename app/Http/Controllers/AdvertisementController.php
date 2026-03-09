<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\JsonResponse;

class AdvertisementController extends Controller
{
    public function activePopup(): JsonResponse
    {
        $ad = Advertisement::query()
            ->active()
            ->withinDateRange()
            ->where('type', 'popup')
            ->latest()
            ->first();

        return response()->json([
            'data' => $ad,
        ]);
    }
}
