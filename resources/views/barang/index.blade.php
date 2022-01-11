@extends('adminlte::page')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Data Barang</h1>
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
                <div class="card-header">
                    Data Barang
                    <a href="{{route('barang.create')}}" class="btn btn-sm btn-outline-primary float-right">Tambah barang</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>No</th>
                                <th>Id</th>

                                <th>Nama Barang</th>
                                <th>Nama Kategori</th>
                                <th>stok</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Cover</th>
                                <th>Aksi</th>
                            </tr>
                            @php $no=1; @endphp
                            @foreach ($barang as $data)
                             <tr>
                                 <td>{{$no++}}</td>
                                 <td>{{$data->id}}</td>
                                 <td>{{$data->nama_barang}}</td>
                                 <td>{{$data->nama_kategori}}</td>
                                 <td>{{$data->stok}}</td>
                                 <td>{{$data->deskripsi}}</td>
                                 <td>{{$data->harga}}</td>
                                 <td><img src="{{$data->image()}}" alt="" style="width:150px; height:150px;" alt="Cover"></td>
                                 <td>
                                     <form action="{{route('barang.destroy',$data->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <a href="{{route('barang.edit',$data->id)}}" class="btn btn-outline-info">Edit</a>
                                        {{-- <a href="{{route('kategori.show',$data->id)}}" class="btn btn-outline-warning">Show</a> --}}
                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin menghapusnya')">Delete</button>
                                        </form>
                                 </td>
                             </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
