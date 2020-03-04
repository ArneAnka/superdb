@forelse ($games as $game)
    <p>
        <a href="{{ route('game.show', $game) }}" class="link">#{{ $game->id }}. {{ $game->title }} ({{ $game->releases_count }})</a>
    </p>
@empty
    <p>¯\_(ツ)_/¯</p>
@endforelse
