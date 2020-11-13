@extends('layouts.app')

@section('title', 'Skapa post')

@section('css')

@endsection

@section('content')
<div class="container mx-auto px-4">
  <div class="w-full">
    <h2 class="text-blue-500 uppercase tracking-wide font-semibold">{{ $post->topic }}</h2>
    <p>#{{ $post->id }}, <a class="underline" href="{{ route('user.show', $post->user) }}">{{ $post->user->name }}</a>, {{ $post->created_at }} ({{ $post->created_at->diffForHumans() }})</p>
    <div>{{ $post->body }}</div>

  <div class="comments-container mt-8"> <!-- comments  -->
    <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Kommentarer, {{ $post->comments->count() }}</h2>
  @forelse($post->comments as $comment)
    <!-- kommentar början -->
    <div class="flex mb-4 mt-4">
        <img class="h-10 w-10 rounded-full" src="{{ Auth::user()->avatar }}" alt="avatar">
        <div class="ml-4">
            <div class="flex items-center">
                <div class="font-semibold"><a class="underline" href="{{ route('user.show', $comment->user) }}">{{ $comment->user->name }}</a></div>
                <div class="text-gray-500 ml-2">{{ $comment->created_at->diffForHumans() }}</div>
            </div>
            <div class="text-gray-700 mt-2">{{ $comment->body }}</div>
        @can('delete', $comment)
          <small class="flex mt-4">
              <svg class="mr-2 inline" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M4.5 3V1.5a1 1 0 011-1h4a1 1 0 011 1V3M0 3.5h15m-13.5 0v10a1 1 0 001 1h10a1 1 0 001-1v-10M7.5 7v5m-3-3v3m6-3v3" stroke="currentColor"></path></svg> <a class="underline" href="{{ route('post.destory.comment', [$post, $comment]) }}">Radera</a>
          </small>
        @endcan
        </div>
    </div> 
    <!-- kommentar slut -->

  @empty
    <p>Än så länge inga kommentarer.</p>
  @endforelse

      @auth
      <form method="POST" action="{{ route('post.save.comment', $post) }}">
        {{ csrf_field() }}
        {{ method_field('POST') }}
      <div class="flex flex-wrap mx-0 mb-6">
        <div class="w-full px-3">
          <label for="body" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Kommentera</label>
          <textarea id="body" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="body" rows="5" cols="100" placeholder="Din kommenter här." autocomplete="off">{{ old('body') }}</textarea>

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
 </div>
</div>
@endsection
