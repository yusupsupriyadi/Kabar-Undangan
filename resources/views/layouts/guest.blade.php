<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kabar Undangan</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

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

<body>
    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>
    <script src="{{ asset('/build/assets/app.014ce5ac.js') }}"></script>
</body>

</html>
