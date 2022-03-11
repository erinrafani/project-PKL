<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Validator;

class KategoriController extends Controller
{

    public function index()
    {
        //
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        //
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        //validasi data
        $rules = [
            'nama_kategori' => 'required|max:255|unique:kategori',
        ];

        $message = [
            'nama_kategori.required' => 'nama kategori harus di isi',
            'nama_kategori.unique' => 'nama kategori sudah digunakan',
            'name.max' => 'name maksimal 255 karakter',
        ];

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            Alert::error('Oops', 'Data yang anda input tidak valid, silahkan di ulang')->autoclose(2000);
            return back()->withErrors($validation)->withInput();
        }

        $kategori = new Kategori;
        $kategori->nama_kategori = $request->nama_kategori;
        Alert::success('Data ' . $kategori->nama_kategori . ' Berhasil Di Tambah');
        $kategori->save();
        return redirect()->route('kategori.index');
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
        $kategori = Kategori::findOrFail($id);
        return view('kategori.show', compact('kategori'));
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
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
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
            'nama_kategori' => 'required',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->nama_kategori = $request->nama_kategori;
        Alert::success('data ' . $kategori->nama_kategori . ' berhasil di update');
        $kategori->save();
        return redirect()->route('kategori.index');
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
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        if (!Kategori::destroy($id)) {
            return redirect()->back();
        } else {
            Alert::success('Berhasil', 'Mengapus Data ' . $kategori->nama_kategori);
            return redirect()->back();
        }
        return redirect()->route('kategori.index');
    }
}
