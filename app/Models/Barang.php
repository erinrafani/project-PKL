<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = "barang";
    protected $visible = ['id_kategori','nama_barang','stok','deskripsi','harga','cover'];
    protected $fillable = ['id_kategori','nama_barang','stok','deskripsi','harga','cover'];
    public $timestamps = true;

    public function kategori()
    {
        //data model "author" bisa memiliki banyak data
        //dari model "book" melalui fk "author_id"
        return $this->belongsTo('App\Models\Kategori', 'id_kategori');
    }

    public function Transaksi()
    {
        //data model "author" bisa memiliki banyak data
        //dari model "book" melalui fk "author_id"
        return $this->belongsTo('App\Models\Transaksi', 'nama_barang');
    }

    public function image()
    {
        if ($this->cover && file_exists(public_path('images/barang/' . $this->cover))) {
            return asset('images/barang/' . $this->cover);
        } else {
            return asset('images/no_image.png');
        }
    }

    public function deleteImage()
    {
        if ($this->cover && file_exists(public_path('images/barang/' . $this->cover))) {
            return unlink(public_path('images/barang/' . $this->cover));
        }

    }
}
