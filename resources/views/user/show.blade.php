@extends('layouts.app')

@section('title', $user->name)

@section('content')
<div class="container mx-auto px-4">
    <div class="space-y-5">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">{{ $user->name }}</h2>
        <p>{{ $user->points()->shorthand() }} poäng.</p>
        @if(empty($user->description))
            <p>
                <i>Apparently, this user prefers to keep an air of mystery about them.</i>
            </p>
        @elseif($user->description)
            <p>
                {{ $user->description }}
            </p>
        @endif

        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Senaste {{ count($user->comments) }} kommentarena</h2>
        <div>
            <ul class="list-disc">
                @foreach($user->comments as $comment)
                    @include('user.comments.partials._' . strtolower(class_basename($comment->commentable_type)))
                @endforeach
            </ul>
        </div>

        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Senaste {{ count($user->history) }} redigeringarna</h2>
        <div>
            <ul class="list-disc text-gray-500">
                @forelse($user->history as $history)
                    @include('user.history.partials._' . strtolower(class_basename($history->historyable_type)))
                @empty
                    <div class="flex items-center">
                        <div>
                            &nbsp;Inga ändringar gjorda av denna användaren.
                        </div>
                    </div>
                @endforelse
            </ul>
        </div>

    </div>
</div> <!-- end container -->
@endsection
