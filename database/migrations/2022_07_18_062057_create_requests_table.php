<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('arsip_id')->nullable();
            $table->boolean('status')->default(0)->nullable();
            $table->longText('description')->nullable();
        });

        Schema::table('requests', function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('hrmlmsusers')->onDelete('cascade')->unUpdate('cascade');
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
        Schema::dropIfExists('requests');
    }
}
