@extends('adminlte::page')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Show Data Transaksi</h1>
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
                <div class="card-header">Data Transaksi</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nama Pembeli</label>
                        <input type="text" name="nama_pembeli" value="{{$transaksi->pembeli->nama_pembeli}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Barang</label>
                        <input type="text" name="nama_barang" value="{{$transaksi->barang->nama_barang}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" value="{{$transaksi->pembeli->alamat}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Beli</label>
                        <input type="text" name="tanggal_beli" value="{{$transaksi->tanggal_beli}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Harga</label>
                        <input type="text" name="harga" value="{{$transaksi->harga}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">jumlah</label>
                        <input type="text" name="jumlah" value="{{$transaksi->jumlah}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Total</label>
                        <input type="text" name="total" value="{{$transaksi->total}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <button type="reset" class="btn btn-outline-danger">Reset</button>
                        <button type="submit" class="btn btn-outline-warning">Simpan</button>
                        <a href="{{url('admin/transaksi')}}" class="btn btn-outline-info">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
