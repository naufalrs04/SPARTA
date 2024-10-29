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
            $table->integer('semester');

            $table->primary(['mahasiswa_id', 'semester']);

            $table->integer('jumlah_sks');
            $table->boolean('status_persetujuan')->nullable();

            // Foreign key
            $table->foreign('mahasiswa_id')->references('mahasiswa_id')->on('irs_rekap')->onDelete('cascade');

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
