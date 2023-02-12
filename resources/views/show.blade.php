@extends('layouts.app')

@section('content')
    <p>{{ $thought->thought }}</p>
    <p>{{ $thought->author }}</p>
    <img src="{{ $thought->image }}" alt="{{ $thought->thought }} thought">
@endsection
