@extends('layouts.main')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Slider</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Slider</a>
                    </li>
                </ul>
        @if (Auth::user()->role->name == 'staff')
                <br>
                <a href="{{route('slider.create')}}" class="btn-download">
                    <i class='bx bx-plus' ></i>
                    <span class="text">Create New</span>
                </a>
                @endif
            </div>
        </div>
        <div class="table-data">
            <div class="order">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Caption</th>
                            <th>image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $s)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $s->title }}</td>
                            <td>{{ $s->caption }}</td>
                            <td>
                                <img src="{{ asset('storage/slider/' . $s->image) }}" class="img-fluid"  alt="{{ $s->image }}">
                            </td>
                            <td>
                                @if ($s->status == 'waiting')
                                    <span class="status process">{{$s->status}}</span>
                                @elseif ($s->status == 'accepted')
                                    <span class="status completed">{{$s->status}}</span>
                                @else
                                    <span class="status pending">{{$s->status}}</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{route('slider.destroy', $s->id)}}" method="POST" onsubmit="return confirm('Anda yakin menghapus ini?');">
                                    <div class="button-flex">
                                        @if (Auth::user()->role->name == 'admin')
                                            <a href="{{route('slider.accepted', $s->id)}}"><i class='bx bxs-like' ></i></a>
                                            <a href="{{route('slider.rejected', $s->id)}}"><i class='bx bxs-dislike' ></i></a>
                                        @endif
                                        @if (Auth::user()->role->name == 'staff')
                                        <a href="{{route('slider.edit', $s->id)}}"><i class='bx bxs-edit' ></i></a>
                                        @endif
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="button-delete"><i class='bx bxs-trash-alt' ></i></button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <footer>
            <div>Copyright &copy; yaya_motor 2023</div>
        </footer>
    </main>
@endsection
