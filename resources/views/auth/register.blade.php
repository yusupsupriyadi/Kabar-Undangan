@extends('layouts.master')

@section('content')
    <x-navigation.navbar />
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
                                <section class="card bg-base-100 shadow-xl lg:w-96">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name" class="form-label mb-2 inline-block text-gray-700">Nama</label>
                                            <input id="name" type="text" class="input-form form-control" placeholder="Masukan nama">
                                        </div>

                                        <div class="form-group mt-4">
                                            <label for="phone" class="form-label mb-2 inline-block text-gray-700">No Telepon</label>
                                            <input id="phone" type="text" class="input-form form-control" placeholder="masukan nomor telepon">
                                        </div>

                                        <div class="form-group mt-4">
                                            <label for="email" class="form-label mb-2 inline-block text-gray-700">Email</label>
                                            <input id="email" type="email" class="input-form form-control" placeholder="Masukan email">
                                        </div>

                                        <div class="relative">
                                            <div class="form-group mt-4">
                                                <label for="password" class="form-label mb-2 inline-block text-gray-700">Password</label>
                                                <input id="password" type="password" class="input-form form-control" placeholder="Masukan password">
                                            </div>
                                            <div class="togglePasswordVisibility absolute inset-y-0 top-[47px] right-0 flex cursor-pointer items-center pr-3">
                                                <svg class="h-5 w-5 text-gray-600 block" id="hide-password" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                                </svg>

                                                <svg class="h-5 w-5 text-gray-600 hidden" id="show-password" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>

                                            </div>
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

        $(document).on('click', '.togglePasswordVisibility', function(){
            const passwordInput = document.getElementById("password");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                $('#hide-password').hide()
                $('#show-password').show()
            } else {
                passwordInput.type = "password";
                $('#hide-password').show()
                $('#show-password').hide()
            }
        })

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
