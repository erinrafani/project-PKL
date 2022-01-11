<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = "barang";
    protected $visible = ['id_kategori','nama_barang','nama_kategori','stok','deskripsi','harga','cover'];
    protected $fillable = ['id_kategori','nama_barang','nama_kategori','stok','deskripsi','harga','cover'];
    public $timestamps = true;

    public function Kategori()
    {
        //data model "author" bisa memiliki banyak data
        //dari model "book" melalui fk "author_id"
        $this->belongTo('App\Models\Kategori', 'nama_kategori');
    }

    public function Transaksi()
    {
        //data model "author" bisa memiliki banyak data
        //dari model "book" melalui fk "author_id"
        $this->belongTo('App\Models\Transaksi', 'nama_barang');
    }

    public function image()
    {
        if ($this->cover && file_exists(public_path('images/alat/' . $this->cover))) {
            return asset('images/alat/' . $this->cover);
        } else {
            return asset('images/no_image.png');
        }
    }

    public function deleteImage()
    {
        if ($this->cover && file_exists(public_path('images/alat/' . $this->cover))) {
            return unlink(public_path('images/alat/' . $this->cover));
        }

    }
}
