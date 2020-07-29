@extends('layouts.app')

@section('title', "ändra $game->title")

@section('css')
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

form {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
@endsection
@section('content')
<h1>editera: {{ $game->title }}</h1>

<form method="POST" action="{{ route('game.update.edit', $game) }}" autocomplete="off">
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
        @forelse($game->urls as $url)
        <div class="">
            <label for="url" class="">{{ $url->host }}</label>
            <div class="">
                <input id="url"
                type="text"
                class="@error('url') is-invalid @enderror"
                name="url[{{ $url->host }}]"
                value="{{ old('url->url', $url->url) }}">

                @error('url')
                <span class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        @empty
            No links
        @endforelse

    <input type="submit" value="Ändra">
</form>

<form method="POST" action="{{ route('game.save.url', $game) }}" autocomplete="off">
    {{ csrf_field() }}
    {{ method_field('POST') }}
        <div class="">
            <label for="url_host" class="">Add link</label>
            <div class="">
                <input id="url_host"
                type="text"
                class="@error('url_host') is-invalid @enderror"
                name="url_host"
                value="{{ old('url_host') }}" placeholder="ex: wikipedia_url">
                @error('url_host')
                <span class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <input id="new_url"
                type="text"
                class="@error('new_url') is-invalid @enderror"
                name="new_url"
                value="{{ old('new_url') }}" placeholder="http://en.wikipedia.org/xxx">

                @error('new_url')
                <span class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    <input type="submit" value="Lägg till">
</form>
@endsection
