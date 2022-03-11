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
                                <input type="text" name="nama_pembeli" value="{{$pembeli->nama_pembeli}}" class="form-control @error('name') is-invalid @enderror">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Masukan Alamat</label>
                                <textarea type="file" name="alamat" value="{{$pembeli->alamat}}" class="form-control @error('alamat') is-invalid @enderror"></textarea>
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Masukan No Hp</label>
                                <input type="number" name="no_hp" value="{{$pembeli->no_hp}}" class="form-control @error('name') is-invalid @enderror">
                                @error('no_hp')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Masukan Email</label>
                                <input type="text" name="email" value="{{$pembeli->email}}" class="form-control @error('name') is-invalid @enderror">
                                @error('email')
                                    <span class="invalid-feedback" role="alert"></span>
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="reset" class="btn btn-outline-danger">Reset</button>
                                <button type="submit" class="btn btn-outline-warning">Simpan</button>
                                <a href="{{url('admin/kategori')}}" class="btn btn-outline-info">Kembali</a>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
