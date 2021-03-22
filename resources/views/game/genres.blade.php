@extends('layouts.app')

@section('title', 'Genres')

@section('content')
<div class="container mx-auto px-4">
    <div class="space-y-5">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold text-4xl">
            <a id="start" class="uppercase">Genres</a>
        </h2>
        <div class="grid grid-cols-3 gap-4">
            @forelse($genres as $genre)
            <div>
                <h2 class="text-blue-500 tracking-wide font-semibold flex items-center">
                    {{ $genre->genre }}
                    @can('delete', $genre)
                    <a href="{{ route('game.genres.delete', $genre) }}" class="">
                        <svg class="inline ml-2" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M4 .5H1.5a1 1 0 00-1 1V4M6 .5h3m2 0h2.5a1 1 0 011 1V4M.5 6v3m14-3v3m-14 2v2.5a1 1 0 001 1H4M14.5 11v2.5a1 1 0 01-1 1H11m-7-7h7m-5 7h3" stroke="currentColor"></path></svg>
                    </a>
                    @endcan
                    </h2>
                <ul class="list-disc list-inside">
                    @forelse($genre->games as $game)
                        <li><a href="{{ route('game.show', $game) }}" class="underline">{{ $game->title }}</a></li>
                    @empty
                        <p>Inga spel 😭</p>
                    @endforelse
                </ul>
            </div>
            @empty
                Inga genres?
            @endforelse
        </div>
    </div>
</div>
@endsection
