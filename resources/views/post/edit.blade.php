@extends('layouts.app')

@section('title', 'Edit post')

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
<form method="POST" action="{{ route('post.update', $post) }}">
    {{ csrf_field() }}
    {{ method_field('POST') }}
        <div class="">
            <label for="topic" class="">Edit post</label>
            <div class="">
                <input id="topic"
                type="text"
                class="@error('topic') is-invalid @enderror"
                name="topic"
                value="{{ old('topic', $post->topic) }}" placeholder="Topic"
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
                <textarea id="body" class="@error('body') is-invalid @enderror" name="body" rows="10" cols="100" autocomplete="off">{{ old('body', $post->body) }}</textarea>
                
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
