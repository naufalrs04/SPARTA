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
        Schema::create ('mahasiswas', function (Blueprint $table) {
            $table-> id();
            $table-> string('nim');
            $table-> boolean('status')->nullable();
            $table-> integer('semester');
            $table-> string('prodi');
            $table-> float('IPK', 3, 2)->nullable();
            $table-> float('IPS_Sebelumnya', 3, 2)->nullable();
            $table-> string('alamat')->nullable();
            $table-> integer('usia')->nullable();
            $table-> integer('TTL')->nullable();
            $table-> integer('fotomahasiswa')->nullable();
            $table-> unsignedBigInteger('id_wali');

            $table->foreign('id_wali')->references('id')->on('dosens')->onDelete('cascade');
            
            $table-> timestamps();
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
