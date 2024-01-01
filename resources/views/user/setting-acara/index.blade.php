@extends('layouts.app')

@section('content')
    <main class="bg-gray-100">
        <x-app.navbar />
        <div class="mx-auto mt-4 flex flex-wrap px-2 pt-4 md:px-12 lg:pt-10">
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

                <section class="{{ intval($user['vip']) === 1 ? 'hidden' : '' }} mb-6">
                    <x-app.card-premium />
                </section>


                <x-app.title title="Informasi Acara" desc="Fasilitas ini digunakan untuk memberikan informasi yang lengkap tentang acara pernikahan kamu, silahkan masukan informasi yang lengkap tentang acara yang akan diselenggarakan." />

                <main class="py-5">
                    <section class="hidden">
                        <p class="text-lg font-bold">Informasi Umum <span class="text-red-500">*</span></p>

                        <div class="form-control mt-4">
                            <label class="label flex items-center justify-start gap-1">
                                <svg class="h-5 w-5 text-black" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="8 16 10 10 16 8 14 14 8 16" />
                                    <circle cx="12" cy="12" r="9" />
                                </svg>
                                <span class="form-label text-sm font-normal">Zona Waktu</span>
                            </label>
                            <select id="zona-waktu" name="zona-waktu" class="select-primary" aria-label="Default select example">
                                <option value="WIB">WIB</option>
                                <option value="WITA">WITA</option>
                                <option value="WIT">WIT</option>
                            </select>
                        </div>

                        <div class="form-control mt-4">
                            <label class="label">
                                <span class="form-label text-sm font-normal">Agama</span>
                            </label>
                            <select id="agama" name="agama" class="select-primary" aria-label="Default select example">
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

                    <form class="grid gap-10 md:grid-cols-2">
                        <section class="mt-4">
                            <p class="text-lg font-bold">Akad nikah <span class="text-red-500">*</span></p>

                            <div class="form-control mt-4 hidden">
                                <label class="label">
                                    <span class="form-label text-sm font-normal">Munculkan di Website</span>
                                </label>
                                <div class="ml-2 flex">
                                    <div class="form-check">
                                        <input value="true" class="checkbox-primary" type="radio" name="tampilkan-akad" id="tampilkan-true-akad" checked>
                                        <label class="label-checkbox-primary" for="tampilkan-true-akad">
                                            Tampilkan
                                        </label>
                                    </div>
                                    <div class="form-check ml-4">
                                        <input value="false" class="checkbox-primary" type="radio" name="tampilkan-akad" id="tampilkan-false-akad">
                                        <label class="label-checkbox-primary" for="tampilkan-false-akad">
                                            Sembunyikan
                                        </label>
                                    </div>
                                </div>
                            </div>

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
                                    <span class="form-label text-sm font-normal">Tanggal Akad Nikah</span>
                                </label>
                                <input id="tanggal-akad" type="text" class="input-form flatpicker-date form-control max-w-xs !bg-gray-100" placeholder="masukan tanggal" required>
                                <label-validate id="tanggal-akad-validate">Wajib disi</label-validate>
                            </div>

                            <div class="form-control mt-4">
                                <label class="label flex items-center justify-start gap-1">
                                    <svg class="h-5 w-5 text-black" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <circle cx="12" cy="12" r="9" />
                                        <polyline points="12 7 12 12 15 15" />
                                    </svg>
                                    <span class="form-label text-sm font-normal">Waktu Acara</span>
                                </label>
                                <div class="flex">
                                    <div>
                                        <input id="waktu-mulai-akad" type="text" class="input-form form-control max-w-[7.2rem] !bg-gray-100" placeholder="..." required>
                                        <label-validate id="waktu-mulai-akad-validate">Wajib disi</label-validate>
                                    </div>
                                    <p class="mx-4 text-sm">Sampai</p>
                                    <div>
                                        <input id="waktu-selesai-akad" type="text" class="input-form form-control max-w-[7.2rem] !bg-gray-100" placeholder="...">
                                        <label-validate id="waktu-selesai-akad-validate">Wajib disi</label-validate>
                                    </div>
                                </div>
                            </div>

                            <div class="form-control mt-4">
                                <label class="label flex items-center justify-start gap-1">
                                    <svg class="h-5 w-5 text-black" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8" />
                                        <line x1="13" y1="7" x2="13" y2="7.01" />
                                        <line x1="17" y1="7" x2="17" y2="7.01" />
                                        <line x1="17" y1="11" x2="17" y2="11.01" />
                                        <line x1="17" y1="15" x2="17" y2="15.01" />
                                    </svg>
                                    <span class="form-label text-sm font-normal">Tempat</span>
                                </label>
                                <input id="tempat-akad" type="text" name="tempat-akad" class="input-primary" placeholder="Masukan tempat pelaksanaan akad nikah" required />
                                <label-validate id="tempat-akad-validate">Wajib disi</label-validate>
                            </div>

                            <div class="form-control mt-4">
                                <label class="label flex items-center justify-start gap-2">
                                    <svg class="h-5 w-5 text-black" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <line x1="18" y1="6" x2="18" y2="6.01" />
                                        <path d="M18 13l-3.5 -5a4 4 0 1 1 7 0l-3.5 5" />
                                        <polyline points="10.5 4.75 9 4 3 7 3 20 9 17 15 20 21 17 21 15" />
                                        <line x1="9" y1="4" x2="9" y2="17" />
                                        <line x1="15" y1="15" x2="15" y2="20" />
                                    </svg>
                                    <span class="form-label text-sm font-normal">Alamat Lengkap Akad</span>
                                </label>
                                <textarea class="input-primary" id="alamat-akad" rows="3" placeholder="Tuliskan alamat lengkap akad nikah"></textarea>
                                <label-validate id="alamat-akad-validate">Wajib disi</label-validate>
                            </div>

                            <div class="form-control mt-4">
                                <label class="label flex items-center justify-start gap-1">
                                    <svg class="h-5 w-5 text-black" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <circle cx="12" cy="11" r="3" />
                                        <path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 0 1 -2.827 0l-4.244-4.243a8 8 0 1 1 11.314 0z" />
                                    </svg>
                                    <span class="form-label text-sm font-normal">Link Google Map Akad</span>
                                </label>
                                <input type="text" class="input-primary" id="link-google-map-akad" placeholder="Masukan URL Google Maps alamat akad." />
                                <label-validate id="link-google-map-akad-validate">Wajib disi</label-validate>
                            </div>

                        </section>
                        <section class="mt-4">
                            <p class="text-lg font-bold">Resepsi pernikahan<span class="text-red-500">*</span></p>

                            <div class="form-control mt-4 hidden">
                                <label class="label">
                                    <span class="form-label text-sm font-normal">Munculkan di Website</span>
                                </label>
                                <div class="ml-2 flex">
                                    <div class="form-check">
                                        <input value="true" class="checkbox-primary" type="radio" name="tampilkan-resepsi" id="tampilkan-true-resepsi" checked>
                                        <label class="label-checkbox-primary" for="tampilkan-true-resepsi">
                                            Tampilkan
                                        </label>
                                    </div>
                                    <div class="form-check ml-4">
                                        <input value="false" class="checkbox-primary" type="radio" name="tampilkan-resepsi" id="tampilkan-false-resepsi">
                                        <label class="label-checkbox-primary" for="tampilkan-false-resepsi">
                                            Sembunyikan
                                        </label>
                                    </div>
                                </div>
                            </div>

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
                                    <span class="form-label text-sm font-normal">Tanggal Akad Nikah</span>
                                </label>
                                <input id="tanggal-resepsi" type="text" class="input-form flatpicker-date form-control max-w-xs !bg-gray-100" placeholder="masukan tanggal">
                                <label-validate id="tanggal-resepsi-validate">Wajib disi</label-validate>
                            </div>

                            <div class="form-control mt-4">
                                <label class="label flex items-center justify-start gap-1">
                                    <svg class="h-5 w-5 text-black" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <circle cx="12" cy="12" r="9" />
                                        <polyline points="12 7 12 12 15 15" />
                                    </svg>
                                    <span class="form-label text-sm font-normal">Waktu Acara</span>
                                </label>
                                <div class="flex">
                                    <div>
                                        <input id="waktu-mulai-resepsi" type="text" class="input-form form-control max-w-[7.2rem] !bg-gray-100" placeholder="...">
                                        <label-validate id="waktu-mulai-resepsi-validate">Wajib disi</label-validate>
                                    </div>
                                    <p class="mx-4 text-sm">Sampai</p>
                                    <div>
                                        <input id="waktu-selesai-resepsi" type="text" class="input-form form-control max-w-[7.2rem] !bg-gray-100" placeholder="...">
                                        <label-validate id="waktu-selesai-resepsi-validate">Wajib disi</label-validate>
                                    </div>
                                </div>
                            </div>

                            <div class="form-control mt-4">
                                <label class="label flex items-center justify-start gap-1">
                                    <svg class="h-5 w-5 text-black" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8" />
                                        <line x1="13" y1="7" x2="13" y2="7.01" />
                                        <line x1="17" y1="7" x2="17" y2="7.01" />
                                        <line x1="17" y1="11" x2="17" y2="11.01" />
                                        <line x1="17" y1="15" x2="17" y2="15.01" />
                                    </svg>
                                    <span class="form-label text-sm font-normal">Tempat</span>
                                </label>
                                <input id="tempat-resepsi" type="text" name="tempat-resepsi" class="input-primary" placeholder="Masukan tempat pelaksanaan resepsi" required />
                                <label-validate id="tempat-resepsi-validate">Wajib disi</label-validate>
                            </div>

                            <div class="form-control mt-4">
                                <label class="label flex items-center justify-start gap-2">
                                    <svg class="h-5 w-5 text-black" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <line x1="18" y1="6" x2="18" y2="6.01" />
                                        <path d="M18 13l-3.5 -5a4 4 0 1 1 7 0l-3.5 5" />
                                        <polyline points="10.5 4.75 9 4 3 7 3 20 9 17 15 20 21 17 21 15" />
                                        <line x1="9" y1="4" x2="9" y2="17" />
                                        <line x1="15" y1="15" x2="15" y2="20" />
                                    </svg>
                                    <span class="form-label text-sm font-normal">Alamat Lengkap Resepsi</span>
                                </label>
                                <textarea class="input-primary" id="alamat-resepsi" rows="3" placeholder="Tuliskan alamat lengkap resepsi nikah"></textarea>
                                <label-validate id="alamat-resepsi-validate">Wajib disi</label-validate>
                            </div>

                            <div class="form-control mt-4">
                                <label class="label flex items-center justify-start gap-1">
                                    <svg class="h-5 w-5 text-black" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <circle cx="12" cy="11" r="3" />
                                        <path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 0 1 -2.827 0l-4.244-4.243a8 8 0 1 1 11.314 0z" />
                                    </svg>
                                    <span class="form-label text-sm font-normal">Link Google Map Resepsi</span>
                                </label>
                                <input id="link-google-map-resepsi" type="text" name="google-maps-resepsi" class="input-primary" placeholder="Masukan URL Google Maps alamat resepsi." required />
                                <label-validate id="link-google-map-resepsi-validate">Wajib disi</label-validate>
                            </div>
                        </section>
                    </form>

                    <div class="mt-6">
                        <button id="btn-simpan" type="button" name="google-maps-resepsi" class="btn-primary">
                            Simpan
                        </button>
                    </div>

                </main>

                <x-app.testimoni-bar />
            </div>


        </div>

        <x-app.footer />
    </main>

    <x-toast-alert id="toast-success" type="success" message="Berhasil menyimpan" />
    <x-toast-alert id="toast-failed" type="failed" message="Gagal menyimpan" />
    <x-toast-alert id="toast-loading" type="loading" message="Sedang memproses" />
    <x-toast-alert id="toast-validate" type="failed" message="Periksa kembali yang wajib diisi." />
@endsection

@push('scripts')
    <script>
        var data = @json($data);
        var userId = @json($user->id);

        var vip = @json($user['vip']);
        if(parseInt(vip)){
            $('#promo-panel').hide()
            $('#menu-navigation').removeClass('pt-20')
            $('#menu-navigation').addClass('pt-16')
        }else{
            $('#promo-panel').show()
            $('#menu-navigation').removeClass('pt-16')
            $('#menu-navigation').addClass('pt-20')
            setTimeout(() => {
                $('#modal-promo').show()
            }, 2000);
        }

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

        $(document).on('click', '#btn-simpan', function(){
            var typeAction = 'create';
            if(data !== null){
                typeAction = 'update';
            }

            validateForm(typeAction)
        })


        function validateForm(typeAction){
            var validateError = false;
            // $('#link-google-map-resepsi').val() === '' ? $('#link-google-map-resepsi-validate').show() : $('#link-google-map-resepsi-validate').hide()
            $('#alamat-resepsi').val() === '' ? $('#alamat-resepsi-validate').show() : $('#alamat-resepsi-validate').hide()
            $('#waktu-mulai-resepsi').val() === '' ? $('#waktu-mulai-resepsi-validate').show() : $('#waktu-mulai-resepsi-validate').hide()
            $('#waktu-selesai-resepsi').val() === '' ? $('#waktu-selesai-resepsi-validate').show() : $('#waktu-selesai-resepsi-validate').hide()
            $('#tanggal-resepsi').val() === '' ? $('#tanggal-resepsi-validate').show() : $('#tanggal-resepsi-validate').hide()
            $('#tempat-resepsi').val() === '' ? $('#tempat-resepsi-validate').show() : $('#tempat-resepsi-validate').hide()

            // $('#link-google-map-akad').val() === '' ? $('#link-google-map-akad-validate').show() : $('#link-google-map-akad-validate').hide()
            $('#alamat-akad').val() === '' ? $('#alamat-akad-validate').show() : $('#alamat-akad-validate').hide()
            $('#waktu-mulai-akad').val() === '' ? $('#waktu-mulai-akad-validate').show() : $('#waktu-mulai-akad-validate').hide()
            $('#waktu-selesai-akad').val() === '' ? $('#waktu-selesai-akad-validate').show() : $('#waktu-selesai-akad-validate').hide()
            $('#tanggal-akad').val() === '' ? $('#tanggal-akad-validate').show() : $('#tanggal-akad-validate').hide()
            $('#tempat-akad').val() === '' ? $('#tempat-akad-validate').show() : $('#tempat-akad-validate').hide()

            if($('#alamat-resepsi').val() === '' && $('#waktu-mulai-resepsi').val() === '' && $('#waktu-selesai-resepsi').val() === '' && $('#tanggal-resepsi').val() === '' && $('#alamat-akad').val() === '' && $('#waktu-mulai-akad').val() === '' && $('#waktu-selesai-akad').val() === '' && $('#tanggal-akad').val() === '' && $('#tempat-akad').val() === '' && $('#tempat-resepsi').val() === ''){
                $('#toast-validate').show()
                setTimeout(function(){
                    $('#toast-validate').fadeOut('past')
                }, 5000)
            }else{
                storeData(typeAction)
            }
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
                $('#tempat-akad').val(data.dataAkadNikah.tempat)

                data.dataResepsi.tampilkan === 'true' ? $('#tampilkan-true-resepsi').prop('checked', true) : $('#tampilkan-false-resepsi').prop('checked', true)
                $('#tanggal-resepsi').val(data.dataResepsi.tanggal)
                $('#waktu-mulai-resepsi').val(data.dataResepsi.waktu_mulai)
                $('#waktu-selesai-resepsi').val(data.dataResepsi.waktu_selesai)
                $('#alamat-resepsi').val(data.dataResepsi.alamat)
                $('#link-google-map-resepsi').val(data.dataResepsi.google_maps)
                $('#tempat-resepsi').val(data.dataResepsi.tempat)
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
                'tempat' : $('#tempat-akad').val(),
            }

            var dataResepsi = {
                'user_id' : userId,
                'tampilkan' : $('input[name="tampilkan-resepsi"]:checked').val(),
                'tanggal' : $('#tanggal-resepsi').val(),
                'waktu_mulai' : $('#waktu-mulai-resepsi').val(),
                'waktu_selesai' : $('#waktu-selesai-resepsi').val(),
                'alamat' : $('#alamat-resepsi').val(),
                'google_maps' : $('#link-google-map-resepsi').val(),
                'tempat' : $('#tempat-resepsi').val(),
            }

            console.log({
                dataInformasiAcara,
                dataAkadNikah,
                dataResepsi,
            });

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
                    $('#toast-loading').show()
                    $('#toast-validate').hide()
                },
                success: function(response) {
                    setTimeout(function(){
                        $('#toast-loading').hide()
                        $('#toast-success').fadeIn('past')
                    }, 1000)
                    setTimeout(function(){
                        $('#toast-success').fadeOut('past')
                    }, 4000)
                    data = response;
                },
                error: function(response) {
                    setTimeout(function(){
                        $('#toast-loading').hide()
                        $('#toast-failed').fadeIn('past')
                    }, 1000)
                    setTimeout(function(){
                        $('#toast-failed').fadeOut('past')
                    }, 4000)
                    $('#btn-simpan').removeAttr('disabled', true).removeClass('cursor-progress')
                }
            })
        }

    </script>
@endpush
