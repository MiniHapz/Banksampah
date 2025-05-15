<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTabunganTable extends Migration
{
    public function up()
    {
        Schema::create('detail_tabungan', function (Blueprint $table) {
            $table->id();
            $table->string('no_tabungan');
            $table->string('no_transaksi');
            $table->decimal('total_kg', 12, 2);
            $table->decimal('nominal_seluruh', 15, 2);
            $table->timestamps();

            // Foreign key ke tabel tabungan
            $table->foreign('no_tabungan')
                  ->references('no_tabungan')
                  ->on('tabungan')
                  ->onDelete('cascade');

            // Foreign key ke tabel setoran
            $table->foreign('no_transaksi')
                  ->references('no_transaksi')
                  ->on('setoran')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_tabungan');
    }
}
