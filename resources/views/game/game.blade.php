@extends('layouts.app')

@section('title', $game->title)

@section('content')
<h1>{{ $game->console }}: {{ $game->title }}</h1>
    <span style="text-decoration: underline solid">Tillagd:</span> {{ $game->created_at->diffForhumans() }} ({{ $game->created_at }})<br>
    <span style="text-decoration: underline solid">Senaste uppdaterad:</span> {{ $game->updated_at->diffForHumans() }} ({{ $game->updated_at }})<br>

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


@can('update')
  edit
@endcan

@endsection
