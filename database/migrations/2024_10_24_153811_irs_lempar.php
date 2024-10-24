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
            $table->unsignedBigInteger('user_id'); //Buat ambil NIM
            $table->unsignedBigInteger('mahasiswa_id'); //Buat ambil nama mahasiswa

            $table->float('IPS_sebelumnya');
            $table->integer('total_SKS');
            $table->boolean('status')->nullable(); //1 disetujui, 0 ditolak

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas')->onDelete('cascade');

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
