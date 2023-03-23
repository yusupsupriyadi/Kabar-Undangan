@extends('layouts.app')

@section('content')
    <main class="bg-gray-100">
        <x-app.navbar />
        <div class="mx-auto mt-4 flex flex-wrap px-2 pt-4 md:px-12 lg:pt-10">
            <!--Menu-->
            <x-app.menu active="music-background">
                <x-slot name="activeDisplay">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <p class="text-left text-sm">Musik Background</p>
                    </div>
                </x-slot>
            </x-app.menu>

            <!--Main Content-->
            <div class="border-rounded mt-6 w-full border border-gray-400 bg-white p-8 leading-normal text-gray-900 lg:mt-0 lg:w-4/5">

                <section class="{{ $user['vip'] === true ? 'hidden' : '' }}">
                    <x-app.card-premium />
                </section>

                <x-app.title title="Musik Background" desc="Kamu bisa menambahkan audio atau musik selama website pernikahan kamu dibuka, silahkan pilih audio/musik pilihan kamu." />

                <main class="py-5">
                    <section>
                        <p class="text-sm text-gray-600">Silahkan upload audio sendiri bisa berupa musik atau rekaman anda sendiri dalam format MP3 dengan maksimum ukuran file 128M</p>
                        <div class="w-full max-w-xs mt-4">
                            <label class="text-md inline-block w-[300px] rounded-sm bg-yellow-600 px-6 py-2 text-center font-bold uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-yellow-800 hover:shadow-lg"> UPLOAD AUDIO
                                <input type="file" name="music_file" id="music-file" accept=".mp3,audio/*" type="file" multiple>
                            </label>
                        </div>
                    </section>
                
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

    <x-toast-alert id="toast-success" type="success" message="Berhasil menyimpan cerita" />
    <x-toast-alert id="toast-success-delete" type="success" message="Berhasil menghapus cerita" />
    <x-toast-alert id="toast-failed" type="failed" message="Gagal menyimpan cerita" />
    <x-toast-alert id="toast-failed-delete" type="failed" message="Gagal menghapus cerita" />
    <x-toast-alert id="toast-loading" type="loading" message="Sedang memproses" />
    <x-toast-alert id="toast-validate" type="failed" message="Periksa kembali yang wajib diisi." />
@endsection

@push('scripts')
<script type="module">
    
</script>
@endpush