<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() 
    {
        $kategori = Kategori::all();
        $banner = Banner::all();
        $produk = Barang::all();
        return view('web.home', compact('kategori', 'banner', 'produk'));
    }
}
