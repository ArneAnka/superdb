@extends('layouts.app')

@section('title', 'test superdb.cc')

@section('content')
<div class="container mx-auto px-4">
    <div class="space-y-5">
        @markdown
        # Heading
        _En lista:_
        * asda
        * asdasdasdasd
        * 1
        @endmarkdown
    </div> <!-- end container -->
</div>
@endsection
