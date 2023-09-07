@extends('layouts.app')

@section('content')

<div class="ct-thoughts">
    @foreach ($thoughts as $thought)
        @if (count($thought->favorites) >= 1)
            @foreach ($thought->favorites as $fav)
                @if ($fav->pivot['user_id'] == Auth::user()->id)
                    <div class="ct-thought">
                        <div class="ct-thought-img">
                            <img class="img-thought" src="{{ asset('storage/' . $thought->image) }}"
                                alt="{{ $thought->author }} thougth">
                        </div>
                        <p class="txt-thought">{{ Str::limit($thought->thought, 140, ' (...)') }}</p>
                        <a href="{{ route('show', ['id' => $thought->id]) }}">
                            <p class="txt-author">{{ Str::limit($thought->author, 20, ' (...)') }}</p>
                        </a>

                        <div class="d-flex gap-5">
                            @if (!Auth::user())
                                <a href="{{ route('login') }}">
                                    <button class="btn btn-outline-danger">
                                        <img src="{{ asset('img/heart_stroke.svg') }}" alt="not-favorite" class='img-favorite'>
                                    </button>
                                </a>
                            @elseif (Auth::user() && count($thought->favorites) >= 1)
                                <form action="{{ route('notFav', ['id' => $thought->id]) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger">
                                        <img src="{{ asset('img/heart.svg') }}" alt="favorite" class='img-favorite'>
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('fav', ['id' => $thought->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger">
                                        <img src="{{ asset('img/heart_stroke.svg') }}" alt="not-favorite" class='img-favorite'>
                                    </button>
                                </form>
                            @endif 
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    @endforeach
</div>

@endsection


 


