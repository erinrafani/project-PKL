@extends('adminlte::page')
@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Tambah Data Kategori</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('title', 'Dasboard')
@section('content_header')
    Data Kategori
@stop
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <form action="{{ route('kategori.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Masukan Nama Kategori</label>
                                <input type="text" name="nama_kategori"
                                    class="form-control @error('nama_kategori') is-invalid @enderror">
                                @error('nama_kategori')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="reset" class="btn btn-outline-warning">Reset</button>
                                <button type="submit" class="btn btn-outline-danger">Simpan</button>
                                <a href="{{ url('admin/kategori') }}" class="btn btn-outline-primary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
