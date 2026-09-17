<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest('published_at')->paginate(6);
        return view('artikel.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('artikel.show', compact('article'));
    }
}
