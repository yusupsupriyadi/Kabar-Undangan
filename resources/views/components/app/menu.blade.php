<div class="w-full text-xl leading-normal text-gray-800 lg:w-1/5 lg:px-6">
    <p class="py-2 text-base font-bold text-gray-700">Menu</p>
    <div class="block lg:hidden">
        <button id="menu-toggle" class="flex w-full appearance-none justify-between rounded border border-gray-600 bg-white px-3 py-3 hover:border-purple-500 focus:outline-none lg:bg-transparent">
            {{ $activeDisplay }}
            <svg class="float-right h-3 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
            </svg>
        </button>
    </div>
    <div class="z-20 mt-0 hidden h-64 w-full overflow-y-auto overflow-x-hidden border border-gray-400 bg-white shadow lg:block lg:h-auto lg:overflow-y-hidden lg:border-transparent lg:bg-transparent lg:shadow-none" style="top:5em;" id="menu-content">
        <ul class="list-reset">
            <li class="py-2 hover:bg-purple-100 md:my-0 lg:hover:bg-transparent">
                <a href="/dashboard" class="{{ $active === 'halaman-utama' ? 'hover:text-purple-500 border-purple-500 lg:hover:border-purple-500' : 'hover:text-purple-500 lg:hover:border-gray-400' }} flex items-center gap-2 border-l-4 border-transparent pl-4 align-middle text-gray-700 no-underline">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="{{ $active === 'halaman-utama' ? 'font-semibold text-black' : '' }} h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                    <p class="{{ $active === 'halaman-utama' ? 'font-semibold text-black' : '' }} pb-1 text-sm md:pb-0">Halaman Utama</p>
                </a>
            </li>
            <li class="py-2 hover:bg-purple-100 md:my-0 lg:hover:bg-transparent">
                <a href="/setting-undangan" class="{{ $active === 'pengaturan-undangan' ? 'hover:text-purple-500 border-purple-500 lg:hover:border-purple-500' : 'hover:text-purple-500 lg:hover:border-gray-400' }} flex items-center gap-2 border-l-4 border-transparent pl-4 align-middle text-gray-700 no-underline">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="{{ $active === 'pengaturan-undangan' ? 'font-semibold text-black' : '' }} h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <p class="{{ $active === 'pengaturan-undangan' ? 'font-semibold text-black' : '' }} pb-1 text-sm md:pb-0">Pengaturan Undangan</p>
                </a>
            </li>
            <li class="py-2 hover:bg-purple-100 md:my-0 lg:hover:bg-transparent">
                <a href="/setting-acara" class="{{ $active === 'setting-acara' ? 'hover:text-purple-500 border-purple-500 lg:hover:border-purple-500' : 'hover:text-purple-500 lg:hover:border-gray-400' }} flex items-center gap-2 border-l-4 border-transparent pl-4 align-middle text-gray-700 no-underline">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                    </svg>
                    <p class="pb-1 text-sm md:pb-0">Informasi Acara</p>
                </a>
            </li>
            <li class="py-2 hover:bg-purple-100 md:my-0 lg:hover:bg-transparent">
                <a href="/mempelai-pria" class="{{ $active === 'mempelai-pria' ? 'hover:text-purple-500 border-purple-500 lg:hover:border-purple-500' : 'hover:text-purple-500 lg:hover:border-gray-400' }} flex items-center gap-2 border-l-4 border-transparent pl-4 align-middle text-gray-700 no-underline">
                    <svg class="h-5 w-5" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <circle cx="12" cy="7" r="4" />
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                    </svg>
                    <p class="pb-1 text-sm md:pb-0">Mempelai Pria</p>
                </a>
            </li>
            <li class="py-2 hover:bg-purple-100 md:my-0 lg:hover:bg-transparent">
                <a href="/mempelai-wanita" class="{{ $active === 'mempelai-wanita' ? 'hover:text-purple-500 border-purple-500 lg:hover:border-purple-500' : 'hover:text-purple-500 lg:hover:border-gray-400' }} flex items-center gap-2 border-l-4 border-transparent pl-4 align-middle text-gray-700 no-underline">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <p class="pb-1 text-sm md:pb-0">Mempelai Wanita</p>
                </a>
            </li>
            <li class="py-2 hover:bg-purple-100 md:my-0 lg:hover:bg-transparent">
                <a href="/cerita-cinta" class="{{ $active === 'mempelai-wanita' ? 'hover:text-purple-500 border-purple-500 lg:hover:border-purple-500' : 'hover:text-purple-500 lg:hover:border-gray-400' }} flex items-center gap-2 border-l-4 border-transparent pl-4 align-middle text-gray-700 no-underline">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                    </svg>
                    <p class="pb-1 text-sm md:pb-0">Cerita Cinta</p>
                </a>
            </li>
            <li class="py-2 hover:bg-purple-100 md:my-0 lg:hover:bg-transparent">
                <a href="/gallery" class="{{ $active === 'mempelai-wanita' ? 'hover:text-purple-500 border-purple-500 lg:hover:border-purple-500' : 'hover:text-purple-500 lg:hover:border-gray-400' }} flex items-center gap-2 border-l-4 border-transparent pl-4 align-middle text-gray-700 no-underline">
                    <svg class="h-5 w-5" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <path d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
                        <circle cx="12" cy="13" r="3" />
                    </svg>
                    <p class="pb-1 text-sm md:pb-0">Photo Gallery</p>
                </a>
            </li>
            <p class="py-2 pt-4 pl-4 text-base font-bold text-gray-700 lg:pl-0">Fitur Premium</p>
            <li class="py-2 hover:bg-purple-100 md:my-0 lg:hover:bg-transparent">
                <a href="/background-foto" class="{{ $active === 'mempelai-wanita' ? 'hover:text-purple-500 border-purple-500 lg:hover:border-purple-500' : 'hover:text-purple-500 lg:hover:border-gray-400' }} flex items-center gap-2 border-l-4 border-transparent pl-4 align-middle text-gray-700 no-underline">
                    <svg class="h-5 w-5" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="15" y1="8" x2="15.01" y2="8" />
                        <rect x="4" y="4" width="16" height="16" rx="3" />
                        <path d="M4 15l4 -4a3 5 0 0 1 3 0l 5 5" />
                        <path d="M14 14l1 -1a3 5 0 0 1 3 0l 2 2" />
                    </svg>
                    <p class="pb-1 text-sm md:pb-0">Photo Background</p>
                </a>
            </li>
            <li class="py-2 hover:bg-purple-100 md:my-0 lg:hover:bg-transparent">
                <a href="/music-background" class="{{ $active === '' ? 'hover:text-purple-500 border-purple-500 lg:hover:border-purple-500' : 'hover:text-purple-500 lg:hover:border-gray-400' }} flex items-center gap-2 border-l-4 border-transparent pl-4 align-middle text-gray-700 no-underline">
                    <svg class="h-5 w-5" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 18V5l12-2v13" />
                        <circle cx="6" cy="18" r="3" />
                        <circle cx="18" cy="16" r="3" />
                    </svg>
                    <p class="pb-1 text-sm md:pb-0">Music Background</p>
                </a>
            </li>
            <li class="py-2 hover:bg-purple-100 md:my-0 lg:hover:bg-transparent">
                <a href="/kado-nikah" class="{{ $active === '' ? 'hover:text-purple-500 border-purple-500 lg:hover:border-purple-500' : 'hover:text-purple-500 lg:hover:border-gray-400' }} flex items-center gap-2 border-l-4 border-transparent pl-4 align-middle text-gray-700 no-underline">
                    <svg class="h-5 w-5" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <rect x="3" y="8" width="18" height="4" rx="1" />
                        <line x1="12" y1="8" x2="12" y2="21" />
                        <path d="M19 12v7a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-7" />
                        <path d="M7.5 8a2.5 2.5 0 0 1 0 -5a4.8 8 0 0 1 4.5 5a4.8 8 0 0 1 4.5 -5a2.5 2.5 0 0 1 0 5" />
                    </svg>
                    <p class="pb-1 text-sm md:pb-0">Kado Nikah</p>
                </a>
            </li>
            <li class="py-2 hover:bg-purple-100 md:my-0 lg:hover:bg-transparent">
                <a href="/setting-tema" class="{{ $active === '' ? 'hover:text-purple-500 border-purple-500 lg:hover:border-purple-500' : 'hover:text-purple-500 lg:hover:border-gray-400' }} flex items-center gap-2 border-l-4 border-transparent pl-4 align-middle text-gray-700 no-underline">
                    <svg class="h-5 w-5" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <path d="M12 21a9 9 0 1 1 0 -18a9 8 0 0 1 9 8a4.5 4 0 0 1 -4.5 4h-2.5a2 2 0 0 0 -1 3.75a1.3 1.3 0 0 1 -1 2.25" />
                        <circle cx="7.5" cy="10.5" r=".5" fill="currentColor" />
                        <circle cx="12" cy="7.5" r=".5" fill="currentColor" />
                        <circle cx="16.5" cy="10.5" r=".5" fill="currentColor" />
                    </svg>
                    <p class="pb-1 text-sm md:pb-0">Ganti Tema</p>
                </a>
            </li>
        </ul>
    </div>
</div>
