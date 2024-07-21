<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('values', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->unsignedInteger('user_id')->nullable();
            //$table->string('subcode')->unique();
            $table->integer('nilai_1');
            $table->integer('nilai_2');
            $table->integer('nilai_3');
            $table->integer('nilai_4');
            $table->integer('nilai_5');
            $table->integer('nilai_6');
            $table->integer('nilai_7');
            $table->integer('nilai_8');
            $table->timestamps();
        });

        Schema::table('values', function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->unUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('values');
    }
}
