@extends('layouts.blog')

@section('content')
    <main class="bg-gray-100">
        <div class="mx-auto mt-12 flex flex-wrap px-2 pt-4 md:mt-0 md:px-12 lg:pt-4">
            <!--Main Content-->
            <div class="border-rounded mt-4 w-full border border-gray-400 bg-white p-8 leading-normal text-gray-900 lg:mt-0">

                <div class="font-sans">
                    <h1 class="break-normal font-sans text-2xl font-semibold text-gray-900">FAQ</h1>
                    <p class="my-2 pb-1 font-sans text-sm">Pertanyaan yang mungkin ditanyakan.
                        Klik pertanyaan dibawah ini untuk menampilkan jawabannya.</p>
                    <hr class="border-b border-gray-400">
                </div>

                <main class="py-12">
                    <div class="space-y-4">
                        <details class="group rounded-t-lg border-2 border-b-4 border-black [&_summary::-webkit-details-marker]:hidden">
                            <summary class="flex cursor-pointer items-center justify-between rounded-lg rounded-b-none bg-yellow-100 p-4">
                                <h2 class="text-md font-medium text-gray-900">
                                    Apa itu KabarUndangan?
                                </h2>

                                <svg class="ml-1.5 h-5 w-5 flex-shrink-0 transition duration-300 group-open:-rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </summary>

                            <p class="bg-yellow-50 px-4 py-2 text-sm leading-relaxed text-gray-700">
                                KabarUndangan adalah sebuah situs web yang dapat digunakan untuk membuat undangan pernikahan secara online. Anda dapat membuat undangan pernikahan secara gratis di KabarUndangan. Meskipun template undangan pada akun gratis terbatas, semua fitur premium yang tersedia di KabarUndangan tetap dapat digunakan.
                            </p>
                        </details>

                        <details class="group rounded-t-lg border-2 border-b-4 border-black [&_summary::-webkit-details-marker]:hidden">
                            <summary class="flex cursor-pointer items-center justify-between rounded-lg rounded-b-none bg-yellow-100 p-4">
                                <h2 class="text-md font-medium text-gray-900">
                                    Saya masih belum terbiasa dengan platform semacam ini, apakah mungkin bagi saya untuk menggunakan KabarUndangan?
                                </h2>

                                <svg class="ml-1.5 h-5 w-5 flex-shrink-0 transition duration-300 group-open:-rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </summary>

                            <p class="bg-yellow-50 px-4 py-2 text-sm leading-relaxed text-gray-700">
                                Tentu saja, Anda dapat menggunakan KabarUndangan meskipun Anda masih awam dengan platform seperti ini. KabarUndangan dirancang dengan antarmuka yang sederhana dan mudah digunakan, sehingga cocok untuk digunakan oleh siapa saja, termasuk pemula yang tidak memiliki pengalaman dalam menggunakan platform serupa
                            </p>
                        </details>

                        <details class="group rounded-t-lg border-2 border-b-4 border-black [&_summary::-webkit-details-marker]:hidden">
                            <summary class="flex cursor-pointer items-center justify-between rounded-lg rounded-b-none bg-yellow-100 p-4">
                                <h2 class="text-md font-medium text-gray-900">
                                    Apakah Satu Paket untuk Banyak Website Undangan Pernikahan?
                                </h2>

                                <svg class="ml-1.5 h-5 w-5 flex-shrink-0 transition duration-300 group-open:-rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </summary>

                            <p class="bg-yellow-50 px-4 py-2 text-sm leading-relaxed text-gray-700">
                                Tidak, satu paket undangan digital dalam bentuk website hanya berlaku untuk 1 website. Artinya ketika anda mendaftar 1 buah akun di <b>kabarundangan</b> maka website yang bisa dibuat hanya satu
                            </p>
                        </details>

                        <details class="group rounded-t-lg border-2 border-b-4 border-black [&_summary::-webkit-details-marker]:hidden">
                            <summary class="flex cursor-pointer items-center justify-between rounded-lg rounded-b-none bg-yellow-100 p-4">
                                <h2 class="text-md font-medium text-gray-900">
                                    Apakah Pengiriman Undangan Bisa Khusus untuk Orang tertentu?
                                </h2>

                                <svg class="ml-1.5 h-5 w-5 flex-shrink-0 transition duration-300 group-open:-rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </summary>

                            <p class="bg-yellow-50 px-4 py-2 text-sm leading-relaxed text-gray-700">
                                Ya, anda bisa menggunakan fitur <b>Kirim Undangan</b> di paket premium.
                            </p>
                        </details>

                        <details class="group border-2 border-b-4 border-black [&_summary::-webkit-details-marker]:hidden">
                            <summary class="flex cursor-pointer items-center justify-between bg-orange-300 p-4">
                                <h2 class="text-md font-medium text-gray-900">
                                    Masih ada pertanyaan lain? Hubungi kami <a href="https://api.whatsapp.com/send?phone=6285155305665&text=" class="animate-pulse text-green-800">WhatsApp 085155305665 </a>
                                </h2>
                            </summary>
                        </details>
                    </div>
                </main>

                <x-app.testimoni-bar />
            </div>


        </div>
    </main>
@endsection

@push('scripts')
@endpush
