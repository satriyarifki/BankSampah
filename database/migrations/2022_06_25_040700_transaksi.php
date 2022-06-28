<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengepul_id');
            $table->foreign('pengepul_id')->references('id')->on('pengepul');
            $table->unsignedBigInteger('penyetor_id');
            $table->foreign('penyetor_id')->references('id')->on('penyetor');
            $table->date('tanggal');
            $table->double('jumlahsampah');
            $table->double('bayar');
            $table->string('keterangan', 25)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
