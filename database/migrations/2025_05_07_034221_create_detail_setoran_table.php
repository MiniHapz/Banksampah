<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailSetoranTable extends Migration
{
    public function up()
    {
        Schema::create('detail_setoran', function (Blueprint $table) {
            $table->id();
            $table->string('no_transaksi'); // FK ke tabel setoran
            $table->unsignedBigInteger('sampah_id'); // FK ke data_sampah
            $table->decimal('harga', 12, 2);
            $table->decimal('jumlah', 12, 2);
            $table->decimal('sub_total', 15, 2);
            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('no_transaksi')->references('no_transaksi')->on('setoran')->onDelete('cascade');
            $table->foreign('sampah_id')->references('sampah_id')->on('data_sampah')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_setoran');
    }
}
