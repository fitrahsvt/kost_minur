@extends('layouts.main')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Input Pengeluaran</h1>
                <ul class="breadcrumb">
                    <li>
                        <a class="active" href="{{route('expense.index')}}">Pengeluaran</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a href="#">Create</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <form action="{{ route('expense.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama">Jenis Pengeluaran</label>
                    <input type="text" id="nama" name="nama" @error('nama') style="border: 1px solid red;" @enderror value="{{old('nama')}}">
                    @error('nama')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="total_bayar">Jumlah Bayar </label>
                    <input type="text" id="total_bayar" name="total_bayar" @error('total_bayar') style="border: 1px solid red;" @enderror value="{{old('total_bayar')}}">
                    @error('total_bayar')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal Bayar :</label>
                    <input type="date" id="tanggal" name="tanggal" @error('tanggal') style="border: 1px solid red;" @enderror value="{{ old('tanggal') }}">
                    @error('tanggal')
                    <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="bukti">Upload Bukti Pembayaran</label>
                    <input type="file" name="bukti" id="bukti" accept=".jpg, .jpeg, .png., .webp" @error('bukti') style="border: 1px solid red;" @enderror>
                    @error('bukti')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <input type="submit" value="Submit">
                <a href="{{ route('expense.index') }}" class="button-cancel">Cancel</a>
            </form>
        </div>
        <footer>
            <div>Copyright &copy; Kost Minur 2024</div>
        </footer>
    </main>
@endsection
