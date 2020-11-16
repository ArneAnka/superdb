<div class="flex items-center">
    <svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M8 5.5h2M4.5 6v3M3 7.5h3m4 2h2M.5 3.5v8a1 1 0 001 1h12a1 1 0 001-1v-8a1 1 0 00-1-1h-12a1 1 0 00-1 1z" stroke="currentColor"></path></svg>
    <div>
&nbsp;<a class="underline" href="{{ route('game.show', $history->historyable) }}">{{ $history->historyable->title }}</a> ({{ $history->created_at->diffForhumans() }})
    </div>
</div>
