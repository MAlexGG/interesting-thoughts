@extends('layouts.app')

@section('content')
    <form class="m-5" action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" name="author" id="author">
        </div>
        <div class="mb-3">
            <label for="thought" class="form-label">Thought</label>
            <textarea class="form-control" name="thought" id="thought" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" class="form-control" name="image" id="image">
        </div>
        <div class="col-12">
            <button class="btn btn-secondary" type="submit">Create</button>
            <a href="{{ route('home') }}"><button class="btn btn-outline-secondary" type="button">Cancel</button></a>
        </div>
    </form>
@endsection
