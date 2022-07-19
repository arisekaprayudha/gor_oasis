<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('subcode')->unique();
            $table->unsignedInteger('unitkerja_id');
            $table->string('index')->unique();
            $table->timestamps();
        });

        Schema::table('indices', function(Blueprint $table){
            $table->foreign('unitkerja_id')->references('id')->on('unit_kerjas')->onDelete('cascade')->unUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indices');
    }
}
