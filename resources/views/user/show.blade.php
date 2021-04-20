@extends('layouts.app')

@section('title', $user->name)

@section('content')
<div class="container mx-auto px-4">
    <div class="space-y-5">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">{{ $user->name }}</h2>
        @if(empty($user->description))
        <p>
            <i>Apparently, this user prefers to keep an air of mystery about them.</i>
        </p>
        @elseif($user->description)
        <p>
            {{ $user->description }}
        </p>
        @endif
        
        <p><svg class="inline" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M7.5 12.04l-4.326 2.275L4 9.497.5 6.086l4.837-.703L7.5 1l2.163 4.383 4.837.703L11 9.497l.826 4.818L7.5 12.041z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path></svg> {{ $user->points()->shorthand() }} poäng</p>
        <p><svg class="inline" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M3.5 0v5m8-5v5M5 8.5l2 2 3.5-4m-9-4h12a1 1 0 011 1v10a1 1 0 01-1 1h-12a1 1 0 01-1-1v-10a1 1 0 011-1z" stroke="currentColor"></path></svg> Medlem sen {{ $user->created_at->diffForHumans() }}</p>
        <p><svg class="inline" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M7.5 7.5H7a.5.5 0 00.146.354L7.5 7.5zm0 6.5A6.5 6.5 0 011 7.5H0A7.5 7.5 0 007.5 15v-1zM14 7.5A6.5 6.5 0 017.5 14v1A7.5 7.5 0 0015 7.5h-1zM7.5 1A6.5 6.5 0 0114 7.5h1A7.5 7.5 0 007.5 0v1zm0-1A7.5 7.5 0 000 7.5h1A6.5 6.5 0 017.5 1V0zM7 3v4.5h1V3H7zm.146 4.854l3 3 .708-.708-3-3-.708.708z" fill="currentColor"></path></svg> Senast inloggad {{ $user->ip->last()->created_at->diffForHumans() }}</p>
        <p><svg class="inline" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M.5 7.5l-.464-.186a.5.5 0 000 .372L.5 7.5zm14 0l.464.186a.5.5 0 000-.372L14.5 7.5zm-7 4.5c-2.314 0-3.939-1.152-5.003-2.334a9.368 9.368 0 01-1.449-2.164 5.065 5.065 0 01-.08-.18l-.004-.007v-.001L.5 7.5l-.464.186v.002l.003.004a2.107 2.107 0 00.026.063l.078.173a10.368 10.368 0 001.61 2.406C2.94 11.652 4.814 13 7.5 13v-1zm-7-4.5l.464.186.004-.008a2.62 2.62 0 01.08-.18 9.368 9.368 0 011.449-2.164C3.56 4.152 5.186 3 7.5 3V2C4.814 2 2.939 3.348 1.753 4.666a10.367 10.367 0 00-1.61 2.406 6.05 6.05 0 00-.104.236l-.002.004v.001H.035L.5 7.5zm7-4.5c2.314 0 3.939 1.152 5.003 2.334a9.37 9.37 0 011.449 2.164 4.705 4.705 0 01.08.18l.004.007v.001L14.5 7.5l.464-.186v-.002l-.003-.004a.656.656 0 00-.026-.063 9.094 9.094 0 00-.39-.773 10.365 10.365 0 00-1.298-1.806C12.06 3.348 10.186 2 7.5 2v1zm7 4.5a68.887 68.887 0 01-.464-.186l-.003.008-.015.035-.066.145a9.37 9.37 0 01-1.449 2.164C11.44 10.848 9.814 12 7.5 12v1c2.686 0 4.561-1.348 5.747-2.665a10.366 10.366 0 001.61-2.407 6.164 6.164 0 00.104-.236l.002-.004v-.001h.001L14.5 7.5zM7.5 9A1.5 1.5 0 016 7.5H5A2.5 2.5 0 007.5 10V9zM9 7.5A1.5 1.5 0 017.5 9v1A2.5 2.5 0 0010 7.5H9zM7.5 6A1.5 1.5 0 019 7.5h1A2.5 2.5 0 007.5 5v1zm0-1A2.5 2.5 0 005 7.5h1A1.5 1.5 0 017.5 6V5z" fill="currentColor"></path></svg>  Profilen visad {{ $views }} gånger</p>
        

        <div class="grid grid-cols-1 md:grid-cols-2"> <!-- grid -->
            <div>
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold mb-4">Senaste {{ count($user->comments) }} kommentarena</h2>
                <ul class="list-disc">
                    @foreach($user->comments as $comment)
                        @include('user.comments.partials._' . strtolower(class_basename($comment->commentable_type)))
                    @endforeach
                </ul>
            </div>
    
            <div>
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold mb-4">Senaste {{ count($user->history) }} redigeringarna</h2>
                <ul class="list-disc text-gray-500">
                    @forelse($user->history as $history)
                        @include('user.history.partials._' . strtolower(class_basename($history->historyable_type)))
                    @empty
                        <div class="flex items-center">
                            <div>
                                &nbsp;Inga ändringar gjorda av denna användaren.
                            </div>
                        </div>
                    @endforelse
                </ul>
            </div>
        </div> <!-- /grid -->

    </div>
</div> <!-- end container -->
@endsection
