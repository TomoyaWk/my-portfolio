<!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    </head>
    <body>
    <div　class="container">
        <div id="app">
            <h1 class="text-3xl text-green-500"><a>DASH BOARD</a></h1>
            <h2>test</h2>
            <h3>test</h3>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ mix('/js/app.js') }}" defer></script>
    </body>
</html>
