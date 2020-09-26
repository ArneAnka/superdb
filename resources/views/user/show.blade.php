@extends('layouts.app')

@section('title', $user->name)

@section('content')
<div class="container mx-auto px-4">
    <div class="space-y-5">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">{{ $user->name }}</h2>
        @can('update', $user)
            <a class="underline" href="{{ route('user.edit', $user) }}">Edit profile</a>
        @endcan
        <div>
        </div>
    </div> <!-- end container -->
</div>
@endsection
