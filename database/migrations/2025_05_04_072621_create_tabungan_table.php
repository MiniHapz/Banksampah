<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabunganTable extends Migration
{
    public function up()
    {
        Schema::create('tabungan', function (Blueprint $table) {
            $table->string('no_tabungan')->primary(); // no_tabungan sebagai primary key
            $table->integer('nik'); // Ubah tipe kolom menjadi integer agar sesuai dengan nik di data_nasabah
            $table->decimal('total_tabungan', 15, 2)->default(0); // total_tabungan

            // Menambahkan foreign key untuk nasabah_nik
            $table->foreign('nik')
                  ->references('nik') // Relasi ke kolom nik di data_nasabah
                  ->on('data_nasabah')
                  ->onDelete('cascade'); // kalau data nasabah dihapus, data tabungannya juga terhapus
        });
    }

    public function down()
    {
        Schema::dropIfExists('tabungan');
    }
}
