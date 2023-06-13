@extends('layouts.main')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Create slider</h1>
                <ul class="breadcrumb">
                    <li>
                        <a class="active" href="{{route('slider.index')}}">Slider</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a href="#">Create</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" @error('title') style="border: 1px solid red;" @enderror value="{{old('title')}}">
                    @error('title')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="caption">Caption</label>
                    <input type="text" id="caption" name="caption" @error('caption') style="border: 1px solid red;" @enderror value="{{old('caption')}}">
                    @error('caption')
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
                <input type="submit" value="Submit">
                <a href="{{ route('slider.index') }}" class="button-cancel">Cancel</a>
            </form>
        </div>
        <footer>
            <div>Copyright &copy; yaya_motor 2023</div>
        </footer>
    </main>
@endsection
