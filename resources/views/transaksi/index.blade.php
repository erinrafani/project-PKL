@extends('adminlte::page')
{{-- @section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Data Transaksi</h1>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
@section('title', 'Dasboard')
@section('content_header')
    Data Transaksi
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{-- Data Transaksi --}}
                        <a href="{{ route('transaksi.create') }}" class="btn btn-sm btn-outline-primary float-right">Tambah
                            Transaksi</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="transaksi">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pembeli</th>
                                        <th>Nama Barang</th>
                                        {{-- <th>Alamat</th> --}}
                                        <th>Tanggal Beli</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                        <th>Uang</th>
                                        <th>Kembalian</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($transaksi as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->pembeli->nama_pembeli }}</td>
                                            <td>{{ $data->barang->nama_barang }}</td>
                                            {{-- <td>{{ $data->pembeli->alamat }}</td> --}}
                                            <td>{{ $data->tanggal_beli }}</td>
                                            <td>Rp. {{ number_format($data->harga, 2) }}</td>
                                            <td>{{ $data->jumlah }} pcs</td>
                                            <td>Rp. {{ number_format($data->total, 2) }}</td>
                                            <td>Rp. {{ number_format($data->uang, 2) }}</td>
                                            <td>Rp. {{ number_format($data->kembalian, 2) }}</td>
                                            <td>
                                                <form action="{{ route('transaksi.destroy', $data->id) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    {{-- <a href="{{ route('transaksi.edit', $data->id) }}"
                                                    class="btn btn-outline-info">Edit</a> --}}
                                                    <a href="{{ route('transaksi.show', $data->id) }}"
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
            $('#transaksi').DataTable();
        });
    </script>
@endsection
