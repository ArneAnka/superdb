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
            <label for="import" class="">Import</label>
            <div class="">
                <input id="import" type="text" class="@error('import') is-invalid @enderror" name="import" value="{{ old('import', $game->import) }}" autocomplete="import">

                @error('import')
                <span class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="">
            <label for="sweden_release" class="">sweden_release</label>
            <div class="">
                <input id="sweden_release" type="text" class="@error('sweden_release') is-invalid @enderror" name="sweden_release" value="{{ old('sweden_release', $game->sweden_release) }}" autocomplete="sweden_release">

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
                <input id="europe_release" type="text" class="@error('europe_release') is-invalid @enderror" name="europe_release" value="{{ old('europe_release', $game->europe_release) }}" autocomplete="europe_release">

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
                <input id="japan_release" type="text" class="@error('japan_release') is-invalid @enderror" name="japan_release" value="{{ old('japan_release', $game->japan_release) }}" autocomplete="japan_release">

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
                <input id="usa_release" type="text" class="@error('usa_release') is-invalid @enderror" name="usa_release" value="{{ old('usa_release', $game->usa_release) }}" autocomplete="usa_release">

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
