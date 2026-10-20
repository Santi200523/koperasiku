<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('users', 'divisi')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('divisi')->default('admin')->after('email');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('users', 'divisi')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('divisi');
            });
        }
    }
};
