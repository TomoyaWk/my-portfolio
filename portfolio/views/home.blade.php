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
        <link href="{{ asset('css/loading.css') }}" rel="stylesheet">
        <link href="{{ asset('css/markdown.css') }}" rel="stylesheet">
        <script>
            window.Laravel = {};
            window.Laravel.csrfToken = "{{ csrf_token() }}";
        </script>
    </head>
    <body>
    
    
    <div class="font-sans" id="app">
        <router-view></router-view>
    </div>


    <!-- Scripts -->
    <script src="{{ mix('/js/app.js') }}" defer></script>
    </body>
</html>


