@extends('layouts.app')

@section('title', $game->title)

@section('content')
<div class="container mx-auto px-4">
  <div class="game-details border-b border-gray-400 pb-12 flex flex-col lg:flex-row">
    <div class="flex-none">
      <img src="{{ asset('images/placeholder.png') }}" alt="cover">
    </div>
    <div class="lg:ml-12 lg:mr-64">
      <h2 class="font-semibold text-4xl leading-tight mt-1">{{ $game->title }}</h2>
      <div class="text-gray-400">
        <span class="uppercase">{{ $game->console->short ?? 'Okänd konsol' }}</span>
        &middot;
        <span>{{ $game->genre->genre ?? 'Okänd genre' }}</span>
        &middot;
        <span>{{ $game->developer ?? 'Okänd utvecklare' }}</span>
        &middot;
        <span>{{ $game->import ?? 'Okänd importör' }}</span>
      </div>
      <div class="text-gray-400">
        <span>{{ $game->modes ?? 'Okända modes' }}</span>
        &middot;
        <span>Sparfunktion: {{ $game->save }}</span>
      </div>
      <div class="text-gray-400">
        @if($game->sweden_release)
        <span>
          <svg class="inline h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><circle cx="256" cy="256" r="256" fill="#ffda44"/><path fill="#0052b4" d="M200.3 222.6h309.5A256 256 0 0 0 256 0a256.9 256.9 0 0 0-55.7 6v216.6zm-66.7 0V31.1A256.2 256.2 0 0 0 2.2 222.6h131.4zm0 66.8H2.2a256.2 256.2 0 0 0 131.4 191.5V289.4zm66.7 0v216.5A256.9 256.9 0 0 0 256 512a256 256 0 0 0 253.8-222.6H200.3z"/></svg>
          {{ $game->sweden_release }}
        </span>
        @endif

        @if($game->europe_release)
        <span>
          <svg class="inline h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><circle cx="256" cy="256" r="256" fill="#0052b4"/><path fill="#ffda44" d="M256 100.2l8.3 25.5H291l-21.7 15.7 8.3 25.6-21.7-15.8-21.7 15.8 8.3-25.6-21.7-15.7h26.8zm-110.2 45.6l24 12.2 18.9-19-4.2 26.5 23.9 12.2-26.5 4.2-4.2 26.5-12.2-24-26.5 4.3 19-19zM100.2 256l25.5-8.3V221l15.7 21.7 25.6-8.3-15.8 21.7 15.8 21.7-25.6-8.3-15.7 21.7v-26.8zm45.6 110.2l12.2-24-19-18.9 26.5 4.2 12.2-23.9 4.2 26.5 26.5 4.2-24 12.2 4.3 26.5-19-19zM256 411.8l-8.3-25.5H221l21.7-15.7-8.3-25.6 21.7 15.8 21.7-15.8-8.3 25.6 21.7 15.7h-26.8zm110.2-45.6l-24-12.2-18.9 19 4.2-26.5-23.9-12.2 26.5-4.2 4.2-26.5 12.2 24 26.5-4.3-19 19zM411.8 256l-25.5 8.3V291l-15.7-21.7-25.6 8.3 15.8-21.7-15.8-21.7 25.6 8.3 15.7-21.7v26.8zm-45.6-110.2l-12.2 24 19 18.9-26.5-4.2-12.2 23.9-4.2-26.5-26.5-4.2 24-12.2-4.3-26.5 19 19z"/></svg>
          {{ $game->europe_release }}
        </span>
        @endif

        @if($game->japan_release)
        <span>
          <svg class="inline h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><circle cx="256" cy="256" r="256" fill="#eee"/><circle cx="256" cy="256" r="111.3" fill="#d80027"/></svg>
          {{ $game->japan_release }}
        </span>
        @endif

        @if($game->usa_release)
        <span>
          <svg class="inline h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><circle cx="256" cy="256" r="256" fill="#eee"/><path fill="#d80027" d="M244.9 256H512c0-23.1-3-45.5-8.8-66.8H244.9V256zm0-133.6h229.5a257.4 257.4 0 0 0-59-66.7H244.9v66.7zM256 512c60.2 0 115.6-20.8 159.4-55.7H96.6A254.9 254.9 0 0 0 256 512zM37.6 389.6h436.8a254.5 254.5 0 0 0 28.8-66.8H8.8a254.5 254.5 0 0 0 28.8 66.8z"/><path fill="#0052b4" d="M118.6 40h23.3l-21.7 15.7 8.3 25.6-21.7-15.8-21.7 15.8 7.2-22a257.4 257.4 0 0 0-49.7 55.3h7.5l-13.8 10a255.6 255.6 0 0 0-6.2 11l6.6 20.2-12.3-9a253.6 253.6 0 0 0-8.4 20l7.3 22.3H50L28.4 205l8.3 25.5L15 214.6l-13 9.5A258.5 258.5 0 0 0 0 256h256V0c-50.6 0-97.7 14.7-137.4 40zm9.9 190.4l-21.7-15.8-21.7 15.8 8.3-25.5L71.7 189h26.8l8.3-25.5 8.3 25.5h26.8l-21.7 16 8.3 25.5zm-8.3-100l8.3 25.4-21.7-15.7-21.7 15.7 8.3-25.5-21.7-15.7h26.8l8.3-25.6 8.3 25.6h26.8l-21.7 15.7zm100.1 100l-21.7-15.8-21.7 15.8 8.3-25.5-21.7-15.8h26.8l8.3-25.5 8.3 25.5h26.8L212 205l8.3 25.5zm-8.3-100l8.3 25.4-21.7-15.7-21.7 15.7 8.3-25.5-21.7-15.7h26.8l8.3-25.6 8.3 25.6h26.8L212 130.3zm0-74.7l8.3 25.6-21.7-15.8L177 81.3l8.3-25.6L163.5 40h26.8l8.3-25.5L207 40h26.8L212 55.7z"/></svg>
          {{ $game->usa_release }}
        </span>
        @endif
      </div> <!-- end utgivningår -->

      <div class="flex flex-wrap items-center mt-8">
        <div class="flex hidden items-center">
          <div class="w-16 h-16 bg-gray-800 rounded-full">
            <div class="font-semibold text-xs flex justify-center items-center h-full">90%</div>
          </div>
          <div class="ml-4 text-xs">Member <br> Score</div>
        </div>

        <div class="flex hidden items-center ml-12">
          <div class="w-16 h-16 bg-gray-800 rounded-full">
            <div class="font-semibold text-xs flex justify-center items-center h-full">92%</div>
          </div>
          <div class="ml-4 text-xs">Critic <br> Score</div>
        </div>


        <div class="flex items-center space-x-4 mt-4 sm:mt-0 sm:ml-12"> <!-- smol links -->
          @foreach($game->urls as $key => $url)
          <a href="{{ $url->url }}" class="hover:text-gray-400" target="_blank" title="{{ $url->host }}">
            <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
              <svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M4.5 6.5L1.328 9.672a2.828 2.828 0 104 4L8.5 10.5m2-2l3.172-3.172a2.829 2.829 0 00-4-4L6.5 4.5m-2 6l6-6" stroke="currentColor"></path></svg>
            </div>
          </a>
          @endforeach
        </div> <!-- end smol links -->

      </div>
      <p class="mt-8">
        @if($game->description)
          {{ $game->description }}
        @else
          Ingen beskrivning..
        @endif
      </p>
      <div class="mt-8 hidden">
        <button class="flex bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">
          <svg viewBox="0 0 15 15" class="w-6" fill="none" xmlns="http://www.w3.org/2000/svg" ><path d="M6.5 5.5l.248-.434A.5.5 0 006 5.5h.5zm0 4H6a.5.5 0 00.748.434L6.5 9.5zm3.5-2l.248.434a.5.5 0 000-.868L10 7.5zM7.5 14A6.5 6.5 0 011 7.5H0A7.5 7.5 0 007.5 15v-1zM14 7.5A6.5 6.5 0 017.5 14v1A7.5 7.5 0 0015 7.5h-1zM7.5 1A6.5 6.5 0 0114 7.5h1A7.5 7.5 0 007.5 0v1zm0-1A7.5 7.5 0 000 7.5h1A6.5 6.5 0 017.5 1V0zM6 5.5v4h1v-4H6zm.748 4.434l3.5-2-.496-.868-3.5 2 .496.868zm3.5-2.868l-3.5-2-.496.868 3.5 2 .496-.868z" fill="currentColor"></path></svg>
          <span class="ml-2">Play trailer</span>
        </button>
      </div>
    </div> 
  </div> <!-- end game-details -->

  <div class="images-container border-b border-gray-800 pb-12 mt-8 hidden"> <!-- image grid -->
    <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Bilder</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8">
      <div>
        <a href="">
          <img src="{{ asset('images/placeholder.png') }}" alt="screenshot" class="hover:opacity-75 transition ease-in-out duration-150">
        </a>
      </div>
    </div> <!-- end images grid -->

  </div> <!-- end images-container -->
  <div class="similar-games border-b border-gray-800 pb-12 mt-8"> <!-- start similar games -->
    <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Liknande spel</h2>
    @forelse($gamesOfSameGenre as $game)
        <div class="similar-games-container space-y-10 mt-8">
        <div class="game flex">
            <a href="{{ route('game.show', $game) }}">
                <img src="{{ asset('images/placeholder.png') }}" alt="game cover" class="w-16 hover:opacity-75 transition ease-in-out duration-150">
            </a>
            <div class="ml-4">
                <a class="hover:text-gray-300 underline" href="{{ route('game.show', $game) }}">{{ $game->title }}</a> ({{ $game->import }})
            </div>
        </div>
    </div>
      @empty
      <div class="birthday-container space-y-12 mt-8">
          <p>Inga liknande spel funna ¯\_(ツ)_/¯</p>
      </div>
      @endforelse
  </div> <!-- end similar-container -->

  @include('game.partials._iterate_edits')

</div> <!-- end container -->

  @endsection
