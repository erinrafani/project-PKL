<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Pembeli;
use Illuminate\Http\Request;
use Validator;

class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pembeli = Pembeli::all();
        return view('pembeli.index', compact('pembeli'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pembeli.create');
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
        $rules = [
            'nama_pembeli' => 'required|max:255|unique:pembeli',
        ];

        $message = [
            'nama_pembeli.required' => 'nama pembeli harus di isi',
            'nama_pembeli.unique' => 'nama pembeli sudah digunakan',
            'name.max' => 'name maksimal 255 karakter',
        ];

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            Alert::error('Oops', 'Data yang anda input tidak valid, silahkan di ulang')->autoclose(2000);
            return back()->withErrors($validation)->withInput();
        }

        $pembeli = new Pembeli;
        $pembeli->nama_pembeli = $request->nama_pembeli;
        $pembeli->alamat = $request->alamat;
        $pembeli->no_hp = $request->no_hp;
        $pembeli->email = $request->email;
        Alert::success('Data ' . $pembeli->nama_pembeli . ' Berhasil Di Tambah');
        $pembeli->save();
        return redirect()->route('pembeli.index');
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
        $pembeli = Pembeli::findOrFail($id);
        return view('pembeli.show', compact('pembeli'));
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
        $pembeli = Pembeli::findOrFail($id);
        return view('pembeli.edit', compact('pembeli'));
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
            'alamat' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
        ]);

        $pembeli = Pembeli::findOrFail($id);
        $pembeli->nama_pembeli = $request->nama_pembeli;
        $pembeli->alamat = $request->alamat;
        $pembeli->no_hp = $request->no_hp;
        $pembeli->email = $request->email;
        $pembeli->save();
        return redirect()->route('pembeli.index');
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
        $pembeli = Pembeli::findOrFail($id);
        $pembeli->delete();
        return redirect()->route('pembeli.index');
    }
}
