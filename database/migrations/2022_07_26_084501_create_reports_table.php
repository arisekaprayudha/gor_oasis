deta<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('file_id')->nullable();
            $table->integer('downloadcount');
            $table->timestamps();
        });

        Schema::table('reports', function(Blueprint $table){
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
        Schema::dropIfExists('reports');
    }
}
