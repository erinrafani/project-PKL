<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Kategori;
use App\Models\Barang;
use App\Models\Pembeli;
use App\Models\Transaksi;
// use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kategori = Kategori::all();
        $pembeli = Pembeli::all();
        $barang = Barang::all();
        $transaksi = Transaksi::all();
        $count = DB::table('kategori', 'pembeli', 'barang', 'transaksi')->count();
        return view('home', compact('kategori', 'pembeli', 'barang', 'transaksi' ,'count'));
    }

    // public function index()
    // {
    //     if (Auth::user()->hasRole('admin')) {
    //         return view('home');
    //     } else {
    //         return view('pengguna.index');
    //     }
    // }
}
