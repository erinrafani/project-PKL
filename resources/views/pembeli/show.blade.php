@extends('adminlte::page')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Show Data Pembeli</h1>
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
                    <div class="form-group">
                        <label for="">Nama Pembeli</label>
                        <input type="text" name="nama" value="{{$pembeli->nama}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat pembeli</label>
                        <input type="text" name="alamat" value="{{$pembeli->alamat}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">No Hp</label>
                        <input type="number" name="no_hp" value="{{$pembeli->no_hp}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Email Pembeli</label>
                        <input type="text" name="email" value="{{$pembeli->email}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <a href="{{url('admin/pembeli')}}" class="btn btn-block btn-outline-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
