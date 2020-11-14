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

        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Kommentarer, {{ count($user->comments) }}</h2>
        <div>
        <ul class="list-disc">
            @foreach($user->comments as $comment)
                @include('user.comments.partials._' . strtolower(class_basename($comment->commentable_type)))
            @endforeach
        </ul>
        </div>
    </div> <!-- end container -->
</div>
@endsection
