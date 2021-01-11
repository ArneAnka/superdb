<div class="flex mb-4">
    <img class="h-10 w-10 rounded-full" src="{{ $user->avatar }}" alt="avatar">
    <div class="ml-4">
        <div class="flex items-center">
            <div class="font-semibold">{{ $user->name }}</div>
            <div class="text-gray-500 ml-2">{{ $comment->created_at->diffForHumans() }}, på en release till <a class="underline" href="{{ route('game.show', $comment->commentable->game) }}">{{ $comment->commentable->game->title }}</a></div>
        </div>
        <div class="text-gray-700 mt-2">{{ $comment->body }}</div>
    </div>
</div> 
