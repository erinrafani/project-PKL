@extends('adminlte::page')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Edit Data Pembeli</h1>
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
                <div class="card-header">Data Pembeli</div>
                    <div class="card-body">
                        <form action="{{route('pembeli.update',$pembeli->id)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="">Masukan Nama</label>
                                <input type="text" name="nama" value="{{$pembeli->nama}}" class="form-control @error('nama_kategori') is-invalid @enderror">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Masukan Alamat</label>
                                <input type="text" name="alamat" value="{{$pembeli->alamat}}" class="form-control @error('nama_kategori') is-invalid @enderror">
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Masukan No Hp</label>
                                <input type="number" name="no_hp" value="{{$pembeli->no_hp}}" class="form-control @error('nama_kategori') is-invalid @enderror">
                                @error('no_hp')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Masukan Email</label>
                                <input type="text" name="email" value="{{$pembeli->email}}" class="form-control @error('nama_kategori') is-invalid @enderror">
                                @error('email')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="reset" class="btn btn-outline-warning">Reset</button>
                                <button type="submit" class="btn btn-outline-warning">Simpan</button>
                            </div>
                            <div class="form-group">
                                <a href="{{url('admin/pembeli')}}" class="btn btn-block btn-outline-primary">Kembali</a>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
