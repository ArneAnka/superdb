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
        @can('update', Auth::user())
            <div class="flex items-center">
                <svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M.5 10.5l-.354-.354-.146.147v.207h.5zm10-10l.354-.354a.5.5 0 00-.708 0L10.5.5zm4 4l.354.354a.5.5 0 000-.708L14.5 4.5zm-10 10v.5h.207l.147-.146L4.5 14.5zm-4 0H0a.5.5 0 00.5.5v-.5zm.354-3.646l10-10-.708-.708-10 10 .708.708zm9.292-10l4 4 .708-.708-4-4-.708.708zm4 3.292l-10 10 .708.708 10-10-.708-.708zM4.5 14h-4v1h4v-1zm-3.5.5v-4H0v4h1z" fill="currentColor"></path></svg>
                <span>
                    &nbsp;<a class="underline" href="{{ route('user.edit', Auth::user()) }}">Edit profile</a>
                </span>
            </div>
        @endcan

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


