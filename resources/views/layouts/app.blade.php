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

    <div style="margin-top: 5em;">
        <script type='text/javascript' src='https://ko-fi.com/widgets/widget_2.js'></script><script type='text/javascript'>kofiwidget2.init('Support Me on Ko-fi', '#29abe0', 'I2I11DVRB');kofiwidget2.draw();</script>
    </div>
</main>

</body>
</html>
