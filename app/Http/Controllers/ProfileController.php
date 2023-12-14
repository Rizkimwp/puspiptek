<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    public function index() {
        $profile = Profil::all();
        return view('admin.profile', compact('profile'));
    }


    public function edit(Profil $profile) {
     
        return view('admin.edit_profile', compact('profile'));
    }



    public function update(Request $request, Profil $profile) {

        $validatedData = $request -> validate([
    
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:1028',
            'nama_toko' => 'required|max:255',
            'deskripsi' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
            'email' => 'required|email', 
          ]);
        
          // Jika terdapat file gambar baru, lakukan proses update gambar
  if ($request->hasFile('logo')) {
    // Hapus logo lama sebelum menyimpan yang baru
    if ($profile->logo) {
        Storage::delete($profile->logo);
    }
    // Simpan logo baru ke direktori 'post-images'
    $validatedData['logo'] = $request->file('logo')->store('post-images');
}
        
            $profile->update($validatedData);   
            return redirect()->route('profile.index')->with('success', 'Profile Toko berhasil diperbarui.');
            
    }
}
