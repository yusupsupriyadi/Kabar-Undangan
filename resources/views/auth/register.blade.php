@extends('layouts.master')

@section('content')
    @include('components.navbar')
    <main class="hero min-h-screen bg-base-200">
        <div class="hero-content block">
            <section class="mb-10 mt-10 flex justify-center">
                <ul class="steps">
                    <li id="st-1" class="step step-primary text-gray-700 font-bold">Daftar Akun</li>
                    <li id="st-2" class="step text-gray-400">Info Mempelai</li>
                    <li id="st-3" class="step text-gray-400">Atur Acara</li>
                    <li id="st-4" class="step text-gray-400">Receive Product</li>
                </ul>
            </section>

            <section id="step-1">
                <div class="card flex-shrink-0 w-full max-w-xl shadow-2xl bg-base-100">
                    <div class="card-body">
                        <h1 class="text-center text-2xl">Daftar Akun</h1>
                        <p class="mx-auto w-10/12 text-center text-gray-700 text-sm font-serif mt-2">Isi formulir di bawah
                            untuk
                            melanjutkan step
                            selanjutnya.</p>
                        <div class="form-control mt-4">

                            <label class="label">
                                <span class="label-text">Nama</span>
                            </label>
                            <input id="name" type="text" placeholder="nama"
                                class="input input-bordered rounded-md" />
                        </div>

                        <div class="lg:flex justify-between lg:gap-2">
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Email</span>
                                </label>
                                <input id="email" type="email" placeholder="email"
                                    class="input input-bordered rounded-md" />
                            </div>
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">No Handphone</span>
                                </label>
                                <input id="phone" type="text" placeholder="phone"
                                    class="input input-bordered rounded-md" />
                            </div>
                        </div>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Password</span>
                            </label>
                            <input id="password" type="password" placeholder="password"
                                class="input rounded-md input-bordered" />
                        </div>
                        <div class="form-control mt-6">
                            <button id="handleRegister" class="btn btn-primary lg:flex lg:gap-1 items-center">
                                <div class="dots-flow">Lanjutkan</div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </button>
                        </div>
                    </div>
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
