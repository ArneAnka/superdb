<div class="rounded p-5 bg-gray-800">
    @foreach($games as $letter => $group)
        <a class="shadow-md underline" href="#{{ $letter }}">{{ $letter }}</a>
        @if(!($loop->last))
            &middot;
         @endif
    @endforeach    
</div>


@foreach($games as $letter => $group)
<div class="rounded p-5 bg-gray-800">
        <a id="{{ $letter }}"/>
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">{{ $letter }} ({{ sizeof($group) }} titlar)</h2>
        @forelse($group as $game)
            <p class="mt-2">
                <a href="{{ route('game.show', $game) }}">
                    <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded flex items-center">
                        #{{ $game->id }}. {{ $game->title }}
                        @if($game->releases_count == 1)
                            ({{ $game->releases_count }} release)
                        @else
                            ({{ $game->releases_count }} releaser)
                        @endif
                  @if(count($game->history))
                  <svg class="ml-2 fill-current text-yellow-300" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M4.5 8.5l-.354-.354L4 8.293V8.5h.5zm4-4l.354-.354a.5.5 0 00-.708 0L8.5 4.5zm2 2l.354.354a.5.5 0 000-.708L10.5 6.5zm-4 4v.5h.207l.147-.146L6.5 10.5zm-2 0H4a.5.5 0 00.5.5v-.5zm3 3.5A6.5 6.5 0 011 7.5H0A7.5 7.5 0 007.5 15v-1zM14 7.5A6.5 6.5 0 017.5 14v1A7.5 7.5 0 0015 7.5h-1zM7.5 1A6.5 6.5 0 0114 7.5h1A7.5 7.5 0 007.5 0v1zm0-1A7.5 7.5 0 000 7.5h1A6.5 6.5 0 017.5 1V0zM4.854 8.854l4-4-.708-.708-4 4 .708.708zm3.292-4l2 2 .708-.708-2-2-.708.708zm2 1.292l-4 4 .708.708 4-4-.708-.708zM6.5 10h-2v1h2v-1zm-1.5.5v-2H4v2h1z" fill="currentColor"></path></svg>
                  @endif
                    </button>
                </a>
            </p>
        @empty
            <p>¯\_(ツ)_/¯</p>
        @endforelse
    </ul>
<!-- Pin to bottom right corner -->
<div class="flex justify-end">
    <a href="#start">Top</a>
</div>

</div>
@endforeach
