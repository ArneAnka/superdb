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
                <input id="title" type="text" class="@error('title') is-invalid @enderror" name="title" value="{{ old('title', $game->title) }}" required autocomplete="title">

                @error('title')
                <span class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>



        <div class="">
            <label for="genre" class="">Genre</label>
            <div class="">
                <select name="genre_id" id="genre_id">
                    @foreach($genres as $genre)
                      <option value="{{ $genre->id }}" {{ old('genre_id', $game->genre_id) == $genre->id ? 'selected' : '' }}>{{ $genre->genre }}</option>
                    @endforeach
                </select>

                @error('genre')
                <span class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="">
            <label for="save" class="">save</label>
            <div class="">
                <select name="save" id="save">
                    @foreach($saves as $save)
                      <option value="{{ $save }}" {{ old('save', $game->save) == $save ? 'selected' : '' }}>{{ $save }}</option>
                    @endforeach
                </select>

                @error('save')
                <span class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="">
            <label for="import" class="">Import</label>
            <div class="">
                <input id="import" type="text" class="@error('import') is-invalid @enderror" name="import" value="{{ old('import', $game->import) }}">

                @error('import')
                <span class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="">
            <label for="publisher" class="">Publisher</label>
            <div class="">
                <input id="publisher" type="text" class="@error('publisher') is-invalid @enderror" name="publisher" value="{{ old('publisher', $game->publisher) }}">

                @error('publisher')
                <span class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="">
            <label for="developer" class="">Developer</label>
            <div class="">
                <input id="developer" type="text" class="@error('developer') is-invalid @enderror" name="developer" value="{{ old('developer', $game->developer) }}">

                @error('developer')
                <span class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="">
            <label for="modes" class="">Playing modes ex. singleplayer</label>
            <div class="">
                <input id="modes" type="text" class="@error('modes') is-invalid @enderror" name="modes" value="{{ old('modes', $game->modes) }}">

                @error('modes')
                <span class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="">
            <label for="sweden_release" class="">sweden_release</label>
            <div class="">
                <input id="sweden_release" type="text" class="@error('sweden_release') is-invalid @enderror" name="sweden_release" value="{{ old('sweden_release', $game->sweden_release) }}">

                @error('sweden_release')
                <span class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="">
            <label for="europe_release" class="">europe_release</label>
            <div class="">
                <input id="europe_release" type="text" class="@error('europe_release') is-invalid @enderror" name="europe_release" value="{{ old('europe_release', $game->europe_release) }}">

                @error('europe_release')
                <span class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="">
            <label for="japan_release" class="">japan_release</label>
            <div class="">
                <input id="japan_release" type="text" class="@error('japan_release') is-invalid @enderror" name="japan_release" value="{{ old('japan_release', $game->japan_release) }}">

                @error('japan_release')
                <span class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="">
            <label for="usa_release" class="">usa_release</label>
            <div class="">
                <input id="usa_release" type="text" class="@error('usa_release') is-invalid @enderror" name="usa_release" value="{{ old('usa_release', $game->usa_release) }}">

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

    <button type="submit">Skicka</button>
</form>
@endsection
