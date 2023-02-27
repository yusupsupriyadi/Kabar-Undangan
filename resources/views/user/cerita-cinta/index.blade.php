@extends('layouts.app')

@section('content')
    <main class="bg-gray-100">
        <x-app.navbar />
        <div class="container mx-auto mt-4 flex flex-wrap px-2 pt-4 lg:pt-10">
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

                <section class="{{ $user['vip'] === true ? 'hidden' : '' }}">
                    <x-app.card-premium />
                </section>

                <x-app.title title="Cerita Cinta" desc="Fasilitas ini digunakan untuk memberikan informasi perjalanan cinta mu." />

                <main class="py-5">

                    <section id="list-story" class="items-end justify-between rounded-lg bg-pink-100/50 shadow-md backdrop-blur-md md:flex md:hidden">
                        <section class="gap-4 md:flex">
                            <img src="https://plus.unsplash.com/premium_photo-1666787743094-332c3026a266?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="" class="h-[150px] w-full rounded-lg md:!w-[150px] md:rounded-none md:rounded-tl-lg md:rounded-bl-lg">
                            <section class="p-6">
                                <h1>Judul</h1>
                                <h6 class="mt-2 text-xs text-gray-500">Selasa, 24 Februari 2023</h6>
                                <p class="mt-3 max-w-md text-xs text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum voluptatum, unde officiis expedita libero quisquam? Veritatis optio magnam facilis excepturi ratione?</p>
                            </section>
                        </section>
                        <section class="p-6 pt-0">
                            <button id="btn-simpan" type="button" name="google-maps-resepsi" class="btn-primary !text-white">
                                Edit
                            </button>
                            <button id="btn-simpan" type="button" name="google-maps-resepsi" class="btn-primary !bg-red-500 !text-white">
                                Hapus
                            </button>
                        </section>
                    </section>

                    <section id="blank-story" class="hidden">
                        <div class="flex flex-col items-center justify-center">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="h-12 w-12 text-red-500/25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
                                </svg>
                                <p class="text-lg text-gray-400">Belum ada cerita cinta</p>
                                <div class="mt-6">
                                    <button type="button" class="btn-add-story btn-primary !bg-pink-300 !p-2 !px-3 !text-sm !capitalize">
                                        Tambah Cerita
                                    </button>
                                </div>
                            </div>
                        </div>
                    </section>

                    <form class="mt-6" id="form-story">

                        <div class="form-control mt-4">
                            <label class="label flex items-center justify-start gap-1">
                                <svg class="h-5 w-5 text-black" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <rect x="4" y="5" width="16" height="16" rx="2" />
                                    <line x1="16" y1="3" x2="16" y2="7" />
                                    <line x1="8" y1="3" x2="8" y2="7" />
                                    <line x1="4" y1="11" x2="20" y2="11" />
                                    <rect x="8" y="15" width="2" height="2" />
                                </svg>
                                <span class="form-label text-sm font-normal">Tanggal</span>
                            </label>
                            <input id="tanggal" type="text" class="input-form flatpicker-date form-control max-w-xs !bg-gray-100" placeholder="masukan tanggal" required>
                            <label-validate id="tanggal-validate">Wajib disi</label-validate>
                        </div>

                        <button type="button" class="mt-4 btn-add-story inline-block rounded bg-[#fbbd23] px-6 py-2.5 text-sm font-bold uppercase leading-tight text-black shadow-md transition duration-150 ease-in-out hover:bg-[#fbbe23ce] hover:shadow-lg">
                            Simpan
                        </button>
                    </form>
                </main>

                <x-app.testimoni-bar />
            </div>

            <!--Back link -->
            <div class="px-4 py-6 text-base text-gray-500 md:text-sm lg:ml-auto lg:w-4/5">
                <span class="text-base font-bold text-purple-500">&lt;</span> <a href="#" class="text-base font-bold text-purple-500 no-underline hover:underline md:text-sm">Ke atas</a>
            </div>
        </div>

        <x-app.footer />
    </main>
@endsection

@push('scripts')
    <script>
        var data = @json($data);

        flatpickr("#tanggal-akad", {
            locale: "id",
            dateFormat: "d/m/Y",
            defaultDate: data !== null ? data.dataAkadNikah.tanggal : null
        });
    </script>
    <script type="module">
        var keyList = data.length;
        // setupIndex();

        function setupIndex(){
            if(data.length === 0){
                $('#blank-story').show();
                $('#form-story').hide();
            }else{
                $('#blank-story').hide();
                $('#form-story').show();
            }
        }

        $(document).on('click', '.btn-add-story' , function(){
            keyList++
            addStory();
        })

        function addStory(){
            if(keyList !== 0){
                $('#blank-story').hide();
                $('#form-story').show();
            }
            var html = `<h1>list ${keyList}</h1>`;
            $('#list-story').append(html);
        }
    </script>
@endpush
