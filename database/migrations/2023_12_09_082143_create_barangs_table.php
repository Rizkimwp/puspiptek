<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); 
            $table->text('deskripsi');
            $table->decimal('harga', 10 ,2);
            $table->integer('stok');
            $table->decimal('berat', 8, 2);
            $table->foreignId('kategori_id');
            $table->string('satuan');
            $table->string('gambar')->nullable();
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
