@if($library == 'css')
    <!-- Local -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    <!-- Production -->
    <link rel="manifest" href="{{ asset('/build/manifest.json') }}">
    <link rel="stylesheet" href="{{ asset('/build/assets/app.282c43f8.css') }}">
    <link rel="stylesheet" href="{{ asset('/build/assets/app.3050e0e1.css') }}">
@else
    <script src="{{ asset('/build/assets/app.014ce5ac.js') }}"></script>
@endif