<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pembeli;
use DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function barang()
    {
        $barang = Barang::all();
        return response()->json([
            'success' => true,
            'message' => 'Data barang',
            'data' => $barang,
        ], 200);
    }

    public function pembeli()
    {
        $pembeli = Pembeli::all();
        return response()->json([
            'success' => true,
            'message' => 'Data pembeli',
            'data' => $pembeli,
        ], 200);
    }


    public function index()
    {
        // $artikel = Article::with('category')->get();
       // $artikel = Article::with('category')->get();
       $transaksi = DB::table('transaksi')
       ->join('barang', 'transaksi.id_barang', '=', 'id_barang')
       ->join('pembeli', 'transaksi.id_pembeli', '=', 'id_pembeli')
       ->select('pembeli.nama_pembeli', 'barang.nama_barang', 'transaksi.tanggal_beli', 'transaksi.harga', 'transaksi.jumlah', 'transaksi.total','transaksi.uang','transaksi.kembalian')
       ->get();
   return response()->json([
       'success' => true,
       'message' => 'data transaksi',
       'data' => $transaksi,
   ], 200);
   // $barang = Barang::all();
   // return response()->json([
   //     'success' => true,
   //     'message' => 'Data barang',
   //     'data' => $barang,
   // ], 200);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaksi = new Transaksi();
        $transaksi->id_pembeli = $request->id_pembeli;
        $transaksi->id_barang = $request->id_barang;
        $transaksi->jumlah = $request->jumlah;
        // $transaksi->alamat = $request->alamat;
        $transaksi->tanggal_beli = $request->tanggal_beli;
        $price = Barang::findOrfail($request->id_barang);
        $transaksi->harga = $price->harga;
        $transaksi->total = $price->harga * $request->jumlah;
        $transaksi->uang = $request->uang;
        $transaksi->kembalian = $transaksi->uang - $transaksi->total;
        $barang = Barang::findOrFail($request->id_barang = $request->id_barang);
        $barang->stok -= $request->jumlah;
        $barang->save();
        $transaksi->save();
        return response()->json([
            'success' => true,
            'message' => 'Data Barang Berhasil dibuat',
            'data' => $transaksi,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return response()->json([
            'success' => true,
            'message' => 'Show Data Transaksi',
            'data' => $transaksi,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaksi = new Transaksi();
        $transaksi->id_pembeli = $request->id_pembeli;
        $transaksi->id_barang = $request->id_barang;
        $transaksi->jumlah = $request->jumlah;
        // $transaksi->alamat = $request->alamat;
        $transaksi->tanggal_beli = $request->tanggal_beli;
        $price = Barang::findOrfail($request->id_barang);
        $transaksi->harga = $price->harga;
        $transaksi->total = $price->harga * $request->jumlah;
        $transaksi->uang = $request->uang;
        $transaksi->kembalian = $transaksi->uang - $transaksi->total;
        $barang = Barang::findOrFail($request->id_barang = $request->id_barang);
        $barang->stok -= $request->jumlah;
        $barang->save();
        $transaksi->save();
        return response()->json([
            'success' => true,
            'message' => 'Data Barang Berhasil dibuat',
            'data' => $transaksi,
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return response()->json([
            'success' => true,
            'message' => 'Show Data Transaksi',
            'data' => $transaksi,
        ], 200);
    }
}
