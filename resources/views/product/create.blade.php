@extends('layouts.main')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Create product</h1>
                <ul class="breadcrumb">
                    <li>
                        <a class="active" href="{{route('product.index')}}">Product</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a href="#">Create</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="category">Category</label>
                    <select id="category" name="category" @error('category') style="border: 1px solid red;" @enderror>
                        <option selected disabled>- Choose Category -</option>
                            @foreach ($category as $c)
                                <option value="{{$c->id}}" {{old('category') == $c->id ? 'selected' : ''}}>{{$c->name}}</option>
                            @endforeach
                    </select>
                    @error('category')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" @error('name') style="border: 1px solid red;" @enderror value="{{old('name')}}">
                    @error('name')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" id="price" name="price" @error('price') style="border: 1px solid red;" @enderror value="{{old('price')}}">
                    @error('price')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="brand">Brand</label>
                    <select id="brand" name="brand" @error('brand') style="border: 1px solid red;" @enderror>
                        <option selected disabled>- Choose Brand -</option>
                            @foreach ($brand as $b)
                                <option value="{{$b->id}}" {{old('brand') == $b->name ? 'selected' : ''}}>{{$b->name}}</option>
                            @endforeach
                    </select>
                    @error('brand')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="desc">Description</label>
                    <textarea id="desc" name="desc" @error('desc') style="border: 1px solid red;" @enderror>{{old('desc')}}"</textarea>
                    @error('desc')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png., .webp" @error('image') style="border: 1px solid red;" @enderror>
                    @error('image')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" value="{{Auth::user()->id}}" name="user" style="display: none;" >
                </div>
                <input type="submit" value="Save">
                <a href="{{ route('product.index') }}" class="button-cancel">Cancel</a>
            </form>
        </div>
        <footer>
            <div>Copyright &copy; yaya_motor 2023</div>
        </footer>
    </main>
@endsection
