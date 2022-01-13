<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ApiKategoriController extends Controller
{

    public function index()
    {
        $kategori = Kategori::all();

        // where('id', 2)->get();

        // if ($user->count() >= 1) {

            return response()->json([
                'status' => true,
                'code' => 200,
                'message' => 'berhasil',
                'data' => $kategori,
            ]);

        // } else{

        //     return response()->json([
        //         'status' => true,
        //         'code' => 404,
        //         'message' => 'gagal',
        //         'data' => $user,
        //     ]);
        // }
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
        return response()->json([
            'status' => true,
            'code' => 201,
            'message' => 'Data Kategori Berhasil Dibuat',
            'data' => $kategori,
        ]);
    }


    public function show($id)
    {

        $kategori = Kategori::find($id);
        if ($kategori) {
            return response()->json([
                'status' => true,
                'code' => 200,
                'message' => 'Show Data Kategori',
                'data' => $kategori,
            ]);

        } else {
            return response()->json([
                'status' => false,
                'code' => 404,
                'message' => 'Data Kategori Tidak Ditemukan',
                'data' => [],
            ]);
        }
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $kategori = Kategori::find($id);
        if ($kategori) {
            $kategori->nama_kategori = $request->nama_kategori;
            $kategori->save();
            return response()->json([
                'status' => true,
                'code' => 201,
                'message' => 'Data User Berhasil Dibuat',
                'data' => $kategori,
            ]);

        } else {
            return response()->json([
                'status' => false,
                'code' => 404,
                'message' => 'Data User Tidak Ditemukan',
                'data' => [],
            ]);
        }
    }


    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        if ($kategori) {
            $kategori->delete();
            return response()->json([
                'status' => true,
                'code' => 200,
                'message' => 'Data kategori Berhasil Di hapus',
                'data' => $kategori,
            ]);

        } else {
            return response()->json([
                'status' => false,
                'code' => 404,
                'message' => 'Data kategori Tidak Ditemukan',
                'data' => [],
            ]);
        }
    }
}
