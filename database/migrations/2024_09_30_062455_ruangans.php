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
        Schema::create('ruangans', function (Blueprint $table) {
            $table->id(); // Primary key 'id'
            $table->string('kode');
            $table->string('nama');
            $table->string('kapasitas');
            // $table->unsignedBigInteger('gedung_id'); // Foreign key column
            $table->timestamps();

            // Foreign key constraint
            // $table->foreign('gedung_id')->references('id')->on('gedungs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruangans');
    }
};