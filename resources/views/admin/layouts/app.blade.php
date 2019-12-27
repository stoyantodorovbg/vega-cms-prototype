<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.custom_name', 'Vega CMS') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app" data-locale="{{ app()->getLocale() }}">
    @include('front.partials.nav')
    <main class="container-fluid">

        <div class="col-lg-3">
            <dynamic-menu :menu_id="1"></dynamic-menu>
        </div>


        <div class="col-lg-9">
            @yield('content')
        </div>

    </main>
</div>
</body>
</html>
