@extends('layouts.app')

@section('title', 'dashboard')

@section('content')
<div class="">
    <div class="">
        @if (session('status'))
        <div class="" role="alert">
            {{ session('status') }}
        </div>
        @endif

        {{ auth()->user()->name }}, you are logged in!
    </div>
</div>
@endsection
