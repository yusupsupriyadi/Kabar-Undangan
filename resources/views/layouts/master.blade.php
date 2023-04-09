<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="content-language" content="id">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Platform pembuatan undangan digital gratis.">
    <link rel="icon" href="#" type="image/gif">
    <title>
        @yield('title', 'Kabar Undangan')
    </title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <!-- Scripts -->

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-F9VVW3GCJ1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-F9VVW3GCJ1');
    </script>

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    <!-- Build -->
    <link rel="manifest" href="{{ asset('/build/manifest.json') }}">
    <link rel="stylesheet" href="{{ asset('/build/assets/app.282c43f8.css') }}">
    <link rel="stylesheet" href="{{ asset('/build/assets/app.02e8755c.css') }}">
</head>

<body id="body">
    @yield('content')

    <section id="footer">
        <x-navigation.footer />
    </section>

    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <script src="{{ asset('/build/assets/app.014ce5ac.js') }}"></script>
    @stack('scripts')
</body>

</html>
