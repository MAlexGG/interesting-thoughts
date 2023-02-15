@extends('layouts.app')

@section('content')
    <form class="m-5 w-75 needs-validation" action="{{ route('update', ['id' => $thought->id]) }}" method="POST"
        enctype="multipart/form-data" novalidate>
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ $thought->author }}" required>
            <div class="invalid-feedback">Please type an author.</div>
        </div>
        <div class="mb-3">
            <label for="thought" class="form-label">Thought</label>
            <textarea class="form-control" id="thought" name="thought" rows="3" required>{{ $thought->thought }}</textarea>
            <div class="invalid-feedback">Please type a thought.</div>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" class="form-control" name="image" id="image" value="{{ $thought->image }}" required>
            <div class="invalid-feedback">Please add an image.</div>
        </div>
        <div class="col-12">
            <button class="btn btn-secondary" type="submit">Edit</button>
            <a href="{{ route('home') }}"><button class="btn btn-outline-secondary" type="button">Cancel</button></a>
        </div>
    </form>
    @include('components.validationjs')
@endsection
