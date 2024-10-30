@extends('layouts.main')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Dashboard</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                </ul>
            </div>
            <a href="{{route('landing')}}" class="btn-download">
                <span class="text">> Go to homepage</span>
            </a>
        </div>
        <ul class="box-info">
            @if (Auth::user()->role->name == 'pengelola' || Auth::user()->role->name == 'penguji' || Auth::user()->role->name == 'pemilik' || Auth::user()->role->name == 'admin')
                <li>
                    <i class='bx bxs-group' ></i>
                    <span class="text">
                        <h3>{{$usercount}}</h3>
                        <p>Users</p>
                    </span>
                </li>
            @endif
            @if (Auth::user()->role->name == 'pengelola' || Auth::user()->role->name == 'penguji' || Auth::user()->role->name == 'pemilik' || Auth::user()->role->name == 'penyewa')
                <li>
                    <i class='bx bxs-home' ></i>
                    <span class="text">
                        <h3>{{$roomcount}}</h3>
                        <p>Kamar Tersedia</p>
                    </span>
                </li>
            @endif
            @if (Auth::user()->role->name == 'pengelola' || Auth::user()->role->name == 'penguji')
                <li>
                    <i class='bx bx-transfer'></i>
                    <span class="text">
                        <h3>{{$transactioncount1}}</h3>
                        <p>Proses</p>
                    </span>
                </li>
            @endif
            @if (Auth::user()->role->name == 'penyewa')
                <li>
                    <i class='bx bx-transfer'></i>
                    <span class="text">
                        <h3>{{$transactioncount2}}</h3>
                        <p>Proses</p>
                    </span>
                </li>
            @endif
        </ul>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>User profile</h3>
                </div>
                <div class="profil-flex" style="display: flex; align-items: center;">
                    <div class="profil" style="text-align: center; margin: 20px">
                        @if (Storage::exists('public/user/' . Auth::user()->ktp))
                            <img src="{{ asset('storage/user/' . Auth::user()->ktp) }}" alt="{{Auth::user()->ktp}}"
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
                        <h3>{{Auth::user()->nama}}</h3>
                        <p style="margin-bottom: 5px">{{Auth::user()->no_hp}}</p>
                        <a type="button" class="button-profil" href="{{route('profile.edit', Auth::user()->id)}}">Edit profile</a>

                    </div>
                    <div class="detail" style="margin-left: 20px">
                        <p>Email :</p>
                        <h4>{{Auth::user()->email}}</h4>
                        <br>
                        <p>Phone :</p>
                        <h4>{{Auth::user()->no_hp}}</h4>
                        <br>
                        <p>Address :</p>
                        <h4>{{Auth::user()->alamat}}</h4>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div>Copyright &copy; kost_minur 2024</div>
        </footer>
    </main>
@endsection
