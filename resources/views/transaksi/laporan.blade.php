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
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" border="1">

                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pembeli</th>
                                        <th>Nama Barang</th>
                                        <th>Alamat</th>
                                        <th>Tanggal Beli</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                    </tr>


                                    @php $no=1; @endphp
                                    @foreach ($laporan as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->pembeli->nama_pembeli }}</td>
                                            <td>{{ $data->barang->nama_barang }}</td>
                                            <td>{{ $data->pembeli->alamat }}</td>
                                            <td>{{ $data->tanggal_beli }}</td>
                                            <td>Rp. {{ number_format($data->harga, 2) }}</td>
                                            <td>{{ $data->jumlah }} pcs</td>
                                            <td>Rp. {{ number_format($data->total, 2) }}</td>

                                        </tr>
                                    @endforeach

                            </table>
                            {{-- <p>Total Keseluruhan : Rp. {{number_format($total)}}</p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
