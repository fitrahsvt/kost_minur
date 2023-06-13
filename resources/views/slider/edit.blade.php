@extends('layouts.main')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Edit slider</h1>
                <ul class="breadcrumb">
                    <li>
                        <a class="active" href="{{route('slider.index')}}">Slider</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a href="#">Edit</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <form action="{{route('slider.update', $slider->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input value="{{$slider->title}}" type="text" id="title" name="title" required @error('title') style="border: 1px solid red;" @enderror>
                    @error('title')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="caption">Caption</label>
                    <input value="{{$slider->caption}}" type="text" id="caption" name="caption" required @error('caption') style="border: 1px solid red;" @enderror>
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
