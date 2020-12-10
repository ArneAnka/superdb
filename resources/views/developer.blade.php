@extends('layouts.app')

@section('title', 'Developer')

@section('content')
<div class="container mx-auto px-4">
    <div class="space-y-5">
        <h2 class="text-xl text-blue-500 uppercase tracking-wide font-semibold">
            {{ $developer->name }} ({{ count($developer->games) }})
        </h2>
        <p>{{ $developer->description }}</p>

        <ul class="list-disc list-inside">
            @foreach($grouped as $key => $games)
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
                    {{ $key }}
                </h2>
                <ul class="list-disc list-inside mb-4">
                    @foreach($games as $game)
                        <li>
                            <a class="underline" href="{{ route('game.show', $game) }}">{{ $game->title }}</a>
                        </li>
                    @endforeach
                </ul>
            @endforeach
        </ul>

    </div> <!-- end container -->
</div>
@endsection


