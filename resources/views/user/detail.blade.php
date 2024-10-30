@extends('layouts.main')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Detail user</h1>
                <ul class="breadcrumb">
                    <li>
                        <a class="active" href="{{route('user.index')}}">User</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a href="#">Detail</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="table-data">
            <div class="order">
                <div class="profil-flex" style="display: flex; align-items: center;">
                    <div class="profil" style="text-align: center; margin: 20px">
                        @if (Storage::exists('public/user/' . $user->ktp))
                            <img src="{{ asset('storage/user/' . $user->ktp) }}" alt="{{$user->ktp}}"
                            style="
                                border-radius: 50%;
                                width: 40vmin;
                                max-width: 300px;
                                height: 40vmin;
                                object-fit: cover; ">
                        @else
                            <img src="{{ asset('storage/user/blank_profile.jpg') }}" alt="blank_profile"
                            style="
                                border-radius: 50%;
                                width: 40vmin;
                                max-width: 300px;
                                height: 40vmin;
                                object-fit: cover; ">
                        @endif
                        <h3>{{$user->nama}}</h3>
                        <p style="margin-bottom: 5px">{{$user->birth}}</p>
                        <a type="button" class="button-profil" href="{{route('user.index')}}">Back</a>
                    </div>
                    <div class="detail" style="margin-left: 20px">
                        <table style="border-collapse: collapse;">
                            <tr>
                                <td>Email</td>
                                <td>: {{$user->email}}</td>
                            </tr>
                            <tr>
                                <td>Role</td>
                                <td>: {{$user->role->name}}</td>
                            </tr>
                            @if (!is_null($user->room))
                                <tr>
                                    <td>Kamar</td>
                                    <td>: {{ $user->room->nomor }}</td>
                                </tr>
                            @endif
                            @if (!is_null($user->no_hp))
                                <tr>
                                    <td>Nomor Telp</td>
                                    <td>: {{$user->no_hp}}</td>
                                </tr>
                            @endif
                            @if (!is_null($user->no_ktp))
                                <tr>
                                    <td>Nomor KTP</td>
                                    <td>: {{$user->no_ktp}}</td>
                                </tr>
                            @endif
                            @if (!is_null($user->no_wali))
                                <tr>
                                    <td>Nomor telp Wali</td>
                                    <td>: {{$user->no_wali}}</td>
                                </tr>
                            @endif
                            @if (!is_null($user->alamat))
                                <tr>
                                    <td>Alamat</td>
                                    <td>: {{$user->alamat}}</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div>Copyright &copy; Kost Minur 2024</div>
        </footer>
    </main>
@endsection
