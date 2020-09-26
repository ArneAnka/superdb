@extends('layouts.app')

@section('title', $user->name)

@section('content')
<div class="container mx-auto px-4">
    <div class="space-y-5">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">{{ $user->name }}</h2>
        <p>{{ $user->points()->shorthand() }} poäng.</p>
        @can('update', $user)
        <div>
            <a class="underline" href="{{ route('user.edit', $user) }}">Edit profile</a>
        </div>
        @endcan
        <div>
        </div>
    </div> <!-- end container -->
</div>
@endsection
