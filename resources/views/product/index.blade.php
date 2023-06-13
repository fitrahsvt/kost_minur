@extends('layouts.main')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Product</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">product</a>
                    </li>
                </ul>
            @if (Auth::user()->role->name == 'staff')
                <br>
                <a href="{{route('product.create')}}" class="btn-download">
                    <i class='bx bx-plus' ></i>
                    <span class="text">Create New</span>
                </a>
            @endif
            </div>
        </div>
        @if (Auth::user()->role->name == 'admin' || Auth::user()->role->name == 'staff')
        <ul class="box-info">
            <a href="{{route('category.index')}}">
                <li>
                    <i class='bx bxs-dashboard' ></i>
                    <span class="text">
                        <h3>12</h3>
                        <p>Categories</p>
                    </span>
                </li>
            </a>
            <a href="{{route('brand.index')}}">
                <li>
                    <i class='bx bxs-smile' style="background: var(--light-yellow); color: var(--yellow);"></i>
                    <span class="text">
                        <h3>12</h3>
                        <p>Brands</p>
                    </span>
                </li>
            </a>
        </ul>
        @endif
        <div class="table-data">
            <div class="order">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>image</th>
                            <th>Brand</th>
                            @if (Auth::user()->role->name == 'admin' || Auth::user()->role->name == 'staff')
                            <th>Status</th>
                            <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $p)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$p->name}}</td>
                                <td>{{$p->category->name}}</td>
                                <td>Rp. {{number_format($p->price, 0, 2) }}</td>
                                <td>
                                <img src="{{ asset('storage/product/' . $p->image) }}" class="img-fluid" alt="{{ $p->image }}" style="max-height: 50px; width: auto;">
                                </td>
                                <td>{{$p->brand->name}}</td>
                                @if (Auth::user()->role->name == 'admin' || Auth::user()->role->name == 'staff')
                                <td>
                                    @if ($p->status == 'waiting')
                                    <span class="status process">{{$p->status}}</span>
                                    @elseif ($p->status == 'accepted')
                                    <span class="status completed">{{$p->status}}</span>
                                    @else
                                        <span class="status pending">{{$p->status}}</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{route('product.destroy', $p->id)}}" method="POST" onsubmit="return confirm('Anda yakin menghapus ini?');">
                                        <div>
                                            @if (Auth::user()->role->name == 'admin')
                                            <a href="{{route('product.accepted', $p->id)}}"><i class='bx bxs-like' ></i></a>
                                            <a href="{{route('product.rejected', $p->id)}}"><i class='bx bxs-dislike' ></i></a>
                                            @endif
                                            @if (Auth::user()->role->name == 'staff')
                                            <a href="{{route('product.edit', $p->id)}}"><i class='bx bxs-edit' ></i></a>
                                            @endif
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
