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
        Schema::create('penyusunan_jadwals', function (Blueprint $table) {
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

            // Foreign key constraint for kode_mk referencing kode in mata_kuliahs
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penyusunanjadwals', function (Blueprint $table) {
            $table->dropForeign(['kode_mk']);
            $table->dropColumn(['kode_mk', 'nama_mk']);
        });
    }
};
