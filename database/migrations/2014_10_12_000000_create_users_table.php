<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
           // $table->unsignedInteger('unitkerja_id');
            //$table->string('nip')->unique();
            //$table->string('email')->unique();
            //$table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            //$table->foreignId('current_team_id')->nullable();
            //$table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nameRole');
            // $table->enum('nameRole',['admin','user'])->default('user');
           // $table->unsignedInteger('user_id');
           $table->timestamps();
        });

        // Schema::create('hrmlmspermissions', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('namePermission');
        //     //$table->unsignedInteger('role_id');
        //     $table->timestamps();
        // });

        Schema::create('role_user', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->unUpdate('cascade');
            $table->unsignedInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')->unUpdate('cascade');
            $table->timestamps();
        });

        // Schema::create('permission_role', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->unsignedInteger('role_id');
        //     $table->foreign('role_id')->references('id')->on('hrmlmsroles')->onDelete('cascade')->unUpdate('cascade');
        //     $table->unsignedInteger('permission_id');
        //     $table->foreign('permission_id')->references('id')->on('hrmlmspermissions')->onDelete('cascade')->unUpdate('cascade');
        //     $table->timestamps();
        // });

        // Schema::table('roles', function(Blueprint $table){
        //     $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->unUpdate('cascade');
        // });

        // Schema::table('permissions', function(Blueprint $table){
        //     $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')->unUpdate('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        //Schema::dropIfExists('hrmlmspermissions');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('role_user');
        //Schema::dropIfExists('permission_role');
    }
}