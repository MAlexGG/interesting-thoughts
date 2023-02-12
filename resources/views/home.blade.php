@extends('layouts.app')

@section('content')
    <div>
        <h2>Aquí va la página principal</h2>

        @if (count($thoughts) >= 1)
            @foreach ($thoughts as $thought)
                <p>{{ $thought->thought }}</p>
                <p>{{ $thought->author }}</p>
                <img src="{{ $thought->image }}" alt="{{ $thought->author }} thougth">
                <a href="{{ route('show', ['id' => $thought->id]) }}"><button>See</button></a>
                <a href="{{ route('edit', ['id' => $thought->id]) }}"><button>Edit</button></a>
                {{-- <a href="{{route('delete', ['id' => $thought->id ])}}"><button>Delete</button></a> --}}
            @endforeach
        @else
            <h2>There is no thoughts</h2>
        @endif
    </div>
@endsection
