@if ($library == 'css')
    <!-- LIBRARY -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/confetti.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <!-- DEVELOP -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    <!-- PRODUCTION -->
    <link rel="manifest" href="{{ asset('/build/manifest.json') }}">
    <link rel="stylesheet" href="{{ asset('/build/assets/app.0de16909.css') }}">
@else
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/id.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({});

        document.addEventListener('DOMContentLoaded', function() {
            flatpickr('.flatpickr', {
                locale: 'id',
                enableTime: true,
                dateFormat: 'Y-m-d H:i',
            });
        });
    </script>
    <script src="{{ asset('/build/assets/app.e93dd8d8.js') }}"></script>
@endif
