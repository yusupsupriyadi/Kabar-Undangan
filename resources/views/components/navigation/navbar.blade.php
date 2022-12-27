<main class="shadow-md">
    <div class="container w-full">
        <div class="navbar">
            <div class="flex-1">
                <a href="/" class="btn btn-ghost normal-case text-2xl font-bold">KabarUndangan</a>
            </div>
            <div class="flex-none">
                <ul class="menu menu-horizontal px-1 text-md font-semibold hidden lg:flex">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Demo</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <div class="dropdown dropdown-end">
                    <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                        <div class="w-100 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                    </label>
                    <ul tabindex="0"
                        class="menu menu-compact dropdown-content mt-3 p-2 shadow-xl bg-transparent rounded-lg w-52 text-black font-semibold backdrop-blur-xl">
                        {{-- Auth Login Register --}}
                        @if (Route::has('login'))
                            @auth
                                <li>
                                    <a href="{{ route('profile.edit') }}"
                                        class="font-bold text-xl">{{ Auth::user()->name }}</a>
                                </li>
                                <li>
                                    <a href="{{ url('/dashboard') }}" class="text-lg">Dashboard</a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a :href="route('logout')" class="w-full text-lg"
                                            onclick="event.preventDefault();
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
            </div>
        </div>
    </div>
</main>
