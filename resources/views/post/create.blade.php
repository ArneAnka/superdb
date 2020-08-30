@extends('layouts.app')

@section('title', 'Skapa post')


@section('content')
<form method="POST" action="{{ route('post.store') }}">
    {{ csrf_field() }}
    {{ method_field('POST') }}
        <div class="">
            <label for="topic" class="">Add post</label>
            <div class="">
                <input id="topic"
                type="text"
                class="@error('topic') is-invalid @enderror"
                name="topic"
                value="{{ old('topic') }}" placeholder="Topic"
                autocomplete="off">
                
                @error('topic')
                <span class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="">
            <label for="body" class="">Body</label>
            <div class="">
                <textarea id="body" class="@error('body') is-invalid @enderror" name="body" rows="10" cols="100" autocomplete="off">{{ old('body') }}</textarea>
                
                <br>
                @error('body')
                <span class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    <input type="submit" value="Lägg till">
</form>
@endsection
