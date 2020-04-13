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
                <input id="title" type="text" class="@error('title') is-invalid @enderror" name="title" value="{{ old('title', $game->title) }}" required autocomplete="title" autofocus>

                @error('title')
                <span class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="">
            <label for="import" class="">Import</label>

            <div class="">
                <input id="import" type="text" class="@error('import') is-invalid @enderror" name="import" value="{{ old('import', $game->import) }}" required autocomplete="import" autofocus>

                @error('import')
                <span class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="">
            <label for="usa_release" class="">usa_release</label>

            <div class="">
                <input id="usa_release" type="text" class="@error('usa_release') is-invalid @enderror" name="usa_release" value="{{ old('usa_release', $game->usa_release) }}" required autocomplete="usa_release" autofocus>

                @error('usa_release')
                <span class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="">
            <label for="description" class="">Description</label>

            <div class="">
                <textarea id="description" class="@error('description') is-invalid @enderror" name="description" rows="10" cols="100">{{ old('description', $game->description) }}</textarea>

                @error('description')
                <span class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

    <button type="submit">Submit</button>
</form>
@endsection
