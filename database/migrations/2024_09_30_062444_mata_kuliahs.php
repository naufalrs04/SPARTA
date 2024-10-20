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
        Schema::create ('mata_kuliahs', function (Blueprint $table) {
            $table-> id();
            $table-> string('kode');
            $table-> string('nama');
            $table-> integer('sks');
            $table-> integer('semester');
            $table-> string('prodi');
            $table->string('hari');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
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
