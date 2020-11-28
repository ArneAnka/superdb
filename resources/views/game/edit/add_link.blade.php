@extends('layouts.app')

@section('title', $game->title . ' - Lägg till länk')

@section('content')
<div class="container mx-auto px-4">
  <div class="w-full">
    <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
        Lägg till länk för "{{ $game->title }}"
    </h2>
    
    <form class="w-full max-w-lg" method="POST" action="{{ route('game.save.url', $game) }}" autocomplete="off">
        {{ csrf_field() }}
        {{ method_field('POST') }}
        <div class="flex flex-wrap mx-0 mb-6">
            <div class="w-full px-3">
              <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="url_host">
                Vart länkar du någonstans?
            </label>
            <input
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="url_host"
            type="text"
            class="@error('url_host') border-red-500 @enderror"
            name="url_host"
            value="{{ old('url_host') }}"
            placeholder="ex: wikipedia_url">
            @error('url_host')
            <span class="" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="flex flex-wrap mx-0 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="url_host">
            Länk/adressen
        </label>
        <input
        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
        id="new_url"
        type="text"
        class="@error('new_url') border-red-500 @enderror"
        name="new_url"
        value="{{ old('new_url') }}"
        placeholder="http://en.wikipedia.org/xxx">

        @error('new_url')
        <span class="" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<input type="submit" class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" value="Lägg till URL">
</form>
</div>
</div>
@endsection
