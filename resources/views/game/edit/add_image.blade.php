@extends('layouts.app')

@section('title', $game->title . ' - Lägg till länk')

@section('content')
<div class="container mx-auto px-4">
  <div class="w-full">
    <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
        Lägg till länk för "<a class="underline" href="{{ route('game.show', $game) }}">{{ $game->title }}</a>
    </h2>
         <form action="{{ route('game.image_upload', $game) }}" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="GameLandingPageIamge">File input</label>
                <input type="file" name="game_image" id="GameLandingPageIamge">
            </div>
            @error('game_image')
                  <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
            {{ csrf_field() }}
                <input type="submit" class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" value="Ladda upp bild">
        </form>

      <div class="grid grid-cols-1 grid-cols-2 lg:grid-cols-3 gap-10 mt-8">
          @forelse($game->images as $key => $image)
          <div class="w-64 md:w-auto ">
            <div>
              <img class="shadow-md over:opacity-75 transition ease-in-out duration-150 rounded-md" src="{{ asset('storage/images/games/thumbs/'.$image->thumb) }}" alt="{{ $image->full }}">
            </div>
            <div class="text-md text-center">
              Uppladdad av: {{ $image->user->name }}
            </div>
            <div class="text-md text-center">
              Storlek: {{ $image->image_size }}
            </div>
            @can('delete', $image)
              <div class="text-md text-center text-red-500">
                <a href="{{ route('game.delete.image', [$game, $image]) }}">radera</a>
              </div>
            @else
              <div class="text-md text-center text-red-500">
                Du kan inte radera bilden
              </div>
            @endcan
          </div>
          @empty
            Inga bilder
          @endforelse
      </div> <!-- end images grid -->
    </div> <!-- end w-full -->
</div> <!-- end container -->
@endsection
