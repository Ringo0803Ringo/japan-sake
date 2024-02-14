<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body style="padding: 60px 0;">
    <div id="app">
        @include('layouts.header')

        <main class="py-4">

            <div class="row">
                <div class="col-12 col-md-8 col-lg-8">
                @yield('content')
                </div>
        
                <div class="col-12 col-md-4 col-lg-4 justify-content-end">
                @include('layouts.sidebar')
                </div>
            </div>
          
        </main>

        @include('layouts.footer')
    </div>
</body>
</html>
