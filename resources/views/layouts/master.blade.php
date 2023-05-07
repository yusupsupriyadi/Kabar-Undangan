<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="content-language" content="id">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Kabarundangan.com adalah platform layanan website undangan online yang memudahkan Anda dalam membuat dan mengirim undangan pernikahan secara digital. Dapatkan berbagai pilihan desain undangan yang menarik dan personalisasi sesuai dengan tema pernikahan Anda. Nikmati juga berbagai fitur lengkap seperti informasi acara pernikahan dan galeri foto pernikahan. Gunakan Kabarundangan.com untuk menghemat waktu dan biaya dalam mengundang tamu undangan pernikahan Anda.">
    <title>
        @yield('title', 'Kabar Undangan')
    </title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon-logo.png') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,600;0,700;1,400&display=swap" rel="stylesheet">

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

    @include('layouts._library', ['library' => 'css'])
</head>

<body id="body">
    <x-app.navbar-blog />
    @yield('content')

    <section id="footer">
        <x-navigation.footer />
    </section>


    @include('layouts._library', ['library' => 'js'])
    @stack('scripts')
</body>

</html>
