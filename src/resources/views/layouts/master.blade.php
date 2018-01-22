<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    @yield('styles')
</head>
<body>
    <div id="app">
        @yield('header')
        @yield('left')
        @yield('content')
        @yield('right')
        @yield('footer')
    </div>

    <!-- Scripts -->
    @yield('scripts')
</body>
</html>
