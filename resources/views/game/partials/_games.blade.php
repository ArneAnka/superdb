@foreach($games as $letter => $group)
        <a href="#game-starts-with-{{ $letter }}">{{ $letter }}</a>
@endforeach

@foreach($games as $letter => $group)
        <a id="game-starts-with-{{ $letter }}"> <h3>{{ $letter }}</h3>
        @forelse($group as $game)
            <p><a href="{{ route('game.show', $game) }}" class="link">#{{ $game->id }}. {{ $game->title }} ({{ $game->releases_count }})</a></p>
        @empty
            <p>¯\_(ツ)_/¯</p>
        @endforelse
    </ul>
@endforeach
