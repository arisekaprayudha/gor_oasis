<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuaans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->unsignedInteger('user_id');
            //$table->unsignedInteger('arsip_id')->nullable();
            $table->unsignedInteger('file_id')->nullable();
            $table->boolean('status')->default(0)->nullable();
            $table->date('tanggalpengembalian'); 
            $table->longText('alasan')->nullable();
            $table->longText('tujuan')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
        });

        Schema::table('pengajuaans', function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('hrmlmsusers')->onDelete('cascade')->unUpdate('cascade');
            //$table->foreign('arsip_id')->references('id')->on('arsips')->onDelete('cascade')->unUpdate('cascade');
            $table->foreign('file_id')->references('id')->on('detail_arsips')->onDelete('cascade')->unUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuaans');
    }
}
