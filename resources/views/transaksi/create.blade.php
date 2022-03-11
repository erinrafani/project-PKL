@extends('adminlte::page')
@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Tambah Data Transaksi</h1>
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
                        <form action="{{ route('transaksi.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Masukan Nama Pembeli</label>
                                <select name="id_pembeli" class="form-control @error('id_pembeli') is-invalid @enderror">
                                    @foreach ($pembeli as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_pembeli }}</option>
                                    @endforeach
                                </select>
                                @error('id_pembeli')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Masukan Nama Barang</label>
                                <select name="id_barang" class="form-control @error('id_barang') is-invalid @enderror">
                                    @foreach ($barang as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_barang }}</option>
                                    @endforeach
                                </select>
                                @error('id_pembeli')
                                    <span class="invalid-feedback" role="alert">
                                        {{-- <strong>{{message}}</strong> --}}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Beli</label>
                                <input type="date" name="tanggal_beli"
                                    class="form-control @error('tanggal_beli') is-invalid @enderror">
                                @error('tanggal_beli')
                                    <span class="invalid-feedback" role="alert">
                                        {{-- <strong>{{message}}</strong> --}}
                                    </span>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                            <label for="">Harga</label>
                            <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror">
                            @error('harga')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{message}}</strong>
                            </span>
                            @enderror
                        </div> --}}
                            <div class="form-group">
                                <label for="">Jumlah</label>
                                <input type="number" name="jumlah"
                                    class="form-control @error('jumlah') is-invalid @enderror">
                                @error('jumlah')
                                    <span class="invalid-feedback" role="alert">
                                        {{-- <strong>{{message}}</strong> --}}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Uang</label>
                                <input type="number" name="uang"
                                    class="form-control @error('uang') is-invalid @enderror">
                                @error('uang')
                                    <span class="invalid-feedback" role="alert">
                                        {{-- <strong>{{message}}</strong> --}}
                                    </span>
                                @enderror
                            </div>

                            {{-- <div class="form-group">
                            <label for="">Total</label>
                            <input type="number" name="total" class="form-control @error('total') is-invalid @enderror">
                            @error('total')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{message}}</strong>
                            </span>
                            @enderror
                        </div> --}}
                            <div class="form-group">
                                <button type="reset" class="btn btn-outline-warning">Reset</button>
                                <button type="submit" class="btn btn-outline-danger">Simpan</button>
                                <a href="{{ url('admin/transaksi') }}" class="btn btn-outline-primary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
