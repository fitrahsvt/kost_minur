@extends('layouts.main')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Create user</h1>
                <ul class="breadcrumb">
                    <li>
                        <a class="active" href="{{route('user.index')}}">User</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a href="#">Create</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="role">Role</label>
                    <select id="role" name="role" @error('role') style="border: 1px solid red;" @enderror>
                        <option selected disabled>- Choose Role -</option>
                            @foreach ($role as $r)
                                <option value="{{$r->id}}" {{old('role') == $r->id ? 'selected' : ''}}>{{$r->name}}</option>
                            @endforeach
                    </select>
                    @error('role')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" @error('nama') style="border: 1px solid red;" @enderror value="{{old('nama')}}">
                    @error('nama')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" @error('email') style="border: 1px solid red;" @enderror value="{{old('email')}}">
                    @error('email')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" @error('password') style="border: 1px solid red;" @enderror value="{{old('password')}}">
                    @error('password')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="no_hp">Nomor Telepon Aktif</label>
                    <input type="text" id="no_hp" name="no_hp" @error('no_hp') style="border: 1px solid red;" @enderror value="{{old('no_hp')}}">
                    @error('no_hp')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea id="alamat" name="alamat" @error('alamat') style="border: 1px solid red;" @enderror>{{old('alamat')}}</textarea>
                    @error('alamat')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="birth">Tanggal Lahir</label>
                    <input type="date" id="birth" name="birth" @error('birth') style="border: 1px solid red;" @enderror value="{{old('birth')}}">
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
                <a href="{{ route('user.index') }}" class="button-cancel">Cancel</a>
            </form>
        </div>
        <footer>
            <div>Copyright &copy; Kost Minur 2024</div>
        </footer>
    </main>
@endsection
