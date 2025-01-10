<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Testing Query</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h5>Sebagai Kurir</h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Pemesan</th>
                            <th>No Resi</th>
                            <th>Nama produk</th>
                            <th>Alamat</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @dd($orderKurir) --}}
                        @foreach ($orderKurir as $item)
                            <td>{{ $item->transaksi->pemesan->username }}</td>
                            <td>{{ $item->transaksi->snap_token }}</td>
                            <td>{{ $item->transaksi->produk->nama_produk }}</td>
                            <td>{{ $item->transaksi->pemesan->alamat_users }}</td>
                            @if ($item->status_kirim == 'packing')
                                <td>Jemputlah Pesanan Wahai kurir</td>
                            @else
                                <td>{{ $item->status_kirim }}</td>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
