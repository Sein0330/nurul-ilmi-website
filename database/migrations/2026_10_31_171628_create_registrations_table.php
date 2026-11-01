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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('pendidikan_saat_ini');
            $table->text('alamat_lengkap');
            $table->string('no_telp');
            $table->string('program_pembelajaran');
            $table->string('pilihan_kelas');
            $table->string('pilihan_paket');
            $table->text('pengalaman_sebelumnya')->nullable();
            $table->text('kemampuan_saat_ini')->nullable();
            $table->text('catatan_khusus')->nullable();
            $table->enum('status', ['pending', 'verified', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
