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
        <p>
            <i>content goes here...</i>
        </p>
        @can('update', Auth::user())
            <a class="underline" href="{{ route('user.edit', Auth::user()) }}">Edit profile</a>
        @endcan
        </div>
    </div> <!-- end container -->
@endsection


