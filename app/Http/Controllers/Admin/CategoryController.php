<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data['dataCategory'] = Category::withCount('products')->get();
        return view('admin.category.index', $data);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:100|unique:categories,name',
            'description' => 'nullable|string',
        ]);

        $data['name'] = $request->name;
        $data['description'] = $request->description;

        Category::create($data);

        return redirect()->route('category.index')->with('success', 'Penambahan Data Berhasil!');
    }

    public function edit(string $id)
    {
        $data['dataCategory'] = Category::findOrFail($id);
        return view('admin.category.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:100|unique:categories,name,' . $category->category_id . ',category_id',
            'description' => 'nullable|string',
        ]);

        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return redirect()->route('category.index')->with('success', 'Perubahan Data Berhasil!');
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        if ($category->products()->exists()) {
            return redirect()->route('category.index')
                ->with('error', 'Kategori tidak bisa dihapus karena masih dipakai oleh produk.');
        }

        $category->delete();

        return redirect()->route('category.index')->with('success', 'Data berhasil dihapus');
    }
}
