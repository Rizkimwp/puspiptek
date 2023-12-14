<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
 public function  index() {

    $kategori = Kategori::paginate(5);
    return view('admin.kategori', compact('kategori'));
 }

 public function create() {
    
 }

 public function store(Request $request , Kategori $kategori) {

    $validatedData = $request -> validate([
        'nama' => 'required|max:255',
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048|exact_dimensions'
    ]) ;

    if ($request->file('gambar')) {
        $validatedData['gambar'] = $request->file('gambar')->store('post-images');
      }
        $validatedData['user_id'] = auth()->user()->id;
    
        $kategori -> create($validatedData);
        return redirect()->route('kategori.index')->with('success', 'Kategori Baru berhasil ditambahkan.');
 }

 public function edit(Kategori $kategori) {
  
  $gambar = Kategori::find('gambar');
  return view('admin.edit_kategori', compact('kategori', 'gambar'));

}


 public function update(Request $request , Kategori $kategori) {

  $validatedData = $request -> validate([
    'nama' => 'required|max:255',
    'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048|exact_dimensions'
]) ;

  // Jika terdapat file gambar baru, lakukan proses update gambar
  if ($request->hasFile('gambar')) {
    // Hapus gambar lama sebelum menyimpan yang baru
    if ($kategori->gambar) {
        Storage::delete($kategori->gambar);
    }
    // Simpan gambar baru ke direktori 'post-images'
    $validatedData['gambar'] = $request->file('gambar')->store('post-images');
}

// Update data produk dengan data yang sudah divalidasi
$kategori->update($validatedData);
return redirect()->route('kategori.index')->with('success', 'Data Kategori berhasil diperbarui.');
 }


 public function show() {}



 public function destroy ($id) {
  $kategori = Kategori::find($id);
  $kategori->delete();
  return redirect()->back()->with('success', 'data kategori berhasil dihapus');
 }
}


