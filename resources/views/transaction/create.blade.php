@extends('layouts.main')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Pemesanan Kamar</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Kamar Nomor : {{$room->nomor}}</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <form action="{{ route('transaction.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="kamar_id" name="kamar_id" value="{{ $room->id }}">
                <input type="hidden" id="total_bayar" name="total_bayar" value="{{ $room->harga }}">
                <input type="hidden" id="penyewa_id" name="penyewa_id" value="{{Auth::user()->id}}">
                <div class="form-group">
                    <label for="nama">Nama Lengkap :</label>
                    <input type="text" id="nama" name="nama" @error('nama') style="border: 1px solid red;" @enderror value="{{old('nama')}}">
                    @error('nama')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="no_ktp">No. Identitas (KTP) :</label>
                    <input type="text" id="no_ktp" name="no_ktp" @error('no_ktp') style="border: 1px solid red;" @enderror value="{{old('no_ktp')}}">
                    @error('no_ktp')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="no_hp">Nomor Whatsapp yang aktif :</label>
                    <input type="text" id="no_hp" name="no_hp" @error('no_hp') style="border: 1px solid red;" @enderror value="{{old('no_hp')}}">
                    @error('no_hp')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="no_wali">Nomor Wali :</label>
                    <input type="text" id="no_wali" name="no_wali" @error('no_wali') style="border: 1px solid red;" @enderror value="{{old('no_wali')}}">
                    @error('no_wali')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="birth">Tanggal Lahir :</label>
                    <input type="date" id="birth" name="birth" @error('birth') style="border: 1px solid red;" @enderror value="{{ old('birth') }}">
                    @error('birth')
                    <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" id="alamat" name="alamat" @error('alamat') style="border: 1px solid red;" @enderror value="{{old('alamat')}}">
                    @error('alamat')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="ktp">Upload Foto KTP</label>
                    <input type="file" name="ktp" id="ktp" accept=".jpg, .jpeg, .png., .webp" @error('ktp') style="border: 1px solid red;" @enderror>
                    @error('ktp')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <input type="submit" value="Submit">
                <a href="{{ route('landing') }}" class="button-cancel">Cancel</a>
            </form>
        </div>
        <footer>
            <div>Copyright &copy; Kost Minur 2024</div>
        </footer>
    </main>
@endsection
