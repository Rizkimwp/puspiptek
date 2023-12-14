<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $table = 'details';
    protected $guarded = [''];

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, "penjualan_id");
    }
    public function barang()
    {
        return $this->belongsToMany(Penjualan::class, "barang_id");
    }
}
