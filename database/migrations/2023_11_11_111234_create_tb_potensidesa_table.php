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
        Schema::create('tb_potensidesa', function (Blueprint $table) {
            $table->integer('id_potensidesa')->autoIncrement();
            $table->string('gambarcover', 15)->nullable();
            $table->string('namapotensi', 150);
            $table->string('lokasi', 50);
            $table->date('tanggalposting');
            $table->string('penulis', 10);
            $table->text('deskripsi');
            $table->string('slug', 50)->unique();
            $table->integer('id_kategori');
            $table->foreign('id_kategori')->references('id_kategori')->on('tb_kategoripotensi');
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
        Schema::dropIfExists('tb_potensidesa');
    }
};