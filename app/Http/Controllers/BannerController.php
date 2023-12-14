<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index() {
        $banner = Banner::paginate(5);
        return view ('admin.banner', compact('banner')); 
    }

    public function create() {
        return view ('admin.create_banner');
    }

    public function store(Request $request, Banner $banner) {
        $validatedData = $request -> validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048|exact_dimensions'
        ]) ;
    
        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('post-images');
          }
            
            $banner -> create($validatedData);
            return redirect()->route('banner.index')->with('success', 'banner Baru berhasil ditambahkan.');

    }

    public function show() {}
    public function edit(Banner $banner) {
        
        return view('admin.edit_banner', compact('banner'));

    }

    public function update(Request $request, Banner $banner) {
        $validatedData = $request -> validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048|exact_dimensions'
        ]) ;
    
        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('post-images');
          }
            
            $banner -> update($validatedData);
            return redirect()->route('banner.index')->with('success', 'banner Baru berhasil ditambahkan.');
    }

    public function destroy($id) {
        $banner = Banner::find($id);
        $banner->delete($banner);
      
        return redirect()->back()->with('success', 'Data Banner berhasil dihapus');
      }
}
