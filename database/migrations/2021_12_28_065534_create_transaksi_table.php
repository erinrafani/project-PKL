<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{

    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pembeli')->unsigned();
            $table->bigInteger('id_barang')->unsigned();
            $table->string('nama_pembeli');
            $table->string('nama_barang');
            $table->string('alamat');
            $table->date('tanggal_beli');
            $table->string('harga');
            $table->string('jumlah');
            $table->string('total');

            $table->foreign('id_pembeli')->references('id')
            ->on('pembeli')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('id_barang')->references('id')
            ->on('barang')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
