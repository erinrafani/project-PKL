@extends('adminlte::page')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Show Data Barang</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Barang</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nama Barang</label>
                        <input type="text" name="nama" value="{{$barang->nama_barang}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Stok</label>
                        <input type="text" name="alamat" value="{{$barang->stok}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <input type="text" name="no_hp" value="{{$barang->deskripsi}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Harga</label>
                        <input type="text" name="email" value="{{$barang->harga}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <button type="reset" class="btn btn-outline-danger">Reset</button>
                        <button type="submit" class="btn btn-outline-warning">Simpan</button>
                        <a href="{{url('admin/barang')}}" class="btn btn-outline-info">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
