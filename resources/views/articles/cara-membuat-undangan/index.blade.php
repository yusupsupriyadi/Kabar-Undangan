@extends('layouts.blog')
@section('content')
    <main class="container max-w-5xl py-10">
        <h1 class="text-center text-3xl font-semibold text-primary-300">CARA MEMBUAT UNDANGAN</h1>
        <p class="text-md mt-2 text-center text-gray-400">Tiga Langkah Mudah Membuat Undangan Online</p>

        <section class="mt-16 items-center md:flex md:gap-20">
            <img class="w-auto md:h-auto md:w-[400px]" data-aos="fade-right" data-aos-duration="2000" src="{{ asset('/images/art-1.webp') }}" alt="">
            <div class="mt-6 md:mt-0" data-aos="fade-left" data-aos-duration="2000">
                <h2 class="text-center text-xl font-semibold md:text-start md:text-2xl">Daftar</h2>
                <p class="mt-4 text-center md:text-start">Langkah pertama <a class="font-semibold text-primary-200">Daftar</a> akun di kabarundangan.com </p>
                <div class="mt-5 text-center md:text-start">
                    <a href="/register" class="md:text-md rounded-xl bg-primary-300 px-4 py-2 text-sm font-semibold text-white">Daftar</a>
                </div>
            </div>
        </section>

        <section class="mt-24 items-center md:mt-16 md:flex md:gap-20">
            <img class="order-first w-auto md:order-last md:h-auto md:w-[400px]" data-aos="fade-left" data-aos-duration="2000" src="{{ asset('/images/art-2.webp') }}" alt="">
            <div class="mt-6 md:mt-0" data-aos="fade-right" data-aos-duration="2000">
                <h2 class="text-center text-xl font-semibold md:text-start md:text-2xl">Isi Informasi Pernikahan Kamu</h2>
                <p class="mt-4 text-center md:text-start">Langkah kedua lengkapi data informasi pernikahanmu, <span class="text-primary-200">KabarUndagan.com</span> kami sudah mengatur apa saja yang perlu di lengkapi di halamanan dashboard akun kamu, jadi jangan kawatir kami siap membantu kamu bila kebingungan😊</p>
            </div>
        </section>

        <section class="mt-24 items-center md:mt-16 md:flex md:gap-20">
            <img class="h-auto w-auto md:w-[400px]" data-aos="fade-right" data-aos-duration="2000" src="{{ asset('/images/art-3.webp') }}" alt="">
            <div class="mt-6 md:mt-0" data-aos="fade-left" data-aos-duration="2000">
                <h2 class="text-center text-xl font-semibold md:text-start md:text-2xl">Sebar Undangan</h2>
                <p class="mt-4 text-center md:text-start">Langkah terakhir kamu tinggal sebar undangan penikahan kamu ke teman, saudara, dan keluarga. </p>
            </div>
        </section>

        <section class="mt-24">
            <div class="flex justify-center">
                <img src="{{ asset('/images/team-success.png') }}" alt="">
            </div>
            <p class="text-center mt-6 text-lg">Mudah bukan membuat undangan digital/online di<br><a href="/" class="text-primary-200 font-semibold">KabarUndangan.com</a></p>

            <div class="flex justify-center">
                <a href="/register" class="mt-6 bg-gradient-to-r from-primary-200 to-primary-300 text-white font-semibold px-4 py-2 rounded-xl hover:scale-105 duration-300">Buat Undangan</a>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
@endpush
