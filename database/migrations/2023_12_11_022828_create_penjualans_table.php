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
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_invoice')->unique();
            $table->foreignId('user_id');
            $table->foreignId('detail_id');
            $table->decimal('total_pembayaran');
            $table->enum('status_pembayaran', ['lunas', 'menunggu', 'dibatalkan'])->default('menunggu');
            $table->string('alasan_pembatalan')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
