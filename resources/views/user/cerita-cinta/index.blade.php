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
                    <section id="list-story">
                        {{-- <section class="border-2 border-b-4 border-gray-400 p-4 rounded-lg">
                            <div class="form-control">
                                <label class="label !pt-0">
                                    <span class="form-label text-sm font-normal">Tanggal Cerita</span>
                                </label>
                                <input id="tanggal" type="text" class="input-form flatpicker-date form-control !bg-gray-100 !max-w-[200px] !text-sm" placeholder="0/0/0">
                                <label-validate id="tanggal-validate">Wajib disi</label-validate>
                            </div>

                            <div class="form-control mt-2">
                                <label class="label">
                                    <span class="form-label text-sm font-normal">Judul Cerita</span>
                                </label>
                                <input id="judul" type="text" placeholder="masukan judul cerita" class="input-primary !max-w-sm" />
                                <x-label-validate id="judul-validate" />
                            </div>
                        </section> --}}

                        <section class="">
                            <div>
                                
                            </div>
                            <div class="mt-1 border-b-2 border-gray-300">
                        </section>
                    </section>

                    {{-- <section id="blank-story" class="hidden">
                        <div class="flex flex-col items-center justify-center">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="h-12 w-12 text-red-500/25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
                                </svg>
                                <p class="text-lg text-gray-400">Belum ada cerita cinta</p>
                                <div class="mt-6">
                                    <button type="button" class="btn-add-story btn-primary !p-2 !px-3 !text-xs">
                                        Tambah Cerita
                                    </button>
                                </div>
                            </div>
                        </div>
                    </section>

                    <div class="mt-6 hidden" id="btn-index">
                        <button type="button" class="btn-add-story inline-block rounded bg-[#fbbd23] px-6 py-2.5 text-sm font-bold uppercase leading-tight text-black shadow-md transition duration-150 ease-in-out hover:bg-[#fbbe23ce] hover:shadow-lg">
                            Tambah Cerita Cinta
                        </button>
                    </div> --}}
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
    <script type="module">
        var data = @json($data);
        var keyList = data.length;

        setupIndex();

        function setupIndex(){
            if(data.length === 0){
                $('#blank-story').show();
                $('#btn-index').hide();
            }else{
                $('#blank-story').hide();
                $('#btn-index').show();
            }
        }

        $(document).on('click', '.btn-add-story' , function(){
            keyList++
            addStory();
        })

        function addStory(){
            if(keyList !== 0){
                $('#blank-story').hide();
                $('#btn-index').show();
            }
            var html = `<h1>list ${keyList}</h1>`;
            $('#list-story').append(html);
        }
    </script>
@endpush
