<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            //$table->string('subcode')->unique();
            $table->string('namabarang');
            $table->integer('satuan');
            $table->integer('harga');
            $table->integer('penjualan');
            $table->integer('berat');
            $table->string('kategori');
            $table->string('ukuran');
            $table->string('bentuk');
            $table->string('jumlahpeminat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testings');
    }
}
