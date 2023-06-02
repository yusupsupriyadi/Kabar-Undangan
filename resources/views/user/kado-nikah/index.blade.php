@extends('layouts.app')

@section('content')
    <main class="bg-gray-100">
        <x-app.navbar />
        <div class="mx-auto mt-4 flex flex-wrap px-2 pt-24 md:px-12 lg:pt-10">
            <!--Menu-->
            <x-app.menu active="kado-nikah">
                <x-slot name="activeDisplay">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <p class="text-left text-sm">Kado Nikah</p>
                    </div>
                </x-slot>
            </x-app.menu>

            <!--Main Content-->
            <div class="border-rounded mt-6 w-full border border-gray-400 bg-white p-8 leading-normal text-gray-900 lg:mt-0 lg:w-4/5">

                <section class="{{ intval($user['vip']) === 1 ? 'hidden' : '' }} mb-6">
                    <x-app.card-premium />
                </section>

                <x-app.title title="Kado Nikah" desc="Fasilitas ini Anda bisa menambahkan informasi kado nikah untuk memberikan kesempatan kepada teman-teman untuk memberikan kado nikah secara online." />

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
                    <section class="hidden" id="form">
                        @include('user.kado-nikah.partials.form')
                    </section>

                    <section id="index-data" class="hidden">

                    </section>

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

                    <section id="blank-page" class="hidden py-5">
                        <div class="flex flex-col items-center justify-center">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="h-14 w-14 text-gray-400" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <rect x="3" y="8" width="18" height="4" rx="1" />
                                    <line x1="12" y1="8" x2="12" y2="21" />
                                    <path d="M19 12v7a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-7" />
                                    <path d="M7.5 8a2.5 2.5 0 0 1 0 -5a4.8 8 0 0 1 4.5 5a4.8 8 0 0 1 4.5 -5a2.5 2.5 0 0 1 0 5" />
                                </svg>
                                <p class="text-center text-lg text-gray-400">Belum ada informasi untuk kado nikah</p>
                                <div class="mt-6">
                                    <button type="button" class="btn-add btn-primary !bg-pink-300 !p-2 !px-3 !text-sm !capitalize !text-gray-800">
                                        Tambah informasi kado nikah
                                    </button>
                                </div>
                            </div>
                        </div>
                    </section>
                </main>
                <x-app.testimoni-bar />
            </div>


        </div>

        <x-app.footer />
    </main>

    @include('user.kado-nikah.partials.modal')
    <x-toast-alert id="toast-success" type="success" message="Berhasil menyimpan" />
    <x-toast-alert id="toast-success-delete" type="success" message="Berhasil menghapus" />
    <x-toast-alert id="toast-failed" type="failed" message="Gagal menyimpan" />
    <x-toast-alert id="toast-failed-delete" type="failed" message="Gagal menghapus" />
    <x-toast-alert id="toast-loading" type="loading" message="Sedang memproses" />
    <x-toast-alert id="toast-validate" type="failed" message="Periksa kembali yang wajib diisi." />
@endsection

@push('scripts')
    <script>
        var data = [];

        var vip = @json($user['vip']);
        if (vip) {
            $('#promo-panel').hide()
            $('#menu-navigation').removeClass('pt-20')
            $('#menu-navigation').addClass('pt-16')
        } else {
            $('#promo-panel').show()
            $('#menu-navigation').removeClass('pt-16')
            $('#menu-navigation').addClass('pt-20')
        }

        function uppercaseFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }

        $('input[name=wallet]').change(function() {
            if ($(this).val() === 'bank') {
                $('#type-wallet').val('bank')
                $('.wallet-index').show()
                $('#wallet').val('')
                $('#no-wallet').val('')
                $('#wallet-user').val('')
                $('.bank-index').show()
                $('.label-no-wallet').text('No Rekening')
                $('.label-user-wallet').text('Nama Pemegang Rekening')
                $('#no-wallet').attr('placeholder', 'Masukan no rekening ');
                $('#wallet-name').attr('placeholder', 'Masukan pemegang rekening');
            } else {
                $('#type-wallet').val('e-money')
                $('.wallet-index').show()
                $('#wallet').val($(this).val())
                $('#no-wallet').val('')
                $('#wallet-user').val('')
                $('.bank-index').hide()
                $('.label-no-wallet').text('No Handphone ' + uppercaseFirstLetter($(this).val()))
                $('.label-user-wallet').text('Nama pemegang ' + uppercaseFirstLetter($(this).val()))
                $('#no-wallet').attr('placeholder', 'Masukan no handphone ' + uppercaseFirstLetter($(this).val()));
                $('#wallet-name').attr('placeholder', 'Masukan pemegang ' + uppercaseFirstLetter($(this).val()));
            }
        });

        $(document).on('click', '.btn-add', function() {
            $('input[name="wallet"]').prop('checked', false);
            $('#blank-page').hide()
            $('#form').show()
            $('#index-data').hide()
            $('#wallet').val('')
            $('#no-wallet').val('')
            $('#wallet-user').val('')
            $('#btn-action').removeClass('btn-update')
            $('#btn-action').addClass('btn-save')
        })

        $(document).on('click', '.btn-cancel', function() {
            $('.wallet-index').hide()
            var unchecked = false;
            $('input[name="wallet"]').prop('checked', false);
            setDataIndex()
        })

        $(document).on('click', '.btn-save', function() {
            validateForm()
        })

        function validateForm(update = false) {
            $('#wallet').val() === '' ? $('#wallet-validate').show() : $('#wallet-validate').hide()
            $('#no-wallet').val() === '' ? $('#no-wallet-validate').show() : $('#no-wallet-validate').hide()
            $('#wallet-user').val() === '' ? $('#wallet-user-validate').show() : $('#wallet-user-validate').hide()

            if ($('#wallet').val() !== '' && $('#no-wallet').val() !== '' && $('#wallet-user').val() !== '') {
                if (update) {
                    updateData()
                } else {
                    saveData()
                }
            } else {
                $('#toast-validate').fadeIn('past')
                setTimeout(function() {
                    $('#toast-validate').fadeOut('past')
                }, 5000)
            }
        }

        $(document).on('click', '.btn-edit', function() {
            $('#blank-page').hide()
            $('#form').show()
            $('#index-data').hide()
            $('#id-data').val($(this).data('id'));
            $('#type-wallet').val($(this).data('type-wallet'))
            $('.wallet-index').show()
            if ($(this).data('type-wallet') === 'bank') {
                $('.bank-index').show()
                $('.label-no-wallet').text('No Rekening')
                $('.label-user-wallet').text('Nama Pemegang Rekening')
                $('#no-wallet').attr('placeholder', 'Masukan no rekening ');
                $('#wallet-user').attr('placeholder', 'Masukan pemegang rekening');
            } else {
                $('.bank-index').hide()
                $('.label-no-wallet').text('No Handphone ' + uppercaseFirstLetter($(this).data('wallet')))
                $('.label-user-wallet').text('Nama pemegang ' + uppercaseFirstLetter($(this).data('wallet')))
                $('#no-wallet').attr('placeholder', 'Masukan no handphone ' + uppercaseFirstLetter($(this).data('wallet')));
                $('#wallet-user').attr('placeholder', 'Masukan pemegang ' + uppercaseFirstLetter($(this).data('wallet')));
            }
            $('input[name="wallet"][value="' + $(this).data('wallet') + '"]').prop('checked', true);
            $('#wallet').val($(this).data('wallet'))
            $('#no-wallet').val($(this).data('no-wallet'))
            $('#wallet-user').val($(this).data('wallet-user'))
            $('#btn-action').addClass('btn-update')
            $('#btn-action').removeClass('btn-save')
        })

        $(document).on('click', '.btn-update', function() {
            validateForm(true)
        })

        $(document).on('click', '.btn-delete', function() {
            $('#id-data').val($(this).data('id'));
            $('#modal-delete').addClass('modal-open')
        })

        $(document).on('click', '.btn-close-modal', function() {
            $('#modal-delete').removeClass('modal-open')
        })

        $(document).on('click', '.btn-confirm-delete', function() {
            $('#modal-delete').removeClass('modal-open')
            deleteData($('#id-data').val())
        })

        getData()

        function getData() {
            $.ajax({
                url: `kado-nikah/get-data`,
                type: 'GET',
                dataType: 'json',
                data: {},
                beforeSend: function() {
                    $('#loading-page').show()
                    $('#blank-page').hide()
                    $('#index-data').hide()
                    $('#form').hide()
                },
                error: function(error) {
                    $('#loading-page').hide()
                },
                success: function(response) {
                    $('#loading-page').hide()
                    data = response;
                    setDataIndex()
                    return;
                }
            });
        }

        function setDataIndex() {
            var html = ``;
            if (data.length === 0) {
                $('#blank-page').show()
                $('#index-data').hide()
                $('#form').hide()
            } else {
                $('#blank-page').hide()
                $('#index-data').show()
                $('#form').hide()

                html += `<section class="grid md:grid-cols-2 lg:grid-cols-4 md:gap-4">`
                $.each(data, function(key, val) {
                    let color = val.wallet === "gopay" ? "gopay-color" :
                        val.wallet === "dana" ? "dana-color" :
                        val.wallet === "ovo" ? "ovo-color" :
                        val.wallet === "shopeepay" ? "shopeepay-color" :
                        "rekening-color";

                    html += `
                <div class="w-full rounded-md ${color} p-2 shadow-md mt-3 md:mt-0">
                    <div class="flex flex-col">
                        <div class="flex flex-row items-center justify-between px-4 py-4">
                            <div class="flex text-md font-bold text-gray-700">${uppercaseFirstLetter(val.wallet)}</div>
                            <div class="text-sm text-gray-400 sm:text-base">
                                <svg class="h-6 w-6 text-gray-600"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12" />  <path d="M20 12v4h-4a2 2 0 0 1 0 -4h4" /></svg>
                            </div>
                        </div>
                        <div class="px-4">
                            <button class="mt-2 bg-gray-900 px-2 py-1 text-xs text-gray-300 flex items-center gap-1">
                                <svg class="h-4 w-4 text-white"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                <div class="pt-1">${val.user_wallet}</div>
                            </button>
                            <h2 class="my-3 text-2xl font-bold text-gray-800">${val.no_wallet}</h2>
                            <div class="mb-2 flex w-full flex-row items-center justify-between">
                                <div class="text-sm font-medium text-gray-800">
                                    <span class="btn-edit cursor-pointer" data-id="${val.id}" data-wallet="${val.wallet}" data-no-wallet="${val.no_wallet}" data-wallet-user="${val.user_wallet}" data-type-wallet="${val.type}">
                                        Edit
                                    </span>
                                    <span class="text-4xl font-bold">.</span>
                                    <span class="btn-delete cursor-pointer" data-id="${val.id}">Hapus</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                `
                })
                html += `</section>`
                html += `<div class="mt-4">
                <button type="button" id="btn-action" class="btn-add inline-block rounded bg-yellow-600 px-6 py-3 text-sm font-bold uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-green-800 hover:shadow-lg">
                    Tambah Rekening
                </button>
                    </div>`

                $('#index-data').html(html)
            }
        }

        function saveData() {
            const id = $('#id-data').val();
            const type = $('#type-wallet').val();
            const wallet = $('#wallet').val();
            const no_wallet = $('#no-wallet').val();
            const user_wallet = $('#wallet-user').val();

            $.ajax({
                url: "/kado-nikah/store",
                type: "GET",
                data: {
                    type,
                    wallet,
                    no_wallet,
                    user_wallet
                },
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
                    }, 1000)
                    setTimeout(function() {
                        $('#toast-success').fadeOut('past')
                    }, 4000)
                }
            })
        }

        function updateData() {
            const id = $('#id-data').val();
            const type = $('#type-wallet').val();
            const wallet = $('#wallet').val();
            const no_wallet = $('#no-wallet').val();
            const user_wallet = $('#wallet-user').val();

            $.ajax({
                url: "/kado-nikah/update",
                type: "GET",
                data: {
                    id,
                    type,
                    wallet,
                    no_wallet,
                    user_wallet
                },
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
                    }, 1000)
                    setTimeout(function() {
                        $('#toast-success').fadeOut('past')
                    }, 4000)
                }
            })
        }

        function deleteData(id) {
            $.ajax({
                url: "/kado-nikah/delete",
                type: "GET",
                data: {
                    id
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
            })
        }
    </script>
@endpush
