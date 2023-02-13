@extends('layouts.thoughts')

@section('content')
    <div class="ct-thoughts">
        @if (count($thoughts) >= 1)
            @foreach ($thoughts as $thought)
                <div class="ct-thought">
                    <div class="ct-thought-img">
                        <img class="img-thought" src="{{ $thought->image }}" alt="{{ $thought->author }} thougth">
                    </div>
                    <p class="txt-thought">{{ Str::limit($thought->thought, 140, ' (...)') }}</p>
                    <p class="txt-author">{{ $thought->author }}</p>
                    <div class="ct-tought-bt">
                        <a href="{{ route('show', ['id' => $thought->id]) }}"><button
                                class="btn btn-outline-secondary">See</button></a>
                        <a href="{{ route('edit', ['id' => $thought->id]) }}"><button
                                class="btn btn-outline-secondary">Edit</button></a>
                        <form action="{{ route('delete', ['id' => $thought->id]) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn btn-outline-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <h2>There is no thoughts</h2>
        @endif
    </div>
@endsection
