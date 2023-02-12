@extends('layouts.app')

@section('content')
    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="thought">Thought</label>
            <input type="text" name="thought" id="thought">
        </div>
        <div>
            <label for="author">Author</label>
            <input type="text" name="author" id="author">
        </div>
        <div>
            <label for="image">Image</label>
            <input type="text" name="image" id="image">
        </div>
        <div>
            <button type="submit">Create</button>
            <a href="{{ route('home') }}"><button type="button">Cancel</button></a>
        </div>

    </form>
@endsection
