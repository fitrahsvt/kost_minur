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
                        <h3>{{$categorycount}}</h3>
                        <p>Categories</p>
                    </span>
                </li>
            </a>
            <a href="{{route('brand.index')}}">
                <li>
                    <i class='bx bxs-smile' style="background: var(--light-yellow); color: var(--yellow);"></i>
                    <span class="text">
                        <h3>{{$brandcount}}</h3>
                        <p>Brands</p>
                    </span>
                </li>
            </a>
        </ul>
        @endif
        @if (Auth::user()->role->name == 'admin' || Auth::user()->role->name == 'staff')
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
                            <th width="10%" style="text-align: center">Status</th>
                            <th width="15%" style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $p)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$p->name}}</td>
                                <td>{{$p->category->name}}</td>
                                <td>Rp. {{number_format($p->price, 0, 2) }}</td>
                                <td style="text-align: center">
                                <img src="{{ asset('storage/product/' . $p->image) }}" class="img-fluid" alt="{{ $p->image }}" style="max-height: 50px; width: auto; ">
                                </td>
                                <td>{{$p->brand->name}}</td>
                                <td style="text-align: center">
                                    @if ($p->status == 'waiting')
                                    <span class="status process">{{$p->status}}</span>
                                    @elseif ($p->status == 'accepted')
                                    <span class="status completed">{{$p->status}}</span>
                                    @else
                                        <span class="status pending">{{$p->status}}</span>
                                    @endif
                                </td>
                                <td style="text-align: center">
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
                            </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
        @endif

        {{-- USER --}}
        @if (Auth::user()->role->name == 'user')
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
        @endif
        <footer>
            <div>Copyright &copy; yaya_motor 2023</div>
        </footer>
    </main>
@endsection
