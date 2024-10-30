@extends('layouts.main')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Tagihan</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Jika transaksi yang Anda inginkan tidak ada, kemungkinan transaksi Anda <span style="color: red;">ditolak</span>. </a>
                        <br>
                        <a href="#">Silahkan cek pada menu <strong>Riwayat Transaksi</strong></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="table-data">
            <div class="order">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No Kamar</th>
                            <th>Nama Penyewa</th>
                            <th style="text-align: center">Tanggal Tagihan</th>
                            <th style="text-align: center">Rincian</th>
                            <th style="text-align: center">Status</th>
                            <th style="text-align: center">Bukti Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $t)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>Kamar No. {{$t->kamar->nomor}}</td>
                                <td>{{$t->penyewa->nama}}</td>
                                <td style="text-align: center">{{$t->tanggal}}</td>
                                <td style="text-align: center">
                                    <a href="{{route('transaction.detail', $t->id)}}"><i class='bx bxs-user-detail' ></i></a>
                                </td>
                                <td style="text-align: center">
                                    @if ($t->status_order == 'terima')
                                        @if (is_null($t->bukti))
                                            <span class="status completed">{{$t->status_bayar}}</span>
                                        @else
                                            <span class="status waiting">Waiting</span>
                                        @endif
                                    @elseif ($t->status_order == 'pending')
                                        <span class="status process">{{$t->status_order}}</span>
                                    @endif

                                </td>
                                <td style="text-align: center; font ">
                                    <div>
                                        @if ($t->status_order == 'terima')
                                            @if (is_null($t->bukti))
                                                <a href="{{route('transaction.edit', $t->id)}}" class="btn-download">
                                                    <i class='bx bx-upload'></i>
                                                </a>
                                            @else
                                                <a href="{{route('transaction.detail', $t->id)}}"><i class='bx bxs-user-detail' ></i></a>
                                            @endif
                                        @elseif ($t->status_order == 'pending')
                                            <span style="font-size: 0.85em; color: orange;">Menunggu Konfirmasi Pengelola</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <footer>
            <div>Copyright &copy; Kost Minur 2024</div>
        </footer>
    </main>
@endsection
