<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{

    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_kategori')->unsigned();
            $table->string('nama_barang');
            $table->string('nama_kategori');
            $table->integer('stok');
            $table->string('deskripsi');
            $table->string('harga');
            $table->string('cover')->nullable();

            $table->foreign('id_kategori')->references('id')
            ->on('kategori')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
