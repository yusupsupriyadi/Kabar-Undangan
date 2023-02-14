<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mempelai_pria', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_lengkap');
            $table->string('nama_panggilan');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('instagram');
            $table->string('foto');
            $table->string('riwayat_hidup');
            $table->string('tampilkan_foto');
            $table->string('facebook');
            $table->string('twitter');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mempelai_pria');
    }
};
