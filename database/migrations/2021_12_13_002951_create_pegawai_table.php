<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->increments('id_peg');
            // $table->id();
            $table->string('nama');
            $table->string('t_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->enum('jns_kelamin', ['L', 'P']);
            $table->unsignedInteger('kode_agama')->nullable();
            $table->unsignedInteger('kode_unitkerja')->nullable();
            $table->enum('sts_marital', ['Menikah', 'Belum menikah'])->nullable();
            $table->unsignedInteger('kode_pdd')->nullable();
            $table->string('nama_sekolah')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('fakultas')->nullable();
            $table->string('thmsk')->nullable();
            $table->string('alamat')->nullable();
            $table->enum('sts_pegawai', ['Tetap', 'Tidak Tetap']);
            $table->unsignedInteger('id_user');
            // $table->unsignedInteger('user_id');
            $table->unsignedInteger('kode_gol')->nullable();
            $table->year('sertifikasi')->nullable();
            $table->unsignedInteger('kode_jbts')->nullable();
            $table->date('tmt_jab')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('mapel')->nullable();
            $table->string('mengajar')->nullable();
            $table->string('foto')->nullable();


            $table->foreign('kode_agama')->references('kode_agama')->on('tm_agama')
                ->onDelete('cascade');
            $table->foreign('kode_unitkerja')->references('kode_unitkerja')->on('unit_kerja')
                ->onDelete('cascade');
            $table->foreign('kode_pdd')->references('kode_pdd')->on('tm_pendidikan')
                ->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('kode_gol')->references('kode_gol')->on('tm_golongan')
                ->onDelete('cascade');
            $table->foreign('kode_jbts')->references('kode_jbts')->on('tm_jabatanstruktural')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
}
