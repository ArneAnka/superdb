@extends('layouts.app')

@section('title', 'Sök')

@section('content')
<div class="container mx-auto px-4">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
            Sökresultat, {{ $games->count() }}
        </h2>
        <div class="games-search text-sm grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-12">
        @forelse($games as $game)
        <div class="games-search-container mt-8 sm:text-left">
            <a href="{{ route('game.show', $game) }}">
                <img src="{{ asset('storage/images/placeholder.png') }}" alt="game cover" class="w-16 hover:opacity-75 transition ease-in-out duration-150">
            </a>
            <div class="relative inline-block">
                <a class="hover:text-gray-300 underline" href="{{ route('game.show', $game) }}">{{ $game->title }}</a>
                <p>{{ $game->console->name }}</p>
                <div class="text-gray-400 text-sm mt-1">
                    @if($game->sweden_release)
                    <span>
                      <svg class="inline h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><circle cx="256" cy="256" r="256" fill="#ffda44"></circle><path fill="#0052b4" d="M200.3 222.6h309.5A256 256 0 0 0 256 0a256.9 256.9 0 0 0-55.7 6v216.6zm-66.7 0V31.1A256.2 256.2 0 0 0 2.2 222.6h131.4zm0 66.8H2.2a256.2 256.2 0 0 0 131.4 191.5V289.4zm66.7 0v216.5A256.9 256.9 0 0 0 256 512a256 256 0 0 0 253.8-222.6H200.3z"></path></svg>
                      {{ $game->sweden_release }}
                    </span>
                    @endif
                </div>
            </div>
        </div>
    @empty
    <div class="game-container space-y-12 mt-8">
      <div class="rounded-lg shadow-md flex px-6 py-6">
        Inga spel funna
    </div>
</div>
@endforelse
</div>
    </div> <!-- end container -->
@endsection
