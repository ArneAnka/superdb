@extends('layouts.app')

@section('title', 'dashboard')

@section('content')
<div class="container mx-auto px-4">
    <div class="space-y-5">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
            {{ auth()->user()->name }}, you are logged in!
        </h2>
        @if (session('status'))
        <div class="" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <i>content goes here</i>
        </div>
    </div> <!-- end container -->
@endsection


