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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relasi ke tabel users
            $table->string('universitas'); // Universitas tempat member berada
            $table->string('nama');
            $table->text('alamat');
            $table->string('nim')->nullable(); // NIM optional
            $table->string('nomor_telpon');
            $table->string('pekerjaan');
            $table->enum('divisi', ['pendidikan', 'rsdm', 'kominfo', 'litbang'])->nullable(); // Divisi anggota
            $table->enum('jabatan', ['ketua_divisi', 'wakil_divisi', 'anggota_divisi', 'anggota_bph'])->nullable(); // Jabatan dalam divisi
            $table->enum('periode', ['2023-2024', '2024-2025', '2025-2026'])->default('2023-2024'); // Periode untuk anggota
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
