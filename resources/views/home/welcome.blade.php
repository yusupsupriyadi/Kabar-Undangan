@extends('layouts.master')

@section('content')
    <div class="hero relative min-h-screen bg-[url('/public/images/bg-image-wedding.webp')]">
        @include('home.partials._navbar')
        <section class="hero-content mt-20 flex-col lg:mt-0 lg:flex-row-reverse lg:gap-20">
            <div class="text-center lg:text-left">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800">Buat undangan sekarang!</h1>
                <p class="pt-4 pb-6 text-sm px-6 md:text-lg md:px-0 text-gray-700">Saatnya tampil beda dengan beralih ke undangan digital dan bagikan kebahagianmu kepada
                    orang-orang terdekatmu.</p>

                <div class="gap-4 lg:flex">
                    <div>
                        <a class="group relative inline-block focus:outline-none focus:ring" href="/pernikahan/Emily-dan-david">
                            <span class="absolute inset-0 translate-x-1.5 translate-y-1.5 bg-yellow-300 transition-transform group-hover:translate-y-0 group-hover:translate-x-0"></span>
                            <span class="relative inline-block border-2 border-current px-8 py-3 text-sm font-bold uppercase tracking-widest text-black group-active:text-opacity-75">
                                <span class="">DEMO</span>
                            </span>
                        </a>

                        <div class="flex md:hidden justify-center mt-6">
                            <a class="alert alert-success w-[180px] rounded-full px-4 py-2 text-center" href="https://api.whatsapp.com/send?phone=085155305665&text=">
                                <div>
                                    <span class="text-sm">butuh bantuan?</span>
                                    <img src="{{ asset('/svg/whatsapp.svg') }}" />
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
    <script type="module">
        $('#footer').addClass('hidden')
        $('#home').addClass('hidden')
        $(document).on('click', '#handleRegister', function (){
            localStorage.setItem('email', document.getElementById('email').value);
            localStorage.setItem('phone', document.getElementById('phone').value);
            window.location.href = '/register'
        })
    </script>
@endpush
