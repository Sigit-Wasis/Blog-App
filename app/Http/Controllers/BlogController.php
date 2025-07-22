<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use DB;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $blogs = DB::table('blog')
            ->join('users', 'users.id', 'blog.created_by')
            ->join('kategori_blog', 'kategori_blog.id', 'blog.kategori_id')
            ->select('blog.*', 'kategori_blog.kategori', 'users.name as author')
            ->get();

        return view('blog.index', compact('blogs'));
    }

    public function create()
    {
        $categories = DB::table('kategori_blog')->get();

        return view('blog.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'title'       => 'required|string|max:255',
            'slug'        => 'nullable|string|unique:blog,slug',
            'content'     => 'required|string',
            'image'       => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'kategori_id' => 'required|exists:kategori_blog,id',
        ]);

        // Simpan file ke folder public/blog (misalnya)
        $imageName = time() . '-' . Str::slug($request->title) . '.' . $request->image->extension();
        $request->image->move(public_path('assets/blog'), $imageName);

        // Simpan ke database
        Blog::create([
            'title'       => $request->title,
            'slug'        => $request->slug ?: Str::slug($request->title),
            'content'     => $request->content,
            'image'       => 'assets/blog/' . $imageName, // simpan path relatif
            'kategori_id' => $request->kategori_id,
            'created_by'  => Auth::id(),
        ]);

        return redirect()->route('blog')->with('success', 'Blog berhasil disimpan.');
    }

    public function edit($id)
    {
        $categories = DB::table('kategori_blog')->get();
        $blog = Blog::findOrFail($id);

        return view('blog.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        // Validasi
        $request->validate([
            'title'       => 'required|string|max:255',
            'slug'        => 'nullable|string|unique:blog,slug,' . $blog->id,
            'content'     => 'required|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'kategori_id' => 'required|exists:kategori_blog,id',
        ]);

        // Simpan file ke folder public/blog (misalnya)
        if ($request->hasFile('image')) {
            $imageName = time() . '-' . Str::slug($request->title) . '.' . $request->image->extension();
            $request->image->move(public_path('assets/blog'), $imageName);
            $blog->image = 'assets/blog/' . $imageName; // simpan path relatif
        }

        // Simpan ke database
        $blog->title       = $request->title;
        $blog->slug        = $request->slug ?: Str::slug($request->title);
        $blog->content     = $request->content;
        $blog->kategori_id = $request->kategori_id;
        $blog->save();

        return redirect()->route('blog')->with('success', 'Blog berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        // hapus filenya jika ada
        if ($blog->image) {
            unlink(public_path($blog->image));
        }
        $blog->delete();
        return redirect()->route('blog')->with('success', 'Blog berhasil dihapus.');
    }
}
