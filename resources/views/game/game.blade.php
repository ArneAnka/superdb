@extends('layouts.app')

@section('title', $game->title)

@section('content')
<div class="container mx-auto px-4">
  <div class="game-details border-b border-gray-400 pb-12 flex flex-col md:flex-row lg:flex-row">
    <div class="flex-none"> <!-- image -->
      <div class="relative inline-block">
      <a href="{{ asset('storage/images/games/covers/' . str_replace('thumb_', '', basename($game->cover_image))) }}">
        <img src="{{ $game->cover_image }}" alt="{{ $game->title }}">
      </a>
        <a class="" href="{{ route('game.cover.create', [$game]) }}">
          <svg class="object-none object-right absolute right-1 top-1" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="22" height="22"><path d="M4.5 8.5l-.354-.354L4 8.293V8.5h.5zm4-4l.354-.354a.5.5 0 00-.708 0L8.5 4.5zm2 2l.354.354a.5.5 0 000-.708L10.5 6.5zm-4 4v.5h.207l.147-.146L6.5 10.5zm-2 0H4a.5.5 0 00.5.5v-.5zm3 3.5A6.5 6.5 0 011 7.5H0A7.5 7.5 0 007.5 15v-1zM14 7.5A6.5 6.5 0 017.5 14v1A7.5 7.5 0 0015 7.5h-1zM7.5 1A6.5 6.5 0 0114 7.5h1A7.5 7.5 0 007.5 0v1zm0-1A7.5 7.5 0 000 7.5h1A6.5 6.5 0 017.5 1V0zM4.854 8.854l4-4-.708-.708-4 4 .708.708zm3.292-4l2 2 .708-.708-2-2-.708.708zm2 1.292l-4 4 .708.708 4-4-.708-.708zM6.5 10h-2v1h2v-1zm-1.5.5v-2H4v2h1z" fill="currentColor"></path></svg>
        </a>
      </div>
    </div> <!-- /image -->
    <div class="ml-4 md:ml-4 lg:ml-12 lg:mr-64">
      <h2 class="font-semibold text-4xl leading-tight mt-1">
        {{ $game->title }}
        @auth
          <a class="hover:text-gray-400" href="{{ route('game.show.edit', $game) }}"><svg class="inline" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M4.5 8.5l-.354-.354L4 8.293V8.5h.5zm4-4l.354-.354a.5.5 0 00-.708 0L8.5 4.5zm2 2l.354.354a.5.5 0 000-.708L10.5 6.5zm-4 4v.5h.207l.147-.146L6.5 10.5zm-2 0H4a.5.5 0 00.5.5v-.5zm3 3.5A6.5 6.5 0 011 7.5H0A7.5 7.5 0 007.5 15v-1zM14 7.5A6.5 6.5 0 017.5 14v1A7.5 7.5 0 0015 7.5h-1zM7.5 1A6.5 6.5 0 0114 7.5h1A7.5 7.5 0 007.5 0v1zm0-1A7.5 7.5 0 000 7.5h1A6.5 6.5 0 017.5 1V0zM4.854 8.854l4-4-.708-.708-4 4 .708.708zm3.292-4l2 2 .708-.708-2-2-.708.708zm2 1.292l-4 4 .708.708 4-4-.708-.708zM6.5 10h-2v1h2v-1zm-1.5.5v-2H4v2h1z" fill="currentColor"></path></svg></a>
        @else
          <a class="hover:text-gray-400" href="{{ route('game.show.edit', $game) }}"><svg class="inline" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M4.5 6.5v-3a3 3 0 016 0v3m-8 0h10a1 1 0 011 1v6a1 1 0 01-1 1h-10a1 1 0 01-1-1v-6a1 1 0 011-1z" stroke="currentColor"></path></svg></a>
        @endauth
      </h2>
      <div class="text-gray-400">
        <span class="uppercase">{{ $game->console->short ?? 'Okänd konsol' }}</span>
        &middot;
        <span>{{ $game->genre->genre ?? 'Okänd genre' }}</span>
        &middot;
        <!-- Developer ex Nintendo -->
        @forelse($game->developers as $developer)
          <span>
            <a class="underline" href="{{ route('developer.show', $developer) }}">{{ $developer->name }}</a>@if(!$loop->last),@endif
          </span>
        @empty
          <span>Okänd utvecklare</span>
        @endforelse
        &middot;
        <span>{{ $game->import ?? 'Okänd importör' }}</span>
      </div>
      <div class="text-gray-400">
      <!-- Modes ex. single-player -->
        @forelse($game->MODES as $mode)
          <span>{{ $mode->mode }}@if(!$loop->last),@endif</span>
        @empty
          <span>Okänt mode</span>
        @endforelse
        &middot;
        <span>Sparfunktion: {{ $game->save }}</span>
      </div>
      <div class="text-gray-400 flex flex-col md:flex-row mt-2">
        @if($game->sweden_release)
        <span class="mr-2">
          <svg class="inline h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><circle cx="256" cy="256" r="256" fill="#ffda44"/><path fill="#0052b4" d="M200.3 222.6h309.5A256 256 0 0 0 256 0a256.9 256.9 0 0 0-55.7 6v216.6zm-66.7 0V31.1A256.2 256.2 0 0 0 2.2 222.6h131.4zm0 66.8H2.2a256.2 256.2 0 0 0 131.4 191.5V289.4zm66.7 0v216.5A256.9 256.9 0 0 0 256 512a256 256 0 0 0 253.8-222.6H200.3z"/></svg>
          {{ $game->sweden_release }}
        </span>
        @endif

        @if($game->europe_release)
        <span class="mr-2">
          <svg class="inline h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><circle cx="256" cy="256" r="256" fill="#0052b4"/><path fill="#ffda44" d="M256 100.2l8.3 25.5H291l-21.7 15.7 8.3 25.6-21.7-15.8-21.7 15.8 8.3-25.6-21.7-15.7h26.8zm-110.2 45.6l24 12.2 18.9-19-4.2 26.5 23.9 12.2-26.5 4.2-4.2 26.5-12.2-24-26.5 4.3 19-19zM100.2 256l25.5-8.3V221l15.7 21.7 25.6-8.3-15.8 21.7 15.8 21.7-25.6-8.3-15.7 21.7v-26.8zm45.6 110.2l12.2-24-19-18.9 26.5 4.2 12.2-23.9 4.2 26.5 26.5 4.2-24 12.2 4.3 26.5-19-19zM256 411.8l-8.3-25.5H221l21.7-15.7-8.3-25.6 21.7 15.8 21.7-15.8-8.3 25.6 21.7 15.7h-26.8zm110.2-45.6l-24-12.2-18.9 19 4.2-26.5-23.9-12.2 26.5-4.2 4.2-26.5 12.2 24 26.5-4.3-19 19zM411.8 256l-25.5 8.3V291l-15.7-21.7-25.6 8.3 15.8-21.7-15.8-21.7 25.6 8.3 15.7-21.7v26.8zm-45.6-110.2l-12.2 24 19 18.9-26.5-4.2-12.2 23.9-4.2-26.5-26.5-4.2 24-12.2-4.3-26.5 19 19z"/></svg>
          {{ $game->europe_release }}
        </span>
        @endif

        @if($game->japan_release)
        <span class="mr-2">
          <svg class="inline h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><circle cx="256" cy="256" r="256" fill="#eee"/><circle cx="256" cy="256" r="111.3" fill="#d80027"/></svg>
          {{ $game->japan_release }}
        </span>
        @endif

        @if($game->usa_release)
        <span class="mr-2">
          <svg class="inline h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><circle cx="256" cy="256" r="256" fill="#eee"/><path fill="#d80027" d="M244.9 256H512c0-23.1-3-45.5-8.8-66.8H244.9V256zm0-133.6h229.5a257.4 257.4 0 0 0-59-66.7H244.9v66.7zM256 512c60.2 0 115.6-20.8 159.4-55.7H96.6A254.9 254.9 0 0 0 256 512zM37.6 389.6h436.8a254.5 254.5 0 0 0 28.8-66.8H8.8a254.5 254.5 0 0 0 28.8 66.8z"/><path fill="#0052b4" d="M118.6 40h23.3l-21.7 15.7 8.3 25.6-21.7-15.8-21.7 15.8 7.2-22a257.4 257.4 0 0 0-49.7 55.3h7.5l-13.8 10a255.6 255.6 0 0 0-6.2 11l6.6 20.2-12.3-9a253.6 253.6 0 0 0-8.4 20l7.3 22.3H50L28.4 205l8.3 25.5L15 214.6l-13 9.5A258.5 258.5 0 0 0 0 256h256V0c-50.6 0-97.7 14.7-137.4 40zm9.9 190.4l-21.7-15.8-21.7 15.8 8.3-25.5L71.7 189h26.8l8.3-25.5 8.3 25.5h26.8l-21.7 16 8.3 25.5zm-8.3-100l8.3 25.4-21.7-15.7-21.7 15.7 8.3-25.5-21.7-15.7h26.8l8.3-25.6 8.3 25.6h26.8l-21.7 15.7zm100.1 100l-21.7-15.8-21.7 15.8 8.3-25.5-21.7-15.8h26.8l8.3-25.5 8.3 25.5h26.8L212 205l8.3 25.5zm-8.3-100l8.3 25.4-21.7-15.7-21.7 15.7 8.3-25.5-21.7-15.7h26.8l8.3-25.6 8.3 25.6h26.8L212 130.3zm0-74.7l8.3 25.6-21.7-15.8L177 81.3l8.3-25.6L163.5 40h26.8l8.3-25.5L207 40h26.8L212 55.7z"/></svg>
          {{ $game->usa_release }}
        </span>
        @endif
      </div> <!-- end utgivningår -->

      <div class="flex flex-wrap items-center mt-1">
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


        <div class="flex items-center space-x-4 mt-2 sm:mt-0 sm:ml-12"> <!-- smol links -->
          @foreach($game->urls as $key => $url)
          <a href="{{ $url->url }}" class="hover:text-gray-400" target="_blank" title="{{ $url->host }}">
            <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
              <svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M4.5 6.5L1.328 9.672a2.828 2.828 0 104 4L8.5 10.5m2-2l3.172-3.172a2.829 2.829 0 00-4-4L6.5 4.5m-2 6l6-6" stroke="currentColor"></path></svg>
            </div>
          </a>
          @endforeach
            <div class="w-8 h-8 flex justify-center items-center">
              <a href="{{ route('game.create.url', $game) }}" class="hover:text-gray-400" title="Lägg till länk">
                <svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M7.5 4v7M4 7.5h7m-3.5 7a7 7 0 110-14 7 7 0 010 14z" stroke="currentColor"></path></svg>
              </a>
            </div>
        </div> <!-- end smol links -->

      </div>
      <p class="mt-8">
        @if($game->description)
          {{ $game->description }}
        @else
          <i>Beskrivning saknas.</i>
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

  <div class="images-container border-b border-gray-800 pb-12 mt-8"> <!-- image grid -->
    <h2 class="text-blue-500 uppercase tracking-wide font-semibold flex items-center">
    <span class="">Bilder</span>&nbsp;
    <span class="inline"><a href="{{ route('game.create.image', $game) }}" class="hover:text-gray-400" title="Lägg till länk">
        <svg class="" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M7.5 4v7M4 7.5h7m-3.5 7a7 7 0 110-14 7 7 0 010 14z" stroke="currentColor"></path></svg>
      </a></span>
    </h2>
    <div class="grid grid-cols-1 grid-cols-2 lg:grid-cols-3 gap-10 mt-8">
        @forelse($game->images as $key => $image)
        <div class="w-64 md:w-auto ">
          <a href="{{ asset('storage/images/games/'.$image->full) }}" class="">
            <img class="shadow-md over:opacity-75 transition ease-in-out duration-150 rounded-md" src="{{ asset('storage/images/games/thumbs/'.$image->thumb) }}" alt="{{ $image->full }}">
          </a>
        </div>
        @empty
          Inga bilder
        @endforelse
    </div> <!-- end images grid -->
  </div> <!-- end images-container -->

  <div class="releases-container border-b border-gray-800 pb-12 mt-8"> <!-- Releases grid -->
    <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Releaser</h2>
    <div class="flex-col gap-12 mt-8">
      <div>
      @auth
        @forelse($game->releases as $release)
          <!-- This example requires Tailwind CSS v2.0+ -->
          <div class="bg-gray-100 shadow overflow-hidden sm:rounded-lg mb-4">
            <div class="px-4 py-5 sm:px-6">
              <h3 class="text-lg leading-6 font-medium text-gray-900">
                <p class="text-xl underline">Release {{ $release->release }} <a href="{{ route('game.release.edit', [$game, $release]) }}" class="underline">(ändra)</a></p>
                <p>Bilder: {{ $release->images->count() }}</p>
                <p>Kommentarer: <a class="underline" href="{{ route('game.release.comment.index', [$game, $release]) }}">{{ $release->comments->count() }}</a></p>
              </h3>
            </div>
            <div class="border-t border-gray-200 text-black px-4 pb-2">
            <p><span class="underline">Special:</span> {{ $release->special }}</p>
            <p><span class="underline">Box:</span> {{ $release->box }}</p>
            <p><span class="underline">Kasett:</span> {{ $release->cartridge }}</p>
            <p><span class="underline">Inner box:</span> {{ $release->inner_box }}</p>
              @forelse($release->misc as $key => $misc)
                <p><span class="underline">{{ $key }}:</span> {{ $misc }}</p>
              @empty
                Ingen övrig data
              @endforelse
            </div>
          </div>
        @empty
          Ingen data
        @endforelse 
        @else
          <a class="underline" href="{{ route('login') }}">Logga in</a> för att se {{ count($game->releases) }} releaser till {{ $game->title }}
        @endauth
      </div>
    </div> <!-- end images grid -->
  </div> <!-- end images-container -->

<div class="similar pb-8 mt-8"> <!-- start similar games -->
  <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
    Andra spel i genre "{{ $game->genre->genre }}"
  </h2>
  @if($gamesOfSameGenre->isNotEmpty())
    <div class="text-sm grid grid-cols-3 md:grid-cols-5 lg:grid-cols-7 pb-8 border-b border-gray-400">
      @foreach($gamesOfSameGenre as $gameGenre)
          <div class="game mt-5 text-left ml-5">
              <div class="relative inline-block">
                <a href="{{ route('game.show', $gameGenre) }}" class="flex-shrink-0">
                    <img src="{{ asset('storage/images/placeholder.png') }}" alt="game cover" class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                </a>
                <div class="flex flex-col">
                    <a class="hover:opacity-75 transition ease-in-out duration-150 underline" href="{{ route('game.show', $gameGenre) }}">{{ $gameGenre->title }}</a>
                    <span class="text-gray-400">{{ $gameGenre->import }}</span>
                </div>
          </div>
      </div>
        @endforeach
    </div> <!-- end similar-container -->
    @endif
    @if($gamesOfSameGenre->isEmpty())
        <div class="similar-games-container space-y-12 border-b border-gray-400 pb-8">
            <p>Inga liknande spel funna ¯\_(ツ)_/¯</p>
        </div>
    @endif
    </div> <!-- end simililar games -->

  <div class="comments-container"> <!-- comments  -->
    <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Kommentarer, {{ $game->comments->count() }}</h2>
  @forelse($game->comments as $comment)
<!-- kommentar början -->
<div class="flex mb-4 mt-4">
    <img class="h-10 w-10 rounded-full" src="{{ $comment->user->avatar }}" alt="avatar">
    <div class="ml-4">
        <div class="flex items-center">
            <div class="font-semibold"><a class="underline" href="{{ route('user.show', $comment->user) }}">{{ $comment->user->name }}</a></div>
            <div class="text-gray-500 ml-2">{{ $comment->created_at->diffForHumans() }}</div>
        </div>
        <div class="text-gray-700 mt-2">{{ $comment->body }}</div>
    @can('delete', $comment)
      <small class="flex mt-4">
          <svg class="mr-2 inline" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M4.5 3V1.5a1 1 0 011-1h4a1 1 0 011 1V3M0 3.5h15m-13.5 0v10a1 1 0 001 1h10a1 1 0 001-1v-10M7.5 7v5m-3-3v3m6-3v3" stroke="currentColor"></path></svg> <a class="underline" href="{{ route('game.destory.comment', [$game, $comment]) }}">Radera</a>
      </small>
    @endcan
    </div>
</div> 
<!-- kommentar slut -->
  @empty
    <p>Än så länge inga kommentarer.</p>
  @endforelse

      @auth
      <form method="POST" action="{{ route('game.save.comment', $game) }}">
        {{ csrf_field() }}
        {{ method_field('POST') }}
      <div class="flex flex-wrap mx-0 mb-6">
        <div class="w-full px-3">
          <label for="body" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Kommentera</label>
          <textarea id="body" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="body" rows="5" cols="100" autocomplete="off" placeholder="Din kommenter här.">{{ old('body') }}</textarea>

          @error('body')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
        </div>
      </div>
      <div class="flex flex-wrap mx-0 mb-6">
        <div class="w-full px-3">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Skicka</button>
        </div>
      </div>
      </form>
    @endauth

    @guest
    <p class="mt-8">
    <a href="{{ route('login') }}">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Logga in för att kommentera
      </button>
      </a>
    </p>
    @endguest
  </div> <!-- end comments-container -->

  @include('game.partials._iterate_edits')

</div> <!-- end container -->

  @endsection
