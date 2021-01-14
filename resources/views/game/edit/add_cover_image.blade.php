@extends('layouts.app')

@section('title', $game->title . ' - Lägg till länk')

@section('content')
<div class="container mx-auto px-4">
  <div class="w-full">
    <h2 class="text-xl text-blue-500 uppercase tracking-wide font-semibold mb-2">
        Lägg till visningsbild för "<a class="underline" href="{{ route('game.show', $game) }}">{{ $game->title }}</a>"
    </h2>
         <form action="{{ route('game.cover.store', $game) }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="rounded">
            <div>
              <label class="" for="GameCoverImage">Ladda upp en bild</label>
            </div>
              <div>
                <input type="file" name="game_cover_image" id="GameCoverImage">
              </div>
          </div>
          @error('game_cover_image')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
          <div>
            <input type="submit" class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" value="Ladda upp bild">
          </div>
        </form>

      <div class="grid grid-cols-1 grid-cols-2 lg:grid-cols-3 gap-10 mt-8">
      @if(!empty($game->cover_image))
          <div class="w-64 md:w-auto">
            <h2 class="text-blue-500">Nuvarande: </h2>
            <div>
              <img class="shadow-md over:opacity-75 transition ease-in-out duration-150 rounded-md" src="{{ $game->cover_image }}" alt="{{ $game->title }}">
            </div>
            <div>
                <a class="text-red-500" href="{{ route('game.cover.destroy', $game) }}">radera</a>
            </div>
          </div>
      @endif
      </div> <!-- end images grid -->
    </div> <!-- end w-full -->
</div> <!-- end container -->
@endsection
