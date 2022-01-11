<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use App\Models\Transaksi;
use App\Models\Barang;
use App\Models\Pembeli;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $barang = Barang::with('kategori')->get();
        return view('barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategori = Kategori::all();
        return view('barang.create', compact('kategori'));
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
            'id_kategori' => 'required',
            'nama_barang' => 'required',
            'nama_kategori' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'cover' => 'required|image|max:2048',

        ]);

        $barang = new Barang;
        $barang->id_kategori = $request->id_kategori;
        $barang->nama_barang = $request->nama_barang;
        $barang->nama_kategori = $request->nama_kategori;
        $barang->stok = $request->stok;
        $barang->deskripsi = $request->deskripsi;
        $barang->harga = $request->harga;
        if ($request->hasFile('cover')) {
            $barang->deleteImage();
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/alat/', $name);
            $barang->cover = $name;
        }
        $barang->save();
        return redirect()->route('barang.index');
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
        $barang = Barang::findOrFail($id);
        return view('barang.show', compact('barang'));
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
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
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
            'id_kategori' => 'required',
            'nama_barang' => 'required',
            'nama_kategori' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'cover' => 'required|image|max:2048',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->id_kategori = $request->id_kategori;
        $barang->nama_barang = $request->nama_barang;
        $barang->nama_kategori = $request->nama_kategori;
        $barang->stok = $request->stok;
        $barang->deskripsi = $request->deskripsi;
        $barang->harga = $request->harga;

        if ($request->hasFile('cover')) {
            $barang->deleteImage();
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/alat/', $name);
            $barang->cover = $name;
        }
        return redirect()->route('barang.index');
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
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect()->route('barang.index');
    }
}

