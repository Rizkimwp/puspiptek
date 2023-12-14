<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;


    protected $table = 'barangs';
    protected $fillable = [
        'nama',
        'gambar',
        'deskripsi',
        'stok',
        'harga',
        'satuan',
        'berat',

        'kategori_id',
        'user_id'
    ];

    public function penjualan()
    {
        return $this->belongsToMany(Penjualan::class, "kategori_id");
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, "kategori_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}


