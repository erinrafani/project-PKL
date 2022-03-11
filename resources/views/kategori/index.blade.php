@extends('adminlte::page')
{{-- @section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Data Kategori</h1>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
@section('title', 'Dasboard')
@section('content_header')
    Data Kategori
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{-- Data Kategori --}}
                        <a href="{{ route('kategori.create') }}" class="btn btn-sm btn-outline-primary float-right">Tambah
                            Kategori</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="kategori">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        {{-- <th>Id</th> --}}
                                        <th>Nama Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($kategori as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            {{-- <td>{{$data->id}}</td> --}}
                                            <td>{{ $data->nama_kategori }}</td>
                                            <td>
                                                <form action="{{ route('kategori.destroy', $data->id) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <a href="{{ route('kategori.edit', $data->id) }}"
                                                        class="btn btn-outline-info">Edit</a>
                                                    <a href="{{ route('kategori.show', $data->id) }}"
                                                        class="btn btn-outline-warning">Show</a>
                                                    <button type="submit"
                                                        class="btn btn-danger delete-confirm">Delete</button>
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
            $('#kategori').DataTable();
        });
    </script>
@endsection
