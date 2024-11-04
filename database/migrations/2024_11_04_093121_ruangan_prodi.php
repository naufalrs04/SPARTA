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
    Schema::create('ruang_prodis', function (Blueprint $table) {
        $table->id(); 
        $table-> unsignedBigInteger('ruangan_id');
        $table->string('nama_prodi'); 
        $table->string('status_pengajuan')->nullable(); 
        $table-> foreign('ruangan_id')->references('id')->on('ruangans')->onDelete('cascade');
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
