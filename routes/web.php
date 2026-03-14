<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\InquiryController as AdminInquiryController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\AdvertisementController as AdminAdvertisementController;
use App\Http\Controllers\Admin\CustomerController as AdminCustomerController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Models\Advertisement;

Route::get('/', function () {
    $products = \App\Models\Product::all();
    $activePopupAd = Advertisement::query()
        ->active()
        ->withinDateRange()
        ->where('type', 'popup')
        ->latest()
        ->first();
    $activeMarqueeAd = Advertisement::query()
        ->active()
        ->withinDateRange()
        ->where('type', 'marquee')
        ->latest()
        ->first();

    return view('frontend.home', compact('products', 'activePopupAd', 'activeMarqueeAd'));
})->name('home');

Route::get('/about', function () {
    return view('frontend.about');
})->name('about');
Route::get('/products', [ProductController::class , 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class , 'show'])->name('products.show');
Route::get('/why-cold-pressed', function () {
    return view('frontend.why-cold-pressed');
})->name('why-cold-pressed');
Route::get('/process', function () {
    return view('frontend.process');
})->name('process');
Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contact');

Route::post('/contact', [ContactController::class , 'store'])->name('contact.store');
Route::post('/inquiry', [InquiryController::class , 'store'])->name('inquiry.store');

// Blog routes
Route::get('/blog', [BlogController::class , 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class , 'show'])->name('blog.show');
Route::get('/advertisements/active-popup', [AdvertisementController::class, 'activePopup'])->name('advertisements.active-popup');

Route::get('/dashboard', function () {
    $totalCustomers = \App\Models\Customer::count();
    $totalOrders = \App\Models\Order::count();
    $totalRevenue = \App\Models\Order::where('payment_status', 'Paid')->sum('final_amount');
    $lowStockCount = \App\Models\Product::where('stock_quantity', '<=', 5)->where('status', true)->count();

    return view('dashboard', compact('totalCustomers', 'totalOrders', 'totalRevenue', 'lowStockCount'));
})->middleware(['auth', 'verified', 'admin.access'])->name('dashboard');

Route::middleware(['auth', 'verified', 'admin.access'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', AdminProductController::class)->middleware('admin.permission:products');
    Route::resource('inquiries', AdminInquiryController::class)->only(['index', 'show', 'destroy'])->middleware('admin.permission:inquiries');
    Route::resource('contacts', AdminContactController::class)->only(['index', 'destroy'])->middleware('admin.permission:contacts');
    Route::resource('blog', AdminBlogController::class)->middleware('admin.permission:blog');
    Route::get('advertisements/ticker', [AdminAdvertisementController::class, 'editTicker'])->name('advertisements.ticker.edit')->middleware('admin.permission:ticker_ad');
    Route::put('advertisements/ticker', [AdminAdvertisementController::class, 'updateTicker'])->name('advertisements.ticker.update')->middleware('admin.permission:ticker_ad');
    Route::resource('advertisements', AdminAdvertisementController::class)->except(['show'])->middleware('admin.permission:advertisements');
    Route::patch('advertisements/{advertisement}/toggle', [AdminAdvertisementController::class, 'toggleStatus'])->name('advertisements.toggle')->middleware('admin.permission:advertisements');
    Route::resource('customers', AdminCustomerController::class)->middleware('admin.permission:customers');
    Route::resource('orders', AdminOrderController::class)->middleware('admin.permission:orders');
    Route::get('orders/{order}/pdf', [AdminOrderController::class , 'downloadPdf'])->name('orders.pdf')->middleware('admin.permission:orders');
    Route::resource('users', AdminUserController::class)->except(['show'])->middleware('admin.permission:users');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class , 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class , 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class , 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
