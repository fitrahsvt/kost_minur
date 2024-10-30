@extends('layouts.main')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Rincian Laporan Keuangan Bulan {{ $bulan_tahun }}</h1>
            </div>
        </div>
        <div class="table-data">
            <div class="order">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Jumlah</th>
                            <th>Jenis</th>
                            <th>Saldo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksiDetail as $index => $transaksi)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d/m/Y') }}</td>
                                <td>{{ $transaksi->keterangan }}</td>
                                <td>Rp {{ number_format(abs($transaksi->saldo), 0, ',', '.') }}</td>
                                <td>{{ ucfirst($transaksi->jenis) }}</td>
                                <td>Rp {{ number_format($transaksi->saldo, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="5" style="text-align: center"><strong>Total Saldo</strong></td>
                            <td>Rp {{ number_format($totalSaldo, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <footer>
            <div>Copyright &copy; kost_minur 2024</div>
        </footer>
    </main>
@endsection
