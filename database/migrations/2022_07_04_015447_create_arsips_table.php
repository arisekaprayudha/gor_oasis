<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arsips', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            // $table->unsignedInteger('category_id');
            // $table->unsignedInteger('subcategory_id');
            // $table->string('nomerPelaksana');
            //$table->string('index');
            $table->string('nosurat');
            $table->unsignedInteger('index_id')->nullable();
            //$table->json('index_id'); 
            $table->unsignedInteger('klasifikasi_id');
            $table->unsignedInteger('unitkerja_id');
            //$table->string('klasifikasi');
            $table->longText('uraian');
            // $table->date('tanggal'); 
            $table->string('tingkatpengembangan'); 
            $table->string('kondisi'); 
            $table->string('media');
            // $table->string('jenis');
            $table->string('lokasi');
            // $table->string('lemari');
            // $table->string('ruangan');
            // $table->string('noOrder');
            $table->string('tahun');
            $table->integer('jumlah');
            $table->integer('retensi');
            $table->string('akhirRetensi');
            // $table->string('file')->nullable();
            // $table->integer('jumlahDiunduh')->nullable();
            // $table->integer('jumlahDilihat')->nullable();
            $table->timestamps();
        });



        Schema::table('arsips', function(Blueprint $table){
            $table->foreign('index_id')->references('id')->on('indices')->onDelete('cascade')->unUpdate('cascade');
            $table->foreign('unitkerja_id')->references('id')->on('unit_kerjas')->onDelete('cascade')->unUpdate('cascade');
            $table->foreign('klasifikasi_id')->references('id')->on('klasifikasis')->onDelete('cascade')->unUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arsips');
    }
};
