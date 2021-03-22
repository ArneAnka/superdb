<p><u>@include('game.partials.edits._user'), {{ $item->created_at }} ändrade genre till</u>:</p>
<p>"{{ $game->genres->implode('genre',', ')}}"</p>