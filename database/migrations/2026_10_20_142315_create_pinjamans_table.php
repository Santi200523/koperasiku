<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pinjamans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anggota_id')->constrained('anggotas')->onDelete('cascade');
            $table->decimal('jumlah', 15, 2);
            $table->decimal('bunga', 5, 2)->default(0);
            $table->integer('tenor'); // dalam bulan
            $table->enum('status', ['pengajuan', 'disetujui', 'ditolak', 'lunas'])->default('disetujui');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pinjamans');
    }
};
