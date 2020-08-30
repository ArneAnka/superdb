@extends('layouts.app')

@section('title', 'NES')

@section('content')
<div class="container mx-auto px-4">
    <div class="space-y-5">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
            <a id="start" class="uppercase">NES</a>
        </h2>
            @include('game.partials._games')
    </div>
</div>
@endsection
