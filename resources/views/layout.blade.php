<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    @yield('head:meta')

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" async>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    @if (env('ASSET_URL', false))
    <link rel="dns-prefetch" href="{{ env('ASSET_URL') }}">
    @endif

    @yield('link:dns-prefetch')

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" async>

    @yield('link:stylesheet')

    <script src="{{ mix('/js/manifest.js') }}"></script>
    <script src="{{ mix('/js/vendor.js') }}"></script>

    @yield('head:script')


</head>
<body>
  @yield('body')
</body>
</html>
