@extends('layouts.main')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Edit your profile</h1>
                <ul class="breadcrumb">
                    <li>
                        <a class="active" href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a href="#">Edit-profile</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="alamat">alamat</label>
                    <textarea id="alamat" name="alamat" @error('alamat') style="border: 1px solid red;" @enderror>{{$user->alamat}}</textarea>
                    @error('alamat')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="birth">Tanggal Lahir</label>
                    <input type="date" value="{{$user->birth}}" id="birth" name="birth" @error('birth') style="border: 1px solid red;" @enderror>
                    @error('birth')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="ktp">Foto KTP</label>
                    <input type="file" name="ktp" id="ktp" accept=".jpg, .jpeg, .png., .webp" @error('ktp') style="border: 1px solid red;" @enderror>
                    @error('ktp')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <input type="submit" value="Save">
                <a href="{{ route('dashboard') }}" class="button-cancel">Cancel</a>
            </form>
        </div>
        <footer>
            <div>Copyright &copy; Kost Minur 2024</div>
        </footer>
    </main>
@endsection
