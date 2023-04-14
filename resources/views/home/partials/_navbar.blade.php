<main class="md:container absolute top-0 w-full py-2">
    <div class="navbar">
        <div class="flex-1 items-center">
            <img src="{{ asset('images/logo.png') }}" width="50" height="50" alt="logo kabar undangan">
            <a href="/" title="kabar undangan" class="btn-ghost btn text-2xl font-bold normal-case">Kabar Undangan</a>
        </div>
        <div class="flex-none">
            <ul class="text-md menu menu-horizontal hidden px-1 font-semibold lg:flex">
                {{-- <li><a href="/contact">Kontak</a></li> --}}
                <li><a href="/FAQ">FAQ</a></li>
            </ul>
            <div class="dropdown-end dropdown">
                <label tabindex="0" class="btn-ghost btn-circle avatar btn">
                    <div class="w-100 rounded-full">
                        <svg class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </label>
                <ul tabindex="0" class="dropdown-content menu menu-compact mt-3 w-52 rounded-lg bg-white p-2 font-semibold text-black shadow-2xl">
                    {{-- Auth Login Register --}}
                    @if (Route::has('login'))
                        @auth
                            <li>
                                <div class="text-lg font-bold">{{ Auth::user()->name }}</div>
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
        </div>
    </div>
</main>
