@extends('layouts.app')

@section('title', 'Skapa post')

@section('css')

@endsection

@section('content')
<div class="container mx-auto px-4">
  <div class="w-full max-w-xs">
    <form class="w-full max-w-lg" method="POST" action="{{ route('post.store') }}">
      {{ csrf_field() }}
      {{ method_field('POST') }}

      <div class="flex flex-wrap mx-0 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
            Edit post
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
          id="topic"
          type="text"
          class="@error('topic') is-invalid @enderror"
          name="topic"
          value="{{ old('topic') }}" placeholder="Topic"
          autocomplete="off">
          <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p>
          @error('topic')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <div class="flex flex-wrap mx-0 mb-6">
        <div class="w-full px-3">
          <label for="body" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Body</label>
          <textarea id="body" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="body" rows="10" cols="100" autocomplete="off">{{ old('body') }}</textarea>

          @error('body')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <div class="flex flex-wrap mx-0 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
            Tags
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
          id="tags"
          type="text"
          class="@error('tags') is-invalid @enderror"
          name="tags"
          value="{{ old('tags') }}" placeholder="tags"
          autocomplete="off">
          <p class="text-gray-600 text-xs italic">Tags are seperated by comma delimiter ","</p>
          @error('tags')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <div class="-mr-1">
       <input type='submit' class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" value='Publicera'>
     </div>

   </form>
 </div>
</div>
@endsection
