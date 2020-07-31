@extends('layouts.app')

@section('title', $game->title)

@section('css')
@endsection

@section('content')
<h1 style="margin-bottom: 5px;">
  <img src="{{ asset("images/{$game->console->icon_path}") }}">
  {{ $game->console->name }}: {{ $game->title }}
</h1>

<svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M3.5 0v5m8-5v5M5 8.5l2 2 3.5-4m-9-4h12a1 1 0 011 1v10a1 1 0 01-1 1h-12a1 1 0 01-1-1v-10a1 1 0 011-1z" stroke="currentColor"></path></svg> <span style="text-decoration: underline solid">Tillagd:</span> {{ $game->created_at->diffForhumans() }} ({{ $game->created_at }})<br>

<svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M3.5 0v5m8-5v5m-4 1v5M5 8.5h5m-8.5-6h12a1 1 0 011 1v10a1 1 0 01-1 1h-12a1 1 0 01-1-1v-10a1 1 0 011-1z" stroke="currentColor"></path></svg> <span style="text-decoration: underline solid">Senaste uppdaterad:</span> {{ $game->updated_at->diffForHumans() }} ({{ $game->updated_at }})<br>

<ul class="list">
  <li class="list-element">
    <span style="">
      <b>Superdb ID:</b>&nbsp;
    </span> #{{ $game->id }}
  </li>
  <li class="list-element">
    <span style="">
      <b>Import:</b>&nbsp;
    </span> {{ $game->import }}
  </li>
  <li class="list-element">
    <span style="">
      <b>Publisher:</b>&nbsp;
    </span> {{ $game->publisher }}
  </li>
  <li class="list-element">
    <span style="">
      <b>Developer:</b>&nbsp;
    </span> {{ $game->developer }}
  </li>
  <li class="list-element">
    <img src="{{ asset('images/se.png') }}" class="image"> <span style="">
      <b>Sweden release:</b>&nbsp;
    </span> {{ $game->sweden_release }}
  </li>
  <li class="list-element">
   <img src="{{ asset('images/eu.png') }}" class="image"> <span style="">
    <b>Europe release:</b>&nbsp;
  </span> {{ $game->europe_release }}
 </li>
 <li class="list-element">
   <img src="{{ asset('images/jp.png') }}" class="image"> <span style="">
    <b>Japan release:</b>&nbsp;
  </span> {{ $game->japan_release }}
 </li>
 <li class="list-element">
   <img src="{{ asset('images/us.png') }}" class="image"> <span style="">
    <b>Usa release:</b>&nbsp;
  </span> {{ $game->usa_release }}
 </li>
  <li class="list-element">
    <span style="">
      <b>Genre:</b>&nbsp;
    </span> {{ $game->genre->genre }}
  </li>
  <li class="list-element">
    <span style="">
      <b>Modes:</b>&nbsp;
    </span> {{ $game->modes }}
  </li>
 <li class="list-element">
  <span style="">
    <b>Save:</b>&nbsp;
  </span> {{ $game->save }}
</li>
@forelse($game->urls as $key => $url)
  <li class="list-element">
    <span style="">
      <b>{{ $url->host }}</b>&nbsp;
    </span>: <a href="{{ $url->url }}" target="_blank">LINK</a>
  </li>
@empty
<li class="list-element">
  <a href="https://www.google.com/search?q={{ str_replace(' ', '+', $game->title) }}+{{ str_replace(' ', '+', $game->console->name) }} wikipedia video game" target="_blank">googla</a>
</li>
@endforelse

<li class="list-element">
  <span style="">
    <b>Antal releaser:</b>&nbsp;
  </span> {{ $game->releases->count() }}
</li>
<li class="list-element">
  <span style="">
    <b>Description:</b>&nbsp;
  </span> {{ $game->description }}  
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
  <p><svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M7 4.5V5h1v-.5H7zm1-.01v-.5H7v.5h1zM8 11V7H7v4h1zm0-6.5v-.01H7v.01h1zM6 8h1.5V7H6v1zm0 3h3v-1H6v1zM7.5 1A6.5 6.5 0 0114 7.5h1A7.5 7.5 0 007.5 0v1zM1 7.5A6.5 6.5 0 017.5 1V0A7.5 7.5 0 000 7.5h1zM7.5 14A6.5 6.5 0 011 7.5H0A7.5 7.5 0 007.5 15v-1zm0 1A7.5 7.5 0 0015 7.5h-1A6.5 6.5 0 017.5 14v1z" fill="currentColor"></path></svg> Inga ändringar för detta spel.</p>
@endforelse

@can('update', $game)
  <p><svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M.5 9.5l-.354-.354L0 9.293V9.5h.5zm9-9l.354-.354a.5.5 0 00-.708 0L9.5.5zm5 5l.354.354a.5.5 0 000-.708L14.5 5.5zm-9 9v.5h.207l.147-.146L5.5 14.5zm-5 0H0a.5.5 0 00.5.5v-.5zm.354-4.646l9-9-.708-.708-9 9 .708.708zm8.292-9l5 5 .708-.708-5-5-.708.708zm5 4.292l-9 9 .708.708 9-9-.708-.708zM5.5 14h-5v1h5v-1zm-4.5.5v-5H0v5h1zM6.146 3.854l5 5 .708-.708-5-5-.708.708zM8 15h7v-1H8v1z" fill="currentColor"></path></svg> <a href="{{ route('game.show.edit', $game) }}">edit</a>
@endcan

<h3 style="margin-bottom: 0px;">Andra spel i samma genre</h3>
@forelse($gamesOfSameGenre as $game)
    <p><a href="{{ route('game.show', $game) }}">{{ $game->title }}</a> ({{ $game->import }})</p>
@empty
  Inga andra spel i samma genre funnet.
@endforelse

@endsection
