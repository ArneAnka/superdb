@extends('layouts.app')

@section('title', $game->title)

@section('content')
    <h1>{{ $game->console }}: {{ $game->title }}</h1>
    <span style="text-decoration: underline solid">Superdb ID:</span> #{{ $game->id }}<br>
    <span style="text-decoration: underline solid">import:</span> {{ $game->import }}<br>
    <span style="text-decoration: underline solid">genre:</span> {{ $game->genre }}<br>
    <span style="text-decoration: underline solid">modes:</span> {{ $game->modes }}<br>
    <span style="text-decoration: underline solid">publisher:</span> {{ $game->publisher }}<br>
    <span style="text-decoration: underline solid">developer:</span> {{ $game->developer }}<br>
    <img src="{{ asset('images/se.png') }}" class="image"><span style="text-decoration: underline solid">sweden_release:</span> {{ $game->sweden_release }}<br>
       <img src="{{ asset('images/eu.png') }}" class="image"> <span style="text-decoration: underline solid">europe_release:</span> {{ $game->europe_release }}<br>
       <img src="{{ asset('images/jp.png') }}" class="image"> <span style="text-decoration: underline solid">japan_release:</span> {{ $game->japan_release }}<br>
       <img src="{{ asset('images/us.png') }}" class="image"> <span style="text-decoration: underline solid">usa_release:</span> {{ $game->usa_release }}<br>
    <span style="text-decoration: underline solid">save:</span> {{ $game->save }}<br>
       @if($game->console == 'snes')
        <span style="text-decoration: underline solid">snes_central:</span> <a href="{{ $game->snes_central ?? 'http://www.google.com' }}">LINK</a><br>
       @endif
    <span style="text-decoration: underline solid">wikipedia_url:</span> <a href="{{ $game->wikipedia_url ?? 'http://www.google.com' }}">LINK</a><br>
    <span style="text-decoration: underline solid">releaser:</span> {{ $game->releases->count() }}<br>
    <span style="text-decoration: underline solid">description:</span> {{ $game->description }}<br>

@endsection
