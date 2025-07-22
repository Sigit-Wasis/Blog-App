<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BerandaController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->take(6)->get(); // ambil 6 blog terbaru

        return view('welcome', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();

        return view('blog.show', compact('blog'));
    }
}
