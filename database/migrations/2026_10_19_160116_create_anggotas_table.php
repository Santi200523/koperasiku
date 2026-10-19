
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_anggota')->unique();
            $table->string('nama');
            $table->string('nik')->unique();
            $table->string('jenis_kelamin', 20);
            $table->text('alamat');
            $table->string('no_telepon', 20);
            $table->date('tanggal_daftar');
            $table->string('status')->default('aktif');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};
