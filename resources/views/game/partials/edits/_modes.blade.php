@include('game.partials.edits._user')

<span class="float-right text-gray-500">{{ $item->created_at->diffForHumans() }}</span>
<p class="text-gray-500">Ändrade spelbara modes till {{ $game->genres->implode('mode',', ') }}</p>