<div class="card flex-shrink-0 w-full max-w-5xl shadow-2xl bg-base-100">
    <div class="card-body">
        <section>
            <h1 class="text-center text-2xl">Informasi Mempelai</h1>
            <p class="mx-auto w-10/12 text-center text-gray-700 text-sm font-serif mt-2">
                Masukan nama mempelai pria dan mempelai wanita beserta
                dengan ibu dan ayahnya yang segera melangsungkan pernikahan.
            </p>
        </section>

        <div class="py-20" id="loading-data-mempelai">
            <x-loading-cube />
        </div>

        <form class="mt-6 hidden" id="form-mempelai">
            <div class="lg:flex lg:gap-20 justify-between items-start">
                <section>
                    <h1 class="mb-4 font-bold text-lg text-center">Mempelai Pria</h1>
                    <div id="index-mempelai-pria">
                        <input id="id-pria" type="hidden">
                        <div class="grid grid-cols-2 items-center">
                            <div class="label-text text-sm text-gray-600">Nama Lengkap</div>
                            <input id="nama-lengkap-pria" data-name="name" type="text"
                                placeholder="Nama lengkap mempelai pria"
                                class="input input-bordered input-sm rounded-md" />
                        </div>

                        <div class="grid grid-cols-2 items-center mt-4">
                            <div class="label-text text-sm text-gray-600">Nama Panggilan</div>
                            <input id="nama-panggilan-pria" data-name="nama-panggilan" type="text"
                                placeholder="Nama panggilan mempelai pria"
                                class="input input-bordered input-sm rounded-md" />
                        </div>

                        <div class="grid grid-cols-2 items-center mt-4">
                            <div class="label-text text-sm text-gray-600">Tempat Lahir</div>
                            <input id="tempat-lahir-pria" data-name="tempat-lahir" type="text"
                                placeholder="Tempat lahir mempelai pria"
                                class="input input-bordered input-sm rounded-md" />
                        </div>

                        <div class="grid grid-cols-2 items-center mt-4">
                            <div class="label-text text-sm text-gray-600">Tanggal Lahir</div>
                            <input id="tanggal-lahir-pria" data-name="tanggal-lahir" type="date"
                                placeholder="Tanggal lahir mempelai pria"
                                class="input input-bordered input-sm rounded-md" />
                        </div>

                        <div class="grid grid-cols-2 items-center mt-4">
                            <div class="label-text text-sm text-gray-600">Nama Lengkap Ayah</div>
                            <input id="nama-ayah-pria" data-name="nama-ayah" type="text"
                                placeholder="Nama lengkap ayah mempelai pria"
                                class="input input-bordered input-sm rounded-md" />
                        </div>

                        <div class="grid grid-cols-2 items-center mt-4">
                            <div class="label-text text-sm text-gray-600">Nama Lengkap Ibu</div>
                            <input id="nama-ibu-pria" data-name="nama-ayah" placeholder="Nama lengkap ibu mempelai pria"
                                class="input input-bordered input-sm rounded-md" />
                        </div>

                        <div class="grid grid-cols-2 items-center mt-4">
                            <div class="label-text text-sm text-gray-600">Instagram *optional</div>
                            <input id="instagram-pria" data-name="instagram" value='' type="text"
                                placeholder="Username instagram" class="input input-bordered input-sm rounded-md" />
                        </div>
                    </div>
                </section>

                <section class="mt-10 lg:mt-0">
                    <h1 class="mb-4 font-bold text-lg text-center">Mempelai Wanita</h1>
                    <div id="index-mempelai-wanita">
                        <div class="grid grid-cols-2 items-center">
                            <div class="label-text text-sm text-gray-600">Nama Lengkap</div>
                            <input id="nama-lengkap-wanita" type="text" placeholder="Nama lengkap mempelai wanita"
                                class="input input-bordered input-sm rounded-md" />
                        </div>

                        <div class="grid grid-cols-2 items-center mt-4">
                            <div class="label-text text-sm text-gray-600">Nama Panggilan</div>
                            <input id="nama-panggilan-wanita" type="text"
                                placeholder="Nama panggilan mempelai wanita"
                                class="input input-bordered input-sm rounded-md" />
                        </div>

                        <div class="grid grid-cols-2 items-center mt-4">
                            <div class="label-text text-sm text-gray-600">Tempat Lahir</div>
                            <input id="tempat-lahir-wanita" type="text" placeholder="Tempat lahir mempelai wanita"
                                class="input input-bordered input-sm rounded-md" />
                        </div>

                        <div class="grid grid-cols-2 items-center mt-4">
                            <div class="label-text text-sm text-gray-600">Tanggal Lahir</div>
                            <input id="tanggal-lahir-wanita" type="date" placeholder="Tanggal lahir mempelai wanita"
                                class="input input-bordered input-sm rounded-md" />
                        </div>

                        <div class="grid grid-cols-2 items-center mt-4">
                            <div class="label-text text-sm text-gray-600">Nama Lengkap Ayah</div>
                            <input id="nama-ayah-wanita" type="text" placeholder="Nama lengkap ayah mempelai wanita"
                                class="input input-bordered input-sm rounded-md" />
                        </div>

                        <div class="grid grid-cols-2 items-center mt-4">
                            <div class="label-text text-sm text-gray-600">Nama Lengkap Ibu</div>
                            <input id="nama-ibu-wanita" type="text" placeholder="Nama lengkap ibu mempelai wanita"
                                class="input input-bordered input-sm rounded-md" />
                        </div>

                        <div class="grid grid-cols-2 items-center mt-4">
                            <div class="label-text text-sm text-gray-600">Instagram *optional</div>
                            <input id="instagram-wanita" value="" type="text"
                                placeholder="Username instagram" class="input input-bordered input-sm rounded-md" />
                        </div>
                    </div>
                </section>
            </div>
        </form>


        <div class="flex justify-center mt-6">
            <button class="w-40 btn btn-primary lg:flex lg:gap-1 items-center btn-handle"
                id="handleStoreDataMempelai">
                <div class="dots-flow">Lanjutkan</div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </button>
        </div>
    </div>
</div>
