<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('APP.NAME') }}</title>
        <link rel='stylesheet' type="text/css" href='{{ asset('css/app.css') }}'>
    </head>

    <body>
        @include('layouts.navbar')
        <div class="container-fluid">
        @yield('content')
        </div>
    </body>
</html>
