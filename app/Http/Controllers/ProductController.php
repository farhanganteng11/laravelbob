<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Define the validation rules as a private method to avoid repetition.
     */
    private function validationRules()
    {
        return [
            'product_name' => 'required|string|max:255',
            'unit'         => 'required|string|max:50',
            'type'         => 'required|string|max:50',
            'information'  => 'nullable|string',
            'qty'          => 'required|integer',
            'producer'     => 'required|string|max:255',
        ];
    }

    /**
     * Menampilkan daftar semua produk (Read - Index).
     */
    public function index()
    {
        // Mengambil semua data produk
        $products = Product::all(); 
        
        // Mengirim data ke view index (yang baru saja Anda buat)
        return view('master-data.product-master.index', compact('products'));
    }

    /**
     * Menampilkan form untuk membuat produk baru (Create - Form).
     */
    public function create()
    {
        return view('master-data.product-master.create');
    }

    /**
     * Menyimpan data produk baru dari form (Create - Store).
     */
    public function store(Request $request)
    {
        // Validasi menggunakan private method
        $validasi_data = $request->validate($this->validationRules()); 

        Product::create($validasi_data);

        // Redirect ke halaman list produk
        return redirect()->route('product-index')->with('success', 'Product created successfully!');
    }
    
    /**
     * Menampilkan form untuk mengedit produk tertentu (Update - Edit Form).
     */
    public function edit(Product $product)
    {
        return view('master-data.product-master.edit', compact('product'));
    }

    /**
     * Memperbarui data produk tertentu di database (Update - Save).
     */
    public function update(Request $request, Product $product)
    {
        // Validasi menggunakan private method
        $validasi_data = $request->validate($this->validationRules()); 

        $product->update($validasi_data);

        // Redirect ke halaman list produk
        return redirect()->route('product-index')->with('success', 'Product updated successfully!');
    }
    
    /**
     * Menghapus data produk tertentu dari database (Delete).
     */
    public function destroy(Product $product)
    {
        $product->delete();

        // Redirect ke halaman list produk
        return redirect()->route('product-index')->with('success', 'Product deleted successfully!');
    }
}