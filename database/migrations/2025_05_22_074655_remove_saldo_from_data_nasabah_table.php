<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('data_nasabah', function (Blueprint $table) {
            $table->dropColumn('saldo');
        });
    }

    public function down(): void
    {
        Schema::table('data_nasabah', function (Blueprint $table) {
            $table->decimal('saldo', 15, 2)->default(0);
        });
    }
};
