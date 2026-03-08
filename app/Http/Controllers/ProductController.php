<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('frontend.products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('frontend.products.show', compact('product'));
    }
}