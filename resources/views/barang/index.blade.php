@extends('adminlte::page')
{{-- @section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Data Barang</h1>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
@section('title', 'Dasboard')
@section('content_header')
    Data Barang
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{-- Data Barang --}}
                        <a href="{{ route('barang.create') }}" class="btn btn-sm btn-outline-primary float-right">Tambah
                            barang</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="barang">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        {{-- <th>Id</th> --}}

                                        <th>Nama Barang</th>
                                        <th>Nama Kategori</th>
                                        <th>stok</th>
                                        <th>Deskripsi</th>
                                        <th>Harga</th>
                                        <th>Cover</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($barang as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            {{-- <td>{{$data->id}}</td> --}}
                                            <td>{{ $data->nama_barang }}</td>
                                            <td>{{ $data->kategori->nama_kategori }}</td>
                                            <td>{{ $data->stok }} pcs</td>
                                            <td>{{ $data->deskripsi }}</td>
                                            <td>Rp. {{ number_format($data->harga, 2) }}</td>
                                            <td><img src="{{ $data->image() }}" alt="" style="width:150px; height:150px;"
                                                    alt="Cover"></td>
                                            <td>
                                                <form action="{{ route('barang.destroy', $data->id) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <a href="{{route('barang.edit',$data->id)}}" class="btn btn-outline-info">Edit</a>
                                                    <a href="{{ route('barang.show', $data->id) }}"
                                                        class="btn btn-outline-warning">Show</a>
                                                    <button type="submit" class="btn btn-outline-danger"
                                                        onclick="return confirm('Apakah anda yakin menghapusnya')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
@endsection
@section('js')
    <script src="{{ asset('DataTables/datatables.min.js') }}">
    </script>
    <script>
        $(document).ready(function() {
            $('#barang').DataTable();
        });
    </script>
@endsection
