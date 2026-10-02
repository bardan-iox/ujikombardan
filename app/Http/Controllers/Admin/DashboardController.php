<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ContactMessage;
use App\Models\Gallery;
use App\Models\Program;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPrograms = Program::count();
        $totalArticles = Article::count();
        $totalGallery = Gallery::count();
        $totalProducts = Product::count();
        $unreadMessages = ContactMessage::where('is_read', false)->count();
        return view('admin.dashboard', compact('totalPrograms', 'totalArticles', 'totalGallery', 'totalProducts', 'unreadMessages'));
    }
}