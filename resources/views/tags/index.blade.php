@extends('layouts.app')

@section('title', 'Skapa post')

@section('css')

@endsection

@section('content')
<div class="container mx-auto px-4">
  <div class="w-full">
    <h1 class="text-blue-500 uppercase tracking-wide font-semibold">Tags</h1>
    @forelse($tags as $tag)
        {{ $tag }}
    @empty
        Inga taggar funna
    @endforelse
 </div>
</div>
@endsection
