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
    <img src="{{ asset('images/se.png') }}" class="image"> <span style="">sweden_release:</span> {{ $game->sweden_release }}
  </li>
  <li class="list-element">
   <img src="{{ asset('images/eu.png') }}" class="image"> <span style="">europe_release:</span> {{ $game->europe_release }}
 </li>
 <li class="list-element">
   <img src="{{ asset('images/jp.png') }}" class="image"> <span style="">japan_release:</span> {{ $game->japan_release }}
 </li>
 <li class="list-element">
   <img src="{{ asset('images/us.png') }}" class="image"> <span style="">usa_release:</span> {{ $game->usa_release }}
 </li>
  <li class="list-element">
    <span style="">genre:</span> {{ $game->genre }}
  </li>
  <li class="list-element">
    <span style="">modes:</span> {{ $game->modes }}
  </li>
 <li class="list-element">
  <span style="">save:</span> {{ $game->save }}
</li>
 @if($game->console == 'snes')
 <li class="list-element">
  <span style="">snes_central:</span> <a href="{{ $game->snes_central ?? 'http://www.google.com' }}">LINK</a>
</li>
 @endif
 <li class="list-element">
  <span style="">wikipedia_url:</span> <a href="{{ $game->wikipedia_url ?? "https://www.google.com/search?q=" . $game->title . "+wikipedia+" .  $game->console }}">LINK</a>
</li>
<li class="list-element">
  <span style="">releaser:</span> {{ $game->releases->count() }}
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
      Superdb ID: #{{ $release->id }}<br>
      release: {{ $release->release }}<br>
      manual: {{ $release->manual }}<br>
      box: {{ $release->box }}<br>
      cartridge_front: {{ $release->cartridge_front }}<br>
      special: {{ $release->special }}<br>
      @foreach(json_decode($release->misc) as $key => $text)
        {{ $key }}: {{ $text }}<br>
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
  <p><u>{{ $item->user->name }}</u> ändrade <u>{{ $item->changed_column }}</u> till: "{{ $item->changed_value_to }}" den {{ $item->created_at }} </p>
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
  Verkar tomt här...
@endforelse

@endsection
