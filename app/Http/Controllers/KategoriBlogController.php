<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriBlog;
use Illuminate\Support\Str;

class KategoriBlogController extends Controller
{
    public function index()
    {
        $kategori_blog = KategoriBlog::all();

        return view('kategori_blog.index', compact('kategori_blog'));
    }

    public function create()
    {
        return view('kategori_blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
        ]);

        $kategori = new KategoriBlog();
        $kategori->kategori = $request->kategori;
        $kategori->slug = Str::slug($request->kategori);
        $kategori->keterangan = $request->keterangan;
        $kategori->save();

        return redirect()->route('kategori_blog.index')->with('success', 'Kategori berhasil disimpan.');
    }

    public function edit($id)
    {
        $kategori_blog = KategoriBlog::findOrFail($id);
        return view('kategori_blog.edit', compact('kategori_blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
        ]);

        $kategori = KategoriBlog::findOrFail($id);
        $kategori->kategori = $request->kategori;
        $kategori->slug = Str::slug($request->kategori);
        $kategori->keterangan = $request->keterangan;
        $kategori->save();

        return redirect()->route('kategori_blog.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kategori = KategoriBlog::findOrFail($id);
        $kategori->delete();
        return redirect()->route('kategori_blog.index')->with('success', 'Kategori berhasil dihapus.');
    }


}
