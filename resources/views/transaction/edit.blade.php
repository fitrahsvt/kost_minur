@extends('layouts.main')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Pembayaran</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">No. Kamar Kost : {{$room->nomor}}</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container" style="padding: 25px 25px 25px 50px">
            <h2 style="padding-bottom: 8px">Rincian Pemesanan Kamar </h2>
            <table style="border-collapse: collapse;">
                <tr>
                    <td style="text-align: left; padding-right: 6px;">Nama Lengkap penyewa</td>
                    <td >: {{$user->nama}}</td>
                </tr>
                <tr>
                    <td style="text-align: left; ">Nomor Kamar</td>
                    <td >: {{$room->nomor}}</td>
                </tr>
                <tr>
                    <td style="text-align: left; ">No. Identitas</td>
                    <td >: {{$user->no_ktp}}</td>
                </tr>
                <tr>
                    <td style="text-align: left; ">No. Whatsapp</td>
                    <td >: {{$user->no_hp}}</td>
                </tr>
                <tr>
                    <td style="text-align: left; ">No. Wali Penyewa</td>
                    <td >: {{$user->no_wali}}</td>
                </tr>
                <tr>
                    <td style="text-align: left; ">Alamat</td>
                    <td >: {{$user->alamat}}</td>
                </tr>
                <tr>
                    <td style="text-align: left; ">Total Bayar</td>
                    <td >: {{number_format($transaction->total_bayar, 0, 2) }}</td>
                </tr>
            </table>
            <h2 style="padding-bottom: 8px; padding-top : 25px">Metode Pembayaran </h2>
            <p>Silahkan lakukan pembayaran sebesar <strong>Rp. {{number_format($transaction->total_bayar, 0, 2) }} </strong> ke bank berikut </p>
            <h3>{{$transaction->metode_pembayaran}}</h3>



            {{-- <div class="form-group">
                <label for="title">Title</label>
                <input value="{{$slider->title}}" type="text" id="title" name="title" required @error('title') style="border: 1px solid red;" @enderror>
                @error('title')
                <small style="color: red">{{$message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="caption">Caption</label>
                <input value="{{$slider->caption}}" type="text" id="caption" name="caption" required @error('caption') style="border: 1px solid red;" @enderror>
                @error('caption')
                <small style="color: red">{{$message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png., .webp" @error('image') style="border: 1px solid red;" @enderror>
                @error('image')
                <small style="color: red">{{$message }}</small>
                @enderror
            </div>
            <input type="submit" value="Submit">
            <a href="{{ route('slider.index') }}" class="button-cancel">Cancel</a> --}}
        </div>
        <div class="container">
            <form action="{{route('transaction.update', $transaction->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="bukti" ><strong>Upload Bukti Pembayaran</strong></label>
                    <input type="file" name="bukti" id="bukti" accept=".jpg, .jpeg, .png., .webp" @error('bukti') style="border: 1px solid red;" @enderror>
                    @error('bukti')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <input type="submit" value="Submit">
                <a href="{{ route('transaction.index') }}" class="button-cancel">Cancel</a>
            </form>
        </div>
        <footer>
            <div>Copyright &copy; Kost Minur 2024</div>
        </footer>
    </main>
@endsection
