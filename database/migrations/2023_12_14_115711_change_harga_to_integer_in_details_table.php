<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeHargaToIntegerInDetailsTable extends Migration
{
    public function up()
    {
        Schema::table('details', function (Blueprint $table) {
            $table->integer('harga')->change();
        });
    }

    public function down()
    {
        Schema::table('details', function (Blueprint $table) {
            $table->decimal('harga', 10, 2)->change();
        });
    }
}

