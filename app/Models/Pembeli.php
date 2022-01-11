<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    use HasFactory;

    protected $table = "pembeli";
    protected $visible = ['nama','alamat','no_hp','email'];
    protected $fillable = ['nama','alamat','no_hp','email'];
    public $timestamps = true;

    public function Transaksi()
    {
        //data model "author" bisa memiliki banyak data
        //dari model "book" melalui fk "author_id"
        $this->hasMany('App\Models\Transaksi', 'nama_pembeli');
    }

}
