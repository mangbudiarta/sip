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
        Schema::create('tb_umkmgambar', function (Blueprint $table) {
            $table->integer('id_gambar')->autoIncrement();
            $table->string('gambar', 50);
            $table->integer('id_umkm');
            $table->foreign('id_umkm')->references('id_umkm')->on('tb_umkm');
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
        Schema::dropIfExists('tb_umkmgambar');
    }
};