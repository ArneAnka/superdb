  <div class="edit-container mt-8 hidden">
    <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Edits</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8">
      <div>
        @forelse($game->history as $item)
          @include('game.partials.edits._' . $item->changed_column, $item)
          @if($loop->last)
          @endif
          @empty
            <p>Inga ändringar för detta spel.</p>
          @endforelse

        @can('update', $game)
        <p><a href="{{ route('game.show.edit', $game) }}">edit</a></p>
          @endcan
      </div>
    </div> <!-- end edit grid -->
  </div>
