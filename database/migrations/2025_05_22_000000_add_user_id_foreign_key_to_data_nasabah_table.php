<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('data_nasabah', function (Blueprint $table) {
            // Cek dulu kalau kolom user_id belum ada, baru dibuat
            if (!Schema::hasColumn('data_nasabah', 'user_id')) {
                $table->unsignedBigInteger('user_id')->nullable()->after('nik');
            }

            // Tambah foreign key constraint
            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('data_nasabah', function (Blueprint $table) {
            // Drop foreign key
            $table->dropForeign(['user_id']);

            // Kalau mau hapus kolom user_id juga, uncomment baris ini
            // $table->dropColumn('user_id');
        });
    }
};
