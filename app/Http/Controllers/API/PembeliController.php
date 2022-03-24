<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pembeli;
use Illuminate\Http\Request;

class PembeliController extends Controller
{

    public function index()
    {
        $pembeli = Pembeli::all();
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
        $pembeli = new Pembeli();
        $pembeli->nama_pembeli = $request->nama_pembeli;
        $pembeli->alamat = $request->alamat;
        $pembeli->no_hp = $request->no_hp;
        $pembeli->email = $request->email;
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

        $pembeli = Pembeli::find($id);
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
        $pembeli = Pembeli::findOrFail($id);
        $pembeli->nama_pembeli = $request->nama_pembeli;
        $pembeli->alamat = $request->alamat;
        $pembeli->no_hp = $request->no_hp;
        $pembeli->email = $request->email;
        $pembeli->save();
        return response()->json([
            'success' => true,
            'message' => 'Data Pembeli Berhasil diedit',
            'data' => $pembeli,
        ], 201);

    }

    public function destroy($id)
    {
        $pembeli = Pembeli::findOrFail($id);
        $pembeli->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Pembeli Berhasil hapus',
            'data' => $pembeli,
        ], 200);

    }
}
