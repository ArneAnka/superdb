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

        <div class="">
            @if($game->has('images'))
              @forelse($game->images as $image)
                  <img class="w-64 h-64" src="{{ asset('images/test_folder/thumbs/'.$image->thumb) }}" alt="{{ $image->full }}">
              @empty
                inga bilder
              @endforelse
            @endif
        </div>

    </div>
</div>
@endsection
