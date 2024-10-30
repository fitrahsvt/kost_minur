@extends('layouts.main')

@section('content')
<main>
    <div class="head-title">
        <div class="left">
            <h1>Pengeluaran</h1>
            @if (Auth::user()->role->name == 'pengelola' || Auth::user()->role->name == 'penguji')
                <a href="{{route('expense.create')}}" class="btn-download">
                    <i class='bx bx-plus'></i>
                    <span class="text">Create New</span>
                </a>
                <br>
            @endif
        </div>
    </div>

    <!-- Form untuk filter bulan dan tahun -->
    <form action="{{ route('expense.index') }}" method="GET">
        <div style="display: flex; align-items: center; gap: 10px;">
            <div>
                <label>Bulan</label>
            </div>
            <div>
                <select name="bulan" onchange="this.form.submit()">
                    <option value="">All Transaction</option>
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}" {{ request('bulan') == $i ? 'selected' : '' }}>
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
                    <option value="">All Transaction</option>
                    @for ($y = 2020; $y <= date('Y'); $y++)
                        <option value="{{ $y }}" {{ request('tahun') == $y ? 'selected' : '' }}>
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
                        <th>Jenis Pengeluaran</th>
                        <th style="text-align: center">Tanggal</th>
                        <th>Jumlah</th>
                        <th style="text-align: center">Bukti</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $t)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $t->nama }}</td>
                            <td style="text-align: center">{{ $t->tanggal }}</td>
                            <td>Rp. {{ number_format($t->total_bayar, 0, 2) }}</td>
                            <td style="text-align: center">
                                <img src="{{ asset('storage/transaction/' . $t->bukti) }}" class="img-fluid" alt="{{ $t->bukti }}" style="max-height: 50px; width: auto;">
                            </td>
                            <td style="text-align: center">
                                <form action="{{ route('expense.destroy', $t->id) }}" method="POST" onsubmit="return confirm('Anda yakin menghapus ini?');">
                                    @csrf
                                    @method('DELETE')
                                    @if (Auth::user()->role->name == 'pengelola' || Auth::user()->role->name == 'penguji')
                                        <button type="submit" class="button-delete"><i class='bx bxs-trash-alt'></i></button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Menampilkan tombol paginasi -->
    <div class="pagination">
        {{ $transactions->links() }}
    </div>

    <footer>
        <div>Copyright &copy; Kost_minur 2024</div>
    </footer>
</main>
@endsection
