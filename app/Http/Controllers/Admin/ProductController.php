<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data['dataProduct'] = Product::with('category')->get();
        return view('admin.product.index', $data);
    }

    public function create()
    {
        $data['dataCategory'] = Category::orderBy('name')->get();
        return view('admin.product.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,category_id',
            'name'        => 'required|string|max:150',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
        ]);

        $data['category_id'] = $request->category_id;
        $data['name'] = $request->name;
        $data['price'] = $request->price;
        $data['stock'] = $request->stock;

        Product::create($data);

        return redirect()->route('product.index')->with('success', 'Penambahan Data Berhasil!');
    }

    public function edit(string $id)
    {
        $data['dataProduct'] = Product::findOrFail($id);
        $data['dataCategory'] = Category::orderBy('name')->get();
        return view('admin.product.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'category_id' => 'required|exists:categories,category_id',
            'name'        => 'required|string|max:150',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
        ]);

        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save();

        return redirect()->route('product.index')->with('success', 'Perubahan Data Berhasil!');
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Data berhasil dihapus');
    }
}
