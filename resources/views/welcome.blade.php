@extends('layouts.app')

@section('title', 'välkommen')

@section('content')
<h1>superdb.cc 🍻</h1>
<h3>Databas över Nintendo titlar till NES, SNES, N64, NGC, GBA och GBC</h3>

<div class="toast toast-primary">
    Observera att databasen gör ett försök till att enbart innehålla titlar utgivna i Norden.
</div>

<ul>
@foreach($games_count as $console)
<li>
    <a href="{{ route($console->short) }}">{{ $console->name }}</a>, {{ $console->games_count }} titlar
</li>
@endforeach
</ul>

<p>
    Antal rader: {{ $all_games_count }} <br>
    Genomsnittlig radlängd: 2858 <br>
    Dumpad databasstorlek: 3,5M <br>
</p>

<h2><u>De 10 senaste ändringarna i speldatabasen</u></h2>
@forelse($games_history as $game)
    <img src="{{ asset("images/{$game->console->icon_path}") }}" style="width: 15px;"> <a href="{{ route('game.show', $game) }}">{{ $game->title }}</a> ({{ $game->updated_at->diffForHumans() }})<br>
@empty
    Inga ändringar gjorda...
@endforelse

<h2><u>Årsdagar 🎂</u></h2>
@forelse($birthdays as $birthday)
    <img src="{{ asset("images/{$game->console->icon_path}") }}" style="width: 15px;"> <a href="{{ route('game.show', $birthday) }}">{{ $birthday->title }}</a> ({{ $birthday->sweden_release }})<br>
@empty
    Inga årsdagar funna för idag :(
@endforelse

<h2><u>Uppdateringar</u></h2>
@can('create', App\Post::class)
    <a href="{{ route('post.create') }}">Nytt inlägg</a>
@endcan

@forelse($posts as $post)
<div>
    <p style="margin-bottom: 0px"><b><u>{{ $post->created_at->toRfc850String() }}</u></b></p>
    <p style="margin-top: 0px;">{{ $post->body }} <br>//{{ $post->user->name }}</p>
    <p>
        @can('update', $post)
            <a href="{{ route('post.edit', $post) }}">Ändra</a>
        @endcan

        @can('delete', $post)
            <a href="{{ route('post.delete', $post) }}">Radera</a>
        @endcan
    </p>
<hr>
@empty
Inga inlägg
@endforelse
<p>
    <a href="mailto:info@superdb.cc">info@superdb.cc</a>
</p>
@endsection
