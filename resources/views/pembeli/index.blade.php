@extends('adminlte::page')
{{-- @section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Data Pembeli</h1>
            </div>
        </div>
    </div>
</div>
@endsection --}}
@section('title', 'Dasboard')
@section('content_header')
    Data Pembeli
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{-- Data Pembeli --}}
                        <a href="{{ route('pembeli.create') }}" class="btn btn-sm btn-outline-primary float-right">Tambah
                            Pembeli</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="pembeli">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        {{-- <th>Id</th> --}}
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>No Hp</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($pembeli as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            {{-- <td>{{$data->id}}</td> --}}
                                            <td>{{ $data->nama_pembeli }}</td>
                                            <td>{{ $data->alamat }}</td>
                                            <td>{{ $data->no_hp }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>
                                                <form action="{{ route('pembeli.destroy', $data->id) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <a href="{{ route('pembeli.edit', $data->id) }}"
                                                        class="btn btn-outline-info">Edit</a>
                                                    <a href="{{ route('pembeli.show', $data->id) }}"
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
            $('#pembeli').DataTable();
        });
    </script>
@endsection
