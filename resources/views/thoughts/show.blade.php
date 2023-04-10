@extends('layouts.app')

@section('content')
    <div class="ct-show">
        @if(session()->has('message'))
        <div class="ct-message p-5">
        <div class="alert alert-success alert-dismissible fade show m-0" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        </div>
        @endif
        <div class="ct-show-img">
            <img class="img-show" src="{{ asset('storage/' . $thought->image) }}" alt="{{ $thought->thought }} thought">
        </div>
        <div class="ct-show-txt">
            <p>{{ $thought->thought }}</p>
            <p class="text-danger">{{ $thought->author }}</p>
        </div>
    </div>
@endsection
