<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\InquiryController as AdminInquiryController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\CustomerController as AdminCustomerController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;

Route::get('/', function () {
    $products = \App\Models\Product::all();
    return view('frontend.home', compact('products'));
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

Route::get('/dashboard', function () {
    $totalCustomers = \App\Models\Customer::count();
    $totalOrders = \App\Models\Order::count();
    $totalRevenue = \App\Models\Order::where('payment_status', 'Paid')->sum('final_amount');
    $lowStockCount = \App\Models\Product::where('stock_quantity', '<=', 5)->where('status', true)->count();

    return view('dashboard', compact('totalCustomers', 'totalOrders', 'totalRevenue', 'lowStockCount'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', AdminProductController::class);
    Route::resource('inquiries', AdminInquiryController::class)->only(['index', 'show', 'destroy']);
    Route::resource('contacts', AdminContactController::class)->only(['index', 'destroy']);
    Route::resource('blog', AdminBlogController::class);
    Route::resource('customers', AdminCustomerController::class);
    Route::resource('orders', AdminOrderController::class);
    Route::get('orders/{order}/pdf', [AdminOrderController::class , 'downloadPdf'])->name('orders.pdf');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class , 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class , 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class , 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';