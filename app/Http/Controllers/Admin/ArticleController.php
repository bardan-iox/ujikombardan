<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'cover_image' => 'nullable|image|max:10240',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title) . '-' . Str::random(5);
        $data['admin_id'] = Auth::guard('admin')->id();
        $data['published_at'] = now();

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('articles', 'public');
        }

        Article::create($data);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'cover_image' => 'nullable|image|max:10240',
        ]);

        $data = $request->all();

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('articles', 'public');
        }

        $article->update($data);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return back()->with('success', 'Artikel berhasil dihapus.');
    }
}
