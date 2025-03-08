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
            $table->string('nim', 20)->unique();
            $table->string('nama', 255);
            $table->string('email', 255)->unique();
            $table->string('no_hp', 15);
            $table->text('alamat');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->date('tgl_lahir');
            $table->year('angkatan');
            $table->string('prodi', 255);
            $table->string('fakultas', 255);
            $table->integer('semester');
            $table->enum('status', ['aktif', 'lulus', 'dropout'])->default('aktif');
            $table->string('pekerjaan', 255)->nullable();
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
