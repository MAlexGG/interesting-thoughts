@extends('layouts.app')

@section('content')
    <div class="ct-show">
        <div class="ct-show-img">
            <img class="img-show" src="{{ asset('storage/' . $thought->image) }}" alt="{{ $thought->thought }} thought">
        </div>
        <div class="ct-show-txt">
            <p>{{ $thought->thought }}</p>
            <p class="text-danger">{{ $thought->author }}</p>
        </div>
    </div>
@endsection
