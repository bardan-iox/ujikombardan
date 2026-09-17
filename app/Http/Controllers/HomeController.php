<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Achievement;
use App\Models\Program;

class HomeController extends Controller
{
    public function index()
    {
        $programs = Program::latest()->take(4)->get();
        $articles = Article::latest('published_at')->take(3)->get();
        $achievements = Achievement::latest()->take(3)->get();

        return view('home', compact('programs', 'articles', 'achievements'));
    }
}
