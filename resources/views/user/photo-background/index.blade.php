@extends('layouts.app')

@section('content')
    <main class="bg-gray-100">
        <x-app.navbar />
        <div class="mx-auto mt-4 flex flex-wrap px-2 pt-4 md:px-12 lg:pt-10">
            <!--Menu-->
            <x-app.menu active="photo-background">
                <x-slot name="activeDisplay">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <p class="text-left text-sm">Photo Background</p>
                    </div>
                </x-slot>
            </x-app.menu>

            <!--Main Content-->
            <div class="border-rounded mt-6 w-full border border-gray-400 bg-white p-8 leading-normal text-gray-900 lg:mt-0 lg:w-4/5">

                <section class="{{ intval($user['vip']) === 1 ? 'hidden' : '' }} mb-6">
                    <x-app.card-premium />
                </section>

                <x-app.title title="Photo Background" desc="Fasilitas ini digunakan untuk menyampaikan foto pra pernikahan atau photo pernikahan pilihan kamu untuk ditampilan di website penikahan kamu berupa background website atau berbetuk slide." />

                <section class="{{ intval($user['vip']) === 1 ? 'hidden' : '' }} mt-2">
                    <div class="alert alert-error animate-pulse shadow-lg">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0 stroke-current text-white" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-sm text-white">Fitur ini akan Aktip bila kamu sudah langganan <b>PREMIUM!</b></span>
                        </div>
                    </div>
                </section>

                <main class="py-5">
                    <div id="main-page" class="hidden">
                        <section id="form-add" class="hidden">
                            @include('user.gallery.partials.form_add')
                        </section>

                        <section id="blank-page" class="hidden">
                            <div class="flex flex-col items-center justify-center">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="h-12 w-12 text-red-500/25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
                                    </svg>
                                    <p class="text-center text-lg text-gray-400">Belum ada photo yang ditambahkan</p>
                                    <div class="mt-6">
                                        <button type="button" class="btn-add-photo btn-primary !bg-pink-300 !p-2 !px-3 !text-sm !capitalize !text-gray-800">
                                            Tambah Photo
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section id="index-data" class="hidden">

                        </section>
                    </div>

                    <section id="loading-page" class="hidden">
                        <div class='flex items-center justify-center'>
                            <button type="button" class="h-max w-max rounded-lg bg-indigo-400 font-bold text-white duration-[500ms,800ms] hover:cursor-not-allowed hover:bg-indigo-300" disabled>
                                <div class="m-[10px] flex items-center justify-center">
                                    <div class="h-5 w-5 animate-spin rounded-full border-4 border-solid border-white border-t-transparent"></div>
                                    <div class="ml-2">Harap Menunggu ...<div>
                                        </div>
                            </button>
                        </div>
                    </section>
                </main>
                <x-app.testimoni-bar />
            </div>


        </div>

        <x-app.footer />
    </main>

    @include('user.gallery.partials._modal')
    <x-toast-alert id="toast-success" type="success" message="Berhasil menyimpan" />
    <x-toast-alert id="toast-success-delete" type="success" message="Berhasil menghapus" />
    <x-toast-alert id="toast-failed" type="failed" message="Gagal menyimpan" />
    <x-toast-alert id="toast-failed-delete" type="failed" message="Gagal menghapus" />
    <x-toast-alert id="toast-loading" type="loading" message="Sedang proses" />
    <x-toast-alert id="toast-validate" type="failed" message="Periksa kembali yang wajib diisi." />
@endsection

@push('scripts')
    <script>
        const imageUrl = '{{ asset('storage/images') }}/'
        const imagePublic = '{{ asset('/images') }}/'
        var data = [];
        var idData = '';

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

        $('#image-file').on('change', (e) => {
            var reader = new FileReader();
            reader.readAsDataURL(e.target.files[0]);
            reader.onload = function() {
                var output = document.getElementById('output');
                output.src = reader.result;
            }
        })

        getData()

        $(document).on('click', '.btn-add-photo', function() {
            $('#blank-page').hide()
            $('#form-add').show()
            $('#index-data').hide()
            $('#judul').val('')
            $('#keterangan').val('')
            $('#image-file').val('')
            $('#image-index').html(`<img id="output" width="300">`)
            $('#btn-action').removeClass('btn-update')
            $('#btn-action').addClass('btn-save')
        })

        $(document).on('click', '.btn-cancel', function() {
            setDataIndex()
        })

        $(document).on('click', '.btn-save', function() {
            validateForm()
        })

        $(document).on('click', '.btn-edit', function() {
            $('#index-data').hide()
            $('#form-add').show()
            $('#judul').val($(this).data('judul'))
            $('#keterangan').val($(this).data('keterangan'))
            $('#image-file').val('')
            $('#output').attr('src', imageUrl + $(this).data('gambar'));
            $('#id-data').val($(this).data('id'));
            $('#btn-action').addClass('btn-update')
            $('#btn-action').removeClass('btn-save')
        })

        function setDataIndex() {
            if (data.length === 0) {
                $('#blank-page').show()
                $('#index-data').hide()
                $('#form-add').hide()
                $('#form-edit').hide()
            } else {
                $('#blank-page').hide()
                $('#index-data').show()
                $('#form-add').hide()
                $('#form-edit').hide()
                var html = ``
                $.each(data, function(key, value) {
                    html += `
                    <div class="items-end justify-between rounded-lg bg-pink-200/40 shadow-md backdrop-blur-md md:flex ${key !== 0 ? 'mt-4' : ''}">
                        <section class="gap-4 md:flex">
                            <img src="${value.gambar !== 'null' ? `${imageUrl}${value.gambar}` : `${imagePublic}image-empty.webp`}" alt="" class="h-auto max-w-full rounded-lg md:!w-[200px] md:rounded-none md:rounded-tl-lg md:rounded-bl-lg">
                            <section class="p-6">
                                <h1>${value.judul}</h1>
                                <p class="mt-3 max-w-md text-xs text-gray-500">${value.keterangan}</p>
                            </section>
                        </section>
                        <section class="p-6 pt-0">
                            <button type="button" data-id="${value.id}" data-keterangan="${value.keterangan}" data-judul="${value.judul}" data-gambar="${value.gambar}" class="btn-edit btn-primary !text-white">
                                Edit
                            </button>
                            <button data-id="${value.id}" type="button" class="btn-delete btn-primary !bg-red-500 !text-white">
                                Hapus
                            </button>
                        </section>
                    </div>
                    `
                })
                html += `
                <div class="mt-6">
                    <button type="button" class="btn-add-photo btn-primary !bg-pink-300 !p-2 !px-3 !text-sm !capitalize !text-gray-800">
                        Tambah Photo
                    </button>
                </div>`

                $('#index-data').html(html)
            }
        }

        function getData() {
            $.ajax({
                url: `photo-background/get-data`,
                type: 'GET',
                dataType: 'json',
                data: {},
                beforeSend: function() {
                    $('#loading-page').show()
                    $('#main-page').hide()
                    $('#form-add').hide()
                    $('#form-edit').hide()
                },
                error: function(error) {
                    $('#loading-page').hide()
                    $('#main-page').show()
                },
                success: function(response) {
                    $('#loading-page').hide()
                    $('#main-page').show()
                    data = response;
                    setDataIndex()

                    return;
                }
            });
        }

        function validateForm(save = true) {
            const image = $('#image-file').val()
            $('#judul').val() === '' ? $('#judul-validate').show() : $('#judul-validate').hide()
            $('#keterangan').val() === '' ? $('#keterangan-validate').show() : $('#keterangan-validate').hide()

            if (save === true) {
                image === '' ? $('#gambar-validate').show() : $('#gambar-validate').hide()
                if ($('#keterangan').val() !== '' && $('#judul').val() !== '' && image !== '') {
                    saveData()
                } else {
                    $('#toast-validate').fadeIn('past')
                    setTimeout(function() {
                        $('#toast-validate').fadeOut('past')
                    }, 5000)
                }
            } else {
                if ($('#keterangan').val() !== '' && $('#judul').val() !== '') {
                    updateData()
                } else {
                    $('#toast-validate').fadeIn('past')
                    setTimeout(function() {
                        $('#toast-validate').fadeOut('past')
                    }, 5000)
                }
            }

        }

        function saveData() {
            const imageFile = document.getElementById('image-file');
            var myformData = new FormData();
            myformData.append('judul', $('#judul').val());
            myformData.append('keterangan', $('#keterangan').val());
            myformData.append('imageFile', imageFile.files[0]);

            $.ajax({
                method: 'post',
                processData: false,
                contentType: false,
                cache: false,
                data: myformData,
                enctype: 'multipart/form-data',
                url: `/photo-background/store`,
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
                        getData()
                        $('#judul').val('')
                        $('#keterangan').val('')
                        $('#image-file').val('')
                        $('#image-index').html(`<img id="output" width="300">`)
                    }, 1000)
                    setTimeout(function() {
                        $('#toast-success').fadeOut('past')
                    }, 4000)

                }
            });
        }

        $(document).on('click', '.btn-update', function() {
            validateForm(false)
        })

        function updateData() {
            const imageFile = document.getElementById('image-file');
            var myformData = new FormData();
            myformData.append('judul', $('#judul').val());
            myformData.append('keterangan', $('#keterangan').val());
            myformData.append('imageFile', imageFile.files[0]);
            myformData.append('id', $('#id-data').val());

            $.ajax({
                method: 'post',
                processData: false,
                contentType: false,
                cache: false,
                data: myformData,
                enctype: 'multipart/form-data',
                url: `/photo-background/update`,
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
                        getData()
                        $('#judul').val('')
                        $('#keterangan').val('')
                        $('#image-file').val('')
                        $('#image-index').html(`<img id="output" width="300">`)
                    }, 1000)
                    setTimeout(function() {
                        $('#toast-success').fadeOut('past')
                    }, 4000)
                }
            });
        }

        $(document).on('click', '.btn-delete', function() {
            $('#modal-confirm').addClass('modal-open')
            const id = $(this).data('id')
            idData = id;
        })

        $(document).on('click', '.btn-close-modal', function() {
            $('#modal-confirm').removeClass('modal-open')
        })

        $(document).on('click', '.btn-confirm-delete', function() {
            $('#modal-confirm').removeClass('modal-open')
            deleteData()
        })

        function deleteData() {
            $.ajax({
                url: `photo-background/destroy`,
                type: 'GET',
                dataType: 'json',
                data: {
                    idData
                },
                beforeSend: function() {
                    $('#toast-loading').show()
                },
                error: function(error) {
                    setTimeout(function() {
                        $('#toast-loading').hide()
                        $('#toast-failed-delete').fadeIn('past')
                    }, 1000)
                    setTimeout(function() {
                        $('#toast-failed-delete').fadeOut('past')
                    }, 4000)
                },
                success: function(response) {
                    setTimeout(function() {
                        $('#toast-loading').hide()
                        $('#toast-success-delete').fadeIn('past')
                        getData()
                    }, 1000)
                    setTimeout(function() {
                        $('#toast-success-delete').fadeOut('past')
                    }, 4000)
                }
            });
        }
    </script>
@endpush
