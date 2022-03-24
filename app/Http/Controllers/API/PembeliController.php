<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pembeli;
use Illuminate\Http\Request;

class KategoriController extends Controller
{

    public function index()
    {
        $pembeli = Kategori::all();
        return response()->json([
            'success' => true,
            'message' => 'Data Pembeli',
            'data' => $pembeli,
        ], 200);
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

    public function store(Request $request)
    {
        // sesuaikan dengan field table masing-masing & modelnya
        $pembeli = new Kategori();
        $pembeli->nama_kategori = $request->nama_kategori;
        $pembeli->save();
        return response()->json([
            'success' => true,
            'message' => 'Data Pembeli Berhasil dibuat',
            'data' => $pembeli,
        ], 201);
        // $user->password = bcrypt($request->password);
    }

    public function show($id)
    {

        $pembeli = Kategori::find($id);
        if ($kategori) {
            return response()->json([
                'success' => true,
                'message' => 'Show Data Pembeli',
                'data' => $pembeli,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Pembeli tidak ditemukan',
                'data' => [],
            ], 404);

        }

    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $pembeli = Kategori::findOrFail($id);
        $pembeli->nama_kategori = $request->nama_kategori;
        $pembeli->save();
        return response()->json([
            'success' => true,
            'message' => 'Data Pembeli Berhasil diedit',
            'data' => $pembeli,
        ], 201);

    }

    public function destroy($id)
    {
        $pembeli = Kategori::findOrFail($id);
        $pembeli->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Pembeli Berhasil hapus',
            'data' => $pembeli,
        ], 200);

    }
}
