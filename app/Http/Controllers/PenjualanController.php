<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Detail;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PenjualanController extends Controller
{
        public function index() {

            $penjualan = Penjualan::paginate(5);
         
            return view('admin.penjualan', compact('penjualan'));
        }

        public function create () {
            $barang = Barang::all();
           
            return view('admin.create_penjualan', compact('barang'));
        }



            public function store(Request $request) {
             // Generate nomor invoice secara otomatis
    $noInvoice = $this->generateInvoiceNumber();

    $user = auth()->user()->id;

    // Validasi input lainnya
    $validatedData = $request->validate([
        'barang_id' => 'required',
        'total_pembayaran' => 'required',
        'status_pembayaran' => 'required',
        // Anda bisa menambahkan validasi lainnya di sini
    ]);

    // Buat transaksi baru
    $penjualan = Penjualan::create([
        'nomor_invoice' => $noInvoice, 
        'user_id' => $user,
        'total_pembayaran' => $validatedData['total_pembayaran'],
        'status_pembayaran' => $validatedData['status_pembayaran'],
    ]);

    // Simpan detail penjualan ke dalam tabel details
    foreach ($validatedData['barang_id'] as $barangId) {
        $barang = Barang::find($barangId);
        $penjualan->details()->create([
            'nama' => $barang->nama,
            'harga' => $barang->harga,
            'quantity' => 1, // Sesuaikan dengan kebutuhan Anda
            // Anda bisa menambahkan kolom lain yang diperlukan di sini
        ]);
    }

    return redirect()->route('penjualan.index')->with('success', 'Transaksi berhasil ditambahkan');
        
            }


              // Fungsi untuk menghasilkan nomor invoice
    private function generateInvoiceNumber()
    {
        $lastInvoice = Penjualan::latest()->first(); // Ambil transaksi terbaru
        $year = Carbon::now()->format('Y'); // Ambil tahun sekarang

        // Jika tidak ada transaksi sebelumnya atau tahun berbeda, mulai dari 1
        if (!$lastInvoice || substr($lastInvoice->no_invoice, 0, 4) !== $year) {
            return $year . '-0001'; // Format awal nomor invoice
        }

        // Jika tahun sama, tambahkan nomor urut
        $lastInvoiceNumber = substr($lastInvoice->no_invoice, -4);
        $newInvoiceNumber = str_pad($lastInvoiceNumber + 1, 4, '0', STR_PAD_LEFT); // Increment nomor urut
        return $year . '-' . $newInvoiceNumber;
    }
        }
           
        
    