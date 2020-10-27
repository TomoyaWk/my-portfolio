<!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" />

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


