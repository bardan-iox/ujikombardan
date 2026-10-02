<?php
namespace App\Http\Controllers;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(9);
        return view('produk.index', compact('products'));
    }
}