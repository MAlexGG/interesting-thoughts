@extends('layouts.app')

@section('content')
    <form class="form-create w-75 needs-validation" action="{{ route('store') }}" method="POST" enctype="multipart/form-data"
        novalidate>
        @csrf
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" name="author" id="author" required>
            <div class="invalid-feedback">Please type an author.</div>
        </div>
        <div class="mb-3">
            <label for="thought" class="form-label">Thought</label>
            <textarea class="form-control" name="thought" id="thought" rows="3" required></textarea>
            <div class="invalid-feedback">Please type a thought.</div>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" name="image" id="image" required>
            <div class="invalid-feedback">Please add an image.</div>
        </div>
        <div class="col-12">
            <button class="btn btn-secondary" type="submit">Create</button>
            <a href="{{ route('thoughts') }}"><button class="btn btn-outline-secondary" type="button">Cancel</button></a>
        </div>
    </form>

    @if ($errors->any())
    <div class="ct-message p-3">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="m-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    @include('components.validationjs')
@endsection
