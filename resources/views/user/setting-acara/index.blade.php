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

                        <div class="form-control mt-4">
                            <label class="label">
                                <span class="form-label text-sm font-normal">Zona Waktu</span>
                            </label>
                            <select id="zona-waktu" name="zona-waktu" class="form-select-sm t form-select m-0 block w-full max-w-xs appearance-none rounded border border-solid border-gray-300 bg-white bg-clip-padding bg-no-repeat px-3 py-1 text-sm text-gray-700 transition ease-in-out focus:border-blue-600 focus:bg-white focus:text-gray-700 focus:outline-none" aria-label="Default select example">
                                <option value="WIB">WIB</option>
                                <option value="WITA">WITA</option>
                                <option value="WIT">WIT</option>
                            </select>
                        </div>

                        <div class="form-control mt-4">
                            <label class="label">
                                <span class="form-label text-sm font-normal">Agama</span>
                            </label>
                            <select id="agama" name="agama" class="form-select-sm t form-select m-0 block w-full max-w-xs appearance-none rounded border border-solid border-gray-300 bg-white bg-clip-padding bg-no-repeat px-3 py-1 text-sm text-gray-700 transition ease-in-out focus:border-blue-600 focus:bg-white focus:text-gray-700 focus:outline-none" aria-label="Default select example">
                                <option value="islam">Islam</option>
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

                    <form class="grid md:grid-cols-2">
                        <section class="mt-4">
                            <p class="text-lg font-bold">Akad nikah <span class="text-red-500">*</span></p>

                            <div class="form-control mt-4">
                                <label class="label">
                                    <span class="form-label text-sm font-normal">Munculkan di Website</span>
                                </label>
                                <div class="ml-2 flex">
                                    <div class="form-check">
                                        <input value="true" class="form-check-input float-left mt-1 mr-2 h-4 w-4 cursor-pointer appearance-none rounded-full border border-gray-300 bg-white bg-contain bg-center bg-no-repeat align-top transition duration-200 checked:border-blue-600 checked:bg-blue-600 focus:outline-none" type="radio" name="tampilkan-akad" id="tampilkan-true-akad">
                                        <label class="form-check-label inline-block text-sm text-gray-800" for="tampilkan-true-akad">
                                            Tampilkan
                                        </label>
                                    </div>
                                    <div class="form-check ml-4">
                                        <input value="false" class="form-check-input float-left mt-1 mr-2 h-4 w-4 cursor-pointer appearance-none rounded-full border border-gray-300 bg-white bg-contain bg-center bg-no-repeat align-top transition duration-200 checked:border-blue-600 checked:bg-blue-600 focus:outline-none" type="radio" name="tampilkan-akad" id="tampilkan-false-akad">
                                        <label class="form-check-label inline-block text-sm text-gray-800" for="tampilkan-false-akad">
                                            Sembunyikan
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-control mt-4">
                                <label class="label">
                                    <span class="form-label text-sm font-normal">Tanggal Akad Nikah</span>
                                </label>
                                <input id="tanggal-akad" type="text" class="input-form flatpicker-date form-control max-w-xs" placeholder="masukan tanggal" required>
                            </div>

                            <div class="form-control mt-4">
                                <label class="label">
                                    <span class="form-label text-sm font-normal">Waktu Acara</span>
                                </label>
                                <div class="flex">
                                    <div>
                                        <input id="waktu-mulai-akad" type="text" class="input-form form-control max-w-[7.2rem]" placeholder="..." required>
                                    </div>
                                    <p class="mx-4 text-sm">Sampai</p>
                                    <div>
                                        <input id="waktu-selesai-akad" type="text" class="input-form form-control max-w-[7.2rem]" placeholder="...">
                                    </div>
                                </div>
                            </div>

                            <div class="form-control mt-4">
                                <label class="label">
                                    <span class="form-label text-sm font-normal">Tempat dan Alamat</span>
                                </label>
                                <textarea class="form-control m-0 block w-full max-w-xs rounded border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1.5 text-sm font-normal text-gray-700 transition ease-in-out focus:border-blue-600 focus:bg-white focus:text-gray-700 focus:outline-none" id="alamat-akad" rows="3" placeholder="Tuliskan alamat dan tempat akad nikah"></textarea>
                            </div>

                            <div class="form-control mt-4">
                                <label class="label">
                                    <span class="form-label text-sm font-normal">Link Google Map</span>
                                </label>
                                <input type="text" class="form-control m-0 block w-full max-w-xs rounded border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1.5 text-sm font-normal text-gray-700 transition ease-in-out focus:border-blue-600 focus:bg-white focus:text-gray-700 focus:outline-none" id="link-google-map-akad" placeholder="Masukan URL Google Maps alamat anda telah anda salin" />
                            </div>

                        </section>
                        <section class="mt-4">
                            <p class="text-lg font-bold">Resepsi pernikahan<span class="text-red-500">*</span></p>

                            <div class="form-control mt-4">
                                <label class="label">
                                    <span class="form-label text-sm font-normal">Munculkan di Website</span>
                                </label>
                                <div class="ml-2 flex">
                                    <div class="form-check">
                                        <input value="true" class="form-check-input float-left mt-1 mr-2 h-4 w-4 cursor-pointer appearance-none rounded-full border border-gray-300 bg-white bg-contain bg-center bg-no-repeat align-top transition duration-200 checked:border-blue-600 checked:bg-blue-600 focus:outline-none" type="radio" name="tampilkan-resepsi" id="tampilkan-true-resepsi" checked>
                                        <label class="form-check-label inline-block text-sm text-gray-800" for="tampilkan-true-resepsi">
                                            Tampilkan
                                        </label>
                                    </div>
                                    <div class="form-check ml-4">
                                        <input value="false" class="form-check-input float-left mt-1 mr-2 h-4 w-4 cursor-pointer appearance-none rounded-full border border-gray-300 bg-white bg-contain bg-center bg-no-repeat align-top transition duration-200 checked:border-blue-600 checked:bg-blue-600 focus:outline-none" type="radio" name="tampilkan-resepsi" id="tampilkan-false-resepsi">
                                        <label class="form-check-label inline-block text-sm text-gray-800" for="tampilkan-false-resepsi">
                                            Sembunyikan
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-control mt-4">
                                <label class="label">
                                    <span class="form-label text-sm font-normal">Tanggal Resepsi</span>
                                </label>
                                <input id="tanggal-resepsi" type="text" class="input-form flatpicker-date form-control max-w-xs" placeholder="masukan tanggal">
                            </div>

                            <div class="form-control mt-4">
                                <label class="label">
                                    <span class="form-label text-sm font-normal">Waktu Acara</span>
                                </label>
                                <div class="flex">
                                    <div>
                                        <input id="waktu-mulai-resepsi" type="text" class="input-form form-control max-w-[7.2rem]" placeholder="...">
                                    </div>
                                    <p class="mx-4 text-sm">Sampai</p>
                                    <div>
                                        <input id="waktu-selesai-resepsi" type="text" class="input-form form-control max-w-[7.2rem]" placeholder="...">
                                    </div>
                                </div>
                            </div>

                            <div class="form-control mt-4">
                                <label class="label">
                                    <span class="form-label text-sm font-normal">Tempat dan Alamat</span>
                                </label>
                                <textarea class="form-control m-0 block w-full max-w-xs rounded border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1.5 text-sm font-normal text-gray-700 transition ease-in-out focus:border-blue-600 focus:bg-white focus:text-gray-700 focus:outline-none" id="alamat-resepsi" rows="3" placeholder="Tuliskan alamat dan tempat akad nikah"></textarea>
                            </div>

                            <div class="form-control mt-4">
                                <label class="label">
                                    <span class="form-label text-sm font-normal">Link Google Map</span>
                                </label>
                                <input id="link-google-map-resepsi" type="text" name="google-maps-resepsi" class="form-control m-0 block w-full max-w-xs rounded border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1.5 text-sm font-normal text-gray-700 transition ease-in-out focus:border-blue-600 focus:bg-white focus:text-gray-700 focus:outline-none" placeholder="Masukan URL Google Maps alamat anda telah anda salin" required/>
                                <small id="link-google-map-resepsi-validation" class="mt-2 text-xs text-red-500 font-serif hidden">Wajib disi</small>
                            </div>
                        </section>

                        <div class="mt-6">
                            <button id="btn-simpan" type="button" name="google-maps-resepsi" class="inline-block rounded bg-[#fbbd23] px-6 py-2.5 text-lg font-bold uppercase leading-tight text-black shadow-md transition duration-150 ease-in-out hover:bg-[#b58714] hover:shadow-lg focus:bg-[#b58714] focus:shadow-lg focus:outline-none focus:ring-0 active:bg-[#b58714] active:shadow-lg">
                                Simpan
                            </button>
                        </div>

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

    <x-toast-alert id="toast-success" type="success" message="Berhasil." />
    <x-toast-alert id="toast-failed" type="failed" message="Tidak Berhasil." />
@endsection

@push('scripts')
    <script src="https://npmcdn.com/flatpickr/dist/l10n/id.js"></script>
    <script>
        var data = @json($data);
        var userId = @json($user->id);

        flatpickr("#tanggal-akad", {
            locale: "id",
            dateFormat: "d/m/Y",
            defaultDate: data !== null ? data.dataAkadNikah.tanggal : null
        });

        flatpickr("#tanggal-resepsi", {
            locale: "id",
            dateFormat: "d/m/Y",
            defaultDate: data !== null ? data.dataResepsi.tanggal : null
        });

        flatpickr("#waktu-mulai-akad", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
            defaultDate: data !== null ? data.dataAkadNikah.waktu_mulai : null
        });

        flatpickr("#waktu-selesai-akad", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
            defaultDate: data !== null ? data.dataAkadNikah.waktu_selesai : null
        });

        flatpickr("#waktu-mulai-resepsi", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
            defaultDate: data !== null ? data.dataResepsi.waktu_mulai : null
        });

        flatpickr("#waktu-selesai-resepsi", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
            defaultDate: data !== null ? data.dataResepsi.waktu_selesai : null
        });
    </script>

    <script type="module">
        $(document).on('click', '#btn-simpan', function(){
            var typeAction = 'create';
            if(data !== null){
                typeAction = 'update';
            }

            validateForm()
            // storeData(typeAction)
        })

        function validateForm(){
            $('#link-google-map-resepsi').val() === '' ? $('#link-google-map-resepsi-validation').show() : $('#link-google-map-resepsi-validation').hide()
        }

        setupValue()

        function setupValue(){
            if(data !== null){
                $('#zona-waktu').val(data.dataInformasiAcara.zona_waktu)
                $('#agama').val(data.dataInformasiAcara.agama)

                data.dataAkadNikah.tampilkan === 'true' ? $('#tampilkan-true-akad').prop('checked', true) : $('#tampilkan-false-akad').prop('checked', true)
                $('#tanggal-akad').val(data.dataAkadNikah.tanggal)
                $('#waktu-mulai-akad').val(data.dataAkadNikah.waktu_mulai)
                $('#waktu-selesai-akad').val(data.dataAkadNikah.waktu_selesai)
                $('#alamat-akad').val(data.dataAkadNikah.alamat)
                $('#link-google-map-akad').val(data.dataAkadNikah.google_maps)

                data.dataResepsi.tampilkan === 'true' ? $('#tampilkan-true-resepsi').prop('checked', true) : $('#tampilkan-false-resepsi').prop('checked', true)
                $('#tanggal-resepsi').val(data.dataResepsi.tanggal)
                $('#waktu-mulai-resepsi').val(data.dataResepsi.waktu_mulai)
                $('#waktu-selesai-resepsi').val(data.dataResepsi.waktu_selesai)
                $('#alamat-resepsi').val(data.dataResepsi.alamat)
                $('#link-google-map-resepsi').val(data.dataResepsi.google_maps)
            }
        }

        function storeData(typeAction){
            var dataInformasiAcara = {
                'user_id' : userId,
                'zona_waktu': $('#zona-waktu').val(),
                'agama' : $('#agama').val(),
            }

            var dataAkadNikah = {
                'user_id' : userId,
                'tampilkan' : $('input[name="tampilkan-akad"]:checked').val(),
                'tanggal' : $('#tanggal-akad').val(),
                'waktu_mulai' : $('#waktu-mulai-akad').val(),
                'waktu_selesai' : $('#waktu-selesai-akad').val(),
                'alamat' : $('#alamat-akad').val(),
                'google_maps' : $('#link-google-map-akad').val(),
            }

            var dataResepsi = {
                'user_id' : userId,
                'tampilkan' : $('input[name="tampilkan-resepsi"]:checked').val(),
                'tanggal' : $('#tanggal-resepsi').val(),
                'waktu_mulai' : $('#waktu-mulai-resepsi').val(),
                'waktu_selesai' : $('#waktu-selesai-resepsi').val(),
                'alamat' : $('#alamat-resepsi').val(),
                'google_maps' : $('#link-google-map-resepsi').val(),
            }

            console.log(dataAkadNikah);
            $.ajax({
                url: "/setting-acara/store",
                type: "GET",
                data: {
                    dataInformasiAcara,
                    dataAkadNikah,
                    dataResepsi,
                    typeAction
                },
                beforeSend: function() {
                    $('.body').addClass('blur-[2px]')
                    $('.loading-screen').removeClass('hidden')
                    $('#btn-simpan').attr('disabled', true).addClass('cursor-progress')
                },
                success: function(response) {
                    $('#toast-success').removeClass('hidden');
                    setTimeout(() => {
                        $('#toast-success').addClass('hidden')
                    }, 3000);

                    $('.body').removeClass('blur-[2px]')
                    $('.loading-screen').addClass('hidden')
                    $('#btn-simpan').removeAttr('disabled', true).removeClass('cursor-progress')
                },
                error: function(response) {
                    $('#toast-failed').removeClass('hidden');
                    setTimeout(() => {
                        $('#toast-failed').addClass('hidden')
                    }, 3000);

                    $('.body').removeClass('blur-[2px]')
                    $('.loading-screen').addClass('hidden')
                    $('#btn-simpan').removeAttr('disabled', true).removeClass('cursor-progress')
                }
            })
        }

    </script>
@endpush
