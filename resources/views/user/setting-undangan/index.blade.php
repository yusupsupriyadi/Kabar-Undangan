@extends('layouts.app')

@section('content')
    <main class="bg-gray-100">
        <x-app.navbar />
        <div class="mx-auto mt-4 flex flex-wrap px-2 pt-4 md:px-12 lg:pt-10">
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

                <section class="{{ intval($user['vip']) === 1 ? 'hidden' : '' }} mb-6">
                    <x-app.card-premium />
                </section>


                <x-app.title title="Pengaturan Undangan" desc="Fasilitas ini kamu dapat gunakan untuk mengatur pengaturan umum website kamu, kamu bisa mengganti informasi website yang berhubungan dengan pernikahan kamu." />

                <main class="py-5">
                    <div class="form-control">
                        <label class="label">
                            <span class="form-label font-bold">Nama Domain</span>
                        </label>
                        <label class="input-group">
                            <input id="domain" type="text" placeholder="masukan domain" class="input-primary h-[2rem] lowercase" style="border-radius: 0.2rem 0 0 0.25rem !important" value="{{ $user['name'] }}" />
                            <span class="text-sm" style="0 0.25rem 0.25rem 0 !important">.kabarundangan.com</span>
                        </label>
                        <x-label-validate id="domain-validate" />
                        <label class="label">
                            <span class="label-text-alt text-xs text-gray-600">ini untuk nama link undangan digital kamu <span class="text-red-300">tidak boleh menggunakan spasi dan symbol lain selain tanda hubung(-)</span></span>
                        </label>
                    </div>

                    <div class="form-control mt-2 w-full">
                        <label class="label">
                            <span class="form-label font-bold">Judul Undangan</span>
                        </label>
                        <input id="judul_undangan" type="text" placeholder="masukan judul" class="input-primary" value="{{ $dataSettingUndangan === null ? '' : $dataSettingUndangan['judul_undangan'] }}" />
                        <x-label-validate id="judul-undangan-validate" />
                        <label class="label">
                            <span class="label-text-alt text-xs text-gray-600">Judul untuk menamai website kamu yang akan muncul pada bagian atas browser.</span>
                        </label>
                    </div>

                    <div class="mt-6">
                        <button id="btn-simpan" type="button" class="btn-primary">
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
    <x-toast-alert id="toast-failed-domain" type="failed" message="Domain sudah digunakan. coba yang lain" />
    <x-toast-alert id="toast-loading" type="loading" message="Sedang memproses" />
    <x-toast-alert id="toast-validate" type="failed" message="Periksa kembali yang wajib diisi." />
@endsection

@push('scripts')
    <script>
        var id = @json($dataSettingUndangan === null ? '' : $dataSettingUndangan['id']);
        var dataSettingUndangan = @json($dataSettingUndangan);
        var action = 'create';
        if (dataSettingUndangan !== null) {
            action = 'update';
        }

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

        $(document).ready(function() {
            $('#btn-simpan').click(function() {
                validateForm()
            });
        });

        $(document).on('keyup', '#domain', function() {
            var domain = $(this).val();
            var filteredDomain = domain.replace(/[\s~`!@#$%\^&*+=\[\]\\';,/{}|\\":<>\?()\._]/g, '');
        // validasi domain
        if (/[\s~`!@#$%\^&*+=\[\]\\';,/{}|\\":<>\?()\._]/g.test(domain)) {
                alert("Domain tidak boleh mengandung spasi atau simbol selain tanda hubung (-)");
                $(this).val(filteredDomain);
            }
        })

        function validateForm() {
            $('#domain').val() === '' ? $('#domain-validate').show() : $('#domain-validate').hide();
            $('#judul_undangan').val() === '' ? $('#judul-undangan-validate').show() : $('#judul-undangan-v alidate').hide();

            if ($('#domain').val() === '' || $('#judul_undangan').val() === '') {
                $('#toast-validate').fadeIn('past')
                setTimeout(function() {
                    $('#toast-validate').fadeOut('past')
                }, 5000)
            } else {
                storeData()
            }
        }

        function storeData() {
            var domain = $('#domain').val();
            var judul_undangan = $('#judul_undangan').val();

            $.ajax({
                url: `/setting-undangan/store`,
                type: "GET",
                dataType: 'json',
                data: {
                    id,
                    domain,
                    judul_undangan,
                    action
                },
                beforeSend: function() {
                    $('#toast-loading').show()
                    $('#toast-validate').hide()
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
                        setTimeout(function() {
                            $('#toast-loading').hide()
                            $('#toast-failed-domain').fadeIn('past')
                        }, 1000)
                        setTimeout(function() {
                            $('#toast-failed-domain').fadeOut('past')
                        }, 4000)
                    } else {
                        setTimeout(function() {
                            $('#toast-loading').hide()
                            $('#toast-failed').fadeIn('past')
                        }, 1000)
                        setTimeout(function() {
                            $('#toast-failed').fadeOut('past')
                        }, 4000)
                    }

                },
                success: function(response) {
                    action = 'update';
                    setTimeout(function() {
                        $('#toast-loading').hide()
                        $('#toast-success').fadeIn('past')
                    }, 1000)
                    setTimeout(function() {
                        $('#toast-success').fadeOut('past')
                    }, 4000)
                },
            });
        }
    </script>
@endpush
