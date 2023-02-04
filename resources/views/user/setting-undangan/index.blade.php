@extends('layouts.app')

@section('content')
    <main class="bg-gray-100">
        <x-app.navbar />
        <div class="container mx-auto mt-4 flex flex-wrap px-2 pt-4 lg:pt-10">
            <!--Menu-->
            <x-app.menu active="pengaturan-undangan">
                <x-slot name="activeDisplay">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <p class="text-left text-sm">Pengaturan Undangan</p>
                    </div>
                </x-slot>
            </x-app.menu>

            <!--Main Content-->
            <div class="border-rounded mt-6 w-full border border-gray-400 bg-white p-8 leading-normal text-gray-900 lg:mt-0 lg:w-4/5">

                <section class="{{ $user['vip'] === true ? 'hidden' : '' }}">
                    <x-app.card-premium />
                </section>


                <x-app.title title="Pengaturan Undangan" desc="Fasilitas ini anda dapat gunakan untuk mengatur pengaturan umum website anda, anda bisa mengganti informasi website yang berhubungan dengan pernikahan anda." />

                <main class="py-5">
                    <div class="form-control">
                        <label class="label">
                            <span class="form-label font-bold">Nama Domain</span>
                        </label>
                        <label class="input-group">
                            <input id="domain" type="text" placeholder="masukan domain" class="input-bordered input" value="{{ $dataSettingUndangan['domain'] }}" />
                            <span class="text-sm">.kabarundangan.com</span>
                        </label>
                        <label class="label">
                            <span class="label-text-alt text-xs text-gray-600">ini untuk nama link undangan digital kamu</span>
                        </label>
                    </div>

                    <div class="form-control mt-2 w-full">
                        <label class="label">
                            <span class="form-label font-bold">Judul Undangan</span>
                        </label>
                        <input id="judul_undangan" type="text" placeholder="masukan judul" class="input-bordered input w-full max-w-xs" value="{{ $dataSettingUndangan['judul_undangan'] }}" />
                        <label class="label">
                            <span class="label-text-alt text-xs text-gray-600">Judul untuk menamai website Anda yang akan muncul pada bagian atas browser.</span>
                        </label>
                    </div>

                    <div class="mt-6">
                        <button id="btn-simpan" type="button" class="inline-block rounded bg-green-600 px-6 py-2.5 text-sm font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg">
                            Simpan
                        </button>
                    </div>
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

    <x-toast-alert id="toast-success" type="success" message="Berhasil." />
    <x-toast-alert id="toast-failed" type="failed" message="Tidak Berhasil." />
@endsection

@push('scripts')
    <script type="module">
        var id = @json($dataSettingUndangan['id']);
        $(document).ready(function() {
            $('#btn-simpan').click(function() {
                var domain = $('#domain').val();
                var judul_undangan = $('#judul_undangan').val();

                $.ajax({
                    url: `/setting-undangan/update`,
                    type: "GET",
                    dataType: 'json',
                    data: {
                        id: id,
                        domain: domain,
                        judul_undangan: judul_undangan
                    },

                    error: function(response) {
                        $('#toast-failed').removeClass('hidden');
                        setTimeout(() => {
                            $('#toast-failed').addClass('hidden')
                        }, 3000);
                    },
                    success: function(response) {
                        $('#toast-success').removeClass('hidden');
                        setTimeout(() => {
                            $('#toast-success').addClass('hidden')
                        }, 3000);
                    },
                });
            });
        });
    </script>
@endpush
