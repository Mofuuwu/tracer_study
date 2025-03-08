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
        Schema::create('jawaban_mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kuisioner_id');
            $table->unsignedBigInteger('soal_id');
            $table->unsignedBigInteger('mahasiswa_id');
            $table->unsignedBigInteger('pilihan_id');
            $table->text('jawaban_isian')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawaban_mahasiswa');
    }
};
