<ul>
@foreach($games as $game)
<li>
    {{ $game->title }} ({{ $game->releases->count() }})
    <ul>
        @foreach($game->releases as $release)
        <li>Releaes nummer: {{ $release->release }}. Front: {{ $release->cartridge_front }}</li>
        @endforeach
    </ul>
</li>
@endforeach
</ul>
