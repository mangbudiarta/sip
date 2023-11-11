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
        Schema::create('tb_wisatawan', function (Blueprint $table) {
            $table->string('google_id', 255)->primary();
            $table->string('nama', 100);
            $table->string('email', 50)->unique();
            $table->string('password', 150);
            $table->string('foto', 100)->nullable()->default(null);
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
        Schema::dropIfExists('tb_wisatawan');
    }
};