<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('name_group')->unique();
            $table->unsignedInteger('user_id')->nullable();
            $table->date('date');
            $table->timestamps();
        });

        Schema::table('groups', function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->unUpdate('cascade');
        });

        Schema::create('detail_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->unsignedInteger('group_id');
            $table->unsignedInteger('user_id')->nullable();
            $table->text('description');
            $table->timestamps();
        });

        Schema::table('detail_groups', function(Blueprint $table){
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade')->unUpdate('cascade');
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
        Schema::dropIfExists('groups');
        Schema::dropIfExists('detail_groups');
    }
}