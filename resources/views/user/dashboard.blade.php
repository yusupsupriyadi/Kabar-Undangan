@extends('layouts.app')

@section('content')
    <main class="bg-gray-100">
        <x-app.navbar />
        <div class="mx-auto mt-4 flex flex-wrap px-2 pt-4 md:px-12 lg:pt-10">
            <!--Menu-->
            <x-app.menu active="halaman-utama">
                <x-slot name="activeDisplay">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <p class="text-left text-sm">Halaman Utama</p>
                    </div>
                </x-slot>
            </x-app.menu>

            <!--Main Content-->
            <div class="border-rounded mt-6 w-full border border-gray-400 bg-white p-8 leading-normal text-gray-900 lg:mt-0 lg:w-4/5">

                @if (intval($user['vip']) !== 1)
                    <section class="mb-6">
                        <x-app.card-premium />
                    </section>
                @endif

                <div class="font-sans">
                    <h1 class="break-normal font-sans text-2xl font-semibold text-gray-900">Halaman Utama</h1>
                    <p class="my-2 pb-1 font-sans text-sm">Banyak fasilitas yang dapat kamu gunakan untuk mempercantik dan melengkapi informasi website pernikahan kamu, silahkan gunakan fasilitas dibawah ini.</p>

                    <div class="alert alert-info my-4 items-start rounded-lg !bg-gray-500/20 px-4 py-3">
                        <div>
                            <span class="text-sm font-extralight">Bila kamu memiliki pertanyaan, mungkin kamu bisa menemukannya <a href="/FAQ" class="cursor-pointer font-bold">Disini.</a></span>
                        </div>
                    </div>

                    <hr class="border-b border-gray-400">
                </div>
                <a class="btn-pilih text-md mt-4 flex items-center gap-2 rounded bg-green-600 px-6 py-4 font-bold uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-green-800 hover:shadow-lg" href="{{ route('subdomain', ['subdomain' => Auth::user()->name]) }}">
                    <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <div>Lihat Undangan Anda✨</div>
                </a>
                <main class="py-4">
                    <section class="mt-4 grid grid-cols-3 gap-8 lg:grid-cols-5">

                        <a href="/setting-undangan">
                            <x-app.card-menu id="pengaturan-undangan" paint="">
                                <x-slot name='icon'>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-8 w-8 md:h-10 md:w-10">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </x-slot>
                                <x-slot name="slot">
                                    <p class="mt-2 text-center text-xs font-semibold md:text-sm">Pengaturan <br> Undangan</p>
                                </x-slot>
                            </x-app.card-menu>
                        </a>

                        <a href="/setting-acara">
                            <x-app.card-menu id="setting-acara" paint="">
                                <x-slot name='icon'>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-8 w-8 md:h-10 md:w-10">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                    </svg>
                                </x-slot>
                                <x-slot name="slot">
                                    <p class="mt-2 text-center text-xs font-semibold md:text-sm">Informasi <br> Acara</p>
                                </x-slot>
                            </x-app.card-menu>
                        </a>

                        <a href="/mempelai-pria">
                            <x-app.card-menu id="mempelai-pria" paint="">
                                <x-slot name='icon'>
                                    <svg class="h-8 w-8 md:h-10 md:w-10" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <circle cx="12" cy="7" r="4" />
                                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                    </svg>
                                </x-slot>
                                <x-slot name="slot">
                                    <p class="mt-2 text-center text-xs font-semibold md:text-sm">Mempelai <br> pria</p>
                                </x-slot>
                            </x-app.card-menu>
                        </a>

                        <a href="/mempelai-wanita">
                            <x-app.card-menu id="mempelai-wanita" paint="">
                                <x-slot name='icon'>
                                    <svg class="h-8 w-8 md:h-10 md:w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </x-slot>
                                <x-slot name="slot">
                                    <p class="mt-2 text-center text-xs font-semibold md:text-sm">Mempelai <br> Wanita</p>
                                </x-slot>
                            </x-app.card-menu>
                        </a>

                        <a href="/cerita-cinta">
                            <x-app.card-menu id="cerita-cinta" paint="">
                                <x-slot name='icon'>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-8 w-8 md:h-10 md:w-10">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                </x-slot>
                                <x-slot name="slot">
                                    <p class="mt-2 text-center text-xs font-semibold md:text-sm">Cerita <br> Cinta</p>
                                </x-slot>
                            </x-app.card-menu>
                        </a>

                        <a href="/gallery">
                            <x-app.card-menu id="photo-gallery" paint="">
                                <x-slot name='icon'>
                                    <svg class="h-8 w-8 md:h-10 md:w-10" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <path d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
                                        <circle cx="12" cy="13" r="3" />
                                    </svg>
                                </x-slot>
                                <x-slot name="slot">
                                    <p class="mt-2 text-center text-xs font-semibold md:text-sm">Photo <br> Gallery</p>
                                </x-slot>
                            </x-app.card-menu>
                        </a>

                        {{-- <a href="/photo-background">
                            <x-app.card-menu id="photo-background" paint="indicator">
                                <x-slot name='icon'>
                                    <svg class="h-8 w-8 md:h-10 md:w-10" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <line x1="15" y1="8" x2="15.01" y2="8" />
                                        <rect x="4" y="4" width="16" height="16" rx="3" />
                                        <path d="M4 15l4 -4a3 5 0 0 1 3 0l 5 5" />
                                        <path d="M14 14l1 -1a3 5 0 0 1 3 0l 2 2" />
                                    </svg>
                                </x-slot>
                                <x-slot name="slot">
                                    <p class="mt-2 text-center text-xs md:text-sm font-semibold">Photo <br> Background</p>
                                </x-slot>
                            </x-app.card-menu>
                        </a> --}}

                        <a href="/music-background">
                            <x-app.card-menu id="music-background" paint="indicator">
                                <x-slot name='icon'>
                                    <svg class="h-8 w-8 md:h-10 md:w-10" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9 18V5l12-2v13" />
                                        <circle cx="6" cy="18" r="3" />
                                        <circle cx="18" cy="16" r="3" />
                                    </svg>
                                </x-slot>
                                <x-slot name="slot">
                                    <p class="mt-2 text-center text-xs font-semibold md:text-sm">Music <br> Background</p>
                                </x-slot>
                            </x-app.card-menu>
                        </a>

                        <a href="/kado-nikah">
                            <x-app.card-menu id="kado-nikah" paint="indicator">
                                <x-slot name='icon'>
                                    <svg class="h-8 w-8 md:h-10 md:w-10" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <rect x="3" y="8" width="18" height="4" rx="1" />
                                        <line x1="12" y1="8" x2="12" y2="21" />
                                        <path d="M19 12v7a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-7" />
                                        <path d="M7.5 8a2.5 2.5 0 0 1 0 -5a4.8 8 0 0 1 4.5 5a4.8 8 0 0 1 4.5 -5a2.5 2.5 0 0 1 0 5" />
                                    </svg>
                                </x-slot>
                                <x-slot name="slot">
                                    <p class="mt-2 text-center text-xs font-semibold md:text-sm">Kado <br> Nikah</p>
                                </x-slot>
                            </x-app.card-menu>
                        </a>

                        <a href="/kirim-undangan">
                            <x-app.card-menu id="kado-nikah" paint="indicator">
                                <x-slot name='icon'>
                                    <svg class="h-8 w-8 md:h-10 md:w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </x-slot>
                                <x-slot name="slot">
                                    <p class="mt-2 text-center text-xs font-semibold md:text-sm">Kirim <br> Undangan</p>
                                </x-slot>
                            </x-app.card-menu>
                        </a>

                        <a href="/tema">
                            <x-app.card-menu id="tema" paint="indicator">
                                <x-slot name='icon'>
                                    <svg class="h-8 w-8 md:h-10 md:w-10" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <path d="M12 21a9 9 0 1 1 0 -18a9 8 0 0 1 9 8a4.5 4 0 0 1 -4.5 4h-2.5a2 2 0 0 0 -1 3.75a1.3 1.3 0 0 1 -1 2.25" />
                                        <circle cx="7.5" cy="10.5" r=".5" fill="currentColor" />
                                        <circle cx="12" cy="7.5" r=".5" fill="currentColor" />
                                        <circle cx="16.5" cy="10.5" r=".5" fill="currentColor" />
                                    </svg>
                                </x-slot>
                                <x-slot name="slot">
                                    <p class="mt-2 text-center text-xs font-semibold md:text-sm">Ganti <br> Tema</p>
                                </x-slot>
                            </x-app.card-menu>
                        </a>

                    </section>
                </main>

                <x-app.testimoni-bar />
            </div>


        </div>

        <x-app.footer />
    </main>
@endsection
@push('scripts')
    <script>
        var vip = @json($user['vip']);
        if (parseInt(vip)) {
            $('#promo-panel').hide()
            $('#menu-navigation').removeClass('pt-20')
            $('#menu-navigation').addClass('pt-16')
        } else {
            $('#promo-panel').show()
            $('#menu-navigation').removeClass('pt-16')
            $('#menu-navigation').addClass('pt-20')
            setTimeout(() => {
                $('#modal-promo').show()
            }, 2000);
        }
    </script>
@endpush
