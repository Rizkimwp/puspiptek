<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{





    public function checkout(Request $request)
    {

        $id = $request->input('id');
        $namaBarang = $request->input('nama');
        $hargaBarang = $request->input('harga');
        $jumlahBarang = $request->input('jumlah');
        $total = $request->input('total');

        // Menghapus karakter non-digit
        // Mengonversi nilai string menjadi integer
       
        // Di sini, Anda dapat memproses logika pembayaran sesuai kebutuhan aplikasi Anda.
        // Contoh: Menampilkan item yang akan dibayar
        $items = [];
        foreach ($namaBarang as $key => $value) {
        
            $items[] = [
                'id' => $id, // Menyimpan nilai id yang dipisahkan menjadi array
                'nama' => $value,
                'harga' => $hargaBarang[$key],
                'quantity' => $jumlahBarang[$key],
                'total' => $total
            ];
        }
        
        // Hitung total pembayaran
     

        // Tampilkan halaman pembayaran dengan detail item dan total
        return view('admin.checkout', compact('items'));
    }
}