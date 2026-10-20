<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('angsurans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pinjaman_id')->constrained('pinjamans')->onDelete('cascade');
            $table->integer('angsuran_ke');
            $table->date('jatuh_tempo');
            $table->decimal('jumlah_tagihan', 12, 2);
            $table->decimal('jumlah_bayar', 12, 2)->default(0);
            $table->enum('status', ['belum_bayar', 'lunas', 'menunggu_konfirmasi'])->default('belum_bayar');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('angsurans');
    }
};
