@extends('layouts.main')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Edit Kamar </h1>
                <ul class="breadcrumb">
                    <li>
                        <a class="active" href="{{route('room.index')}}">Room</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a href="#">Edit</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <form action="{{route('room.update', $room->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nomor">Nomor Kamar</label>
                    <input value="{{$room->nomor}}" type="text" id="nomor" name="nomor" required @error('nomor') style="border: 1px solid red;" @enderror>
                    @error('nomor')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input value="{{$room->harga}}" type="text" id="harga" name="harga" required @error('harga') style="border: 1px solid red;" @enderror>
                    @error('harga')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="ukuran">Ukuran</label>
                    <input value="{{$room->ukuran}}" type="text" id="ukuran" name="ukuran" required @error('ukuran') style="border: 1px solid red;" @enderror>
                    @error('ukuran')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="foto">Upload Foto Kamar</label>
                    <input type="file" name="foto" id="foto" accept=".jpg, .jpeg, .png., .webp" @error('foto') style="border: 1px solid red;" @enderror>
                    @error('foto')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Fasilitas</label>
                    <table style="border-collapse: collapse;">
                        @foreach($facilities as $facility)
                        <tr>
                            <td style="padding-right: 16px;"><input type="checkbox" name="facilities[]" value="{{ $facility->id }}" id="facility_{{ $facility->id }}" @if(in_array($facility->id, $room->facilities->pluck('id')->toArray())) checked @endif></td>
                            <td><label for="facility_{{ $facility->id }}">{{ $facility->nama }}</label></td>
                        </tr>
                        @endforeach
                    </table>
                    @error('facilities')
                    <small style="color: red">{{$message }}</small>
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
