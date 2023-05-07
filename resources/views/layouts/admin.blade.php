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
    @yield('styles')

    @include('layouts._library', ['library' => 'css'])
</head>

<body id="body" class="bg-gray-100">
    <main class="body">
        <div class="navbar border-b-[1px] border-gray-200 bg-base-100">
            <div class="flex-none">
                <button class="btn-ghost btn-square btn lg:hidden" id="open-drawer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block h-5 w-5 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
            <div class="flex-1">
                <a class="btn-ghost btn text-xl normal-case">Kabar Undangan <span class="ml-1 font-semibold text-sky-600">ADMIN</span></a>
            </div>
            <div class="flex-none">
                <div class="dropdown-end dropdown block pr-2">
                    <label tabindex="0" class="btn-ghost btn-circle avatar btn">
                        <div class="w-100 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-7 w-7">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                    </label>
                    <ul tabindex="0" class="dropdown-content menu menu-compact mt-3 w-52 rounded-lg border-2 border-b-4 border-black bg-white p-2 font-semibold text-black shadow-2xl">
                        @if (Route::has('login'))
                            @auth
                                <li>
                                    <a href="{{ route('profile.edit') }}" class="text-lg font-bold">{{ Auth::user()->name }}</a>
                                </li>
                                <hr class="mx-4">
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a :href="route('logout')" class="flex w-full items-center gap-2 text-lg" onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            <svg class="h-6 w-6 text-black" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" />
                                                <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                                                <path d="M7 12h14l-3 -3m0 6l3 -3" />
                                            </svg>
                                            {{ __('Keluar') }}
                                        </a>
                                    </form>
                                </li>
                            @else
                                <li>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="gap-2 text-lg">
                                            <svg class="h-6 w-6 text-black" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" />
                                                <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                                <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                                <line x1="16" y1="5" x2="19" y2="8" />
                                            </svg>
                                            <div>Daftar</div>
                                        </a>
                                    @endif
                                </li>
                                <li>
                                    <a href="{{ route('login') }}" class="gap-2 text-lg">
                                        <svg class="h-6 w-6 text-black" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                                            <path d="M20 12h-13l3 -3m0 6l-3 -3" />
                                        </svg>
                                        <div>Masuk</div>
                                    </a>
                                </li>
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <div class="drawer-mobile drawer">
            <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
            <div class="drawer-content">
                <label for="my-drawer-2" class="drawer-button btn hidden">Open drawer</label>
                <main class="mx-8 mt-8">
                    @yield('content')
                </main>
            </div>
            <div class="drawer-side">
                <label for="my-drawer-2" class="drawer-overlay"></label>
                <ul class="menu w-80 bg-base-100 p-4 text-base-content">
                    <li>
                        <a href="/admin/dashboard" id="dashboard-link" class="flex items-center font-semibold text-gray-600">
                            <svg class="h-7 w-7" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <circle cx="12" cy="13" r="2" />
                                <line x1="13.45" y1="11.55" x2="15.5" y2="9.5" />
                                <path d="M6.4 20a9 9 0 1 1 11.2 0Z" />
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="/admin/users" id="users-link" class="mt-2 flex items-center font-semibold text-gray-600">
                            <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Pengguna
                        </a>
                    </li>

                    <li>
                        <a href="/admin/blog" id="blog-link" class="mt-2 flex items-center font-semibold text-gray-600">
                            <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Blog
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </main>


    @include('layouts._library', ['library' => 'js'])
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @stack('scripts')
</body>

</html>
