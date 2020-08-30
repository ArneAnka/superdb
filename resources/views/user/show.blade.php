@extends('layouts.app')

@section('title', $user->name)

@section('content')
<div class="container mx-auto px-4">
    <div class="space-y-5">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">{{ $user->name }}</h2>
    </div> <!-- end container -->
</div>
@endsection
