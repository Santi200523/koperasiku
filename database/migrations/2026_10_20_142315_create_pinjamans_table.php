<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasTable('pinjamans')) {
            Schema::create('pinjamans', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('anggota_id');
                $table->decimal('jumlah', 15, 2);
                $table->decimal('bunga', 5, 2)->default(0);
                $table->unsignedInteger('tenor');
                $table->enum('status', ['pengajuan', 'disetujui', 'ditolak', 'lunas'])->default('pengajuan');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        // Tabel tidak dihapus agar data lama tetap aman.
    }
};
