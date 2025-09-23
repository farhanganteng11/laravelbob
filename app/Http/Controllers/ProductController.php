<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($angka)
    {
        $hasil = $angka + 10; // contoh tambah 10
        return view('product.index', ['angkaAwal'=> $angka, 'angkaTambahan' => 10, 'hasil'=> $hasil]);
    }
}
