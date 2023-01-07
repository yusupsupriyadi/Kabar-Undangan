@extends('layouts.master')

@section('content')
    <x-navigation.navbar/>
    <main class="hero min-h-screen bg-base-200">
        <div class="hero-content my-6">
            <section>
                <div class="w-full max-w-xl flex-shrink-0">
                    <ol class="border-l-2 border-blue-600">

                        <li class="mb-6 pb-6">
                            <div class="flex-start flex items-center">
                                <div class="-ml-2 mr-3 -mt-2 flex h-4 w-4 items-center justify-center rounded-full bg-blue-600">
                                </div>
                                <h4 class="-mt-2 text-xl font-semibold text-gray-800">Daftar Akun</h4>
                            </div>
                            <div class="ml-6">
                                <p class="mt-2 mb-4 text-sm text-gray-700">Silahkan isi formulir dengan lengkap.</p>
                                <section class="card lg:w-96 bg-base-100 shadow-xl">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name" class="form-label mb-2 inline-block text-gray-700">Nama</label>
                                            <input id="name" type="email" class="input-form form-control" placeholder="Masukan nama">
                                        </div>

                                        <div class="form-group mt-4">
                                            <label for="phone" class="form-label mb-2 inline-block text-gray-700">No Telepon</label>
                                            <input id="phone" type="email" class="input-form form-control" placeholder="masukan nomor telepon">
                                        </div>

                                        <div class="form-group mt-4">
                                            <label for="email" class="form-label mb-2 inline-block text-gray-700">Email</label>
                                            <input id="email" type="email" class="input-form form-control" placeholder="Masukan email">
                                        </div>

                                        <div class="form-group mt-4">
                                            <label for="password" class="form-label mb-2 inline-block text-gray-700">Password</label>
                                            <input id="password" type="email" class="input-form form-control" placeholder="Masukan password">
                                        </div>

                                        <div class="card-actions mt-6 justify-end">
                                            <button id="handleRegister" type="button" data-mdb-ripple="true" data-mdb-ripple-color="light" class="inline-block rounded bg-blue-600 px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg">
                                                Lanjutkan
                                            </button>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </li>

                        <li class="mb-6 hidden pb-6">
                            <div class="flex-start flex items-center">
                                <div class="-ml-2 mr-3 -mt-2 flex h-4 w-4 items-center justify-center rounded-full bg-blue-600">
                                </div>
                                <h4 class="-mt-2 text-xl font-semibold text-gray-800">Profile Mempelai Pria</h4>
                            </div>
                            <div class="ml-6">
                                <p class="mt-2 mb-4 text-sm text-gray-700">Silahkan lengkapi formulir di atas.</p>
                            </div>
                        </li>

                    </ol>
                </div>

            </section>
        </div>
    </main>

    <x-toast-alert type='success' message="Berhasil daftar." id='toast-success' />
    <x-toast-alert type='failed' message="Gagal Daftar akun." id='toast-failed' />
@endsection

@push('scripts')
    <script type="module">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let name = localStorage.getItem('name');
        let phone = localStorage.getItem('phone');

        $('#name').val(name);
        $('#phone').val(phone);

        $(document).on('click', '#handleRegister', function() {
            $.ajax({
                url: `/auth/register`,
                type: 'POST',
                dataType: 'json',
                data: {
                    name: $('#name').val(),
                    email: $('#email').val(),
                    phone: $('#phone').val(),
                    password: $('#password').val(),
                },
                beforeSend: function() {
                    $('#handleRegister').html('Loading...').addClass('opacity-50');
                },
                error: function(error) {
                    $('#handleRegister').html('Coba Lagi').removeClass('opacity-50');
                    $('#toast-failed').removeClass('hidden');
                    setTimeout(() => {
                       $('#toast-failed').addClass('hidden')
                    }, 3000);
                },
                success: function(response) {
                    $('#handleRegister').html('Berhasil').removeClass('opacity-50');
                    $('#toast-success').removeClass('hidden');
                    setTimeout(() => {
                       $('#toast-success').addClass('hidden')
                    }, 3000);

                    window.location.href = '/complete-register'
                }
            });
        })
    </script>
@endpush
