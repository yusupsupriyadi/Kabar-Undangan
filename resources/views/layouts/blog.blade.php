<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="content-language" content="id">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta')
    <link rel="icon" href="#" type="image/gif">
    <title>
        @yield('title', 'Kabar Undangan')
    </title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon-logo.png') }}">
    <!-- Fonts -->
    <link href="https://fonts.cdnfonts.com/css/masthina" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alkatra:wght@400;500;600;700&family=EB+Garamond:ital,wght@0,400;0,600;0,700;1,500&family=Great+Vibes&family=Open+Sans&family=Poppins:wght@400;500;600;700&family=Tangerine:wght@400;700&display=swap" rel="stylesheet">
    @yield('libraries')

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

    @yield('styles')

    @include('layouts._library', ['library' => 'css'])
</head>

<body id="body" class="bg-base">
    <main class="body">
        <x-app.navbar-blog />
        @yield('content')
    </main>

    <div class="toast cursor-pointer md:block" id="toast-wa">
        <a class="alert alert-success rounded-full px-4 py-2" href="https://api.whatsapp.com/send?phone=6285155305665&text=">
            <div>
                <span class="text-sm">butuh bantuan?</span>
                <img src="{{ asset('/svg/whatsapp.svg') }}" />
            </div>
        </a>
    </div>

    <section id="footer" class="mt-10">
        <x-navigation.footer />
    </section>


    @include('layouts._library', ['library' => 'js'])
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#close-modal-promo').click(() => {
            $('#modal-promo').hide()
        })
    </script>
    @stack('scripts')
</body>

</html>
