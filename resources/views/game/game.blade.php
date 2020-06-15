@extends('layouts.app')

@section('title', $game->title)
<link href='https://css.gg/calendar-today.css' rel='stylesheet'>
<link href='https://css.gg/info.css' rel='stylesheet'>
<link href='https://css.gg/file-document.css' rel='stylesheet'>
@section('css')
@endsection

@section('content')
<h1 style="margin-bottom: 5px;">{{ $game->console }}: {{ $game->title }}</h1>
<i class="gg-calendar-today" style="display: inline-flex;"></i> <span style="text-decoration: underline solid">Tillagd:</span> {{ $game->created_at->diffForhumans() }} ({{ $game->created_at }})<br>
<i class="gg-calendar-today" style="display: inline-flex;"></i> <span style="text-decoration: underline solid">Senaste uppdaterad:</span> {{ $game->updated_at->diffForHumans() }} ({{ $game->updated_at }})<br>

<ul class="list">
  <li class="list-element">
    <span style="">Superdb ID:</span> #{{ $game->id }}
  </li>
  <li class="list-element">
    <span style="">import:</span> {{ $game->import }}
  </li>
  <li class="list-element">
    <span style="">publisher:</span> {{ $game->publisher }}
  </li>
  <li class="list-element">
    <span style="">developer:</span> {{ $game->developer }}
  </li>
  <li class="list-element">
    <img src="{{ asset('images/se.png') }}" class="image"> <span style="">Sweden release:</span> {{ $game->sweden_release }}
  </li>
  <li class="list-element">
   <img src="{{ asset('images/eu.png') }}" class="image"> <span style="">Europe release:</span> {{ $game->europe_release }}
 </li>
 <li class="list-element">
   <img src="{{ asset('images/jp.png') }}" class="image"> <span style="">Japan release:</span> {{ $game->japan_release }}
 </li>
 <li class="list-element">
   <img src="{{ asset('images/us.png') }}" class="image"> <span style="">Usa release:</span> {{ $game->usa_release }}
 </li>
  <li class="list-element">
    <span style="">genre:</span> {{ $game->genre->genre }}
  </li>
  <li class="list-element">
    <span style="">modes:</span> {{ $game->modes }}
  </li>
 <li class="list-element">
  <span style="">save:</span> {{ $game->save }}
</li>
@forelse($game->urls as $key => $url)
  <li class="list-element">
    <span style="">{{ $url->host }}</span> <a href="{{ $url->url }}">LINK</a>
  </li>
@empty
<li class="list-element">
  <a href="https://www.google.com/search?q={{ $game->title }} wikipedia {{ $game->console }}">googla</a>
</li>
@endforelse

<li class="list-element">
  <span style="">release count:</span> {{ $game->releases->count() }}
</li>
<li class="list-element">
  <span style="">description:</span> {{ $game->description }}  
</li>
</ul>

@if(!$game->releases->isEmpty())
  @guest
    <i class="gg-info" style="display: inline-flex;"></i> <a href="{{ route('login') }}">Logga in</a> för att se releaser.
  @endguest
  @auth
  <h3>Releaser:</h3>
    @foreach($game->releases as $release)
      <u>Superdb ID</u>: #{{ $release->id }}<br>
      <u>release</u>: {{ $release->release }}<br>
      <u>manual</u>: {{ $release->manual }}<br>
      <u>box</u>: {{ $release->box }}<br>
      <u>cartridge_front</u>: {{ $release->cartridge_front }}<br>
      <u>special</u>: {{ $release->special }}<br>
      @foreach(json_decode($release->misc) as $key => $text)
        <u>{{ $key }}</u>: {{ $text }}<br>
      @endforeach
      <hr>
      <br>
    @endforeach
  @endauth
@else
  <p>Inga registrerade releaser</p>
@endif

@if(!$game->history->isEmpty())
<h3>Ändringar i databasen för "{{ $game->title }}"</h3>
@endif

@forelse($game->history as $item)
@include('game.partials.edits._' . $item->changed_column, $item)
     @if($loop->last)
         <hr>
     @endif
@empty
  <p><i class="gg-info" style="display: inline-flex;"></i> Inga ändringar för detta spel.</p>
@endforelse

@can('update', $game)
  <p><i class="gg-file-document" style="display: inline-flex;"></i> <a href="{{ route('game.show.edit', $game) }}">edit</a>
@endcan

<h3 style="margin-bottom: 0px;">Andra spel i samma genre</h3>
@forelse($gamesOfSameGenre as $game)
    <p><a href="{{ route('game.show', $game) }}">{{ $game->title }}</a> ({{ $game->import }})</p>
@empty
  Inga andra spel i samma genre funnet.
@endforelse

@endsection
