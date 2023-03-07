@extends('layouts.app')

@section('content')
    <div class="ct-thoughts">
        @if (count($thoughts) >= 1)
            @foreach ($thoughts as $thought)
                <div class="ct-thought">
                    <div class="ct-thought-img">
                        <img class="img-thought" src="{{ $thought->image }}" alt="{{ $thought->author }} thougth">
                    </div>
                    <p class="txt-thought">{{ Str::limit($thought->thought, 140, ' (...)') }}</p>
                    <a href="{{ route('show', ['id' => $thought->id]) }}">
                        <p class="txt-author">{{ Str::limit($thought->author, 20, ' (...)') }}</p>
                    </a>

                    <div class="d-flex gap-5">
                        @if (Auth::user() && Auth::user()->id == $thought->user_id)
                            <div class="ct-tought-bt">
                                <a href="{{ route('edit', ['id' => $thought->id]) }}"><button
                                        class="btn btn-outline-secondary">Edit</button></a>
                                <form action="{{ route('delete', ['id' => $thought->id]) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-outline-danger">Delete</button>
                                </form>
                            </div>
                        @endif

                        @if (!Auth::user())
                            <a href="{{ route('login') }}"><button class="btn btn-outline-danger"><img
                                        src="{{ asset('img/heart_stroke.svg') }}" alt="not-favorite"
                                        class='img-favorite'></button></a>
                        @elseif (Auth::user() && $thought->favorites->contains('user_id', Auth::user()->id))
                            <button type="text" disabled class="btn btn-outline-danger"><img
                                    src="{{ asset('img/heart.svg') }}" alt="favorite" class='img-favorite'></button>
                        @else
                            <form action="/thoughts/{{ $thought->id }}/favorites" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger"><img
                                        src="{{ asset('img/heart_stroke.svg') }}" alt="not-favorite"
                                        class='img-favorite'></button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <h2>There is no thoughts</h2>
        @endif
    </div>
@endsection
