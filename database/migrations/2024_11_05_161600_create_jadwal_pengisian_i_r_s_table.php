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
        Schema::create('jadwal_pengisian_i_r_s', function (Blueprint $table) {
            $table->id();
            $table->string('keterangan');
            $table->date('jadwalmulai')->nullable();
            $table->date('jadwalberakhir')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_pengisian_i_r_s');
    }
};
