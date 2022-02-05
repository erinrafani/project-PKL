<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use App\Models\Pembeli;
use App\Models\Barang;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        $barang = Barang::all();
        $pembeli = Pembeli::all();
        return view('transaksi.index', compact('transaksi', 'barang', 'pembeli'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $barang = Barang::all();
        $pembeli = Pembeli::all();
        return view('transaksi.create', compact('barang', 'pembeli'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pembeli' => 'required',
            'id_barang' => 'required',
            'alamat' => 'required',
            'tanggal_beli' => 'required',
            'jumlah' => 'required',

        ]);

        $transaksi = new Transaksi;
        $transaksi->id_pembeli = $request->id_pembeli;
        $transaksi->id_barang = $request->id_barang;
        $transaksi->jumlah = $request->jumlah;
        $transaksi->alamat = $request->alamat;
        $transaksi->tanggal_beli = $request->tanggal_beli;
        $price = Barang::findOrfail($request->id_barang);
        $transaksi->harga = $price->harga;
        $transaksi->total = $price->harga * $request->jumlah;
        $transaksi->save();
        return redirect()->route('transaksi.index');
    }

    //if ($request->hasFile('cover')){
    //    $transaksi->deleteImage();
    //    $image = $request->file('cover');
    //    $name = rand(1000, 9999) . $image->getClientOriginalName();
    //    $image->move('images/transaksi', $name);
    //    $transaksi->cover = $name;
    //}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $transaksi = Transaksi::findOrFail($id);
        $kategori = Kategori::all();
        return view('transaksi.edit', compact('transaksi', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //validasi data
        $validated = $request->validate([
            'id_pembeli' => 'required',
            'id_barang' => 'required',
            'alamat' => 'required',
            'tanggal_beli' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'total' => 'required',
            //'cover' => 'required|image|max:2048',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->id_barang = $request->id_barang;
        $transaksi->id_pembeli = $request->id_pembeli;
        $transaksi->alamat = $request->alamat;
        $transaksi->tanggal_beli = $request->tanggal_beli;
        $transaksi->harga = $request->harga;
        $transaksi->nama = $request->nama;
        $transaksi->harga = $request->harga;
        $transaksi->jumlah = $request->jumlah;
        $transaksi->total = $request->total;
        //if ($request->hasFile('cover')){
        //    $transaksi->deleteImage();
        //    $image = $request->file('cover');
        //    $name = rand(1000, 9999) . $image->getClientOriginalName();
        //    $image->move('images/transaksi', $name);
        //    $transaksi->cover = $name;
        //}
        $transaksi->save();
        return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        return redirect()->route('transaksi.index');
    }
}
