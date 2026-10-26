<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasTable('angsurans')) {
            Schema::create('angsurans', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('pinjaman_id');
                $table->unsignedInteger('angsuran_ke');
                $table->date('jatuh_tempo');
                $table->decimal('jumlah_tagihan', 15, 2);
                $table->decimal('jumlah_bayar', 15, 2)->default(0);
                $table->enum('status', ['belum_bayar', 'lunas', 'menunggu_konfirmasi'])->default('belum_bayar');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        // Tabel tidak dihapus agar data lama tetap aman.
    }
};
