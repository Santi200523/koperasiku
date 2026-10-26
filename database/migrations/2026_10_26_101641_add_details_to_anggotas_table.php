<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        // Kolom anggota sudah tersedia di database.
        // Tidak perlu menambah kolom yang sama lagi.
    }

    public function down(): void
    {
        // Sengaja tidak menghapus kolom agar data tetap aman.
    }
};
