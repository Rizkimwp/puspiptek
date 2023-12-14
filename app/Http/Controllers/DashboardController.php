<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Banner;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index() {
        $barang = Barang::count();
        $kategori = Kategori::count();
        $user = User::count();
        $banner = Banner::count();
        return view('admin.dashboard', compact('barang', 'kategori', 'user', 'banner'));
    }
}
