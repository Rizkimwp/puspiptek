<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index () {

        $user = User::paginate('5');
        return view('admin.admin', compact('user'));
    }

    public function create() {
        return view ('admin.create_admin');
    }

    public function store(Request $request, User $user) {

        $validatedData = $request -> validate([
            'email' => 'required|email', 
            'password' => 'required',
            'role' => 'required', 
            'name' => 'required|max:255'
        ]);

        $user -> create($validatedData);
        return redirect()->route('admin.index')->with('success', 'Berhasil Membuat Admin Baru');
        
    }

    public function show(){

    }

    public function edit(User $user) {

        
        return view('admin.edit_admin', compact('user'));

    }

    public function update(Request $request, User $user ) {

        $validatedData = $request -> validate([
            'email' => 'required|email', 
            'password' => 'required',
            'role' => 'required', 
            'name' => 'required|max:255'
        ]);

        $user -> update($validatedData);
        return redirect()->route('admin.index')->with('success', 'Berhasil Memperbarui Admin Baru');
    }
    
    public function destroy($id){

     // Menggunakan findOrFail untuk mencari produk berdasarkan ID
        $user = User::find($id);
        $user->delete(); // Menghapus produk

        return redirect()->route('admin.index')
            ->with('success', 'Data Admin berhasil dihapus'); // Redirect ke halaman produk dengan pesan sukses
    }
}
