<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::published()->latest('published_at')->paginate(9);
        $categories = Blog::published()->distinct()->pluck('category');
        return view('frontend.blog.index', compact('blogs', 'categories'));
    }

    public function show($slug)
    {
        $blog = Blog::published()->where('slug', $slug)->firstOrFail();
        $related = Blog::published()
            ->where('id', '!=', $blog->id)
            ->where('category', $blog->category)
            ->latest('published_at')
            ->take(3)
            ->get();
        return view('frontend.blog.show', compact('blog', 'related'));
    }
}