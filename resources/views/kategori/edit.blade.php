@extends('adminlte::page')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Edit Data Kategori</h1>
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
                <div class="card-header">Data Kategori</div>
                    <div class="card-body">
                        <form action="{{route('kategori.update',$kategori->id)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="">Masukan Kategori</label>
                                <input type="text" name="nama_kategori" value="{{$kategori->nama_kategori}}" class="form-control @error('nama_kategori') is-invalid @enderror">
                                @error('nama_kategori')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="reset" class="btn btn-outline-warning">Reset</button>
                                <button type="submit" class="btn btn-outline-warning">Simpan</button>
                            </div>
                            <div class="form-group">
                                <a href="{{url('admin/kategori')}}" class="btn btn-block btn-outline-primary">Kembali</a>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
