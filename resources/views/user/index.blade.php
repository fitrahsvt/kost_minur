@extends('layouts.main')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>User</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">User</a>
                    </li>
                </ul>
                @if (Auth::user()->role->name == 'penguji' || Auth::user()->role->name == 'admin')
                    <br>
                    <a href="{{route('user.create')}}" class="btn-download">
                        <i class='bx bx-plus'></i>
                        <span class="text">Create New</span>
                    </a>
                @endif
            </div>
        </div>
        @if (Auth::user()->role->name == 'penguji' || Auth::user()->role->name == 'admin')
            <ul class="box-info">
                <a href="{{route('role.index')}}">
                    <li>
                        <i class='bx bxs-group' style="background: var(--light-orange); color: var(--orange);"></i>
                        <span class="text">
                            <h3>{{$rolecount}}</h3>
                            <p>Role</p>
                        </span>
                    </li>
                </a>
            </ul>
        @endif
        <br>
        {{-- filter nama --}}
        <form action="{{ route('user.index') }}" method="GET">
            @csrf
            <div style="display: flex; align-items: center; gap: 10px;">
                <input type="text" name="search" placeholder="nama pengguna" value="{{ old('search', $search ?? '') }}">
                <button type="submit" style="padding: 10px; background: lightblue; border-style: none; border-radius: 5px;">Search</button>
            </div>
        </form>

        <br>

        <form action="{{ route('user.index') }}" method="GET">
            <div style="display: flex; align-items: center; gap: 10px;">
                <div>
                    <label>Jenis</label>
                </div>
                <div>
                    <!-- Dropdown untuk filter berdasarkan jenis -->
                    <select name="jenis" onchange="this.form.submit()">
                        <option value="">All Jenis</option>
                        <option value="regular" {{ $jenis === 'regular' ? 'selected' : '' }}>Aktif</option>
                        <option value="expired" {{ $jenis === 'expired' ? 'selected' : '' }}>Non-aktif</option>
                    </select>
                </div>

                <div>
                    <label>Kamar</label>
                </div>
                <div>
                    <!-- Dropdown untuk filter berdasarkan Kamar -->
                    <select name="room" onchange="this.form.submit()">
                        <option value="">All Room</option>
                        @foreach ($rooms as $room)
                            <option value="{{ $room->id }}" {{ $roomId == $room->id ? 'selected' : '' }}>
                                Kamar No. {{ $room->nomor }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>

        <div class="table-data">
            <div class="order">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>avatar</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>email</th>
                            <th style="text-align: center; font ">Nomor Kamar</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $u)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    @if (Storage::exists('public/user/' . $u->ktp))
                                        <img src="{{ asset('storage/user/' . $u->ktp) }}" alt="{{ $u->ktp }}" style="max-height: 50px; width: auto;">
                                    @else
                                        <img src="{{ asset('storage/user/blank_profile.jpg') }}" alt="blank_profile" style="max-height: 50px; width: auto;">
                                    @endif
                                </td>
                                <td>{{$u->nama}}</td>
                                <td>{{$u->role->name}}</td>
                                <td>{{$u->email}}</td>
                                <td style="text-align: center; font ">
                                    @if (is_null($u->kamar_id))
                                        -
                                    @else
                                       {{$u->room->nomor}}
                                    @endif
                                </td>
                                <td>
                                    @if (Auth::user()->role->name == 'penguji' || Auth::user()->role->name == 'admin')
                                        <form action="{{route('user.destroy', $u->id)}}" method="POST" onsubmit="return confirm('Anda yakin menghapus ini?');">
                                    @endif
                                            <div>
                                                <a href="{{route('user.detail', $u->id)}}"><i class='bx bxs-user-detail' ></i></a>
                                                @if (Auth::user()->role->name == 'penguji' || Auth::user()->role->name == 'admin')
                                                    <a href="{{route('user.edit', $u->id)}}"><i class='bx bxs-edit' ></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="button-delete"><i class='bx bxs-trash-alt' ></i></button>
                                                @endif
                                            </div>
                                        </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Menampilkan tombol paginasi -->
        <div class="pagination">
            {{ $users->links() }}
        </div>
        <footer>
            <div>Copyright &copy;Kost Minur 2024</div>
        </footer>
    </main>
@endsection
