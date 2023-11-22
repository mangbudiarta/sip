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
        Schema::create('tb_fasilitas', function (Blueprint $table) {
            $table->integer('id_fasilitas')->autoIncrement();
            $table->string('namafasilitas', 100);
            $table->string('deskripsi', 255)->nullable();
            $table->string('gambar', 50)->nullable();
            $table->string('lokasi', 50)->nullable();
            $table->string('kontak', 50)->nullable();
            $table->integer('id_kategori');
            $table->foreign('id_kategori')->references('id_kategori')->on('tb_kategorifasilitas');
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
        Schema::dropIfExists('tb_fasilitas');
    }
};