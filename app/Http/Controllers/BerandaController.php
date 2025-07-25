<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BerandaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $blogs = Blog::when($search, function ($query, $search) {
            return $query->where('title', 'like', "%{$search}%")
                        ->orWhere('content', 'like', "%{$search}%");
        })->latest()->paginate(8);

        return view('welcome', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();

        return view('blog_detail', compact('blog'));
    }
}
