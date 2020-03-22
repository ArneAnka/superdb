<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SuperDB.cc - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
    @include('layouts.partials._nav')
<main>
    @yield('content')

    @include('layouts.partials._footer')
</main>

    <!-- Extra scripts -->
    @yield('scripts')
</body>
</html>
