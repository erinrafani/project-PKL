<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = "kategori";
    protected $visible = ['nama_kategori'];
    protected $fillable = ['nama_kategori'];
    public $timestamps = true;

    public function Barang()
    {
        //data model "author" bisa memiliki banyak data
        //dari model "book" melalui fk "author_id"
        $this->hasMany('App\Models\Barang', 'nama_kategori');
    }
}
