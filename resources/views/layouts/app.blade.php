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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/confetti.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/locale/id.min.js" integrity="sha512-he8U4ic6kf3kustvJfiERUpojM8barHoz0WYpAUDWQVn61efpm3aVAD8RWL8OloaDDzMZ1gZiubF9OSdYBqHfQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/masthina" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alkatra:wght@400;500;600;700&family=EB+Garamond:ital,wght@0,400;0,600;0,700;1,500&family=Great+Vibes&family=Open+Sans&family=Poppins:wght@400;500;600;700&family=Tangerine:wght@400;700&display=swap" rel="stylesheet">
    <!-- Scripts -->

    @yield('styles')
    {{-- Develop --}}
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    <!-- Build -->
    <link rel="manifest" href="{{ asset('/build/manifest.json') }}">
    <link rel="stylesheet" href="{{ asset('/build/assets/app.3a729528.css') }}">
    <script src="{{ asset('/build/assets/app.f41402fc.js') }}"></script>
</head>

<body id="body">
    <main class="body">
        @yield('content')
    </main>

    <div class="toast cursor-pointer md:block">
        <a class="alert alert-success rounded-full px-4 py-2" href="https://api.whatsapp.com/send?phone=085155305665&text=">
            <div>
                <span class="text-sm">butuh bantuan?</span>
                <img src="{{ asset('/svg/whatsapp.svg') }}" />
            </div>
        </a>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/id.js"></script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
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
    <script type="module">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @stack('scripts')
</body>

</html>
