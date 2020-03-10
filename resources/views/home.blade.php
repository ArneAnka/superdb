@extends('layouts.app')

@section('title', 'dashboard')

@section('content')
<div class="">
    <div class="">Dashboard</div>

    <div class="">
        @if (session('status'))
        <div class="" role="alert">
            {{ session('status') }}
        </div>
        @endif

        You are logged in!
    </div>
</div>
@endsection
