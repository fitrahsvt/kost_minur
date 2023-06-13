@extends('layouts.main')

@section('content')
    <main>
        <div class="head-title">
            <div class="left" >
                <h1>Brand</h1>
                <ul class="breadcrumb">
                    <li>
                        <a class="active" href="{{route('product.index')}}">Product</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a href="#">Brand</a>
                    </li>
                </ul>
            </div>
            @if (Auth::user()->role->name == 'staff')
            <div class="container" style="margin-top: 0;">
                <form action="{{ route('brand.store') }}" method="POST">
                    @csrf
                    <label for="name" style="margin-bottom: 10px">Create brand</label>
                    <div class="form-khusus">
                        <input type="text" id="name" name="name" placeholder="name" style="margin-right: 20px; @error('name') border: 1px solid red; @enderror" value="{{old('name')}}">
                        <input type="submit" value="Submit" style="width: 150px">
                    </div>
                    @error('name')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </form>
            </div>
            @endif
        </div>
        <div class="table-data">
            <div class="order">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            @if (Auth::user()->role->name == 'staff')
                            <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brand as $b)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $b->name }}</td>
                            @if (Auth::user()->role->name == 'staff')
                            <td>
                                <form action="{{route('brand.destroy', $b->id)}}" method="POST" onsubmit="return confirm('Anda yakin menghapus ini?');">
                                    <div>
                                        <a href="{{route('brand.edit', $b->id)}}"><i class='bx bxs-edit' ></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="button-delete"><i class='bx bxs-trash-alt' ></i></button>
                                    </div>
                                </form>
                            </td>
                            @endif
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
