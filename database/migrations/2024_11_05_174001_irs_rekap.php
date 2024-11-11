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
        //
        Schema::create('irs_rekap', function (Blueprint $table) {
            $table->unsignedBigInteger('mahasiswa_id'); //Group by
            $table->integer('semester')->nullable();
            $table->unsignedBigInteger('jadwal_id');
            $table->string('kode_mk');
            $table->string('nama_mk');
            $table->string('kelas');
            $table->string('ruang');
            $table->integer('sks');
            $table->string('status_pengambilan')->default('baru');
            $table->string('status_pengajuan')->nullable();

            // Foreign key
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas')->onDelete('cascade');
            $table->foreign('jadwal_id')->references('id')->on('penyusunan_jadwals')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
