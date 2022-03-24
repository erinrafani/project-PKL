<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{

    public function index()
    {
        $kategori = Kategori::all();
        return response()->json([
            'success' => true,
            'message' => 'Data Kategori',
            'data' => $kategori,
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
        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
        return response()->json([
            'success' => true,
            'message' => 'Data Kategori Berhasil dibuat',
            'data' => $kategori,
        ], 201);
        // $user->password = bcrypt($request->password);
    }

    public function show($id)
    {

        $kategori = Kategori::find($id);
        if ($kategori) {
            return response()->json([
                'success' => true,
                'message' => 'Show Data Kategori',
                'data' => $kategori,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Kategori tidak ditemukan',
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
        $kategori = Kategori::findOrFail($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
        return response()->json([
            'success' => true,
            'message' => 'Data Kategori Berhasil diedit',
            'data' => $kategori,
        ], 201);

    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Kategori Berhasil hapus',
            'data' => $kategori,
        ], 200);

    }
}
