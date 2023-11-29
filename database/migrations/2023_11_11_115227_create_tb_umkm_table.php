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
        Schema::create('tb_umkm', function (Blueprint $table) {
            $table->integer('id_umkm')->autoIncrement();
            $table->string('gambarcover', 50)->nullable();
            $table->string('namaumkm', 150)->unique();
            $table->text('deskripsi');
            $table->string('slug', 50)->unique();
            $table->string('infopemilik', 50);
            $table->integer('id_kategori');
            $table->foreign('id_kategori')->references('id_kategori')->on('tb_kategoriumkm');
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
        Schema::dropIfExists('tb_umkm');
    }
};