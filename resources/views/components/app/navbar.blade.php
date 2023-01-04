<nav id="header" class="top-0 z-10 border-b border-gray-400 bg-white">
    <div class="container mx-auto mt-0 flex flex-wrap items-center justify-between py-4">
        <div class="flex items-center pl-4">
            <svg class="h-5 fill-current pr-3 text-purple-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M0 2C0 .9.9 0 2 0h16a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm14 12h4V2H2v12h4c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2zM5 9l2-2 2 2 4-4 2 2-6 6-4-4z" />
            </svg>
            <a class="text-xl font-extrabold text-gray-900 no-underline hover:no-underline" href="/">
                Kabar Undangan
            </a>
        </div>
        <div class="block pr-4 lg:hidden">
            <button id="nav-toggle" class="flex appearance-none items-center rounded border border-gray-600 px-3 py-2 text-gray-500 hover:border-purple-500 hover:text-gray-900 focus:outline-none">
                <svg class="h-3 w-3 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                </svg>
            </button>
        </div>
        <div class="z-20 mt-2 hidden w-full flex-grow lg:mt-0 lg:flex lg:w-auto lg:content-center lg:items-center" id="nav-content">
            <div class="mx-auto w-full max-w-sm flex-1 content-center py-4 lg:py-0">
                <a href="/paket-premium" class="flex items-center justify-center rounded-xl border-2 border-black bg-pink-100 px-4 py-2 font-bold shadow-[5px_5px_0_0_#000] transition hover:shadow-none focus:outline-none focus:ring active:bg-pink-50">
                    Premium <span aria-hidden="true" class="ml-1.5" role="img">✨</span>
                </a>
            </div>
            <ul class="list-reset items-center justify-end lg:flex">
                <li class="mr-3 py-2 lg:py-0">
                    <a class="inline-block py-2 px-4 font-bold text-gray-900 no-underline" href="#">Lihat Undangan</a>
                </li>
                <li class="mr-3 py-2 text-left lg:py-0">
                    <div class="dropdown lg:dropdown-end">
                        <label tabindex="0" class="btn-ghost btn-circle avatar btn">
                            <div class="w-100 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                        </label>
                        <ul tabindex="0" class="dropdown-content menu menu-compact mt-3 w-52 rounded-lg bg-transparent p-2 text-left font-semibold text-black shadow-xl backdrop-blur-lg">
                            {{-- Auth Login Register --}}
                            @if (Route::has('login'))
                                @auth
                                    <li>
                                        <a href="{{ route('profile.edit') }}" class="grid grid-cols-1">
                                            <div class="text-lg">{{ Auth::user()->name }}</div>
                                            <div class="text-xs text-blue-600">edit Profile</div>
                                        </a>
                                    </li>
                                    <hr>
                                    <li>
                                        <a href="{{ url('/dashboard') }}" class="text-lg">Dashboard</a>
                                    </li>
                                    <hr>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a :href="route('logout')" class="text-lg" onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </a>
                                        </form>
                                    </li>
                                @else
                                    <li>
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="text-lg">Register</a>
                                        @endif
                                    </li>
                                    <li>
                                        <a href="{{ route('login') }}" class="text-lg">Log in</a>
                                    </li>
                                @endauth
                            @endif
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
