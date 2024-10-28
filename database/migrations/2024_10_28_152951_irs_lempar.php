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
        Schema::create('irs_lempar', function (Blueprint $table) {
            $table->unsignedBigInteger('mahasiswa_id');
            $table->unsignedBigInteger('mata_kuliah_id');
            $table->unsignedBigInteger('ruangan_id');

            $table->string('status_mata_kuliah');
            $table->boolean('status_persetujuan')->nullable();

            // Foreign key
            $table->foreign('mahasiswa_id')->references('mahasiswa_id')->on('irs_rekap')->onDelete('cascade');
            $table->foreign('mata_kuliah_id')->references('mata_kuliah_id')->on('irs_rekap')->onDelete('cascade');
            $table->foreign('ruangan_id')->references('ruangan_id')->on('irs_rekap')->onDelete('cascade');

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
