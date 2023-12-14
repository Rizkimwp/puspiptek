<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeranjangController extends Controller
{
   public function index() { 

      $cart= session('cart');

    return view('web.keranjang', compact('cart'));
   }
}
