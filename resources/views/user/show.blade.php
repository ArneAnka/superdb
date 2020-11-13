@extends('layouts.app')

@section('title', $user->name)

@section('content')
<div class="container mx-auto px-4">
    <div class="space-y-5">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">{{ $user->name }}</h2>
        <p>{{ $user->points()->shorthand() }} poäng.</p>
        @can('update', $user)
        <div>
            <a class="underline" href="{{ route('user.edit', $user) }}">Edit profile</a>
        </div>
        @endcan
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Kommentarer, {{ count($user->comments) }}</h2>
        <div>
        <ul class="list-disc">
            @foreach($user->comments as $comment)
                @include('user.comments.partials.' . strtolower('_' . class_basename($comment->commentable_type)))
            @endforeach
        </ul>
        </div>
    </div> <!-- end container -->
</div>
@endsection
