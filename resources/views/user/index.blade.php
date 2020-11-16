@extends('layouts.app')

@section('title', 'Alla användare')

@section('content')
<div class="container mx-auto px-4">
    <div class="space-y-5">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Användare</h2>
        <!-- https://tailwind-starter-kit.now.sh/docs/avatars -->
        @foreach($users as $user)
            <div>
                <div class="relative inline-block">
                  <img class="inline-block object-cover w-12 h-12 rounded-full" src="{{ $user->avatar }}" alt="avatar image"/>
                  @if($user->isOnline())
                    <span class="absolute bottom-0 right-0 inline-block w-3 h-3 bg-green-600 border-2 border-white rounded-full"></span>
                  @endif
                </div>
                <a class="underline" href="{{ route('user.show', $user) }}">{{ $user->name }}</a>,
                <span>{{ $user->points()->shorthand() }} poäng.</span>
            </div>
        @endforeach
    </div>
</div> <!-- end container -->
@endsection
