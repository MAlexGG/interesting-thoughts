@extends('layouts.app')

@section('content')
    <form {{-- action="{{ route('update') }}" --}} method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div>
            <label for="thought">Thought</label>
            <input type="text" name="thought" id="thought" value="{{ $thought->thought }}">
        </div>
        <div>
            <label for="author">Author</label>
            <input type="text" name="author" id="author" value="{{ $thought->author }}">
        </div>
        <div>
            <label for="image">Image</label>
            <input type="text" name="image" id="image" value="{{ $thought->image }}">
        </div>
        <div>
            <button type="submit">Edit</button>
            <a href="{{ route('home') }}"><button type="button">Cancel</button></a>
        </div>

    </form>
@endsection
