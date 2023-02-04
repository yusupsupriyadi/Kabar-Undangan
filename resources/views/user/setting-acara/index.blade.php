@extends('layouts.app')

@section('content')
    <main class="bg-gray-100">
        <x-app.navbar />
        <div class="container mx-auto mt-4 flex flex-wrap px-2 pt-4 lg:pt-10">
            <!--Menu-->
            <x-app.menu active="setting-acara">
                <x-slot name="activeDisplay">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <p class="text-left text-sm">Informasi Acara</p>
                    </div>
                </x-slot>
            </x-app.menu>

            <!--Main Content-->
            <div class="border-rounded mt-6 w-full border border-gray-400 bg-white p-8 leading-normal text-gray-900 lg:mt-0 lg:w-4/5">

                <section class="{{ $user['vip'] === true ? 'hidden' : '' }}">
                    <x-app.card-premium />
                </section>


                <x-app.title title="Informasi Acara" desc="Fasilitas ini digunakan untuk memberikan informasi yang lengkap tentang acara pernikahan anda, silahkan masukan informasi yang lengkap tentang acara yang akan diselenggarakan." />

                <main class="py-5">
                    <section>
                        <p class="text-lg font-bold">Informasi Umum <span class="text-red-500">*</span></p>

                        <div class="form-control mt-2">
                            <label class="label">
                                <span class="form-label text-sm font-normal">Zona Waktu</span>
                            </label>
                            <select id="zona-waktu" name="zona-waktu" class="form-select-sm t form-select m-0 block w-full max-w-xs appearance-none rounded border border-solid border-gray-300 bg-white bg-clip-padding bg-no-repeat px-3 py-1 text-sm text-gray-700 transition ease-in-out focus:border-blue-600 focus:bg-white focus:text-gray-700 focus:outline-none" aria-label="Default select example">
                                <option selected value="WIB">WIB</option>
                                <option value="WITA">WITA</option>
                                <option value="WIT">WIT</option>
                            </select>
                        </div>

                        <div class="form-control mt-2">
                            <label class="label">
                                <span class="form-label text-sm font-normal">Agama</span>
                            </label>
                            <select id="agama" name="agama" class="form-select-sm t form-select m-0 block w-full max-w-xs appearance-none rounded border border-solid border-gray-300 bg-white bg-clip-padding bg-no-repeat px-3 py-1 text-sm text-gray-700 transition ease-in-out focus:border-blue-600 focus:bg-white focus:text-gray-700 focus:outline-none" aria-label="Default select example">
                                <option selected value="islam">Islam</option>
                                <option value="protestan">Protestan</option>
                                <option value="katolik">Katolik</option>
                                <option value="hindu">Hindu</option>
                                <option value="khonghucu">Khonghucu</option>
                            </select>
                            <label class="label">
                                <span class="label-text-alt text-xs text-gray-600">Ini untuk menyesuaikan tema undangan pernikahanmu.</span>
                            </label>
                        </div>
                    </section>

                    <section class="grid md:grid-cols-2">
                        <section class="mt-4">
                            <p class="text-lg font-bold">Akad nikah <span class="text-red-500">*</span></p>

                            <div class="form-control mt-2">
                                <label class="label">
                                    <span class="form-label text-sm font-normal">Munculkan di Website</span>
                                </label>
                                <div class="ml-2 flex">
                                    <div class="form-check">
                                        <input class="form-check-input float-left mt-1 mr-2 h-4 w-4 cursor-pointer appearance-none rounded-full border border-gray-300 bg-white bg-contain bg-center bg-no-repeat align-top transition duration-200 checked:border-blue-600 checked:bg-blue-600 focus:outline-none" type="radio" name="tampilkan-akad" id="tampilkan-akad" checked>
                                        <label class="form-check-label inline-block text-sm text-gray-800" for="tampilkan-akad">
                                            Tampilkan
                                        </label>
                                    </div>
                                    <div class="form-check ml-4">
                                        <input class="form-check-input float-left mt-1 mr-2 h-4 w-4 cursor-pointer appearance-none rounded-full border border-gray-300 bg-white bg-contain bg-center bg-no-repeat align-top transition duration-200 checked:border-blue-600 checked:bg-blue-600 focus:outline-none" type="radio" name="tampilkan-akad" id="tampilkan-akad">
                                        <label class="form-check-label inline-block text-sm text-gray-800" for="tampilkan-akad">
                                            Sembunyikan
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="datepicker form-control mt-2" data-mdb-toggle-button="false">
                                <label class="label">
                                    <span class="form-label text-sm font-normal">Tanggal Akad Nikah</span>
                                </label>
                                <input id="tanggal-akad" type="text" class="input-form form-control max-w-xs" data-mdb-toggle="datepicker" placeholder="00/00/000">
                            </div>

                            <div class="form-control mt-2">
                                <label class="label">
                                    <span class="form-label text-sm font-normal">Waktu Acara</span>
                                </label>
                                <div class="flex">
                                    <div class="timepicker" data-mdb-with-icon="true">
                                        <input id="waktu-mulai-akad" type="text" class="input-form form-control max-w-[7.2rem]" data-mdb-toggle="input-toggle-timepicker" placeholder="00:00">
                                    </div>
                                    <p class="mx-4">Sampai</p>
                                    <div class="timepicker" data-mdb-with-icon="false">
                                        <input id="waktu-selesai-akad" type="text" class="input-form form-control max-w-[7.2rem]" data-mdb-toggle="input-toggle-timepicker" placeholder="00:00">
                                    </div>
                                </div>
                            </div>

                            <div class="form-control mt-2">
                                <label class="label">
                                    <span class="form-label text-sm font-normal">Tempat dan Alamat</span>
                                </label>
                                <textarea class="form-control m-0 block w-full max-w-xs rounded border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1.5 text-sm font-normal text-gray-700 transition ease-in-out focus:border-blue-600 focus:bg-white focus:text-gray-700 focus:outline-none" id="alamat-akad" rows="3" placeholder="Tuliskan alamat dan tempat akad nikah"></textarea>
                            </div>

                            <div class="form-control mt-2">
                                <label class="label">
                                    <span class="form-label text-sm font-normal">Link Google Map</span>
                                </label>
                                <input type="text" class="form-control m-0 block w-full max-w-xs rounded border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1.5 text-sm font-normal text-gray-700 transition ease-in-out focus:border-blue-600 focus:bg-white focus:text-gray-700 focus:outline-none" id="link-google-map-akad" placeholder="Masukan URL Google Maps alamat anda telah anda salin" />
                            </div>

                        </section>
                        <section class="mt-4">
                            <p class="text-lg font-bold">Resepsi pernikahan<span class="text-red-500">*</span></p>

                            <div class="form-control mt-2">
                                <label class="label">
                                    <span class="form-label text-sm font-normal">Munculkan di Website</span>
                                </label>
                                <div class="ml-2 flex">
                                    <div class="form-check">
                                        <input class="form-check-input float-left mt-1 mr-2 h-4 w-4 cursor-pointer appearance-none rounded-full border border-gray-300 bg-white bg-contain bg-center bg-no-repeat align-top transition duration-200 checked:border-blue-600 checked:bg-blue-600 focus:outline-none" type="radio" name="tampilkan-resepsi" id="tampilkan-resepsi" checked>
                                        <label class="form-check-label inline-block text-sm text-gray-800" for="tampilkan-resepsi">
                                            Tampilkan
                                        </label>
                                    </div>
                                    <div class="form-check ml-4">
                                        <input class="form-check-input float-left mt-1 mr-2 h-4 w-4 cursor-pointer appearance-none rounded-full border border-gray-300 bg-white bg-contain bg-center bg-no-repeat align-top transition duration-200 checked:border-blue-600 checked:bg-blue-600 focus:outline-none" type="radio" name="tampilkan-resepsi" id="tampilkan-resepsi">
                                        <label class="form-check-label inline-block text-sm text-gray-800" for="tampilkan-resepsi">
                                            Sembunyikan
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="datepicker form-control mt-2" data-mdb-toggle-button="false">
                                <label class="label">
                                    <span class="form-label text-sm font-normal">Tanggal Resepsi</span>
                                </label>
                                <input id="tanggal-resepsi" type="text" class="input-form form-control max-w-xs" data-mdb-toggle="datepicker" placeholder="00/00/000">
                            </div>

                            <div class="form-control mt-2">
                                <label class="label">
                                    <span class="form-label text-sm font-normal">Waktu Acara</span>
                                </label>
                                <div class="flex">
                                    <div class="timepicker" data-mdb-with-icon="true">
                                        <input id="waktu-mulai-resepsi" type="text" class="input-form form-control max-w-[7.2rem]" data-mdb-toggle="input-toggle-timepicker" placeholder="00:00">
                                    </div>
                                    <p class="mx-4">Sampai</p>
                                    <div class="timepicker" data-mdb-with-icon="false">
                                        <input id="waktu-selesai-resepsi" type="text" class="input-form form-control max-w-[7.2rem]" data-mdb-toggle="input-toggle-timepicker" placeholder="00:00">
                                    </div>
                                </div>
                            </div>

                            <div class="form-control mt-2">
                                <label class="label">
                                    <span class="form-label text-sm font-normal">Tempat dan Alamat</span>
                                </label>
                                <textarea class="form-control m-0 block w-full max-w-xs rounded border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1.5 text-sm font-normal text-gray-700 transition ease-in-out focus:border-blue-600 focus:bg-white focus:text-gray-700 focus:outline-none" id="alamat-resepsi" rows="3" placeholder="Tuliskan alamat dan tempat akad nikah"></textarea>
                            </div>

                            <div class="form-control mt-2">
                                <label class="label">
                                    <span class="form-label text-sm font-normal">Link Google Map</span>
                                </label>
                                <input type="text" class="form-control m-0 block w-full max-w-xs rounded border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1.5 text-sm font-normal text-gray-700 transition ease-in-out focus:border-blue-600 focus:bg-white focus:text-gray-700 focus:outline-none" id="link-google-map-resepsi" placeholder="Masukan URL Google Maps alamat anda telah anda salin" />
                            </div>

                        </section>
                    </section>

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
        $(document).on('click', '.timepicker-submit', function() {
            var waktuMulai = $('#waktu-mulai-akad').val()
            $('#waktu-mulai-akad').val(waktuMulai.replace(" PM", "").replace(" AM", ""))

            var waktuSelesai = $('#waktu-selesai-resepsi').val()
            $('#waktu-selesai-resepsi').val(waktuSelesai.replace(" PM", "").replace(" AM", ""))

            var waktuMulaiResepsi = $('#waktu-mulai-resepsi').val()
            $('#waktu-mulai-resepsi').val(waktuMulaiResepsi.replace(" PM", "").replace(" AM", ""))

            var waktuSelesaiResepsi = $('#waktu-selesai-resepsi').val()
            $('#waktu-selesai-resepsi').val(waktuSelesaiResepsi.replace(" PM", "").replace(" AM", ""))
        })

        $(document).on('click', '#btn-simpan', function(){
            var dataInformasiAcara = {
                'zona_waktu': $('#zona-waktu').val(),
                'agama' : $('#agama').val(),
            }

            var dataAkadNikah = {
                'tampilkan' : $('#tampilkan-akad').is(':checked'),
                'tanggal' : $('#tanggal-akad').val(),
                'waktu_mulai' : $('#waktu-mulai-akad').val(),
                'waktu_selesai' : $('#waktu-selesai-akad').val(),
                'alamat' : $('#alamat-akad').val(),
                'link_google_map' : $('#link-google-map-akad').val(),
            }

            var dataResepsi = {
                'tampilkan' : $('#tampilkan-resepsi').is(':checked'),
                'tanggal' : $('#tanggal-resepsi').val(),
                'waktu_mulai' : $('#waktu-mulai-resepsi').val(),
                'waktu_selesai' : $('#waktu-selesai-resepsi').val(),
                'alamat' : $('#alamat-resepsi').val(),
                'link_google_map' : $('#link-google-map-resepsi').val(),
            }

            $.ajax({
                url: "/setting-acara/store",
                type: "GET",
                data: {
                    dataInformasiAcara,
                    dataAkadNikah,
                    dataResepsi,
                },
                success: function(response) {
                    $('#toast-success').removeClass('hidden');
                    setTimeout(() => {
                        $('#toast-success').addClass('hidden')
                    }, 3000);
                },
                error: function(response) {
                    $('#toast-failed').removeClass('hidden');
                    setTimeout(() => {
                        $('#toast-failed').addClass('hidden')
                    }, 3000);
                }
            })
        })

    </script>
@endpush
