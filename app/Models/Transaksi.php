<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = "transaksi";
    protected $visible = ['id_pembeli','id_barang','alamat','tanggal_beli','harga','jumlah','total'];
    protected $fillable = ['id_pembeli','id_barang','alamat','tanggal_beli','harga','jumlah','total'];
    public $timestamps = true;

    public function Barang()
    {
        //data model "author" bisa memiliki banyak data
        //dari model "book" melalui fk "author_id"
        return $this->belongsTo('App\Models\Barang', 'id_barang');
    }

    public function Pembeli()
    {
        //data model "author" bisa memiliki banyak data
        //dari model "book" melalui fk "author_id"
        return $this->belongsTo('App\Models\Pembeli', 'id');
    }
}
