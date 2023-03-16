@extends('layouts.app')

@section('content')
    <main class="bg-gray-100">
        <x-app.navbar />
        <div class="mx-auto mt-4 flex flex-wrap px-2 pt-4 md:px-12 lg:pt-10">
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

                    @include('user.cerita-cinta.partials.form_add_cerita')
                    @include('user.cerita-cinta.partials.form_edit_cerita')

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
            $('#id-cerita').val(id)
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
            const imageFile = document.getElementById('image-file-update');
            var myformData = new FormData();
            myformData.append('id', $('#id-cerita').val());
            myformData.append('tanggal', $('#tanggal-update').val());
            myformData.append('judul', $('#judul-update').val());
            myformData.append('cerita', $('#cerita-update').val());
            var image = $('#output-update').attr('src').split('/').pop();
            if(image === "image-empty.jpg"){
                myformData.append('imageFile', 'null');
            }else{
                myformData.append('imageFile', imageFile.files[0]);
            }

            $.ajax({
                method: 'post',
                processData: false,
                contentType: false,
                cache: false,
                data: myformData,
                enctype: 'multipart/form-data',
                url: `/cerita-cinta/update`,
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
