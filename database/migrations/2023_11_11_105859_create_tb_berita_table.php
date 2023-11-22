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
        Schema::create('tb_berita', function (Blueprint $table) {
            $table->integer('id_berita')->autoIncrement();
            $table->string('judulberita', 150);
            $table->date('tanggalposting');
            $table->string('penulis', 10);
            $table->string('gambarcover', 50)->nullable();
            $table->text('isiberita');
            $table->string('slug', 50)->unique();
            $table->integer('id_kategori');
            $table->foreign('id_kategori')->references('id_kategori')->on('tb_kategoriberita');
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
        Schema::dropIfExists('tb_berita');
    }
};