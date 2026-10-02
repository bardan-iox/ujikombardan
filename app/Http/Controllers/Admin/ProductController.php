<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() { return view('admin.products.index', ['products' => Product::latest()->get()]); }
    public function create() { return view('admin.products.create'); }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'student_name' => 'nullable|string|max:255',
            'class_name' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }
        Product::create($data);
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product) { return view('admin.products.edit', compact('product')); }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'student_name' => 'nullable|string|max:255',
            'class_name' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }
        $product->update($data);
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Produk berhasil dihapus.');
    }
}