@extends('layouts.app')

@section('title', "ändra $game->title")

@section('css')

@endsection

@section('content')
<div class="container mx-auto px-4">
  <div class="w-full">
    <h2 class="text-blue-500 uppercase tracking-wide font-semibold">editera: {{ $game->title }}</h2>
    <p>({{ $game->console->name }})</p>
    <form class="w-full max-w-lg mt-10" method="POST" action="{{ route('game.update.edit', $game) }}">
      {{ csrf_field() }}
      {{ method_field('POST') }}

      <!-- title-->
      <div class="flex flex-wrap mx-0 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="title">
            Edit Game Title
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
          id="title"
          type="text"
          class="@error('title') border-red-500 @enderror"
          name="title"
          value="{{ old('title', $game->title) }}" placeholder="Title"
          autocomplete="off">
          @error('title')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <!-- import -->
      <div class="flex flex-wrap mx-0 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="import">
            Edit Game Import
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
          id="import"
          type="text"
          class="@error('import') border-red-500 @enderror"
          name="import"
          value="{{ old('import', $game->import) }}" placeholder="Import"
          autocomplete="off">
          @error('import')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <!-- save -->
      <div class="flex flex-wrap mx-0 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="save">
            Edit Game Save modes
          </label>
          <div class="relative">
                <select
                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                name="save"
                id="save">
                    @foreach($saves as $save)
                      <option value="{{ $save }}" {{ old('save', $game->save) == $save ? 'selected' : '' }}>{{ $save }}</option>
                    @endforeach
                </select>
           <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
          </div>
          @error('save')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <div class="bg-blue-900 shadow-md rounded">
      <!-- developer -->
      <div class="flex flex-wrap mx-0 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="developers">
            Edit Game Developers
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
          id="developers"
          type="text"
          class="@error('developers') border-red-500 @enderror"
          name="developers"
          value="{{ old('developers', $developers) }}" placeholder="Developers"
          autocomplete="off">
          <p class="text-gray-600 text-xs italic">Ett komma (,) separerar utvecklare.</p>
          @error('developers')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <!-- publisher -->
      <div class="flex flex-wrap mx-0 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="publishers">
            Edit Game Publishers
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
          id="publishers"
          type="text"
          class="@error('publisher') border-red-500 @enderror"
          name="publishers"
          value="{{ old('publishers', $publishers) }}" placeholder="Publisher"
          autocomplete="off">
          <p class="text-gray-600 text-xs italic">Ett komma (,) separerar publishers.</p>
          @error('publishers')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <!-- genre -->
      <div class="flex flex-wrap mx-0 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="genre_id">
            Edit Game Genre
          </label>
          <div class="relative">
            <select
            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            name="genre_id"
            id="genre_id">
                @foreach($genres as $genre)
                  <option value="{{ $genre->id }}" {{ old("genre_id", $game->genre_id) == $genre->id ? 'selected' : '' }}>{{ $genre->genre }}</option>
                @endforeach
            </select>
           <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
          </div>
          @error('genre_id')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <!-- modes -->
      <div class="flex flex-wrap mx-0 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="modes">
            Edit Game modes
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
          id="modes"
          type="text"
          class="@error('modes') border-red-500 @enderror"
          name="modes"
          value="{{ old('modes', $modes) }}" placeholder="Single-player"
          autocomplete="off">
          <p class="text-gray-600 text-xs italic">Ett komma (,) separerar modes.</p>
          @error('modes')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
        </div>
      </div>
</div>

      <!-- sweden_release -->
      <div class="flex flex-wrap mx-0 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="sweden_release">
            Edit Sweden Release, (yyyy-mm-dd)
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
          id="sweden_release"
          type="text"
          class="@error('sweden_release') border-red-500 @enderror"
          name="sweden_release"
          value="{{ old('sweden_release', $game->sweden_release) }}" placeholder="yyyy-mm-dd"
          autocomplete="off">
          @error('sweden_release')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <!-- europe_release -->
      <div class="flex flex-wrap mx-0 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="europe_release">
            Edit Europe Release, (yyyy-mm-dd)
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
          id="europe_release"
          type="text"
          class="@error('europe_release') border-red-500 @enderror"
          name="europe_release"
          value="{{ old('europe_release', $game->europe_release) }}" placeholder="yyyy-mm-dd"
          autocomplete="off">
          @error('europe_release')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <!-- japan_release -->
      <div class="flex flex-wrap mx-0 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="japan_release">
            Edit Japan Release, (yyyy-mm-dd)
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
          id="japan_release"
          type="text"
          class="@error('japan_release') border-red-500 @enderror"
          name="japan_release"
          value="{{ old('japan_release', $game->japan_release) }}" placeholder="yyyy-mm-dd"
          autocomplete="off">
          @error('japan_release')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <!-- usa_release -->
      <div class="flex flex-wrap mx-0 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="usa_release">
            Edit Usa Release, (yyyy-mm-dd)
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
          id="usa_release"
          type="text"
          class="@error('usa_release') border-red-500 @enderror"
          name="usa_release"
          value="{{ old('usa_release', $game->usa_release) }}" placeholder="yyyy-mm-dd"
          autocomplete="off">
          @error('usa_release')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <!-- description -->
      <div class="flex flex-wrap mx-0 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="description">
            Edit Game Description
          </label>
          <textarea
          id="description"
          class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('description') is-invalid @enderror"
          name="description"
          rows="10"
          cols="100">{{ old('description', $game->description) }}</textarea>

          @error('description')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <!-- edit links -->
      <div class="flex flex-wrap mx-0 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="url">
            Edit External Links For Game
          </label>
        @forelse($game->urls as $url)
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="url"
            type="text"
            class="@error('url') border-red-500 @enderror"
            name="url[{{ $url->host }}]"
            value="{{ old('$url->url', $url->url) }}"
            placeholder="yyyy-mm-dd"
            autocomplete="off">
          @error('url')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
          @empty
            Inga länkar
          @endforelse
        </div>
    </div>

    <input type="submit" class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" value="Ändra">
</form>
</div>
</div>

<div class="container mx-auto px-4 mt-10">
  <div class="w-full">
<h2 class="text-blue-500 uppercase tracking-wide font-semibold">Lägg till länk</h2>
<form class="w-full max-w-lg" method="POST" action="{{ route('game.save.url', $game) }}" autocomplete="off">
    {{ csrf_field() }}
    {{ method_field('POST') }}
      <div class="flex flex-wrap mx-0 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="url_host">
            Add Host
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
            Add Game Url
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
