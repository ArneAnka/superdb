@extends('layouts.app')

@section('title', 'Om superdb.cc')

@section('content')
<div class="container mx-auto px-4">
    <div class="space-y-5">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
        test
        </h2>
        @foreach($game->MODES as $mode)
            {{ $mode->mode }}@if(!$loop->last), @endif
        @endforeach
    </div> <!-- end container -->
</div>
@endsection
