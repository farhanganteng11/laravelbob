<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function show($id)
    {
        if ($id % 2 == 0) {
            $pesan = "Nilai $id adalah genap";
            $alertType = "success";
        } else {
            $pesan = "Nilai $id adalah ganjil";
            $alertType = "warning";
        }

        return view('produk', compact('pesan', 'alertType'));
    }
}
