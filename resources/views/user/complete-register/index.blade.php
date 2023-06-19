@extends('layouts.master')
@section('title', 'Pendaftaran')
@section('content')
    <main class="hero min-h-screen bg-base-200">
        <div class="hero-content my-6">
            <section>
                <div class="w-full max-w-xl flex-shrink-0">
                    <ol class="border-l-2 border-blue-600">
                        <li>
                            <div class="flex-start flex items-center">
                                <div class="-ml-2 mr-3 -mt-2 flex h-4 w-4 items-center justify-center rounded-full bg-blue-600">
                                </div>
                                <h4 class="-mt-2 text-xl font-semibold text-gray-800">Daftar Akun</h4>
                            </div>

                            <div class="ml-6" id="pendaftaran">
                                <p class="-ml-1 text-sm text-green-500">Pendaftaran berhasil.</p>
                            </div>
                        </li>

                        <li class="{{ $dataMempelaiPria === null ? 'pb-6' : '' }} pt-6" id="section-mempelai-pria">
                            <div class="flex-start flex cursor-pointer items-center">
                                <div class="-ml-2 mr-3 -mt-2 flex h-4 w-4 items-center justify-center rounded-full bg-blue-600">
                                </div>
                                <h4 class="-mt-2 text-xl font-semibold text-blue-500">Profile Mempelai Pria</h4>
                            </div>
                            <div class="{{ $dataMempelaiPria === null ? '' : 'hidden' }} ml-6" id="form-mempelai-pria">
                                <p class="desc-timeline">Silahkan isi formulir dengan lengkap.</p>
                                @include('user.complete-register.partials.formMempelaiPria')
                            </div>

                            <div class="{{ $dataMempelaiPria === null ? 'hidden' : '' }} ml-6" id="form-mempelai-pria-not-null">
                                <p class="-ml-1 text-sm text-green-500">Informasi profile mempelai pria sudah lengkap.</p>
                            </div>
                        </li>

                        <li class="{{ $dataMempelaiPria === null ? 'hidden' : '' }} pt-6 pb-6" id="section-mempelai-wanita">
                            <div class="flex-start flex cursor-pointer items-center">
                                <div class="-ml-2 mr-3 -mt-2 flex h-4 w-4 items-center justify-center rounded-full bg-blue-600">
                                </div>
                                <h4 class="-mt-2 text-xl font-semibold text-blue-500">Profile Mempelai Wanita </h4>
                            </div>
                            <div class="{{ $dataMempelaiWanita === null ? '' : 'hidden' }} ml-6" id="form-wanita">
                                <p class="desc-timeline">Silahkan isi formulir dengan lengkap.</p>
                                @include('user.complete-register.partials.formMempelaiWanita')
                            </div>

                            <div class="{{ $dataMempelaiWanita === null ? 'hidden' : '' }} ml-6" id="form-mempelai-wanita-not-null">
                                <p class="-ml-1 text-sm text-green-500">Informasi profile mempelai Wanita sudah lengkap.</p>
                            </div>
                        </li>

                    </ol>
                </div>
            </section>
        </div>
    </main>

    <x-toast-alert id="toast-success" type="success" message="Berhasil." />
@endsection
@push('scripts')
    <script>
        flatpickr("#tanggal-lahir-pria", {
            locale: "id",
            dateFormat: "d/m/Y",
        });

        flatpickr("#tanggal-lahir-wanita", {
            locale: "id",
            dateFormat: "d/m/Y",
        });

        // Variabel
        $('#footer').addClass('hidden')
        var dataMempelaiPria = @json($dataMempelaiPria);
        var dataMempelaiWanita = @json($dataMempelaiWanita);

        var dataNull = {
            'dataMempelaiPria': dataMempelaiPria !== null ? false : true,
            'dataMempelaiWanita': dataMempelaiWanita !== null ? false : true,
        }

        if (dataMempelaiPria === null) {
            $('html, body').animate({
                scrollTop: $("#section-mempelai-pria").offset().top
            }, 1000);
        } else if (dataMempelaiWanita === null) {
            $('html, body').animate({
                scrollTop: $("#section-mempelai-wanita").offset().top
            }, 1000);
        }

        $('#handleStoreDataMempelaiPria').click(function() {
            storeDataMempelaiPria()
        })

        $('#handleStoreDataMempelaiwanita').click(function() {
            storeDataMempelaiWanita()
        })

        function storeDataMempelaiPria() {
            var dataMempelaiPria = {
                id: $('#id-pria').val(),
                nama_lengkap: $('#nama-lengkap-pria').val(),
                nama_panggilan: $('#nama-panggilan-pria').val(),
                tanggal_lahir: $('#tanggal-lahir-pria').val(),
                tempat_lahir: $('#tempat-lahir-pria').val(),
                nama_ayah: $('#nama-ayah-pria').val(),
                nama_ibu: $('#nama-ibu-pria').val(),
                instagram: $('#instagram-pria').val(),
            }

            $.ajax({
                url: `${dataNull.dataMempelaiPria === false ? '/mempelai/update-data-mempelai-pria' : '/mempelai/store-data-mempelai-pria'}`,
                type: 'GET',
                dataType: 'json',
                data: {
                    dataMempelaiPria,
                    dataNull,
                },
                beforeSend: function() {
                    $('.btn-handle').html('Loading...').addClass('opacity-50 cursor-not-allowed');
                },
                error: function(error) {
                    $('.btn-handle').html('Coba lagi').removeClass('opacity-50 cursor-not-allowed').addClass('bg-red-500');
                },
                success: function(response) {
                    $('#toast-success').removeClass('hidden');
                    $('.btn-handle').html('Lanjutkan').removeClass('opacity-50 cursor-not-allowed');
                    setTimeout(() => {
                        $('#toast-success').addClass('hidden')
                    }, 3000);
                    $('#section-mempelai-wanita').removeClass('hidden').addClass('pb-6')
                    $('#section-mempelai-pria').removeClass('pb-6')
                    $('#form-mempelai-pria').addClass('hidden')
                    $('#form-mempelai-pria-not-null').removeClass('hidden')
                    $('html, body').animate({
                        scrollTop: $("#section-mempelai-wanita").offset().top
                    }, 1000);
                    getDataMempelaiPria()
                }
            });
        }

        function storeDataMempelaiWanita() {
            var dataMempelaiWanita = {
                id: $('#id-wanita').val(),
                nama_lengkap: $('#nama-lengkap-wanita').val(),
                nama_panggilan: $('#nama-panggilan-wanita').val(),
                tanggal_lahir: $('#tanggal-lahir-wanita').val(),
                tempat_lahir: $('#tempat-lahir-wanita').val(),
                nama_ayah: $('#nama-ayah-wanita').val(),
                nama_ibu: $('#nama-ibu-wanita').val(),
                instagram: $('#instagram-wanita').val(),
            }

            $.ajax({
                url: `${dataNull.dataMempelaiWanita === false ? '/mempelai/update-data-mempelai-wanita' : '/mempelai/store-data-mempelai-wanita'}`,
                type: 'GET',
                dataType: 'json',
                data: {
                    dataMempelaiWanita,
                    dataNull,
                },
                beforeSend: function() {
                    $('.btn-handle').html('Loading...').addClass('opacity-50 cursor-not-allowed');
                },
                error: function(error) {
                    $('.btn-handle').html('Coba lagi').removeClass('opacity-50 cursor-not-allowed').addClass('bg-red-500');
                },
                success: function(response) {
                    $('#toast-success').removeClass('hidden');
                    $('.btn-handle').html('Lanjutkan').removeClass('opacity-50 cursor-not-allowed');
                    setTimeout(() => {
                        $('#toast-success').addClass('hidden')
                    }, 3000);

                    setTimeout(() => {
                        window.location.href = '/dashboard'
                    }, 1500)
                    $('#section-mempelai-wanita').removeClass('pb-6')
                    $('#form-wanita').addClass('hidden')
                    $('html, body').animate({
                        scrollTop: $("#section-mempelai-wanita").offset().top
                    }, 1000);
                }
            });
        }
    </script>
@endpush
