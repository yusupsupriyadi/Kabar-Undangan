@extends('layouts.master')

@section('content')
    <div class="relative hero min-h-screen bg-[url('/public/images/bg-image-wedding.jpg')]">
        @include('home.partials._navbar')
        <section class="hero-content flex-col lg:flex-row-reverse lg:gap-20 mt-20 lg:mt-0">
            <div class="text-center lg:text-left">
                <h1 class="text-5xl font-bold">Buat undangan sekarang!</h1>
                <p class="py-6">Saatnya tampil beda dengan beralih ke undangan digital dan bagikan kebahagianmu kepada
                    orang-orang terdekatmu.</p>

                <div class="lg:flex gap-4">
                    <div>
                        <a class="group relative inline-block focus:outline-none focus:ring" href="/testimoni">
                            <span
                                class="absolute inset-0 translate-x-1.5 translate-y-1.5 bg-yellow-300 transition-transform group-hover:translate-y-0 group-hover:translate-x-0"></span>
                            <span
                                class="relative inline-block border-2 border-current px-8 py-3 text-sm font-bold uppercase tracking-widest text-black group-active:text-opacity-75">
                                <span class="">DEMO</span>
                            </span>
                        </a>
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
        $('#home').addClass('hidden')
        $(document).on('click', '#handleRegister', function (){
            localStorage.setItem('name', document.getElementById('name').value);
            localStorage.setItem('phone', document.getElementById('phone').value);
            window.location.href = '/register'
        })
    </script>
@endpush
