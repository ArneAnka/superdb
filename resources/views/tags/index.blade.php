@extends('layouts.app')

@section('title', 'Skapa post')

@section('css')

@endsection

@section('content')
<div class="container mx-auto px-4">
  <div class="w-full">
    <h1 class="text-blue-500 uppercase tracking-wide font-semibold">Tags</h1>
    @forelse($tags as $tag)
  <div class="bg-gray-800 rounded-lg shadow-md flex-cols px-6 py-6 mt-3">
    <div class="ml-4">
    <a href="{{ route('post.show', $tag) }}">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">#{{ $tag->id }} {{ $tag->topic }}</h2>
    </a>
    </div>
    <div class="ml-4">
        <div class="flex items-center">
            <svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path clip-rule="evenodd" d="M10.5 3.498a2.999 2.999 0 01-3 2.998 2.999 2.999 0 113-2.998zm2 10.992h-10v-1.996a3 3 0 013-3h4a3 3 0 013 3v1.997z" stroke="currentColor" stroke-linecap="square"></path></svg>
            &nbsp;<a class="underline" href="{{ route('user.show', $tag->user) }}">{{ $tag->user->name }}</a>
        </div>
        <div class="flex items-center">
        <svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M7.5 7.5H7a.5.5 0 00.146.354L7.5 7.5zm0 6.5A6.5 6.5 0 011 7.5H0A7.5 7.5 0 007.5 15v-1zM14 7.5A6.5 6.5 0 017.5 14v1A7.5 7.5 0 0015 7.5h-1zM7.5 1A6.5 6.5 0 0114 7.5h1A7.5 7.5 0 007.5 0v1zm0-1A7.5 7.5 0 000 7.5h1A6.5 6.5 0 017.5 1V0zM7 3v4.5h1V3H7zm.146 4.854l3 3 .708-.708-3-3-.708.708z" fill="currentColor"></path></svg>
            &nbsp;{{ $tag->created_at->toRfc850String() }}
        </div>
    </div>
    </div>
@empty
inga taggar funna
@endforelse
 </div>
</div>
@endsection