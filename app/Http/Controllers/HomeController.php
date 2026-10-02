<?php
namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Product;


class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::latest('published_at')->take(2)->get();
        $products = Product::latest()->take(1)->get();
        return view('home', compact('articles', 'products'));
    }
}