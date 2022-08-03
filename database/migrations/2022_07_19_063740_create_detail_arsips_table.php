<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailArsipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_arsips', function (Blueprint $table) {
            $table->increments('id');
            //$table->string('code')->unique();
            $table->unsignedInteger('arsip_id');
            //$table->string('namefile'); 
            $table->string('file')->nullable();
            $table->timestamps();
        });

        Schema::table('detail_arsips', function(Blueprint $table){
            $table->foreign('arsip_id')->references('id')->on('arsips')->onDelete('cascade')->unUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_arsips');
    }
}
