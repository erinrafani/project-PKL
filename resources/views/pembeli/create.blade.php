@extends('adminlte::page')
@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Tambah Data Pembeli</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('title', 'Dasboard')
@section('content_header')
    Data Pembeli
@stop
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <form action="{{ route('pembeli.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Masukan Nama pembeli</label>
                                <input type="text" name="nama_pembeli"
                                    class="form-control @error('nama_pembeli') is-invalid @enderror">
                                @error('nama_pembeli')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Masukan Alamat</label>
                                <textarea type="file" name="alamat"
                                    class="form-control @error('alamat') is-invalid @enderror"></textarea>
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Masukan No Hp</label>
                                <input type="number" name="no_hp" class="form-control @error('name') is-invalid @enderror">
                                @error('no_hp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Masukan Email</label>
                                <input type="text" name="email" class="form-control @error('name') is-invalid @enderror">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="reset" class="btn btn-outline-warning">Reset</button>
                                <button type="submit" class="btn btn-outline-danger">Simpan</button>
                                <a href="{{ url('admin/pembeli') }}" class="btn btn-outline-primary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
