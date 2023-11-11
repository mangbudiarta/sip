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
        Schema::create('tb_petugas', function (Blueprint $table) {
            $table->char('kode_petugas', 5)->primary();
            $table->string('nama', 100);
            $table->enum('jeniskelamin', ['Laki-laki', 'Perempuan']);
            $table->string('tempatlahir', 25)->nullable();
            $table->date('tanggallahir')->nullable();
            $table->string('email', 50)->unique();
            $table->string('password', 60);
            $table->string('telepon', 15)->nullable()->unique();
            $table->string('alamat', 100)->nullable();
            $table->string('foto', 100)->nullable();
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
        Schema::dropIfExists('tb_petugas');
    }
};