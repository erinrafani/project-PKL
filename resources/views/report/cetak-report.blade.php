<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <center>
     <div class="card-body">
                        <div class="table-responsive">
                            <center>
                                <br>Laporan Pesanan Bulanan
                            </center>
                           <p> <table class="table" border="1" >
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
                                </tr>
                                @php $no=1; @endphp
                                @foreach ($transaksi  ?? '' as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->pembeli->nama_pembeli }}</td>
                                        <td>{{ $data->barang->nama_barang }}</td>
                                        {{-- <td>{{ $data->pembeli->alamat }}</td> --}}
                                        <td>{{ $data->tanggal_beli }}</td>
                                        <td>Rp. {{ number_format($data->harga,  0, ',', '.') }}</td>
                                        <td>{{ $data->jumlah }} pcs</td>
                                        <td>Rp. {{ number_format($data->total,  0, ',', '.') }}</td>
                                        <td>Rp. {{ number_format($data->uang,  0, ',', '.') }}</td>
                                        <td>Rp. {{ number_format($data->kembalian,  0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </table></p>
                          <p>
                           <center>TOTAL KESELURUHAN = Rp. {{ number_format($total, 0, ',', '.') }}</center>
                         </p>
                        </div>
                    </div>
                    </center>
    <script type="text/javascript">
    window.print()
    $
    </script>
</body>

</html>
