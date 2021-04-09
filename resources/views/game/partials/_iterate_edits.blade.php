<div class="edit-container mt-8">
  <h2 class="text-blue-500 uppercase tracking-wide font-semibold mt-4">Ändringar</h2>
  <div class="grid grid-cols-1 md:grid-cols-1 gap-12">
    <div class="divide-y">
      @forelse($game->history as $item)
      <div class="p-2">
        @include('game.partials.edits._' . $item->changed_column, $item)
      </div>
      @empty
        <p>Inga ändringar för detta spel.</p>
      @endforelse
    </div>
  </div> <!-- end edit grid -->


</div>
