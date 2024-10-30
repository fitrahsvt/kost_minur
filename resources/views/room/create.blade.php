@extends('layouts.main')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Kamar Baru</h1>
                <ul class="breadcrumb">
                    <li>
                        <a class="active" href="{{route('slider.index')}}">Kamar</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a href="#">Create</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <form action="{{ route('room.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nomor">No. Kamar</label>
                    <input type="text" id="nomor" name="nomor" @error('nomor') style="border: 1px solid red;" @enderror value="{{old('nomor')}}">
                    @error('nomor')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="harga">Harga </label>
                    <input type="text" id="harga" name="harga" @error('harga') style="border: 1px solid red;" @enderror value="{{old('harga')}}">
                    @error('harga')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="ukuran">Ukuran </label>
                    <input placeholder="contoh : 3x4 meter" type="text" id="ukuran" name="ukuran" @error('ukuran') style="border: 1px solid red;" @enderror value="{{old('ukuran')}}">
                    @error('ukuran')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="foto">Upload Foto kamar</label>
                    <input type="file" name="foto" id="foto" accept=".jpg, .jpeg, .png., .webp" @error('foto') style="border: 1px solid red;" @enderror>
                    @error('foto')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Fasilitas :</label>
                    <table style="border-collapse: collapse;">
                        @foreach($facilities as $facility)
                        <tr>
                            <td style="padding-right: 16px;"> <input type="checkbox" name="facilities[]" value="{{ $facility->id }}" id="facility_{{ $facility->id }}"></td>
                            <td ><label for="facility_{{ $facility->id }}">{{ $facility->nama }}</label></td>
                        </tr>
                        @endforeach
                    </table>
                    @error('facilities')
                    <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <input type="submit" value="Submit">
                <a href="{{ route('room.index') }}" class="button-cancel">Cancel</a>
            </form>
        </div>
        <footer>
            <div>Copyright &copy; Kost Minur 2024</div>
        </footer>
    </main>
@endsection
