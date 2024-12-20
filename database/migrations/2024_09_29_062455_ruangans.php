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
        Schema::create ('ruangans', function (Blueprint $table) {
            $table-> id();
            $table-> unsignedBigInteger('gedung_id');
            $table-> string('nama');
            $table-> foreign('gedung_id')->references('id')->on('gedungs')->onDelete('cascade');
            $table-> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
