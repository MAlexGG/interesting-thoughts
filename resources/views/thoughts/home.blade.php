@extends('layouts.app')

@section('content')
<div class="ct-message p-5">
    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show m-0" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
</div>
    <div class="ct-thoughts">
        @if (count($thoughts) >= 1)
            @foreach ($thoughts as $thought)
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
                        @if (Auth::user() && Auth::user()->id == $thought->user_id)
                            <div class="ct-tought-bt">
                                <a href="{{ route('edit', ['id' => $thought->id]) }}">
                                    <button class="btn btn-outline-secondary">Edit</button>
                                </a>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
                                <form action="{{ route('delete', ['id' => $thought->id]) }}" method="POST" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                @method('delete')
                                @csrf
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Attention! you are about to delete a thought</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to do that? 
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                                        </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endif

                        @if (!Auth::user())
                            <a href="{{ route('login') }}">
                                <button class="btn btn-outline-danger">
                                    <img src="{{ asset('img/heart_stroke.svg') }}" alt="not-favorite" class='img-favorite'>
                                </button>
                            </a>
                        @elseif (Auth::user() && $thought->favorites->contains('user_id', Auth::user()->id))
                            <form action="/thoughts/{{ $thought->id }}/favorites" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-outline-danger">
                                    <img src="{{ asset('img/heart.svg') }}" alt="favorite" class='img-favorite'>
                                </button>
                            </form>
                        @else
                            <form action="/thoughts/{{ $thought->id }}/favorites" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger">
                                    <img src="{{ asset('img/heart_stroke.svg') }}" alt="not-favorite" class='img-favorite'>
                                </button>
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
