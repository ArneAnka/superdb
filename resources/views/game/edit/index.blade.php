@extends('layouts.app')

@section('title', "ändra $game->title")

@section('content')
<h1>editera: {{ $game->title }}</h1>

<form method="POST" action="{{ route('game.save.edit', $game) }}">
    {{ csrf_field() }}
    {{ method_field('POST') }}
        <div class="">
            <label for="title" class="">Title</label>

            <div class="">
                <input id="title" type="title" class="@error('title') is-invalid @enderror" name="title" value="{{ old('title', $game->title) }}" required autocomplete="title" autofocus>

                @error('title')
                <span class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    <button type="submit">Submit</button>
</form>
@endsection
