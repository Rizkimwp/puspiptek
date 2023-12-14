<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    public function index()
    {
        $barang = Barang::paginate(5);
        $kategori = Kategori::all();
        return view('web.shop', compact('barang', 'kategori'));
    }


    // Contoh: ProductController.php
    public function addToCart($id)
    {
        $product = Barang::find($id); // Mengambil informasi produk dari database, gantilah Product dengan model yang sesuai

        if (!$product) {
            abort(404); // Produk tidak ditemukan, Anda bisa menangani kasus ini sesuai kebutuhan
        }

        $cart = session()->get('cart', []); // Mengambil data dari sesi 'cart' atau menggunakan array kosong jika belum ada

        if (isset($cart[$id])) {
            // Jika produk sudah ada dalam keranjang, tambahkan quantity-nya
            $cart[$id]['quantity'] += 1;
        } else {
            // Jika produk belum ada dalam keranjang, tambahkan produk baru ke dalam sesi 'cart'
            $cart[$id] = [
                'id' => $product->id,
                'gambar' => $product->gambar,
                'name' => $product->nama,
                'price' => $product->harga,
                'quantity' => 1,
                // tambahkan atribut lain jika diperlukan
            ];
        }

        session()->put('cart', $cart); // Menyimpan kembali data ke dalam sesi 'cart'

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke dalam keranjang.');
    }


    public function remove(Request $request)
    {
        Session::forget('cart'); // Menghapus sesi 'cart'

        return redirect()->back()->with('success', 'Keranjang belanja berhasil dikosongkan.');
    }




    public function showCategori($id) {

        $barang = Barang::where('kategori_id', $id)->paginate(7);
        $kategori = Kategori::all();

        return view('web.showkategori', compact('barang', 'kategori'));
    }

}


    

