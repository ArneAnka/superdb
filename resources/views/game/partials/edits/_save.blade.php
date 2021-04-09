@include('game.partials.edits._user')

<span class="float-right text-gray-500">{{ $item->created_at->diffForHumans() }}</span>
<p class="text-gray-500">Ändrade sparfunktion till {{ $item->changed_value_to }}</p>