<h2>
@foreach($games as $letter => $group)
        <a href="#{{ $letter }}">{{ $letter }}</a>
@endforeach
</h2>

@foreach($games as $letter => $group)
        <a id="{{ $letter }}"> <h3>{{ $letter }} ({{ sizeof($group) }} titlar)</h3>
        @forelse($group as $game)
            <p><a href="{{ route('game.show', $game) }}" class="link">#{{ $game->id }}. {{ $game->title }} 
            @if($game->releases_count == 1)
                ({{ $game->releases_count }} release)
            @else
                ({{ $game->releases_count }} releaser)
            @endif</a></p>
        @empty
            <p>¯\_(ツ)_/¯</p>
        @endforelse
    </ul>
@endforeach
