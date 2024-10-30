@extends('layouts.main')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Kamar</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Kamar</a>
                    </li>
                </ul>
                @if (Auth::user()->role->name == 'pengelola' || Auth::user()->role->name == 'penguji')
                    <br>
                    <a href="{{route('room.create')}}" class="btn-download">
                        <i class='bx bx-plus' ></i>
                        <span class="text">Create New</span>
                    </a>
                @endif
                <br>
            </div>
        </div>
        <form action="{{ route('room.index') }}" method="GET">
            <div style="display: flex; align-items: center; gap: 10px;">
                <div>
                    <label>Fasilitas</label>
                </div>
                <div>
                    <!-- Dropdown untuk filter berdasarkan fasilitas -->
                    <select name="facility_id" onchange="this.form.submit()">
                        <option value="">All Facilities</option>
                        @foreach ($facilities as $f)
                        <option value="{{ $f->id }}" {{ $facilityId == $f->id ? 'selected' : '' }}>
                            {{ $f->nama }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label>Harga</label>
                </div>
                <div>
                    <!-- Dropdown untuk mengurutkan harga -->
                    <select name="price_order" onchange="this.form.submit()">
                        <option value="high" {{ $priceOrder === 'high' ? 'selected' : '' }}>Tertinggi</option>
                        <option value="low" {{ $priceOrder === 'low' ? 'selected' : '' }}>Terendah</option>
                    </select>
                </div>
            </div>
        </form>

        <div class="table-data">
            <div class="order">
                <table>
                    <thead>
                        <tr>
                            <th>No Kamar</th>
                            <th>Harga</th>
                            <th style="text-align: center; font ">Status</th>
                            <th style="text-align: center; font ">ukuran</th>
                            <th style="text-align: center; font ">Foto</th>
                            <th style="text-align: center;">Fasilitas</th>
                            <th style="text-align: center; font ">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rooms as $r)
                            <tr>
                                <td>{{$r->nomor}}</td>
                                <td>Rp. {{number_format($r->harga, 0, 2) }}</td>
                                <td style="text-align: center; font ">
                                    @if ($r->status_ketersediaan == 'ada')
                                        <span class="status waiting">Availble</span>
                                    @else
                                        <span class="status pending">Unovailable</span>
                                    @endif
                                </td>
                                <td style="text-align: center; font ">{{$r->ukuran}}</td>
                                <td style="text-align: center">
                                <img src="{{ asset('storage/room/' . $r->foto) }}" class="img-fluid" alt="{{ $r->foto }}" style="max-height: 50px; width: auto; ">
                                </td>
                                <td style="text-align: center; max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    @if ($r->facilities->count() > 0)
                                        <span style="font-size: 12px; color: #666;">
                                            @foreach ($r->facilities as $index => $facility)
                                                {{ $facility->nama }}@if($index < $r->facilities->count() - 1), @endif
                                            @endforeach
                                        </span>
                                    @else
                                        <span style="font-size: 12px; color: #666;">-</span>
                                    @endif
                                </td>
                                <td style="text-align: center">
                                    @if (Auth::user()->role->name == 'pengelola' || Auth::user()->role->name == 'penguji')
                                        <form action="{{route('room.destroy', $r->id)}}" method="POST" onsubmit="return confirm('Anda yakin menghapus ini?');">
                                    @endif
                                            <div>
                                                <a href="{{ route('room.show', ['id' => $r->id]) }}" style="text-decoration: none" class="text-dark">
                                                    <i class='bx bxs-low-vision'></i>
                                                </a>
                                                @if (Auth::user()->role->name == 'pengelola' || Auth::user()->role->name == 'penguji')
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="button-delete"><i class='bx bxs-trash-alt' ></i></button>
                                                    <a href="{{route('room.edit', $r->id)}}"><i class='bx bxs-edit' ></i></a>
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

        {{-- USER --}}
        {{-- @if (Auth::user()->role->name == 'user')
        <div class="table-data">
            <div class="order">
                <table>
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th width="12%" >Price</th>
                            <th width="10%" style="text-align: center">image</th>
                            <th>Brand</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productforuser as $p)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$p->name}}</td>
                                <td>{{$p->category->name}}</td>
                                <td>Rp. {{number_format($p->price, 0, 2) }}</td>
                                <td style="text-align: center">
                                <img src="{{ asset('storage/product/' . $p->image) }}" class="img-fluid" alt="{{ $p->image }}" style="max-height: 50px; width: auto; ">
                                </td>
                                <td>{{$p->brand->name}}</td>
                                <td>
                                    <div>
                                        <a href="{{route('product.show', $p->id)}}"><i class='bx bxs-detail'></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
        @endif --}}
        <footer>
            <div>Copyright &copy; Kost_minur 2024</div>
        </footer>
    </main>
@endsection
