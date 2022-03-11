<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Alert;
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
        return $this->hasMany('App\Models\Barang', 'id_kategori');
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function($kategori){
            if($kategori->barang->count() > 0){
                Alert::error('Gagal Menghapus', 'Data '.$kategori->nama_kategori.' Masih Memiliki Barang');
                return false;
            }
        });
    }
}
