<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
use DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function kategori()
    {
        $kategori = Kategori::all();
        return response()->json([
            'success' => true,
            'message' => 'Data kategori',
            'data' => $kategori,
        ], 200);
    }


    public function index()
    {
        // $artikel = Article::with('category')->get();
        $barang = DB::table('barang')
            ->join('kategori', 'barang.id_kategori', '=', 'id_kategori')
            ->select('barang.nama_barang','kategori.nama_kategori','barang.stok','barang.deskripsi','barang.harga','barang.cover')
            ->get();
        return response()->json([
            'success' => true,
            'message' => 'data artikel',
            'data' => $barang,
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
        $barang = new Barang();
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
        return response()->json([
            'success' => true,
            'message' => 'Data Barang Berhasil dibuat',
            'data' => $barang,
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
        $barang = Barang::findOrFail($id);
        return response()->json([
            'success' => true,
            'message' => 'Show Data Barang',
            'data' => $barang,
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
        $barang = Barang::findOrFail($id);
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
        $barang->save();
        return response()->json([
            'success' => true,
            'message' => 'Data Barang Berhasil diedit',
            'data' => $barang,
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
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Barang Berhasil dihapus',
            'data' => $barang,
        ], 200);
    }
}
