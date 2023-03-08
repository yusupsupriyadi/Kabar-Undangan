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
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/confetti.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/locale/id.min.js" integrity="sha512-he8U4ic6kf3kustvJfiERUpojM8barHoz0WYpAUDWQVn61efpm3aVAD8RWL8OloaDDzMZ1gZiubF9OSdYBqHfQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Scripts -->

    {{-- Develop --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Build -->
    {{-- <link rel="manifest" href="{{ asset('/build/manifest.json') }}">
    <link rel="stylesheet" href="{{ asset('/build/assets/app.f2178838.css') }}">
    <script src="{{ asset('/build/assets/app.57e74c43.js') }}"></script> --}}
</head>

<body id="body">
    <main class="body">
        @yield('content')
    </main>

    <section class="loading-screen hidden">
        <div class="toast-center toast-middle toast">
            <div class="alert-loading alert">
                <div>
                    <div class="loading">
                        <div class="ball one"></div>
                        <div class="ball two"></div>
                        <div class="ball three"></div>
                        <div class="ball four"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/id.js"></script>
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
