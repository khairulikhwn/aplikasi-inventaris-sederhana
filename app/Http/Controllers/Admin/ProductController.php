<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);

        return view('pages.products.index', [
            "products" => $products,
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('pages.products.create', [
            "categories" => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                "name" => "required|min:3",
                "description" => "nullable",
                "price" => "required",
                "stock" => "required",
                "sku" => "required",
                "category_id" => "required",
            ],
            [
                "name.required" => "Nama Product/Barang Harus Di isi!",
                "name.min" => "Nama Produk/Barang Minimal 3 Karakter!",
                "price.required" => "Harga Harus Di isi!",
                "stock.required" => "Stok Harus Di isi!",
                "sku.required" => "Kode Barang Harus Di isi!",
                "category_id.required" => "Kategori Barang Harus Di isi!",
            ]
        );

        Product::create($validated);

        return redirect('/products')->with('success', 'Berhasil menambahkan Produk/Barang');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);

        return view('pages.products.edit', [
            "categories" => $categories,
            "product" => $product,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate(
            [
                "name" => "required|min:3",
                "description" => "nullable",
                "price" => "required",
                "stock" => "required",
                "sku" => "required",
                "category_id" => "required",
            ],
            [
                "name.required" => "Nama Product/Barang Harus Di isi!",
                "name.min" => "Nama Produk/Barang Minimal 3 Karakter!",
                "price.required" => "Harga Harus Di isi!",
                "stock.required" => "Stok Harus Di isi!",
                "sku.required" => "Kode Barang Harus Di isi!",
                "category_id.required" => "Kategori Barang Harus Di isi!",
            ]
        );


        Product::where('id', $id)->update($validated);

        return redirect('/products')->with('success', 'Berhasil mengubah Produk/Barang');
    }

    public function delete($id)
    {
        $product = Product::where('id', $id);
        $product->delete();

        return redirect('/products')->with('success', 'Berhasil menghapus Produk/Barang');
    }
}