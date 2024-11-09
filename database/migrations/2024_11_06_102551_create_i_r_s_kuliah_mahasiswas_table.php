<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('i_r_s_kuliah_mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mk');
            $table->string('kode_mk');
            $table->string('sks_mk');
            $table->string('snt _mk');
            $table->integer('semester_mk');
            $table->string('prodi_mk');
            $table->string('tahunajaran');
            $table->string('dosen');
            $table->string('kelas');
            $table->string('hari');
            $table->time('jammulai');
            $table->time('jamakhir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('i_r_s_kuliah_mahasiswas');
    }
};
