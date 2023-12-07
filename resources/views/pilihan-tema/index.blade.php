@extends('layouts.app')

@section('content')
    <main class="bg-gray-100">
        <x-app.navbar />
        <div class="px-2 pt-24 md:px-12 lg:pt-10">
            <div class="border-rounded mt-6 w-full border border-gray-400 bg-white p-8 leading-normal text-gray-900 lg:mt-0">
                <x-app.title title="Pilihan Tema" desc="" />
                <section id="tema-list" class="gap-4 py-5 md:grid md:grid-cols-3">
                    <div class="mt-0 md:hidden">
                    </div>
                    <div class="mt-0 flex items-start gap-2 border-black md:mt-0">
                        <img src="https://kabarundangan.com/images/tema/gratis.webp" class="w-24" alt="">
                        <div>
                            <h1 class="text-lg font-medium">PURE WHITE</h1>
                            <p class="text-sm">GRATIS</p>
                            <a href="https://demo.kabarundangan.com/?tema=basic">
                                <button class="mt-6 flex w-[110px] items-center justify-center gap-1 border border-b-4 border-gray-700 bg-white p-2 px-4 text-xs font-semibold text-black">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    Lihat
                                </button>
                            </a>
                        </div>
                    </div>

                    <div class="mt-12 md:hidden">
                        <div class="border-b-2 border-gray-300"></div>
                    </div>
                    <div class="mt-12 flex items-start gap-2 border-black md:mt-0">
                        <img src="https://kabarundangan.com/images/tema/brown-premium.webp" class="w-24" alt="">
                        <div>
                            <h1 class="text-lg font-medium">BROWN AESTHETIC</h1>
                            <p class="text-sm">PREMIUM</p>
                            <a href="https://demo.kabarundangan.com/?tema=brown-premium">
                                <button class="mt-6 flex w-[110px] items-center justify-center gap-1 border border-b-4 border-gray-700 bg-white p-2 px-4 text-xs font-semibold text-black">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    Lihat
                                </button>
                            </a>
                        </div>
                    </div>

                    <div class="mt-12 md:hidden">
                        <div class="border-b-2 border-gray-300"></div>
                    </div>
                    <div class="mt-12 flex items-start gap-2 border-black md:mt-0">
                        <img src="https://kabarundangan.com/images/tema/lily.webp" class="w-24" alt="">
                        <div>
                            <h1 class="text-lg font-medium">LILY</h1>
                            <p class="text-sm">PREMIUM</p>
                            <a href="https://demo.kabarundangan.com/?tema=lily">
                                <button class="mt-6 flex w-[110px] items-center justify-center gap-1 border border-b-4 border-gray-700 bg-white p-2 px-4 text-xs font-semibold text-black">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    Lihat
                                </button>
                            </a>
                        </div>
                    </div>


                    <div class="mt-12 md:hidden">
                        <div class="border-b-2 border-gray-300"></div>
                    </div>
                    <div class="mt-12 flex items-start gap-2 border-black md:mt-0">
                        <img src="https://kabarundangan.com/images/tema/green-fantasy.webp" class="w-24" alt="">
                        <div>
                            <h1 class="text-lg font-medium">GREEN FANTASY</h1>
                            <p class="text-sm">PREMIUM</p>
                            <a href="https://demo.kabarundangan.com/?tema=green-fantasy">
                                <button class="mt-6 flex w-[110px] items-center justify-center gap-1 border border-b-4 border-gray-700 bg-white p-2 px-4 text-xs font-semibold text-black">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    Lihat
                                </button>
                            </a>
                        </div>
                    </div>

                    <div class="mt-12 md:hidden">
                        <div class="border-b-2 border-gray-300"></div>
                    </div>
                    <div class="mt-12 flex items-start gap-2 border-black md:mt-0">
                        <img src="https://kabarundangan.com/images/tema/deep-ocean.webp" class="w-24" alt="">
                        <div>
                            <h1 class="text-lg font-medium">DEEP OCEAN</h1>
                            <p class="text-sm">PREMIUM</p>
                            <a href="https://demo.kabarundangan.com/?tema=deep-ocean">
                                <button class="mt-6 flex w-[110px] items-center justify-center gap-1 border border-b-4 border-gray-700 bg-white p-2 px-4 text-xs font-semibold text-black">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    Lihat
                                </button>
                            </a>
                        </div>
                    </div>

                    <div class="mt-12 md:hidden">
                        <div class="border-b-2 border-gray-300"></div>
                    </div>
                    <div class="mt-12 flex items-start gap-2 border-black md:mt-0">
                        <img src="https://kabarundangan.com/images/tema/black-gold.webp" class="w-24" alt="">
                        <div>
                            <h1 class="text-lg font-medium">BLACK GOLD</h1>
                            <p class="text-sm">PREMIUM</p>
                            <a href="https://demo.kabarundangan.com/?tema=black-gold">
                                <button class="mt-6 flex w-[110px] items-center justify-center gap-1 border border-b-4 border-gray-700 bg-white p-2 px-4 text-xs font-semibold text-black">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    Lihat
                                </button>
                            </a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
@endpush
