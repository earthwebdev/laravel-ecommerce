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
</head>
<body>
    <div id="app">
        <x-base.back.common.navbar />

        <div class="container">
            <div class="row">
                @if(auth()->user()->is_admin)
                <div class="col-md-3">
                    <x-base.back.common.sidebar/>
                </div>
                @endif
                <div class="{{ auth()->user()->is_admin ? 'col-md-9':'col-md-12' }}">
                    <x-base.back.common.alert-message />
                    {{ $slot }}
                </div>
            </div>
        </div>

    </div>
    @yield('footer_scripts')
</body>
</html>
