@extends('layouts.main')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Riwayat Transaksi</h1>
            </div>
        </div>
        @if (Auth::user()->role->name == 'pengelola' || Auth::user()->role->name == 'penguji' || Auth::user()->role->name == 'pemilik')
            {{-- Filter Nama Penyewa --}}
            <form action="{{ route('history.index') }}" method="GET">
                @csrf
                <div style="display: flex; align-items: center; gap: 10px;">
                    <input type="text" name="search" placeholder="nama penyewa" value="{{ old('search', $search ?? '') }}">
                    <button type="submit" style="padding: 10px; background: lightblue; border-style: none; border-radius: 5px;">Search</button>
                </div>
            </form>

            <br>

            <form action="{{ route('history.index') }}" method="GET">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <div>
                        <label>Kamar</label>
                    </div>
                    <div>
                        <!-- Dropdown untuk filter berdasarkan Kamar -->
                        <select name="room" onchange="this.form.submit()">
                            <option value="">All Room</option>
                            @foreach ($rooms as $room)
                                <option value="{{ $room->id }}" {{ $roomId == $room->id ? 'selected' : '' }}>
                                    Kamar No. {{ $room->nomor }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label>Tanggal Transaksi</label>
                    </div>
                    <div>
                        <input type="date" id="tanggal1" name="tanggal1" value="{{ old('tanggal1', $tanggal1 ?? '') }}">
                    </div>
                    <div> - </div>
                    <div>
                        <input type="date" id="tanggal2" name="tanggal2" value="{{ old('tanggal2', $tanggal2 ?? '') }}">
                    </div>
                    <div>
                        <button type="submit" style="padding: 10px; background: lightblue; border-style: none; border-radius: 5px;">Terapkan</button>
                    </div>
                </div>
            </form>
        @endif
        <div class="table-data">
            <div class="order">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No Kamar</th>
                            <th>Nama Penyewa</th>
                            <th style="text-align: center">Tanggal Transaksi</th>
                            <th style="text-align: center">Status</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $t)
                            <tr>
                                <td>{{$t->id}}</td>
                                <td>Kamar No. {{$t->kamar->nomor}}</td>
                                <td>{{$t->penyewa->nama}}</td>
                                <td style="text-align: center">{{$t->tanggal}}</td>
                                <td style="text-align: center">
                                    @if ($t->status_order == "tolak")
                                        <span class="status pending">Ditolak</span>
                                    @else
                                        <span class="status waiting">Selesai</span>
                                    @endif
                                </td>
                                <td style="text-align: center; font ">
                                    <div>
                                        <a href="{{route('transaction.detail', $t->id)}}"><i class='bx bxs-user-detail' ></i></a>
                                        @if (Auth::user()->role->name == 'pengelola' || Auth::user()->role->name == 'penguji')
                                            <a href="#"><i class='bx bxs-trash-alt' ></i></a>
                                        @endif
                                    </div>
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
            <div>Copyright &copy; kost_minur 2024</div>
        </footer>
    </main>
@endsection
