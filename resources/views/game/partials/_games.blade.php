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
            <p class="mt-2"><a href="{{ route('game.show', $game) }}">
                <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                  #{{ $game->id }}. {{ $game->title }}
            @if($game->releases_count == 1)
                ({{ $game->releases_count }} release)
            @else
                ({{ $game->releases_count }} releaser)
            @endif</button></a></p>
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
