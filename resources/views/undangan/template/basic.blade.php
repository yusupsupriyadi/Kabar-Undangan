<div id="particles-js" class="absolute h-full w-full bg-cover bg-repeat" style="background-position: 50% 50%"></div>
<main class="m-auto">
    <section class="header opening mx-auto bg-white" id="opening">
        <div class="container mx-auto max-w-4xl text-center">
            <h1 class="pb-6 font-sans text-lg uppercase text-stone-600 md:text-xl">We Are Getting Married</h1>
            <section class="mt-2 flex items-center justify-center gap-4 text-center font-masthina text-stone-600">
                <h1 class="nama-pria-opening text-6xl md:text-8xl">{{ $data['mempelai_pria_api']['nama_panggilan'] }}</h1>
                <h2 class="px-2 text-5xl">&</h2>
                <h1 class="text-6xl md:text-8xl">{{ $data['mempelai_wanita_api']['nama_panggilan'] }}</h1>
            </section>
            <h5 class="mt-16 text-stone-600 md:text-xl">Save the date :</h5>
            <section class="mt-4 flex justify-center text-stone-600">
                <table>
                    <tbody class="scale-90 md:scale-100">
                        <tr>
                            <td colspan="3" class="font-serif text-lg font-semibold uppercase md:text-xl">
                                {{ \Carbon\Carbon::createFromFormat('d/m/Y', $data['setting_resepsi_api']['tanggal'])->locale('id')->isoFormat('MMMM') }}
                            </td>
                        </tr>
                        <tr class="font-serif text-sm font-bold uppercase">
                            <td>
                                <div class="w-20 border-y border-black py-1">{{ \Carbon\Carbon::createFromFormat('d/m/Y', $data['setting_resepsi_api']['tanggal'])->locale('id')->isoFormat('dddd') }}</div>
                            </td>
                            <td class="px-2 text-5xl font-thin md:text-6xl">{{ \Carbon\Carbon::createFromFormat('d/m/Y', $data['setting_resepsi_api']['tanggal'])->format('d') }}</td>
                            <td>
                                <div class="w-20 border-y border-black py-1">
                                    Jam {{ $data['setting_resepsi_api']['waktu_mulai'] }}</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="pt-1 font-serif text-xl font-semibold uppercase md:text-2xl">
                                {{ \Carbon\Carbon::createFromFormat('d/m/Y', $data['setting_resepsi_api']['tanggal'])->format('y') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
            @if ($data['vip'] === true || $data['vip'] === 'true')
                @if (request()->query('untuk') != null)
                    <section class="mt-6 text-stone-600">
                        <h5 class="font-tangerine text-2xl font-bold text-stone-600">Dear :</h5>
                        <h5 class="font-greatVibes text-3xl font-extrabold text-stone-600">{{ request()->query('untuk') }}</h5>
                    </section>
                @endif
            @endif
            <section class="mt-8 flex cursor-pointer items-center justify-center gap-2 rounded-xl bg-stone-600 p-3" id="open-undangan">
                <svg class="h-6 w-6 text-gray-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                    <polyline points="22,6 12,13 2,6" />
                </svg>
                <div class="text-md pt-0.5 font-alkatra font-bold text-gray-200">
                    BUKA UNDANGAN
                </div>
            </section>
        </div>
    </section>

    <section class="header">
        <div class="container mx-auto max-w-xl text-center">
            <h1 class="pb-6 font-sans text-lg uppercase text-stone-600 md:text-xl">We Are Getting Married</h1>
            <section class="font-masthina text-stone-600">
                <h1 class="text-6xl md:text-8xl">{{ $data['mempelai_pria_api']['nama_panggilan'] }}</h1>
                <h2 class="py-2 text-4xl md:text-5xl">&</h2>
                <h1 class="text-6xl md:text-8xl">{{ $data['mempelai_wanita_api']['nama_panggilan'] }}</h1>
            </section>
            <h5 class="mt-6 text-lg text-stone-600 md:text-xl">Save the date :</h5>
            <section class="mt-2 flex scale-90 justify-center text-stone-600 md:scale-100">
                <table>
                    <tbody>
                        <tr>
                            <td colspan="3" class="font-serif text-xl font-semibold uppercase">
                                {{ \Carbon\Carbon::createFromFormat('d/m/Y', $data['setting_resepsi_api']['tanggal'])->locale('id')->isoFormat('MMMM') }}
                            </td>
                        </tr>
                        <tr class="font-serif text-sm font-bold uppercase">
                            <td>
                                <div class="w-20 border-y border-black py-1">{{ \Carbon\Carbon::createFromFormat('d/m/Y', $data['setting_resepsi_api']['tanggal'])->locale('id')->isoFormat('dddd') }}</div>
                            </td>
                            <td class="px-2 text-6xl font-thin">{{ \Carbon\Carbon::createFromFormat('d/m/Y', $data['setting_resepsi_api']['tanggal'])->format('d') }}</td>
                            <td>
                                <div class="w-20 border-y border-black py-1">
                                    Jam {{ $data['setting_resepsi_api']['waktu_mulai'] }}</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="pt-1 font-serif text-2xl font-semibold uppercase">
                                {{ \Carbon\Carbon::createFromFormat('d/m/Y', $data['setting_resepsi_api']['tanggal'])->format('y') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
            <section class="text-md mt-4 scale-90 rounded-xl bg-stone-600 p-3 font-sans text-gray-200 md:scale-100">
                <div class="hidden uppercase" id="countdown">
                    <div class="flex items-center justify-center gap-6">
                        <div>
                            <h3 class="font-bold" id="day">-</h3>
                            <h4>Hari</h4>
                        </div>
                        <div>:</div>
                        <div>
                            <h3 class="font-bold" id="hour">-</h3>
                            <h4>jam</h4>
                        </div>
                        <div>:</div>
                        <div>
                            <h3 class="font-bold" id="minute">-</h3>
                            <h4>menit</h4>
                        </div>
                        <div>:</div>
                        <div>
                            <h3 class="font-bold" id="second">-</h3>
                            <h4>detik</h4>
                        </div>
                    </div>
                </div>
                <div class="hidden" id="countdown-done">
                    <h3 class="font-tangerine text-3xl font-bold">Kami Sudah Menikah 💍</h3>
                </div>
            </section>
        </div>
    </section>

    <section class="container mx-auto mt-0 max-w-4xl text-center md:mt-12" data-aos="fade-up" data-aos-duration="2000">
        <h2 class="mb-4 font-tangerine text-4xl font-semibold md:text-5xl">Bismillahirrahmanirrahim</h2>
        <p class="text-md font-serif md:text-2xl">Dengan Memohon Rahmat dan Ridho Allah SWT, Kami Bermaksud Menyelenggarakan Pernikahan Kami :</p>
    </section>

    <section class="container mt-4 items-center justify-evenly md:flex">
        <div class="w-auto">
            <section data-aos="fade-right" data-aos-duration="2000">
                <div class="mx-auto w-52">
                    @if ($data['mempelai_wanita_api']['foto'] !== 'null' && $data['mempelai_wanita_api']['foto'] !== null)
                        <img src="{{ asset('/storage/images/' . $data['mempelai_wanita_api']['foto']) }}" class="mt-8 rounded-full" width="208" height="208" alt="{{ $data['mempelai_wanita_api']['nama_lengkap'] }}" />
                    @else
                        <img src="{{ asset('/images/foto-wanita.png') }}" width="208" height="208" alt="{{ $data['mempelai_wanita_api']['nama_lengkap'] }}" />
                    @endif
                </div>
                <div class="text-center">
                    <h1 class="mt-4 font-tangerine text-5xl font-extrabold">{{ $data['mempelai_wanita_api']['nama_panggilan'] }}</h1>
                    <p class="mt-1 text-sm font-thin text-gray-600">{{ $data['mempelai_wanita_api']['nama_lengkap'] }}</p>
                    <p class="mt-6 text-[10px] text-gray-500">Anak dari Keluarga</p>
                    <p class="mt-1 text-[10px] text-gray-500">Bapak {{ $data['mempelai_wanita_api']['nama_ayah'] }} & Ibu {{ $data['mempelai_wanita_api']['nama_ibu'] }}</p>
                </div>
            </section>
            @if ($data['mempelai_wanita_api']['instagram'] !== 'null' && $data['mempelai_wanita_api']['instagram'] !== null)
                <a data-aos="fade-right" data-aos-duration="2000" title="instagram mempelai wanita" href="https://www.instagram.com/{{ $data['mempelai_wanita_api']['instagram'] }}/" target="blank" class="mx-auto mt-4 flex max-w-[8rem] items-center justify-center gap-1 rounded-xl bg-stone-600 py-2">
                    <svg class="h-4 w-4 text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <rect x="4" y="4" width="16" height="16" rx="4" />
                        <circle cx="12" cy="12" r="3" />
                        <line x1="16.5" y1="7.5" x2="16.5" y2="7.501" />
                    </svg>
                    <h6 class="text-xs text-white">Instagram</h6>
                </a>
            @endif
        </div>
        <div class="mt-12 w-auto md:mt-0">
            <section data-aos="fade-left" data-aos-duration="2000">
                <div class="mx-auto w-52">
                    @if ($data['mempelai_pria_api']['foto'] !== 'null' && $data['mempelai_pria_api']['foto'] !== null)
                        <img src="{{ asset('/storage/images/' . $data['mempelai_pria_api']['foto']) }}" class="mt-8 rounded-full" width="208" height="208" alt="{{ $data['mempelai_pria_api']['nama_lengkap'] }}" />
                    @else
                        <img src="/images/foto-pria.png" width="208" height="208" alt="{{ $data['mempelai_pria_api']['nama_lengkap'] }}" />
                    @endif
                </div>
                <div class="text-center">
                    <h1 class="mt-4 text-center font-tangerine text-5xl font-extrabold">{{ $data['mempelai_pria_api']['nama_panggilan'] }}</h1>
                    <p class="mt-1 text-sm font-thin text-gray-600">{{ $data['mempelai_pria_api']['nama_lengkap'] }}</p>
                    <p class="mt-6 text-[10px] text-gray-500">Anak dari Keluarga</p>
                    <p class="mt-1 text-[10px] text-gray-500">Bapak {{ $data['mempelai_pria_api']['nama_ayah'] }} & Ibu {{ $data['mempelai_pria_api']['nama_ibu'] }}</p>
                </div>
            </section>
            @if ($data['mempelai_pria_api']['instagram'] !== 'null' && $data['mempelai_pria_api']['instagram'] !== null)
                <a title="instagram mempelai pria" data-aos="fade-left" data-aos-duration="2000" href="https://www.instagram.com/{{ $data['mempelai_pria_api']['instagram'] }}/" target="blank" class="mx-auto mt-4 flex max-w-[8rem] items-center justify-center gap-1 rounded-xl bg-stone-600 py-2">
                    <svg class="h-4 w-4 text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <rect x="4" y="4" width="16" height="16" rx="4" />
                        <circle cx="12" cy="12" r="3" />
                        <line x1="16.5" y1="7.5" x2="16.5" y2="7.501" />
                    </svg>
                    <h6 class="text-xs text-white">Instagram</h6>
                </a>
            @endif
        </div>
    </section>

    <section class="container mx-auto mt-28 max-w-4xl">
        <h1 class="text-center font-greatVibes text-5xl font-bold text-stone-600" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">Save The Date</h1>
        <div class="mt-12 justify-center gap-6 md:flex">
            <div data-aos="zoom-in" data-aos-duration="1000" class="relative mt-6 flex items-start justify-between rounded-xl border-2 border-b-4 border-stone-500 p-4 sm:p-6 md:mt-0 lg:p-8" href="#">
                <div class="mx-auto text-gray-500">
                    <h3 class="text-center font-tangerine text-4xl font-bold text-gray-900">
                        Akad
                    </h3>
                    <div class="mt-4 flex items-center gap-2">
                        <svg class="h-7 w-7 text-stone-600" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <rect x="4" y="5" width="16" height="16" rx="2" />
                            <line x1="16" y1="3" x2="16" y2="7" />
                            <line x1="8" y1="3" x2="8" y2="7" />
                            <line x1="4" y1="11" x2="20" y2="11" />
                            <rect x="8" y="15" width="2" height="2" />
                        </svg>
                        <h3 class="text-lg font-semibold text-stone-600">{{ \Carbon\Carbon::createFromFormat('d/m/Y', $data['setting_akad_api']['tanggal'])->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}</h3>
                    </div>
                    <div class="mt-6 flex items-center gap-2">
                        <svg class="h-7 w-7 text-stone-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                        <h3 class="text-lg font-semibold text-stone-600">{{ $data['setting_akad_api']['waktu_mulai'] }} - {{ $data['setting_akad_api']['waktu_selesai'] }}</h3>
                    </div>
                    <div class="mt-6 flex items-start gap-2">
                        <svg class="h-7 w-7 text-stone-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                            <circle cx="12" cy="10" r="3" />
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-stone-600">{{ $data['setting_akad_api']['tempat'] }}</h3>
                            <p class="max-w-xs">{{ $data['setting_akad_api']['alamat'] }}</p>
                        </div>

                    </div>
                    <a title="google maps lokasi akad" href="{{ $data['setting_akad_api']['google_maps'] }}" target="blank" class="mx-auto mt-8 flex max-w-[10.5rem] items-center gap-2 rounded-xl bg-stone-500 p-3">
                        <svg class="h-6 w-6 text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <line x1="18" y1="6" x2="18" y2="6.01" />
                            <path d="M18 13l-3.5 -5a4 4 0 1 1 7 0l-3.5 5" />
                            <polyline points="10.5 4.75 9 4 3 7 3 20 9 17 15 20 21 17 21 15" />
                            <line x1="9" y1="4" x2="9" y2="17" />
                            <line x1="15" y1="15" x2="15" y2="20" />
                        </svg>
                        <h3 class="text-md text-white">Google Maps</h3>
                    </a>
                </div>
            </div>

            <div data-aos="zoom-in" data-aos-duration="1000" class="relative mt-8 flex items-start justify-between rounded-xl border-2 border-b-4 border-stone-500 p-4 sm:p-6 md:mt-0 lg:p-8" href="#">
                <div class="mx-auto text-gray-500">
                    <h3 class="text-center font-tangerine text-4xl font-bold text-gray-900">
                        Resepsi
                    </h3>
                    <div class="mt-4 flex items-center gap-2">
                        <svg class="h-7 w-7 text-stone-600" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <rect x="4" y="5" width="16" height="16" rx="2" />
                            <line x1="16" y1="3" x2="16" y2="7" />
                            <line x1="8" y1="3" x2="8" y2="7" />
                            <line x1="4" y1="11" x2="20" y2="11" />
                            <rect x="8" y="15" width="2" height="2" />
                        </svg>
                        <h3 class="text-lg font-semibold text-stone-600">{{ \Carbon\Carbon::createFromFormat('d/m/Y', $data['setting_resepsi_api']['tanggal'])->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}</h3>
                    </div>
                    <div class="mt-6 flex items-center gap-2">
                        <svg class="h-7 w-7 text-stone-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                        <h3 class="text-lg font-semibold text-stone-600">{{ $data['setting_resepsi_api']['waktu_mulai'] }} - {{ $data['setting_resepsi_api']['waktu_selesai'] }}</h3>
                    </div>
                    <div class="mt-6 flex items-start gap-2">
                        <svg class="h-7 w-7 text-stone-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                            <circle cx="12" cy="10" r="3" />
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-stone-600">{{ $data['setting_resepsi_api']['tempat'] }}</h3>
                            <p class="max-w-xs">{{ $data['setting_resepsi_api']['alamat'] }}</p>
                        </div>

                    </div>
                    <a title="google maps lokasi resepsi" href="{{ $data['setting_resepsi_api']['google_maps'] }}" target="blank" class="mx-auto mt-8 flex max-w-[10.5rem] items-center gap-2 rounded-xl bg-stone-500 p-3">
                        <svg class="h-6 w-6 text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <line x1="18" y1="6" x2="18" y2="6.01" />
                            <path d="M18 13l-3.5 -5a4 4 0 1 1 7 0l-3.5 5" />
                            <polyline points="10.5 4.75 9 4 3 7 3 20 9 17 15 20 21 17 21 15" />
                            <line x1="9" y1="4" x2="9" y2="17" />
                            <line x1="15" y1="15" x2="15" y2="20" />
                        </svg>
                        <h3 class="text-md text-white">Google Maps</h3>
                    </a>
                </div>
            </div>
        </div>

        <a title="add calendar" data-aos="zoom-in-up" data-aos-duration="1000" href="https://www.google.com/calendar/render?action=TEMPLATE&text=Acara+Pernikahan+{{ $data['mempelai_wanita_api']['nama_panggilan'] }}+dan+{{ $data['mempelai_pria_api']['nama_panggilan'] }}&dates=20{{ \Carbon\Carbon::createFromFormat('d/m/Y', $data['setting_akad_api']['tanggal'])->format('ymd') }}/20{{ \Carbon\Carbon::createFromFormat('d/m/Y', $data['setting_resepsi_api']['tanggal'])->format('ymd') }}&details=Deskripsi+Acara&location={{ $data['setting_resepsi_api']['tempat'] }}, {{ $data['setting_resepsi_api']['alamat'] }}&sprop=name:Organizer&sprop=website:https://www.kabarundangan.com" target="_blank" class="mx-auto mt-12 flex max-w-[15rem] items-center gap-2 rounded-lg bg-stone-600 p-4 shadow-md">
            <svg class="h-8 w-8 text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" />
                <rect x="4" y="5" width="16" height="16" rx="2" />
                <line x1="16" y1="3" x2="16" y2="7" />
                <line x1="8" y1="3" x2="8" y2="7" />
                <line x1="4" y1="11" x2="20" y2="11" />
                <line x1="10" y1="16" x2="14" y2="16" />
                <line x1="12" y1="14" x2="12" y2="18" />
            </svg>
            <h3 class="font-sans text-lg font-semibold uppercase text-white">Add to Calendar</h3>
        </a>
    </section>

    <section class="container mx-auto mt-20 hidden max-w-4xl transform animate-bounce cursor-pointer duration-1000">
        <div class="flex justify-center">
            <svg class="h-24 w-24 text-stone-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10" />
                <polygon points="10 8 16 12 10 16 10 8" />
            </svg>
        </div>
    </section>

    @if (count($data['cerita_cinta_api']) > 0)
        <section class="container mx-auto mt-40 max-w-4xl">
            <h1 class="text-center font-greatVibes text-5xl font-bold text-stone-600 md:text-6xl" data-aos="fade-up" data-aos-duration="1000">Story</h1>
            <p class="mt-6 text-center font-serif text-2xl font-semibold text-stone-600" data-aos="fade-up" data-aos-duration="1000">Dua jiwa namun satu pikiran, dua hati namun satu perasaan</p>

            <div class="mt-10">
                <div class="mx-auto flex grid-cols-9 flex-col p-2 text-blue-50 md:grid">
                    @foreach ($data['cerita_cinta_api'] as $key => $val)
                        @if ($key % 2 !== 0)
                            <div class="flex md:contents">
                                <div class="relative col-start-5 col-end-6 mr-10 md:mx-auto">
                                    <div class="flex h-full w-6 items-center justify-center">
                                        <div class="pointer-events-none h-full w-1 bg-stone-600"></div>
                                    </div>
                                    <div class="absolute top-1/2 -mt-3 h-6 w-6 rounded-full bg-stone-600 shadow"></div>
                                </div>
                                <div class="col-start-6 col-end-10 my-4 mr-auto rounded-xl bg-stone-600 p-4 shadow-md" data-aos="fade-left" data-aos-duration="2000">
                                    <div class="flex items-center gap-1">
                                        <svg class="h-5 w-5 text-gray-200" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <rect x="4" y="5" width="16" height="16" rx="2" />
                                            <line x1="16" y1="3" x2="16" y2="7" />
                                            <line x1="8" y1="3" x2="8" y2="7" />
                                            <line x1="4" y1="11" x2="20" y2="11" />
                                            <rect x="8" y="15" width="2" height="2" />
                                        </svg>
                                        <h3 class="text-lg font-semibold leading-none">{{ \Carbon\Carbon::createFromFormat('d/m/Y', $val['tanggal'])->locale('id')->isoFormat('MMMM YYYY') }}</h3>
                                    </div>
                                    <h4 class="mt-1 font-tangerine text-3xl font-bold">{{ $val['judul'] }}</h4>
                                    <p class="mt-1 font-sans text-sm font-thin">
                                        {{ $val['cerita'] }}
                                    </p>
                                </div>
                            </div>
                        @else
                            <div class="flex flex-row-reverse md:contents">
                                <div class="col-start-1 col-end-5 my-4 ml-auto rounded-xl bg-stone-600 p-4 shadow-md" data-aos="fade-right" data-aos-duration="2000">
                                    <div class="flex items-center gap-1">
                                        <svg class="h-5 w-5 text-gray-200" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <rect x="4" y="5" width="16" height="16" rx="2" />
                                            <line x1="16" y1="3" x2="16" y2="7" />
                                            <line x1="8" y1="3" x2="8" y2="7" />
                                            <line x1="4" y1="11" x2="20" y2="11" />
                                            <rect x="8" y="15" width="2" height="2" />
                                        </svg>
                                        <h3 class="text-lg font-semibold leading-none">{{ \Carbon\Carbon::createFromFormat('d/m/Y', $val['tanggal'])->locale('id')->isoFormat('MMMM YYYY') }}</h3>
                                    </div>
                                    <h4 class="mt-1 font-tangerine text-3xl font-bold">{{ $val['judul'] }}</h4>
                                    <p class="mt-1 font-sans text-sm font-thin">
                                        {{ $val['cerita'] }}
                                    </p>
                                </div>
                                <div class="relative col-start-5 col-end-6 mr-10 md:mx-auto">
                                    <div class="flex h-full w-6 items-center justify-center">
                                        <div class="pointer-events-none h-full w-1 bg-stone-600"></div>
                                    </div>
                                    <div class="absolute top-1/2 -mt-3 h-6 w-6 rounded-full bg-stone-600 shadow"></div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if (count($data['gallery_api']) > 0)
        <section class="container mx-auto mt-40 max-w-5xl">
            <h1 class="text-center font-greatVibes text-5xl font-bold text-stone-600 md:text-6xl" data-aos="fade-up" data-aos-duration="2000">Gallery</h1>
            <p class="mt-6 text-center font-serif text-2xl font-semibold text-stone-600" data-aos="fade-up" data-aos-duration="2000">Mencintai bukan untuk menyamai, tetapi keikhlasan menerima perbedaan</p>
            <section class="mt-8">
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($data['gallery_api'] as $key => $val)
                        <div class="relative" data-aos="zoom-in" data-aos-duration="3000">
                            <img src="{{ asset('/storage/images/' . $val['gambar']) }}" alt="{{ $val['judul'] }}" class="h-72 w-full rounded-xl object-cover md:h-64">
                        </div>
                    @endforeach
                </div>
            </section>

            <section class="container mx-auto mt-24 max-w-4xl">
                <h3 class="text-center font-alkatra text-xl text-stone-500/90 antialiased md:text-2xl" data-aos="zoom-out" data-aos-duration="2000">Bila wujud cinta harus dibuktikan, maka pernikahan adalah bukti cinta lahir batin yang paling baik dan diridhoi-Nya, karena dengan begitu cinta tidak akan rusak karenanya, justru cintalah yang menjaganya</h3>
            </section>
        </section>
    @endif

    @if ($data['vip'] === true || $data['vip'] === 'true')
        <section class="container mx-auto mt-28 max-w-6xl" data-aos="fade-up" data-aos-duration="2000">
            <h1 class="text-center font-greatVibes text-5xl font-bold text-stone-600">Hadiah Untuk Kami</h1>
            <p class="mt-6 text-center font-serif text-xl font-semibold text-stone-500">Kehadiran Bapak/Ibu/Saudara/i merupakan hadiah terbaik bagi kami. Tetapi jika memberi merupakan tanda kasih, kami dengan senang hati menerimanya. Semoga kebaikan, keberkahan dan kesehatan selalu diberikan kepada kita semua. Aamiin...</p>

            <div class="btn-open-modal mx-auto mt-8 flex max-w-[12.5rem] cursor-pointer items-center gap-2 rounded-lg bg-stone-600 p-4 shadow-md">
                <svg class="h-8 w-8 text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <rect x="3" y="8" width="18" height="4" rx="1" />
                    <line x1="12" y1="8" x2="12" y2="21" />
                    <path d="M19 12v7a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-7" />
                    <path d="M7.5 8a2.5 2.5 0 0 1 0 -5a4.8 8 0 0 1 4.5 5a4.8 8 0 0 1 4.5 -5a2.5 2.5 0 0 1 0 5" />
                </svg>
                <h3 class="font-sans text-lg font-semibold uppercase text-white">Kirim Hadiah</h3>
            </div>
        </section>
    @endif

    <section class="container mx-auto mt-40 max-w-4xl">
        <h1 class="text-center font-greatVibes text-5xl font-bold text-stone-600" data-aos="fade-right" data-aos-duration="2000">Ucapan Selamat & Do'a</h1>
        <p class="mt-6 text-center font-serif text-xl font-semibold text-stone-500" data-aos="fade-left" data-aos-duration="2000">Kami mengharapkan kehadiran Anda.</p>

        <div class="mx-auto mt-6 mb-0 max-w-xl space-y-4 rounded-lg bg-stone-600 p-12 shadow-md" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
            <div>
                <div class="relative">
                    <input id="nama" type="text" name="name" autocomplete="off" class="w-full rounded-md border-gray-200 p-3 text-sm shadow-sm" placeholder="Nama" />
                    <p class="mt-1 hidden text-sm text-red-500" id="nama-validation">wajib diisi</p>
                </div>
            </div>

            <div>
                <div class="relative">
                    <input id="instagram" type="text" name="instagram" autocomplete="off" class="w-full rounded-md border-gray-200 p-3 text-sm shadow-sm" placeholder="Instagram *optional" />
                </div>
            </div>

            <div>
                <div class="relative">
                    <textarea id="pesan" type="text" name="name" autocomplete="off" class="h-32 w-full rounded-md border-gray-200 p-3 text-sm shadow-sm" placeholder="Tuliskan ucapan dan doa untuk mempelai pengantin"></textarea>
                    <p class="mt-1 hidden text-sm text-red-500" id="pesan-validation">wajib diisi</p>
                </div>
            </div>

            <div>
                <div class="relative flex items-center gap-4">
                    <div class="">
                        <img id="output" src="{{ asset('/images/photo-blank.png') }}" alt="pesan" width="96" height="96" class="rounded-full shadow-lg dark:shadow-black/30" alt="smaple image" />
                    </div>
                    <label class="inline-block w-[150px] rounded-sm bg-yellow-600 px-4 py-2 text-center text-sm font-bold uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-yellow-800 hover:shadow-lg"> UPLOAD FOTO
                        <input type="file" name="image_file" id="image-file" accept="image/jpeg, image/png" type="file" multiple>
                    </label>
                </div>
            </div>

            <button class="{{ $data['name'] === 'demo' ? 'btn-demo' : 'btn-send' }} block w-full rounded-lg bg-stone-500 px-5 py-3 font-sans text-lg font-medium text-white">
                Kirim Ucapan
            </button>
    </section>

    @if (count($data['ucapan_api']) !== 0)
        <section class="container mx-auto mt-24 max-w-4xl">
            <div id="carouselExampleCaptions" class="relative" data-te-carousel-init data-te-carousel-slide data-te-interval="2000">
                <div class="relative w-full overflow-hidden after:clear-both after:block after:content-['']">
                    @foreach ($data['ucapan_api'] as $key => $val)
                        <div class="relative float-left -mr-[100%] hidden w-full text-center transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none" data-te-carousel-item {{ $key === 0 ? 'data-te-carousel-active' : '' }} style="backface-visibility: hidden">
                            <p class="text-md max-w-2xl mx-auto italic text-neutral-700 dark:text-neutral-300 md:text-lg">
                                "{{ $val['pesan'] }}"
                            </p>
                            <div class="mt-12 mb-6 flex justify-center">
                                <img src="{{ $val['foto'] !== 'null' ? asset('/storage/images/' . $val['foto']) : asset('/images/photo-blank.png') }}" width="96" height="96" class="rounded-full shadow-lg dark:shadow-black/30" alt="smaple image" />
                            </div>
                            <p class="text-lg text-neutral-500 dark:text-neutral-300">{{ $val['nama'] }}</p>
                            @if ($val['instagram'] !== 'null')
                                <a title="instagram pengguna" href="https://www.instagram.com/{{ $val['instagram'] }}" target="_blank" type="button" class="m-1 h-8 w-8 rounded-full border-2 border-stone-600 uppercase leading-normal text-stone-600 transition duration-150 ease-in-out hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0" data-te-ripple-init data-te-ripple-color="light">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-full w-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                    </svg>
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
                <button class="absolute top-0 bottom-0 left-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-black opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-black hover:no-underline hover:opacity-90 hover:outline-none focus:text-black focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none dark:text-white dark:opacity-50 dark:hover:text-white dark:focus:text-white" type="button" data-te-target="#carouselExampleCaptions" data-te-slide="prev">
                    <span class="inline-block h-8 w-8">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                    </span>
                    <span class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Previous</span>
                </button>
                <button class="absolute top-0 bottom-0 right-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-black opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-black hover:no-underline hover:opacity-90 hover:outline-none focus:text-black focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none dark:text-white dark:opacity-50 dark:hover:text-white dark:focus:text-white" type="button" data-te-target="#carouselExampleCaptions" data-te-slide="next">
                    <span class="inline-block h-8 w-8">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </span>
                    <span class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Next</span>
                </button>
            </div>
        </section>
    @endif

    <footer class="mt-24 bg-stone-700 text-center text-white">
        <div class="container px-6 pt-6">
            <div class="mb-6 flex justify-center">

                <a title="instagram kabarundangan.com" href="https://www.instagram.com/kabarundangan/" target="_blank" type="button" class="m-1 h-9 w-9 rounded-full border-2 border-white uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0" data-te-ripple-init data-te-ripple-color="light">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-full w-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                    </svg>
                </a>

                <a title="register" class="m-1" href="/register">
                    <button type="button" class="inline-block rounded-full border-2 border-neutral-50 px-6 pt-2 pb-[6px] text-xs font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10" data-te-ripple-init data-te-ripple-color="light">
                        Daftar!
                    </button>
                </a>
            </div>
        </div>

        <div class="p-4 text-center" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2023 Copyright:
            <a title="Instagram official kabarundangan.com" class="text-whitehite" href="https://kabarundangan.com/">Kabar Undangan</a>
        </div>
    </footer>
</main>

@if ($data['vip'] === true || $data['vip'] === 'true')
    <div class="toast-end toast" id="toggle-music">
        <label class="swap rounded-full bg-stone-200 p-2">
            <!-- this hidden checkbox controls the state -->
            <input type="checkbox" class="hidden" />
            <!-- volume on icon -->
            <svg class="swap-off fill-current text-stone-500" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                <path d="M14,3.23V5.29C16.89,6.15 19,8.83 19,12C19,15.17 16.89,17.84 14,18.7V20.77C18,19.86 21,16.28 21,12C21,7.72 18,4.14 14,3.23M16.5,12C16.5,10.23 15.5,8.71 14,7.97V16C15.5,15.29 16.5,13.76 16.5,12M3,9V15H7L12,20V4L7,9H3Z" />
            </svg>
            <!-- volume off icon -->
            <svg class="swap-on fill-current text-stone-500" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                <path d="M3,9H7L12,4V20L7,15H3V9M16.59,12L14,9.41L15.41,8L18,10.59L20.59,8L22,9.41L19.41,12L22,14.59L20.59,16L18,13.41L15.41,16L14,14.59L16.59,12Z" />
            </svg>
        </label>
    </div>
@endif
