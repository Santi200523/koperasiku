<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('simpanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anggota_id')->constrained('anggotas')->onDelete('cascade');
            $table->enum('jenis', ['pokok', 'wajib', 'sukarela']);
            $table->decimal('nominal', 12, 2);
            $table->date('tanggal');
            $table->enum('status', ['pending', 'disetujui', 'ditolak'])->default('disetujui');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('simpanans');
    }
};
