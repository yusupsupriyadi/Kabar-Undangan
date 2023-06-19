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

<body id="body">
    <main class="body">
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

    {{-- <div id="modal-promo" class="toast-center toast toast-top z-50 hidden transform duration-1000">
        <div class="alert border-2 border-b-4 border-black bg-white shadow-xl">
            <div class="flex items-start gap-2">
                <span class="text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>

                <div class="flex-1">
                    <strong class="block font-medium text-gray-900">Ambil Premium</strong>
                    <p class="mt-1 text-sm text-gray-700">
                        Hanya: <br> Rp. 50.000,-/Selamanya
                    </p>
                    <div class="mt-4 flex gap-2">
                        <a href="https://api.whatsapp.com/send?phone=6285155305665&text=Halo%0AAku%20tertarik%20mengambil%20paket%20premium" target="_blank" class="inline-flex items-center gap-2 rounded-lg bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700">
                            <span class="text-sm">Ambil</span>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                            </svg>
                        </a>

                        <button id="close-modal-promo" class="block rounded-lg px-4 py-2 text-gray-700 transition hover:bg-gray-100">
                            <span class="text-sm">Batal</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    @include('layouts._library', ['library' => 'js'])
    <script>
        var navMenuDiv = document.getElementById("nav-content");
        var navMenu = document.getElementById("nav-toggle");

        var helpMenuDiv = document.getElementById("menu-content");
        var helpMenu = document.getElementById("menu-toggle");

        document.onclick = check;

        function check(e) {
            var target = (e && e.target) || (event && event.srcElement);


            //Nav Menu
            if (!checkParent(target, navMenuDiv)) {
                // click NOT on the menu
                if (checkParent(target, navMenu)) {
                    // click on the link
                    if (navMenuDiv.classList.contains("hidden")) {
                        navMenuDiv.classList.remove("hidden");
                    } else {
                        navMenuDiv.classList.add("hidden");
                    }
                } else {
                    // click both outside link and outside menu, hide menu
                    navMenuDiv.classList.add("hidden");
                }
            }

            //Help Menu
            if (!checkParent(target, helpMenuDiv)) {
                // click NOT on the menu
                if (checkParent(target, helpMenu)) {
                    // click on the link
                    if (helpMenuDiv.classList.contains("hidden")) {
                        helpMenuDiv.classList.remove("hidden");
                    } else {
                        helpMenuDiv.classList.add("hidden");
                    }
                } else {
                    // click both outside link and outside menu, hide menu
                    helpMenuDiv.classList.add("hidden");
                }
            }

        }

        function checkParent(t, elm) {
            while (t.parentNode) {
                if (t == elm) {
                    return true;
                }
                t = t.parentNode;
            }
            return false;
        }

        function loadingStop() {
            setTimeout(() => {
                document.querySelector('.body').classList.remove('blur-[2px]')
                document.querySelector('.loading-screen').classList.add('hidden')
            }, 1000);
        }

        function loadingStart() {
            document.querySelector('.body').classList.add('blur-[2px]')
            document.querySelector('.loading-screen').classList.remove('hidden')
        }
    </script>
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
