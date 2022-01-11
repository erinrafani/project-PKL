<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use App\Models\Pembeli;
use App\Models\Barang;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $transaksi = Transaksi::with('pembeli','barang')->get();
        return view('transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $transaksi = Transaksi::all();
        $barang = Barang::all();
        $pembeli = Pembeli::all();
        return view('transaksi.create', compact('pembeli','barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi data
        $validated = $request->validate([
            'nama_pembeli' => 'required',
            'nama_barang' => 'required',
            'tanggal_beli' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'total' => 'required',
        ]);

        $transaksi = new Transaksi;
        $transaksi->nama_pembeli = $request->nama_pembeli;
        $transaksi->nama_barang = $request->nama_barang;
        $transaksi->tanggal_beli = $request->tanggal_beli;
        $transaksi->harga = $request->harga;
        $transaksi->jumlah = $request->jumlah;
        $transaksi->total = $request->total;
        $transaksi->save();
        return redirect()->route('transaksi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
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
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi.edit', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validated = $request->validate([

            'nama_pembeli' => 'required',
            'nama_barang' => 'required',
            'tanggal_beli' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'total' => 'required',
        ]);

        $transaksi = Transaksi::findOrFail($id);

        $transaksi->nama_pembeli = $request->nama_pembeli;
        $transaksi->nama_barang = $request->nama_barang;
        $transaksi->tanggal_beli = $request->tanggal_beli;
        $transaksi->harga = $request->harga;
        $transaksi->jumlah = $request->jumlah;
        $transaksi->total = $request->total;
        $pembeli->save();
        return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $author
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
