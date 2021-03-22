@extends('layouts.app')

@section('title', 'Om superdb.cc')

@section('content')
<div class="container mx-auto px-4">
    <div class="space-y-5">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
        test
        </h2>
        @foreach($genres as $genre)
            <h1 class="text-xl text-red-600">{{ $genre->genre }} (# {{ $genre->id }})</h1>
            @foreach($genre->games as $game)
                <a href="https://superdb.cc/g/{{ $game->slug }}" target="_blank">{{ $game->title }} ({{ $game->console->name }})</a><br>
            @endforeach
        @endforeach
    </div> <!-- end container -->
</div>
@endsection
