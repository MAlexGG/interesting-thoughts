@extends('layouts.app')

@section('content')
    <div>
        <h2>Aquí va la página principal</h2>

        @if (count($thoughts) >= 1)
            @foreach ($thoughts as $thought)
                <p>{{ $thought->thought }}</p>
                <p>{{ $thought->author }}</p>
                <img src="{{ $thought->image }}" alt="{{ $thought->author }} thougth">
            @endforeach
        @else
            <h2>There is no thoughts</h2>
        @endif
    </div>
@endsection
