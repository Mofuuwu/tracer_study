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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('nim', 20)->unique()->nullable();
            $table->string('nama', 255)->nullable();
            $table->string('email', 255)->unique();
            $table->string('no_hp', 15)->nullable();
            $table->text('alamat')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->year('angkatan')->nullable();
            $table->string('prodi', 255)->nullable();
            $table->string('fakultas', 255)->nullable();
            $table->integer('semester')->nullable();
            $table->enum('status', ['aktif', 'lulus', 'dropout'])->default('aktif')->nullable();
            $table->string('pekerjaan', 255)->nullable();
            $table->boolean('verified')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
