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
    <img src="{{ asset("images/{$birthday->console->icon_path}") }}" style="width: 15px;"> <a href="{{ route('game.show', $birthday) }}">{{ $birthday->title }}</a> ({{ $birthday->sweden_release }})<br>
@empty
    Inga årsdagar funna för idag :(
@endforelse

<h2><u>Uppdateringar</u></h2>
@can('create', App\Post::class)
    <svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M4.5 6.995H4v1h.5v-1zm6 1h.5v-1h-.5v1zm-6 1.998H4v1h.5v-1zm6 1.007h.5v-1h-.5v1zm-6-7.003H4v1h.5v-1zM8.5 5H9V4h-.5v1zm2-4.5l.354-.354L10.707 0H10.5v.5zm3 3h.5v-.207l-.146-.147-.354.354zm-9 4.495h6v-1h-6v1zm0 2.998l6 .007v-1l-6-.007v1zm0-5.996L8.5 5V4l-4-.003v1zm8 9.003h-10v1h10v-1zM2 13.5v-12H1v12h1zM2.5 1h8V0h-8v1zM13 3.5v10h1v-10h-1zM10.146.854l3 3 .708-.708-3-3-.708.708zM2.5 14a.5.5 0 01-.5-.5H1A1.5 1.5 0 002.5 15v-1zm10 1a1.5 1.5 0 001.5-1.5h-1a.5.5 0 01-.5.5v1zM2 1.5a.5.5 0 01.5-.5V0A1.5 1.5 0 001 1.5h1z" fill="currentColor"></path></svg> <a href="{{ route('post.create') }}">Nytt inlägg</a>
@endcan

@forelse($posts as $post)
<div>
    <p style="margin-bottom: 0px"><b><u>Inlagd av {{ $post->user->name }}, {{ $post->created_at->toRfc850String() }}</u></b></p>
@markdown
{{ $post->body }}
@endmarkdown
    <p>
        @can('update', $post)
            <small>
                <a href="{{ route('post.edit', $post) }}">Ändra</a>
            </small>
        @endcan

        @can('delete', $post)
        <small>
            <a href="{{ route('post.delete', $post) }}">Radera</a>
        </small>
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
