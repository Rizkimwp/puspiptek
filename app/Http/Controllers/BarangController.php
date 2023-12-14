<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
   public function index() {
    $barang = Barang::paginate(5);
    
 return view('admin.barang', compact('barang'));
}

public function create() 
{
  $categories = Kategori::all();
  return view ('admin.create_barang', compact('categories'));
}


public function store(Request $request, Barang $barang) {

  $validatedData = $request -> validate([
    
    'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048|gambar_produk',
    'nama' => 'required|max:255',
    'deskripsi' => 'required',
    'kategori_id' => 'required',
    'harga' => 'required',
    'stok' => 'required', 
    'berat' => 'required',
    'satuan' => 'required',
  ]);

  if ($request->file('gambar')) {
    $validatedData['gambar'] = $request->file('gambar')->store('post-images');
  }
    $validatedData['user_id'] = auth()->user()->id;

    
    Barang::create($validatedData);   
    return redirect()->route('produk.index')->with('success', 'Product Baru berhasil ditambahkan.');
    
}

public function edit(Barang $produk) {
  
  $categories = Kategori::all();
  return view('admin.edit_barang', compact('produk', 'categories'));

}

public function show() {}
public function update(Request $request, Barang $produk) {

  $validatedData = $request->validate([
      'gambar' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:204|gambar_produk',
      'nama' => 'required|max:255',
      'deskripsi' => 'required',
      'kategori_id' => 'required',
      'harga' => 'required',
      'stok' => 'required',
      'berat' => 'required',
      'satuan' => 'required',
  ]);

  // Jika terdapat file gambar baru, lakukan proses update gambar
  if ($request->hasFile('gambar')) {
      // Hapus gambar lama sebelum menyimpan yang baru
      if ($produk->gambar) {
          Storage::delete($produk->gambar);
      }
      // Simpan gambar baru ke direktori 'post-images'
      $validatedData['gambar'] = $request->file('gambar')->store('post-images');
  }

  $validatedData['user_id'] = auth()->user()->id;
  // Update data produk dengan data yang sudah divalidasi
  $produk->update($validatedData);

  return redirect()->route('produk.index')->with('success', 'Data barang berhasil diperbarui.');
}


public function destroy($id) {
  $barang = Barang::find($id);
  $barang->delete($barang);

  return redirect()->back()->with('success', 'Data Barang berhasil dihapus');
}

}

