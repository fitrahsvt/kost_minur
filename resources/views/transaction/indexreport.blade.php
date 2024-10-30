@extends('layouts.main')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Laporan Keuangan</h1>
            </div>
        </div>
        <form action="{{ route('report.index') }}" method="GET">
            <div style="display: flex; align-items: center; gap: 10px;">
                <div>
                    <label>Bulan</label>
                </div>
                <div>
                    <select name="bulan" onchange="this.form.submit()">
                        <option value="">All Report</option>
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}" {{ isset($bulan) && $bulan == $i ? 'selected' : '' }}>
                                {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                            </option>
                        @endfor
                    </select>
                </div>
                <div>
                    <label>Tahun</label>
                </div>
                <div>
                    <select name="tahun" onchange="this.form.submit()">
                        <option value="">All Report</option>
                        @for ($y = 2019; $y <= date('Y'); $y++)
                            <option value="{{ $y }}" {{ isset($tahun) && $tahun == $y ? 'selected' : '' }}>
                                {{ $y }}
                            </option>
                        @endfor
                    </select>
                </div>
            </div>
        </form>
        <div class="table-data">
            <div class="order">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Bulan-Tahun</th>
                            <th>Jumlah Pemasukan</th>
                            <th>Jumlah Pengeluaran</th>
                            <th>Total</th>
                            <th style="text-align: center">Detil</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporanKeuangan as $index => $laporan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $laporan->bulan_tahun }}</td>
                                <td>Rp {{ number_format($laporan->total_pemasukan, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($laporan->total_pengeluaran, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($laporan->total, 0, ',', '.') }}</td>
                                <td style="text-align: center;">
                                    <div>
                                        <a href="{{ route('report.detail', ['bulan_tahun' => $laporan->bulan_tahun]) }}">
                                            <i class='bx bxs-user-detail'></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                </table>
            </div>
        </div>
        <footer>
            <div>Copyright &copy; kost_minur 2024</div>
        </footer>
    </main>
@endsection
