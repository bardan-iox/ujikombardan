<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'image' => 'required|image|max:2048',
        ]);

        $data = $request->all();
        $data['image'] = $request->file('image')->store('gallery', 'public');

        Gallery::create($data);

        return redirect()->route('admin.gallery.index')->with('success', 'Foto berhasil ditambahkan.');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return back()->with('success', 'Foto berhasil dihapus.');
    }
}
