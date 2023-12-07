<nav id="header" class="fixed top-0 z-10 w-full border-b border-gray-400 bg-white md:relative">
    <div class="mx-auto mt-0 flex flex-wrap items-center justify-between py-3 md:container">
        <div class="flex items-center pl-4">
            <img src="{{ asset('images/favicon-logo.png') }}" width="50" alt="">
            <a href="/" class="ml-4 text-xl font-extrabold text-gray-900 no-underline hover:no-underline">
                Kabar Undangan
            </a>
        </div>

        <div class="flex items-center gap-2 md:hidden">
            <div class="dropdown dropdown-end hidden md:block">
                <label tabindex="0" class="avatar btn btn-circle btn-ghost">
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
                                <div class="text-md font-bold">{{ Auth::user()->name }}</div>
                            </li>
                            <hr class="mx-4">
                            <li>
                                <a href="{{ url('/dashboard') }}" class="gap-2 text-lg">
                                    <svg class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    <div>Dashboard</div>
                                </a>
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

            <label tabindex="0" class="cursor-pointer pr-4" data-te-sidenav-toggle-ref data-te-target="#sidenav-7" aria-controls="#sidenav-7" aria-haspopup="true">
                <svg class="h-8 w-8 text-black" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <line x1="4" y1="6" x2="20" y2="6" />
                    <line x1="4" y1="12" x2="20" y2="12" />
                    <line x1="4" y1="18" x2="20" y2="18" />
                </svg>
            </label>
        </div>

        <nav id="sidenav-7" class="fixed right-0 top-0 z-[1035] h-screen w-60 translate-x-full overflow-hidden bg-white bg-opacity-20 shadow-[0_4px_12px_0_rgba(0,0,0,0.07),_0_2px_4px_rgba(0,0,0,0.05)] backdrop-blur backdrop-saturate-150 backdrop-filter data-[te-sidenav-hidden='false']:-translate-x-0 dark:bg-zinc-800" data-te-sidenav-init data-te-sidenav-hidden="true" data-te-sidenav-right="true">
            <ul class="relative m-0 list-none px-[0.2rem]" data-te-sidenav-menu-ref>
                <li class="relative">
                    <a href="/" class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] font-semibold text-gray-800 outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10" data-te-sidenav-link-ref>
                        Home
                    </a>
                </li>

                <li class="relative">
                    <a href="/cara-membuat-undangan" class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] font-semibold text-gray-800 outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10" data-te-sidenav-link-ref>
                        Cara Buat?
                    </a>
                </li>

                <li class="relative">
                    <a href="/FAQ" class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] font-semibold text-gray-800 outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10" data-te-sidenav-link-ref>
                        FAQ
                    </a>
                </li>

                <li class="relative">
                    <a href="https://demo.kabarundangan.com" class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] font-semibold text-gray-800 outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10" data-te-sidenav-link-ref>
                        Demo
                    </a>
                </li>

                @if (Route::has('login'))
                    @auth
                        <li class="relative">
                            <a href="{{ url('/dashboard') }}" class="flex h-12 cursor-pointer items-center gap-2 truncate rounded-[5px] px-6 py-4 text-[0.875rem] font-semibold text-gray-800 outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10" data-te-sidenav-link-ref>
                                <svg class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                Dashboard
                            </a>
                        </li>

                        <li class="relative">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="flex h-12 cursor-pointer items-center gap-2 truncate rounded-[5px] px-6 py-4 text-[0.875rem] font-semibold text-gray-800 outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10" data-te-sidenav-link-ref>
                                    <svg class="h-6 w-6 text-gray-700" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                                        <path d="M7 12h14l-3 -3m0 6l3 -3" />
                                    </svg>
                                    {{ __('Keluar') }}
                                </a>
                            </form>
                        </li>
                    @else
                        <li class="relative">
                            <a href="/register" class="flex h-12 cursor-pointer items-center gap-2 truncate rounded-[5px] px-6 py-4 text-[0.875rem] font-semibold text-gray-800 outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10" data-te-sidenav-link-ref>
                                <svg class="h-6 w-6 text-gray-700" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                    <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                    <line x1="16" y1="5" x2="19" y2="8" />
                                </svg>
                                Daftar
                            </a>
                        </li>

                        <li class="relative">
                            <a href="/login" class="flex h-12 cursor-pointer items-center gap-2 truncate rounded-[5px] px-6 py-4 text-[0.875rem] font-semibold text-gray-800 outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10" data-te-sidenav-link-ref>
                                <svg class="h-6 w-6 text-gray-700" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                                    <path d="M20 12h-13l3 -3m0 6l-3 -3" />
                                </svg>
                                Masuk
                            </a>
                        </li>
                    @endauth
                @endif
            </ul>
        </nav>

        <div class="hidden md:block" id="nav-content">
            <ul class="list-reset flex items-center justify-end gap-4">
                <li class="mr-3 py-2 lg:py-0">
                    <a class="" href="/">
                        Home
                    </a>
                </li>

                <li class="mr-3 hidden py-2 lg:py-0">
                    <a class="" href="/blog">
                        Blog
                    </a>
                </li>

                <li class="mr-3 py-2 lg:py-0">
                    <a class="" href="/cara-membuat-undangan">
                        Cara buat?
                    </a>
                </li>

                <li class="mr-3 py-2 lg:py-0">
                    <a class="" href="/FAQ">
                        FAQ
                    </a>
                </li>
                @if (Route::has('login'))
                    @auth
                        <li class="mr-3 py-2 lg:py-0">
                            <a class="btn-pilih flex items-center gap-2 rounded bg-green-600 px-3 py-2 text-xs font-bold uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-green-800 hover:shadow-lg" href="{{ route('subdomain', ['subdomain' => Auth::user()->name]) }}" target="_blank">
                                <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <div>Lihat Undangan</div>
                            </a>
                        </li>
                    @endauth
                @endif
                <li class="mr-3 py-2 text-left lg:py-0">
                    <div class="dropdown-end dropdown">
                        <label tabindex="0" class="avatar btn btn-circle btn-ghost">
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
                                        <div class="text-md font-bold">{{ Auth::user()->name }}</div>
                                    </li>
                                    <hr class="mx-4">
                                    <li>
                                        <a href="{{ url('/dashboard') }}" class="gap-2 text-lg">
                                            <svg class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                            </svg>
                                            <div>Dashboard</div>
                                        </a>
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
                </li>
            </ul>
        </div>


    </div>
    <div id="promo-panel" class="hidden bg-indigo-600 px-4 py-2 text-white">
        <p class="md:text-md text-center text-xs">
            <span class="animate-pulse">hanya 80rb</span> <span class="text-red-500/50 line-through">100rb</span>
            <a href="https://api.whatsapp.com/send?phone=6285155305665&text=Halo%0AAku%20tertarik%20mengambil%20paket%20premium" class="inline-block uppercase underline">Ambil Premium Sekarang!</a>
        </p>
    </div>
</nav>
