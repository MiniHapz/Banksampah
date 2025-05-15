<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetoran extends Migration
{
    public function up()
    {
        Schema::create('setoran', function (Blueprint $table) {
            $table->string('no_transaksi')->primary();
            $table->string('no_tabungan'); // FK ke tabungan
            $table->date('tanggal_transaksi');
            $table->decimal('total_per_kg', 12, 2);
            $table->decimal('total_kasar', 15, 2);

            // Foreign Key
            $table->foreign('no_tabungan')
                  ->references('no_tabungan')
                  ->on('tabungan')
                  ->onDelete('cascade');

            $table->timestamps(); // optional, untuk created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('setoran');
    }
}
