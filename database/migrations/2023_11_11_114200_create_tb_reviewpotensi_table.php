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
            $table->string('google_id', 255);
            $table->integer('id_potensidesa');
            $table->integer('rating');
            $table->text('review');
            $table->foreign('google_id')->references('google_id')->on('tb_wisatawan');
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