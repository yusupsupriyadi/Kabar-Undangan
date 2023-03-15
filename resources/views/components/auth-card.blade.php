<div class="flex min-h-screen flex-col items-center bg-[url('/public/images/bg-image-login.webp')] bg-cover md:pt-0 sm:justify-center pt-16">
    <div>
        {{-- {{ $logo }} --}}
    </div>

    <div class="mt-6 w-full max-w-sm overflow-hidden rounded-3xl bg-gray-200/50 backdrop-blur-sm p-8 shadow-xl">
        <section class="mb-6 flex justify-center">
            <div class="text-center">
                <section class="text-2xl font-semibold">
                    Selamat Datang
                </section>
                <p class="mt-4 w-full max-w-xs text-sm text-gray-700">Isi akun kamu untuk masuk ke halaman pengaturan undanganmu</p>
            </div>
        </section>
        {{ $slot }}
    </div>
</div>
