@extends('layouts.app')

@section('title', 'välkommen')

@section('content')
<div class="container mx-auto px-4">
    <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
        Senaste ändringarna
    </h2>
    <div class="popular-games text-sm grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5 border-b border-gray-800 pb-16">
        @forelse($games_history as $game)
        <div class="game mt-8 text-center sm:text-left">
            <div class="relative inline-block">
                <a href="{{ route('game.show', $game) }}">
                    <img src="{{ asset('images/placeholder.png') }}" alt="cover art" class="hover:opacity-75 transition ease-in-out duration-150">
                </a>
                <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full hidden" style="right: -2px; bottom: -20px;">
                    <div class="font-semibold text-xs flex justify-center items-center h-full">80%</div>
                </div>
            </div>
            <a href="{{ route('game.show', $game) }}" class="underline block text-base font-semibold leading-tight hover:text-gray-400 mt-8">
                {{ $game->title }}
            </a>
            <div class="text-gray-400 mt-1">
                {{ $game->console->name }}
            </div>
        </div>
        @empty
            Inga ändringar gjorda...
        @endforelse
    </div> <!-- /senast ändrade spel -->
    <div class="flex flex-col lg:flex-row my-10">
        <div class="blog w-full lg:w-3/4 mr-0 lg:mr-32">
          <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Uppdateringar</h2>
          <div class="blog-container space-y-5 mt-8">
        @can('create', App\Post::class)
        <svg class="inline" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M4.5 6.995H4v1h.5v-1zm6 1h.5v-1h-.5v1zm-6 1.998H4v1h.5v-1zm6 1.007h.5v-1h-.5v1zm-6-7.003H4v1h.5v-1zM8.5 5H9V4h-.5v1zm2-4.5l.354-.354L10.707 0H10.5v.5zm3 3h.5v-.207l-.146-.147-.354.354zm-9 4.495h6v-1h-6v1zm0 2.998l6 .007v-1l-6-.007v1zm0-5.996L8.5 5V4l-4-.003v1zm8 9.003h-10v1h10v-1zM2 13.5v-12H1v12h1zM2.5 1h8V0h-8v1zM13 3.5v10h1v-10h-1zM10.146.854l3 3 .708-.708-3-3-.708.708zM2.5 14a.5.5 0 01-.5-.5H1A1.5 1.5 0 002.5 15v-1zm10 1a1.5 1.5 0 001.5-1.5h-1a.5.5 0 01-.5.5v1zM2 1.5a.5.5 0 01.5-.5V0A1.5 1.5 0 001 1.5h1z" fill="currentColor"></path></svg> <a href="{{ route('post.create') }}">Nytt inlägg</a>
        @endcan
          @forelse($posts as $post)
          <div class="bg-gray-800 rounded-lg shadow-md flex-cols px-6 py-6">
            <div class="ml-4">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">#{{ $post->id }} {{ $post->topic }}</h2>    
            </div>
            <div class="ml-4">
                {{ $post->body }}
            </div>
           <div class="ml-4 mt-5">
                Inlagd av <a class="underline" href="{{ route('user.show', $post->user) }}">{{ $post->user->name }}</a>, {{ $post->created_at->toRfc850String() }}
            </div>
            @if($post->tags->isNotEmpty())
                @foreach($post->tags as $tag)
                    <div class="bg-gray-700 w-auto inline-block ml-4 mt-5 rounded-full py-1 px-3">
                        {{ $tag->name }}
                    </div>
                @endforeach
            @endif

            <div class="ml-4 flex flex-no-wrap mt-5">
                @can('update', $post)
                <small class="flex mr-4">
                    <svg class="mr-2 inline" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M.5 9.5l-.354-.354L0 9.293V9.5h.5zm9-9l.354-.354a.5.5 0 00-.708 0L9.5.5zm5 5l.354.354a.5.5 0 000-.708L14.5 5.5zm-9 9v.5h.207l.147-.146L5.5 14.5zm-5 0H0a.5.5 0 00.5.5v-.5zm.354-4.646l9-9-.708-.708-9 9 .708.708zm8.292-9l5 5 .708-.708-5-5-.708.708zm5 4.292l-9 9 .708.708 9-9-.708-.708zM5.5 14h-5v1h5v-1zm-4.5.5v-5H0v5h1zM6.146 3.854l5 5 .708-.708-5-5-.708.708zM8 15h7v-1H8v1z" fill="currentColor"></path></svg> <a href="{{ route('post.edit', $post) }}">Ändra</a>
                </small>
                @endcan

                @can('delete', $post)
                <small class="flex mr-4">
                    <svg class="mr-2 inline" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M4.5 3V1.5a1 1 0 011-1h4a1 1 0 011 1V3M0 3.5h15m-13.5 0v10a1 1 0 001 1h10a1 1 0 001-1v-10M7.5 7v5m-3-3v3m6-3v3" stroke="currentColor"></path></svg> <a href="{{ route('post.delete', $post) }}">Radera</a>
                </small>
                @endcan

                <small class="flex">
                    <svg class="mr-2 inline" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M5.5 11.493l.416-.278a.5.5 0 00-.416-.222v.5zm2 2.998l-.416.277a.5.5 0 00.832 0l-.416-.277zm2-2.998v-.5a.5.5 0 00-.416.222l.416.278zm-4.416.277l2 2.998.832-.555-2-2.998-.832.555zm2.832 2.998l2-2.998-.832-.555-2 2.998.832.555zM9.5 11.993h4v-1h-4v1zm4 0c.829 0 1.5-.67 1.5-1.5h-1c0 .277-.223.5-.5.5v1zm1.5-1.5V1.5h-1v8.994h1zM15 1.5c0-.83-.671-1.5-1.5-1.5v1c.277 0 .5.223.5.5h1zM13.5 0h-12v1h12V0zm-12 0C.671 0 0 .67 0 1.5h1c0-.277.223-.5.5-.5V0zM0 1.5v8.993h1V1.5H0zm0 8.993c0 .83.671 1.5 1.5 1.5v-1a.499.499 0 01-.5-.5H0zm1.5 1.5h4v-1h-4v1zM5 8h5V7H5v1zM4 5h7V4H4v1z" fill="currentColor"></path></svg> <a class="underline" href="{{ route('post.show', $post) }}"> {{ $post->comments_count }} Kommentarer</a>
                </small>

            </div>
        </div>
        @empty
            Inga inlägg
        @endforelse
            {{ $posts->links() }}
        </div>
    </div> <!-- /blog -->
    <div class="birthday lg:w-1/4 mt-12 lg:mt-0">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Årsdagar</h2>
        @forelse($birthdays as $birthday)
        <div class="birthday-container space-y-10 mt-8">
        <div class="game flex">
            <a href="{{ route('game.show', $birthday) }}" class="flex-shrink-0">
                <img src="{{ asset('images/placeholder.png') }}" alt="game cover" class="w-16 hover:opacity-75 transition ease-in-out duration-150">
            </a>
            <div class="ml-4">
                <a class="hover:text-gray-300 underline" href="{{ route('game.show', $birthday) }}">{{ $birthday->title }}</a>
                <div class="text-gray-400 text-sm mt-1">
                    <svg class="inline h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><circle cx="256" cy="256" r="256" fill="#ffda44"></circle><path fill="#0052b4" d="M200.3 222.6h309.5A256 256 0 0 0 256 0a256.9 256.9 0 0 0-55.7 6v216.6zm-66.7 0V31.1A256.2 256.2 0 0 0 2.2 222.6h131.4zm0 66.8H2.2a256.2 256.2 0 0 0 131.4 191.5V289.4zm66.7 0v216.5A256.9 256.9 0 0 0 256 512a256 256 0 0 0 253.8-222.6H200.3z"></path></svg>
                    {{ $birthday->sweden_release }}
                </div>
                <div class="text-gray-400 text-sm mt-1 uppercase">{{ $birthday->console->short }}</div>
            </div>
        </div>
    </div>
    @empty
    <div class="birthday-container space-y-12 mt-8">
      <div class="bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
        Inga årsdagar idag ¯\_(ツ)_/¯
    </div>
</div>
@endforelse
</div> <!-- /birthday -->
</div>
</div> <!-- /container -->

@endsection
