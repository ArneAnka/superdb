@extends('layouts.app')

@section('title', 'dashboard')

@section('content')
<div class="container mx-auto px-4">
    <div class="space-y-5">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
            {{ auth()->user()->name }}, you are logged in!
        </h2>
        <p>
            <i>Du har {{ auth()->user()->points()->shorthand() }} poäng.</i>
        </p>
        
        <div>
            <span><a class="underline" href="{{ route('user.show', auth()->user()) }}">Visa din publika profil</a></span>
            @can('update', Auth::user())
            &middot;
                <a class="underline" href="{{ route('user.edit', Auth::user()) }}">Ändra din profil</a>
            </span>
            @endcan
        </div>
        
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
            Notifieringar
        </h2>
        @forelse(auth()->user()->unreadNotifications as $notification)
        @include('user.profile.notifications._' . strtolower(class_basename($notification->type)))
        @if($loop->last)
        <div class="flex items-center">
            <svg class="text-green-500" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M5.5 11.493l.416-.278a.5.5 0 00-.416-.222v.5zm2 2.998l-.416.277a.5.5 0 00.832 0l-.416-.277zm2-2.998v-.5a.5.5 0 00-.416.222l.416.278zM7 8l-.354.354.378.377.352-.402L7 8zm-1.916 3.77l2 2.998.832-.555-2-2.998-.832.555zm2.832 2.998l2-2.998-.832-.555-2 2.998.832.555zM9.5 11.993h4v-1h-4v1zm4 0c.829 0 1.5-.67 1.5-1.5h-1c0 .277-.223.5-.5.5v1zm1.5-1.5V1.5h-1v8.994h1zM15 1.5c0-.83-.671-1.5-1.5-1.5v1c.277 0 .5.223.5.5h1zM13.5 0h-12v1h12V0zm-12 0C.671 0 0 .67 0 1.5h1c0-.277.223-.5.5-.5V0zM0 1.5v8.993h1V1.5H0zm0 8.993c0 .83.671 1.5 1.5 1.5v-1a.499.499 0 01-.5-.5H0zm1.5 1.5h4v-1h-4v1zm3.146-5.64l2 2 .708-.707-2-2-.708.708zm2.73 1.976l3.5-4-.752-.658-3.5 4 .752.658z" fill="currentColor"></path></svg>
            
            <span>&nbsp;<a class="underline" href="{{ route('markAsRead', auth()->user()) }}">Markera alla notifieringar som lästa</a></span>
        </div>
        @endif
        @empty
        <p>Du har inga olästa notifieringar</p>
        @endforelse
        
    </div>
</div> <!-- end container -->
@endsection


