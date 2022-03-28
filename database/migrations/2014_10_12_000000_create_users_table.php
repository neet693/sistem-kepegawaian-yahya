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
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('ukrj_nama')->nullable();

            // $table->unsignedInteger('kode_role')->nullable();
            // $table->string('level')->default('pegawai');
            // $table->enum('level', ['admin', 'adminpusat', 'adminunit', 'kepala', 'pegawai']);
            $table->rememberToken();
            $table->timestamps();

            // $table->foreign('kode_role')->references('kode_role')->on('roles')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
