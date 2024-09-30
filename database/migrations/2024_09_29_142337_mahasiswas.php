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
            $table-> unsignedBigInteger('user_id');
            $table-> foreign('user_id')-> references('id')-> on('users');
            $table-> string('nim');
            $table-> string('nama');
            $table-> string('prodi');
            $table-> string('angkatan');
            $table-> string('dosen_wali');
            $table-> integer('semester');
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
