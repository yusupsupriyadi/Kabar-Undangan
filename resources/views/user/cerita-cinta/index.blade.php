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

                    <section id="list-story" class="hidden">
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

                    <form id="form-story" class="hidden">
                        <div class="form-control">
                            <label class="label flex items-center justify-start gap-1">
                                <svg class="h-5 w-5 text-gray-800" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <rect x="4" y="5" width="16" height="16" rx="2" />
                                    <line x1="16" y1="3" x2="16" y2="7" />
                                    <line x1="8" y1="3" x2="8" y2="7" />
                                    <line x1="4" y1="11" x2="20" y2="11" />
                                    <rect x="8" y="15" width="2" height="2" />
                                </svg>
                                <span class="form-label text-sm font-normal">Tanggal</span>
                            </label>
                            <input id="tanggal" type="text" class="input-primary !max-w-xs !bg-gray-100" placeholder="masukan tanggal" required>
                            <label-validate id="tanggal-validate">Wajib disi</label-validate>
                        </div>

                        <div class="form-control mt-4 w-full">
                            <label class="label flex items-center justify-start gap-1">
                                <svg class="h-5 w-5 text-gray-800" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <path d="M12 20l-7 -7a4 4 0 0 1 6.5 -6a.9 .9 0 0 0 1 0a4 4 0 0 1 6.5 6l-7 7" />
                                </svg>
                                <span class="form-label text-sm font-normal">Judul</span>
                            </label>
                            <input id="judul" type="text" placeholder="masukan Judul ceria cinta kamu" class="input-primary !max-w-xs" />
                            <x-label-validate id="judul-validate" />
                        </div>

                        <div class="form-control mt-4 w-full">
                            <label class="label flex items-center justify-start gap-1">
                                <svg class="h-5 w-5 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                </svg>
                                <span class="form-label text-sm font-normal">Cerita Cinta</span>
                            </label>
                            <textarea id="cerita" type="text" placeholder="masukan ceria cinta kamu" class="input-primary h-28 !max-w-xs"></textarea>
                            <x-label-validate id="cerita-validate" />
                        </div>

                        <div class="form-control w-full sm:mt-2 md:mt-4">
                            <label class="label flex items-center justify-start gap-1">
                                <svg class="h-5 w-5 text-black" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                                    <circle cx="8.5" cy="8.5" r="1.5" />
                                    <polyline points="21 15 16 10 5 21" />
                                </svg>
                                <span class="form-label text-sm font-normal">Foto Kenangan<span class="text-red-500">*<span class="text-xs text-gray-500">optional</span></span></span>
                            </label>
                            <img id="output" width="320">
                            <div class="mt-2 w-full max-w-xs">
                                <input type="file" name="image_file" id="image-file" accept="image/jpeg, image/png" class="form-control m-0 block w-full max-w-none rounded border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1.5 text-sm font-normal text-gray-700 transition ease-in-out focus:border-blue-600 focus:bg-white focus:text-gray-700 focus:outline-none" type="file" multiple>
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <button type="button" class="btn-store-story mt-4 inline-block rounded bg-green-600 px-6 py-2.5 text-sm font-bold uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-green-800 hover:shadow-lg">
                                Simpan
                            </button>
                            <button type="button" class="btn-cancel-story mt-4 inline-block rounded bg-red-600 px-6 py-2.5 text-sm font-bold uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-red-800 hover:shadow-lg">
                                Batal
                            </button>
                        </div>
                    </form>

                    <form id="form-story-edit" class="hidden">
                        <div class="form-control">
                            <label class="label flex items-center justify-start gap-1">
                                <svg class="h-5 w-5 text-gray-800" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <rect x="4" y="5" width="16" height="16" rx="2" />
                                    <line x1="16" y1="3" x2="16" y2="7" />
                                    <line x1="8" y1="3" x2="8" y2="7" />
                                    <line x1="4" y1="11" x2="20" y2="11" />
                                    <rect x="8" y="15" width="2" height="2" />
                                </svg>
                                <span class="form-label text-sm font-normal">Tanggal</span>
                            </label>
                            <input id="tanggal-update" type="text" class="input-primary !max-w-xs !bg-gray-100" placeholder="masukan tanggal" required>
                            <label-validate id="tanggal-update-validate">Wajib disi</label-validate>
                        </div>

                        <div class="form-control mt-4 w-full">
                            <label class="label flex items-center justify-start gap-1">
                                <svg class="h-5 w-5 text-gray-800" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <path d="M12 20l-7 -7a4 4 0 0 1 6.5 -6a.9 .9 0 0 0 1 0a4 4 0 0 1 6.5 6l-7 7" />
                                </svg>
                                <span class="form-label text-sm font-normal">Judul</span>
                            </label>
                            <input id="judul-update" type="text" placeholder="masukan Judul ceria cinta kamu" class="input-primary !max-w-xs" />
                            <x-label-validate id="judul-update-validate" />
                        </div>

                        <div class="form-control mt-4 w-full">
                            <label class="label flex items-center justify-start gap-1">
                                <svg class="h-5 w-5 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                </svg>
                                <span class="form-label text-sm font-normal">Cerita Cinta</span>
                            </label>
                            <textarea id="cerita-update" type="text" placeholder="masukan ceria cinta kamu" class="input-primary h-28 !max-w-xs"></textarea>
                            <x-label-validate id="cerita-update-validate" />
                        </div>

                        <div class="form-control w-full sm:mt-2 md:mt-4">
                            <label class="label flex items-center justify-start gap-1">
                                <svg class="h-5 w-5 text-black" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                                    <circle cx="8.5" cy="8.5" r="1.5" />
                                    <polyline points="21 15 16 10 5 21" />
                                </svg>
                                <span class="form-label text-sm font-normal">Foto Kenangan<span class="text-red-500">*<span class="text-xs text-gray-500">optional</span></span></span>
                            </label>
                            <img id="output-update" width="320">
                            <button type="button" class="btn-delete-image mt-4 w-[320px] inline-block rounded bg-red-400 px-6 py-2 text-xs font-bold uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-red-800 hover:shadow-lg">
                                Hapus Foto
                            </button>
                            <div class="mt-2 w-full max-w-xs">
                                <input type="file" name="image_file" id="image-file-update" accept="image/jpeg, image/png" class="form-control m-0 block w-full max-w-none rounded border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-1.5 text-sm font-normal text-gray-700 transition ease-in-out focus:border-blue-600 focus:bg-white focus:text-gray-700 focus:outline-none" type="file" multiple>
                            </div>
                        </div>

                        <div class="flex items-center gap-2 mt-4">
                            <button type="button" class="btn-store-story-update mt-4 inline-block rounded bg-green-600 px-6 py-2.5 text-sm font-bold uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-green-800 hover:shadow-lg">
                                Simpan
                            </button>
                            <button type="button" class="btn-cancel-story-update mt-4 inline-block rounded bg-red-600 px-6 py-2.5 text-sm font-bold uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-red-800 hover:shadow-lg">
                                Batal
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

    <x-toast-alert id="toast-success" type="success" message="Berhasil menyimpan" />
    <x-toast-alert id="toast-success-delete" type="success" message="Berhasil dihapus" />
    <x-toast-alert id="toast-failed" type="failed" message="Gagal menyimpan" />
    <x-toast-alert id="toast-failed-delete" type="failed" message="Gagal menghapus" />
    <x-toast-alert id="toast-loading" type="loading" message="Sedang memproses" />
    <x-toast-alert id="toast-validate" type="failed" message="Periksa kembali yang wajib diisi." />
@endsection

@push('scripts')
    <script>
        var data = @json($data);
        flatpickr("#tanggal", {
            locale: "id",
            dateFormat: "d/m/Y",
        });

        flatpickr("#tanggal-update", {
            locale: "id",
            dateFormat: "d/m/Y",
        });
        moment.locale('id');
    </script>
    <script type="module">
        var keyList = data.length;
        const imageUrl = '{{ asset("storage/images") }}/'

        setupIndex();

        $('#image-file').on('change', (e) => {
            var reader = new FileReader();
            reader.readAsDataURL(e.target.files[0]);
            reader.onload = function(){
                var output = document.getElementById('output');
                output.src = reader.result;
            }
        })

        $('#image-file-update').on('change', (e) => {
            var reader = new FileReader();
            reader.readAsDataURL(e.target.files[0]);
            reader.onload = function(){
                var output = document.getElementById('output-update');
                output.src = reader.result;
            }
        })

        function setupIndex(){
            if(data.length === 0){
                $('#blank-story').show();
                $('#form-story').hide();
                $('#list-story').hide()
                $('#form-story-edit').hide()
            }else{
                $('#blank-story').hide();
                $('#form-story').hide();
                $('#list-story').show()
                $('#form-story-edit').hide()
                var html = ``
                $.each(data, function(key, value){
                    var tanggal = moment(value.tanggal).format('dddd, D MMMM YYYY')
                    html += `
                    <div class="items-end justify-between rounded-lg bg-pink-200/40 shadow-md backdrop-blur-md md:flex ${key !== 0 ? 'mt-4' : ''} border-b-2 border border-gray-200">
                        <section class="gap-4 md:flex">
                            <img src="${value.gambar !== 'null' ? `${imageUrl}${value.gambar}` : `${imageUrl}image-empty.jpg`}" alt="" class="h-[150px] w-full object-cover rounded-lg md:!w-[200px] md:rounded-none md:rounded-tl-lg md:rounded-bl-lg">
                            <section class="p-6">
                                <h1>${value.judul}</h1>
                                <h6 class="mt-2 text-xs text-gray-500">${tanggal}</h6>
                                <p class="mt-3 max-w-md text-xs text-gray-500">${value.cerita}</p>
                            </section>
                        </section>
                        <section class="p-6 pt-0">
                            <button data-id="${value.id}" type="button" data-id="${value.id}" data-tanggal="${value.tanggal}" data-judul="${value.judul}" data-cerita="${value.cerita}" data-image="${value.gambar}" class="btn-edit btn-primary !text-white">
                                Edit
                            </button>
                            <button data-id="${value.id}" type="button" class="btn-delete btn-primary !bg-red-500 !text-white">
                                Hapus
                            </button>
                        </section>
                    </div>
                    `
                })
                html += `<div class="mt-6">
                                    <button type="button" class="btn-add-story btn-primary !bg-pink-300 !p-2 !px-3 !text-sm !capitalize">
                                        Tambah Cerita
                                    </button>
                                </div>`
                $('#list-story').html(html)
            }
        }

        $(document).on('click', '.btn-add-story' , function(){
            $('#form-story').show();
            $('#blank-story').hide();
            $('#list-story').hide()
        })

        $(document).on('click', '.btn-cancel-story' , function(){
            setupIndex()
        })

        $(document).on('click', '.btn-store-story' , function(){
            validateValue()
        })

        $(document).on('click', '.btn-delete', function(){
            const id = $(this).data('id');
            deleteData(id);
        })

        $(document).on('click', '.btn-edit', function(){
            const id = $(this).data('id');
            const tanggal = $(this).data('tanggal');
            const judul = $(this).data('judul');
            const cerita = $(this).data('cerita');
            const image = $(this).data('image');

            const data = {
                id: id,
                tanggal: tanggal,
                judul: judul,
                cerita: cerita,
                gambar: image,
            }

            $('#form-story').hide();
            $('#list-story').hide();
            $('#form-story-edit').show();
            $('#tanggal-update').val(tanggal);
            $('#judul-update').val(judul);
            $('#cerita-update').val(cerita);
            if(image === null){
                $('.btn-delete-image').prop('disabled',true);
                $('#output-update').attr('src', imageUrl+'image-empty.jpg');
            }else{
                $('#output-update').attr('src', imageUrl+image);
            }
        })

        $(document).on('click', '.btn-cancel-story-update', function(){
            setupIndex()
        })

        $(document).on('click', '.btn-delete-image', function(){
            $('#output-update').attr('src', imageUrl+'image-empty.jpg');
        })

        $(document).on('click', '.btn-store-story-update' , function(){
            validateValueUpdate()
        })

        function validateValue(){
            $('#judul').val() === '' ? $('#judul-validate').show() : $('#judul-validate').hide()
            $('#tanggal').val() === '' ? $('#tanggal-validate').show() : $('#tanggal-validate').hide()
            $('#cerita').val() === '' ? $('#cerita-validate').show() : $('#cerita-validate').hide()

            if($('#tanggal').val() !== '' && $('#judul').val() !== '' && $('#cerita') !== ''){
                storeStory()
            }else{
                $('#toast-validate').fadeIn('past')
                setTimeout(function(){
                    $('#toast-validate').fadeOut('past')
                }, 5000)
            }
        }

        function validateValueUpdate(){
            $('#judul-update').val() === '' ? $('#judul-update-validate').show() : $('#judul-update-validate').hide()
            $('#tanggal-update').val() === '' ? $('#tanggal-update-validate').show() : $('#tanggal-update-validate').hide()
            $('#cerita-update').val() === '' ? $('#cerita-update-validate').show() : $('#cerita-update-validate').hide()

            if($('#tanggal-update').val() !== '' && $('#judul-update').val() !== '' && $('#cerita-update') !== ''){
                updateStory()
            }else{
                $('#toast-validate').fadeIn('past')
                setTimeout(function(){
                    $('#toast-validate').fadeOut('past')
                }, 5000)
            }
        }

        function storeStory(){
            const imageFile = document.getElementById('image-file');
            var myformData = new FormData();
            myformData.append('imageFile', imageFile.files[0]);
            myformData.append('tanggal', $('#tanggal').val());
            myformData.append('judul', $('#judul').val());
            myformData.append('cerita', $('#cerita').val());

            $.ajax({
                method: 'post',
                processData: false,
                contentType: false,
                cache: false,
                data: myformData,
                enctype: 'multipart/form-data',
                url: `/cerita-cinta/store`,
                beforeSend: function() {
                    $('#toast-loading').show()
                    $('#toast-validate').hide()
                },
                error: function(error) {
                    setTimeout(function(){
                        $('#toast-loading').hide()
                        $('#toast-failed').fadeIn('past')
                    }, 1000)
                    setTimeout(function(){
                        $('#toast-failed').fadeOut('past')
                    }, 4000)
                },
                success: function(response) {
                    setTimeout(function(){
                        $('#toast-loading').hide()
                        $('#toast-success').fadeIn('past')
                        getData()
                    }, 1000)
                    setTimeout(function(){
                        $('#toast-success').fadeOut('past')
                    }, 4000)
                }
            });
        }

        function updateStory(){
            const imageFile = document.getElementById('image-file');
            var myformData = new FormData();
            myformData.append('imageFile', imageFile.files[0]);
            myformData.append('tanggal', $('#tanggal-update').val());
            myformData.append('judul', $('#judul-update').val());
            myformData.append('cerita', $('#cerita-update').val());

            $.ajax({
                method: 'post',
                processData: false,
                contentType: false,
                cache: false,
                data: myformData,
                enctype: 'multipart/form-data',
                url: `/cerita-cinta/store`,
                beforeSend: function() {
                    $('#toast-loading').show()
                    $('#toast-validate').hide()
                },
                error: function(error) {
                    setTimeout(function(){
                        $('#toast-loading').hide()
                        $('#toast-failed').fadeIn('past')
                    }, 1000)
                    setTimeout(function(){
                        $('#toast-failed').fadeOut('past')
                    }, 4000)
                },
                success: function(response) {
                    setTimeout(function(){
                        $('#toast-loading').hide()
                        $('#toast-success').fadeIn('past')
                        getData()
                    }, 1000)
                    setTimeout(function(){
                        $('#toast-success').fadeOut('past')
                    }, 4000)
                }
            });
        }

        function getData(){
            $.ajax({
                method: 'get',
                processData: false,
                contentType: false,
                cache: false,
                url: `/cerita-cinta/get-data`,
                beforeSend: function() {
                },
                error: function(error) {
                },
                success: function(response) {
                    console.log(response)
                    data = response
                    setupIndex()
                }
            });
        }

        function deleteData(id){
            $.ajax({
                url: `/cerita-cinta/delete`,
                type: "post",
                dataType: "json",
                data: {
                    id
                },
                beforeSend: function () {
                    $('#toast-loading').show()
                    $('#toast-validate').hide()
                },
                error: function (error) {
                    setTimeout(function(){
                        $('#toast-loading').hide()
                        $('#toast-failed-delete').fadeIn('past')
                    }, 1000)
                    setTimeout(function(){
                        $('#toast-failed-delete').fadeOut('past')
                    }, 4000)
                },
                success: function (response) {
                    setTimeout(function(){
                        $('#toast-loading').hide()
                        $('#toast-success-delete').fadeIn('past')
                        getData()
                    }, 1000)
                    setTimeout(function(){
                        $('#toast-success-delete').fadeOut('past')
                    }, 4000)
                },
            });
        }
    </script>
@endpush
