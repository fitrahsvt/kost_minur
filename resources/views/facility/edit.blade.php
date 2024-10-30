@extends('layouts.main')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Edit Fasilitas</h1>
            </div>
        </div>
        <div class="container">
            <form action="{{route('facility.update', $facility->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input value="{{$facility->nama}}" type="text" id="name" name="name" @error('name') style="border: 1px solid red" @enderror required>
                    @error('name')
                        <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <input type="submit" value="Submit">
                <a href="{{ route('facility.index') }}" class="button-cancel">Cancel</a>
            </form>
        </div>
    </main>
@endsection
