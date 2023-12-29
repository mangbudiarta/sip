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
        Schema::create('tb_reviewpotensi', function (Blueprint $table) {
            $table->integer('id_review')->autoIncrement();
            $table->integer('id_wisatawan');
            $table->integer('id_potensidesa');
            $table->integer('rating');
            $table->text('review');
            $table->foreign('id_wisatawan')->references('id_wisatawan')->on('tb_wisatawan');
            $table->foreign('id_potensidesa')->references('id_potensidesa')->on('tb_potensidesa');
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
        Schema::dropIfExists('tb_reviewpotensi');
    }
};