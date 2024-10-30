@extends('layouts.main')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Rincian Transaksi</h1>
            </div>
        </div>
        <div class="container" style="padding: 25px 50px 25px 50px; display :flex; align-items: stretch;">
            <div style="flex-grow: 5">
                <table style="border-collapse: collapse;">
                    <tr>
                        <td style="text-align: left; padding-right: 6px;">Nama Lengkap penyewa</td>
                        <td>: {{$user->nama}}</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Nomor Kamar</td>
                        <td>: {{$room->nomor}}</td>
                    </tr>
                    @if (!is_null($user->no_ktp))
                        <tr>
                            <td style="text-align: left;">No. Identitas</td>
                            <td>: {{$user->no_ktp}}</td>
                        </tr>
                    @endif
                    <tr>
                        <td style="text-align: left;">No. Whatsapp</td>
                        <td>: {{$user->no_hp}}</td>
                    </tr>
                    @if (!is_null($user->no_wali))
                        <tr>
                            <td style="text-align: left;">No. Wali Penyewa</td>
                            <td>: {{$user->no_wali}}</td>
                        </tr>
                    @endif
                    @if (!is_null($user->alamat))
                        <tr>
                            <td style="text-align: left;">Alamat</td>
                            <td>: {{$user->alamat}}</td>
                        </tr>
                    @endif
                    <tr>
                        <td style="text-align: left;">Total Bayar</td>
                        <td>: {{number_format($transaction->total_bayar, 0, 2) }}</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Tanggal</td>
                        <td>: {{$transaction->tanggal}}</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Status Order</td>
                        <td>: {{$transaction->status_order}}</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Status Bayar</td>
                        <td>: {{$transaction->status_bayar}}</td>
                    </tr>
                </table>
            </div>
            @if (!is_null( $transaction->bukti))
                <div style="text-align: center;" style="flex-grow: 5">
                        <img src="{{ asset('storage/transaction/' . $transaction->bukti) }}" alt="{{$transaction->bukti}}"
                        style="
                            width: 40vmin;
                            max-width: 300px;
                            height: 40vmin;
                            object-fit: cover; ">
                        <p>Bukti Pembayaran</p>
                </div>
            @endif
        </div>
        <a href="javascript:history.back()" class="button-cancel">Kembali</a>
        <footer>
            <div>Copyright &copy; Kost Minur 2024</div>
        </footer>
        <style>
            .button-cancel {
                display: block;
                width: 150px; /* Lebar tombol */
                margin: 20px auto 0 auto; /* Jarak atas dan bawah dari tabel serta rata tengah */
                padding: 10px;
                background-color: #f44336; /* Warna tombol */
                color: white;
                text-align: center;
                text-decoration: none;
                border-radius: 5px;
            }
            .button-cancel:hover {
                background-color: #d32f2f; /* Warna ketika tombol di-hover */
            }
        </style>
    </main>
@endsection
