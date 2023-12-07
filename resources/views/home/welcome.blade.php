@extends('layouts.home')

@section('content')
    <div class="hero relative min-h-screen bg-[url('/public/images/bg-image-wedding.webp')]">
        @include('home.partials._navbar')
        <section class="hero-content mt-20 flex-col lg:mt-0 lg:flex-row-reverse lg:gap-20">
            <div class="text-center lg:text-left">
                <h1 class="text-4xl font-bold text-gray-800 md:text-5xl">Buat undangan sekarang!</h1>
                <p class="px-6 pb-6 pt-4 text-sm font-medium text-gray-800 md:px-0 md:text-lg">Saatnya tampil beda dengan beralih ke undangan digital dan bagikan kebahagianmu kepada
                    orang-orang terdekatmu.</p>

                <div class="gap-4 lg:flex">
                    <div>
                        <div class="items-start gap-4 md:flex">
                            <div>
                                <a title="demo" class="group relative inline-block focus:outline-none focus:ring" href="{{ route('subdomain', ['subdomain' => 'demo', 'tema' => 'brown-premium']) }}">
                                    <span class="absolute inset-0 translate-x-1.5 translate-y-1.5 bg-yellow-300 transition-transform group-hover:translate-x-0 group-hover:translate-y-0"></span>
                                    <span class="relative inline-block border-2 border-current px-8 py-3 text-sm font-bold uppercase tracking-widest text-black group-active:text-opacity-75">
                                        <span class="">DEMO</span>
                                    </span>
                                </a>
                            </div>


                            <div>
                                <a title="demo" class="group relative mt-4 inline-block focus:outline-none focus:ring md:mt-0" href="/pilihan-tema">
                                    <span class="absolute inset-0 translate-x-1.5 translate-y-1.5 bg-purple-300 transition-transform group-hover:translate-x-0 group-hover:translate-y-0"></span>
                                    <span class="relative inline-block border-2 border-current px-8 py-3 text-sm font-bold uppercase tracking-widest text-black group-active:text-opacity-75">
                                        <span class="">PILIHAN TEMA</span>
                                    </span>
                                </a>
                            </div>
                        </div>

                        <div class="l-4 mt-6 flex justify-center md:hidden">
                            <a title="kontak bantuan" class="alert alert-success w-[180px] rounded-full px-4 py-2 text-center" href="https://api.whatsapp.com/send?phone=6285155305665&text=">
                                <div>
                                    <span class="text-sm font-semibold">Butuh bantuan?</span>
                                    <img src="{{ asset('/svg/whatsapp.svg') }}" width="25" height="25" alt="whatsapp icon" />
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            @include('home.partials._form_register')
        </section>
    </div>

    @include('home.partials._whatsapp_toast')
@endsection

@push('scripts')
    <script>
        $('#footer').addClass('hidden')
        $('#home').addClass('hidden')
        $(document).on('click', '#handleRegister', function() {
            localStorage.setItem('email', document.getElementById('email').value);
            localStorage.setItem('phone', document.getElementById('phone').value);
            window.location.href = '/register'
        })
    </script>
@endpush
