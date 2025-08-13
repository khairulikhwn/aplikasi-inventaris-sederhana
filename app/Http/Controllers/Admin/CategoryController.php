<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);

        return view('pages.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('pages.categories.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required|unique:categories,name",
        ], [
            "name.required" => "Nama Kategori Harus Di isi!",
            "name.unique" => "Nama Kategori Sudah Ada!",
        ]);

        $category = new Category();
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));
        $category->save();

        return redirect('/categories');
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('pages.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            "name" => "required|unique:categories,name",
        ], [
            "name.required" => "Nama Kategori Harus Di isi!",
            "name.unique" => "Nama Kategori Sudah Ada!",
        ]);

        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));
        $category->save();

        return redirect('/categories');
    }

    public function delete($id)
    {
        Category::where('id', $id)->delete();

        return redirect('/categories');
    }
}