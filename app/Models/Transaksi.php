<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = "transaksi";
    protected $visible = ['nama_pembeli','nama_barang','alamat','harga','jumlah','total'];
    protected $fillable = ['nama_pembeli','nama_barang','alamat','harga','jumlah','total'];
    public $timestamps = true;

    public function Barang()
    {
        //data model "author" bisa memiliki banyak data
        //dari model "book" melalui fk "author_id"
        $this->belongTo('App\Models\Barang', 'nama_barang');
    }

    public function Pembeli()
    {
        //data model "author" bisa memiliki banyak data
        //dari model "book" melalui fk "author_id"
        $this->belongTo('App\Models\Pembeli', 'nama');
    }
}

