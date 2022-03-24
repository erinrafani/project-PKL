<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
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
        $barang = Barang::all();
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
        // dd($request->cover);
        //validasi data
        $validated = $request->validate([
            'id_kategori' => 'required',
            'nama_barang' => 'required',
            // 'nama_kategori' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'cover' => 'required|image|max:2048',

        ]);

        $image = $request->cover;
        $name = $image->getClientOriginalName();

        $barang = new Barang;
        $barang->id_kategori = $request->id_kategori;
        $barang->nama_barang = $request->nama_barang;
        // $barang->nama_kategori = $request->nama_kategori;
        $barang->stok = $request->stok;
        $barang->deskripsi = $request->deskripsi;
        $barang->harga = $request->harga;
        $barang->cover = $name;

        // $image->move(public_path().' images/alat', $name);
        if ($request->hasFile('cover')) {
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/barang/', $name);
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
        $kategori = Kategori::all();
        return view('barang.edit', compact('barang', 'kategori'));
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
            // 'nama_kategori' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'cover' => 'required|image|max:2048',

        ]);

        $image = $request->cover;
        $name = $image->getClientOriginalName();

        $barang = new Barang;
        $barang = Barang::findOrFail($id);
        // $kategori = Kategori::all();
        $barang->id_kategori = $request->id_kategori;
        $barang->nama_barang = $request->nama_barang;
        // $barang->nama_kategori = $request->nama_kategori;
        $barang->stok = $request->stok;
        $barang->deskripsi = $request->deskripsi;
        $barang->harga = $request->harga;
        $barang->cover = $name;

        // $image->move(public_path().' images/alat', $name);
        if ($request->hasFile('cover')) {
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/barang/', $name);
            $barang->cover = $name;
        }
        $barang->save();
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
