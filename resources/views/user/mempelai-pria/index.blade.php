@extends('layouts.app')

@section('content')
    <main class="bg-gray-100">
        <x-app.navbar />
        <div class="mx-auto mt-4 flex flex-wrap px-2 pt-4 md:px-12 lg:pt-10">
            <!--Menu-->
            <x-app.menu active="mempelai-pria">
                <x-slot name="activeDisplay">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <p class="text-left text-sm">Mempelai Pria</p>
                    </div>
                </x-slot>
            </x-app.menu>

            <!--Main Content-->
            <div class="border-rounded mt-6 w-full border border-gray-400 bg-white p-8 leading-normal text-gray-900 lg:mt-0 lg:w-4/5">

                <section class="{{ intval($user['vip']) === 1 ? 'hidden' : '' }} mb-6">
                    <x-app.card-premium />
                </section>

                <x-app.title title="Biodata Mempelai Pria" desc="Fasilitas ini digunakan untuk memberikan informasi yang lengkap tentang profile dari Mempelai Pria, silahkan masukan dengan lengkap dan jelas berikut dengan foto yang berkualitas bagus." />

                <main class="py-4">
                    <form enctype="multipart/form-data" id="formUpload" class="grid gap-10 md:grid-cols-2">
                        @csrf
                        <section>
                            <section class="flex justify-start gap-[10px]">
                                <div class="form-control w-full">
                                    <label class="label flex items-center justify-start gap-1">
                                        <svg class="h-5 w-5 text-black" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                            <circle cx="12" cy="7" r="4" />
                                        </svg>
                                        <span class="form-label text-sm font-normal">Nama Lengkap</span>
                                    </label>
                                    <input id="nama-lengkap" type="text" placeholder="nama lengkap" class="input-primary" />
                                    <x-label-validate id="nama-lengkap-validate" />
                                </div>

                                <div class="form-control w-full">
                                    <label class="label">
                                        <span class="form-label text-sm font-normal">Panggilan</span>
                                    </label>
                                    <input id="nama-panggilan" type="text" placeholder="nama panggilan" class="input-primary" />
                                    <x-label-validate id="nama-panggilan-validate" />
                                </div>
                            </section>

                            <div class="form-control mt-2 hidden w-full">
                                <label class="label flex items-center justify-start gap-1">
                                    <svg class="h-5 w-5 text-black" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <circle cx="12" cy="11" r="3" />
                                        <path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 0 1 -2.827 0l-4.244-4.243a8 8 0 1 1 11.314 0z" />
                                    </svg>
                                    <span class="form-label text-sm font-normal">Tempat Lahir</span>
                                </label>
                                <input id="tempat-lahir" type="text" placeholder="masukan tempat lahir" class="input-primary" />
                                <x-label-validate id="tempat-lahir-validate" />
                            </div>

                            <div class="form-control mt-2 hidden">
                                <label class="label">
                                    <span class="form-label text-sm font-normal">Tanggal lahir</span>
                                </label>
                                <input id="tanggal-lahir" type="text" class="input-form flatpicker-date form-control !bg-gray-100" placeholder="0/0/0" value="null">
                                <label-validate id="tanggal-lahir-validate">Wajib disi</label-validate>
                            </div>

                            <div class="form-control mt-2 w-full">
                                <label class="label flex items-center justify-start gap-1">
                                    <svg class="h-5 w-5 text-black" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <circle cx="12" cy="5" r="2" />
                                        <path d="M10 22v-5l-1-1v-4a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4l-1 1v5" />
                                    </svg>
                                    <span class="form-label text-sm font-normal">Nama Ayah</span>
                                </label>
                                <input id="nama-ayah" type="text" placeholder="masukan nama ayah" class="input-primary" />
                                <x-label-validate id="nama-ayah-validate" />
                            </div>

                            <div class="form-control mt-2 w-full">
                                <label class="label flex items-center justify-start gap-1">
                                    <svg class="h-5 w-5 text-black" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <circle cx="12" cy="5" r="2" />
                                        <path d="M10 22v-4h-2l2 -6a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1l2 6h-2v4" />
                                    </svg>
                                    <span class="form-label text-sm font-normal">Nama Ibu</span>
                                </label>
                                <input id="nama-ibu" type="text" placeholder="masukan nama ibu" class="input-primary" />
                                <x-label-validate id="nama-ibu-validate" />
                            </div>

                            <div class="form-control mt-2 w-full">
                                <label class="label flex items-center justify-start gap-1">
                                    <svg class="h-5 w-5 text-black" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <rect x="4" y="4" width="16" height="16" rx="4" />
                                        <circle cx="12" cy="12" r="3" />
                                        <line x1="16.5" y1="7.5" x2="16.5" y2="7.501" />
                                    </svg>
                                    <span class="form-label text-sm font-normal">Instagram <span class="text-red-500">*<span class="text-xs text-gray-500">optional</span></span></span>
                                </label>
                                <input id="instagram" type="text" placeholder="masukan username" class="input-primary" />
                                <x-label-validate id="instagram-validate" />
                            </div>

                            <div class="form-control mt-2 w-full">
                                <label class="label flex items-center justify-start gap-1">
                                    <svg class="h-[18px] w-[18px] text-black" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                                    </svg>
                                    <span class="form-label text-sm font-normal">Facebook <span class="text-red-500">*<span class="text-xs text-gray-500">optional</span></span></span>
                                </label>
                                <input id="facebook" type="text" placeholder="masukan username" class="input-primary" />
                                <x-label-validate id="facebook-validate" />
                            </div>

                            <div class="form-control mt-2 w-full">
                                <label class="label flex items-center justify-start gap-1">
                                    <svg class="h-[18px] w-[18px] text-black" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <path d="M22 4.01c-1 .49-1.98.689-3 .99-1.121-1.265-2.783-1.335-4.38-.737S11.977 6.323 12 8v1c-3.245.083-6.135-1.395-8-4 0 0-4.182 7.433 4 11-1.872 1.247-3.739 2.088-6 2 3.308 1.803 6.913 2.423 10.034 1.517 3.58-1.04 6.522-3.723 7.651-7.742a13.84 13.84 0 0 0 .497 -3.753C20.18 7.773 21.692 5.25 22 4.009z" />
                                    </svg>
                                    <span class="form-label text-sm font-normal">Twitter <span class="text-red-500">*<span class="text-xs text-gray-500">optional</span></span></span>
                                </label>
                                <input id="twitter" type="text" placeholder="masukan username" class="input-primary" />
                                <x-label-validate id="twitter-validate" />
                            </div>
                        </section>

                        <section>
                            <div class="form-control hidden">
                                <label class="label flex items-center justify-start gap-1">
                                    <svg class="h-5 w-5 text-black" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <circle cx="12" cy="12" r="2" />
                                        <path d="M2 12l1.5 2a11 11 0 0 0 17 0l1.5 -2" />
                                        <path d="M2 12l1.5 -2a11 11 0 0 1 17 0l1.5 2" />
                                    </svg>
                                    <span class="form-label text-sm font-normal">Tampilkan foto</span>
                                </label>
                                <div class="ml-2 hidden">
                                    <div class="form-check">
                                        <input value="true" class="checkbox-primary" type="radio" name="tampilkan-foto" id="tampilkan-true-foto">
                                        <label class="label-checkbox-primary" for="tampilkan-true-foto">
                                            Tampilkan
                                        </label>
                                    </div>
                                    <div class="form-check ml-4">
                                        <input value="false" class="checkbox-primary" type="radio" name="tampilkan-foto" id="tampilkan-false-foto">
                                        <label class="label-checkbox-primary" for="tampilkan-false-foto">
                                            Sembunyikan
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-control w-full sm:mt-2 md:mt-4">
                                <label class="label flex items-center justify-start gap-1">
                                    <svg class="h-5 w-5 text-black" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                                        <circle cx="8.5" cy="8.5" r="1.5" />
                                        <polyline points="21 15 16 10 5 21" />
                                    </svg>
                                    <span class="form-label text-sm font-normal">Foto mempelai pria <span class="text-red-500">*<span class="text-xs text-gray-500">optional</span></span></span>
                                </label>
                                <img id="output" width="260">
                                <div class="mt-2 w-full max-w-xs">
                                    <button type="button" class="btn-delete-image text-md hidden w-[260px] rounded-sm bg-red-500 px-6 py-2 text-center font-bold uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-yellow-800 hover:shadow-lg">
                                        Hapus Gambar
                                    </button>

                                    <label class="text-md mt-2 inline-block w-[260px] rounded-sm bg-yellow-500 px-6 py-2 text-center font-bold uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-yellow-800 hover:shadow-lg"> UPLOAD GAMBAR
                                        <input type="file" name="image_file" id="image-file" accept="image/jpeg, image/png" type="file" multiple>
                                    </label>
                                </div>
                                <x-label-validate id="tempat-lahir-validate" />
                            </div>
                        </section>
                    </form>

                    <div class="mt-6">
                        <button id="btn-simpan" type="button" name="google-maps-resepsi" class="btn-primary !bg-green-600 !text-white">
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
        var data = @json($dataMempelaiPria);

        flatpickr("#tanggal-lahir", {
            locale: "id",
            dateFormat: "d/m/Y",
            defaultDate: data !== null ? data.tanggal_lahir : null
        });
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

        if (data !== null) {
            setupValue()
        }

        const imageUrl = '{{ asset('storage/images') }}/'
        const imagePublic = '{{ asset('/images') }}/'

        if (data.foto === 'null' || data.foto === null) {
            $('.btn-delete-image').hide();
            $('#output').attr('src', imagePublic + 'foto-pria.png');
        } else {
            $('.btn-delete-image').show();
            $('#output').attr('src', imageUrl + data.foto);
        }

        $(document).on('click', '.btn-delete-image', function() {
            $('#output').attr('src', imagePublic + 'foto-pria.png');
            $('image-file').val('');
            $('.btn-delete-image').hide();
        })

        $(document).on('change', '#image-file', function() {
            $('.btn-delete-image').show();
        })

        function setupValue() {
            $('#nama-lengkap').val(data.nama_lengkap);
            $('#nama-panggilan').val(data.nama_panggilan);
            $('#tempat-lahir').val(data.tempat_lahir);
            $('#nama-ayah').val(data.nama_ayah);
            $('#nama-ibu').val(data.nama_ibu);
            $('#instagram').val(data.instagram === 'null' ? '' : data.instagram);
            $('#foto').val(data.foto)
            $('#facebook').val(data.facebook === 'null' ? '' : data.facebook);
            $('#twitter').val(data.twitter === 'null' ? '' : data.twitter);
            data.tampilkan_foto === 'true' ? $('#tampilkan-true-foto').prop('checked', true) : $('#tampilkan-false-foto').prop('checked', true)
        }

        $(document).ready(function() {
            $('#btn-simpan').click(function() {
                validateValue()
            });
        })

        $('#image-file').on('change', (e) => {
            $('#image-blank').hide()

            var reader = new FileReader();
            reader.readAsDataURL(e.target.files[0]);
            reader.onload = function() {
                var output = document.getElementById('output');
                output.src = reader.result;
            }
        })

        function validateValue() {
            $('#nama-lengkap').val() === '' ? $('#nama-lengkap-validate').show() : $('#nama-lengkap-validate').hide()
            $('#nama-panggilan').val() === '' ? $('#nama-panggilan-validate').show() : $('#nama-panggilan-validate').hide()
            $('#tempat-lahir').val() === '' ? $('#tempat-lahir-validate').show() : $('#tempat-lahir-validate').hide()
            $('#tanggal-lahir').val() === '' ? $('#tanggal-lahir-validate').show() : $('#tanggal-lahir-validate').hide()
            $('#nama-ayah').val() === '' ? $('#nama-ayah-validate').show() : $('#nama-ayah-validate').hide()
            $('#nama-ibu').val() === '' ? $('#nama-ibu-validate').show() : $('#nama-ibu-validate').hide()

            if ($('#nama-lengkap').val() !== '' && $('#nama-panggilan').val() !== '' && $('#tempat-lahir').val() !== '' && $('#nama-ayah').val() !== '' && $('#nama-ibu').val() !== '') {
                storeData()
            } else {
                $('#toast-validate').fadeIn('past')
                setTimeout(function() {
                    $('#toast-validate').fadeOut('past')
                }, 5000)
            }
        }

        function storeData() {
            const imageFile = document.getElementById('image-file');
            var myformData = new FormData();
            myformData.append('imageFile', imageFile.files[0]);
            myformData.append('tanggalLahir', $('#tanggal-lahir').val());
            myformData.append('namaLengkap', $('#nama-lengkap').val());
            myformData.append('namaPanggilan', $('#nama-panggilan').val());
            myformData.append('tempatLahir', $('#tempat-lahir').val());
            myformData.append('namaAyah', $('#nama-ayah').val());
            myformData.append('namaIbu', $('#nama-ibu').val());
            myformData.append('instagram', $('#instagram').val());
            myformData.append('facebook', $('#facebook').val());
            myformData.append('twitter', $('#twitter').val());
            myformData.append('tampilkanFoto', $('input[name="tampilkan-foto"]:checked').val())

            $.ajax({
                method: 'post',
                processData: false,
                contentType: false,
                cache: false,
                data: myformData,
                enctype: 'multipart/form-data',
                url: `/mempelai-pria/store`,
                beforeSend: function() {
                    $('#toast-loading').show()
                    $('#toast-validate').hide()
                },
                error: function(error) {
                    setTimeout(function() {
                        $('#toast-loading').hide()
                        $('#toast-failed').fadeIn('past')
                    }, 1000)
                    setTimeout(function() {
                        $('#toast-failed').fadeOut('past')
                    }, 4000)
                },
                success: function(response) {
                    setTimeout(function() {
                        $('#toast-loading').hide()
                        $('#toast-success').fadeIn('past')
                    }, 1000)
                    setTimeout(function() {
                        $('#toast-success').fadeOut('past')
                    }, 4000)
                }
            });
        }
    </script>
@endpush
