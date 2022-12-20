<div class="card flex-shrink-0 w-full max-w-5xl shadow-2xl bg-base-100 indicator">
    <div class="card-body">
        <section>
            <h1 class="text-center text-2xl">Informasi Acara Pernikahan</h1>
            <p class="mx-auto w-10/12 text-center text-gray-700 text-sm font-serif mt-2">
                Masukan nama mempelai pria dan mempelai wanita beserta
                dengan ibu dan ayahnya yang segera melangsungkan pernikahan.
            </p>
        </section>

        <form class="lg:flex lg:gap-20 justify-between items-start mt-6" enctype="multipart/form-data" id="form">
            <section>
                <h1 class="mb-2 font-bold text-lg text-left">Informasi Acara</h1>
                <div class="lg:grid lg:grid-cols-4 lg:gap-20 justify-between items-start">
                    <div class="col-span-2 grid grid-cols-2 items-center">
                        <div class="label-text text-sm text-gray-600">Zona Waktu</div>
                        <select class="select select-bordered select-sm w-full max-w-xs text-xs rounded-md">
                            <option disabled selected>Pilih zona waktu</option>
                            <option value="WIB">WIB</option>
                            <option value="WIT">WIT</option>
                            <option value="WITA">WITA</option>
                        </select>
                    </div>
                    <div class="col-span-2"></div>
                </div>


                <div class="lg:grid lg:grid-cols-4 lg:gap-20 lg:justify-between lg:items-start mt-8">
                    <section class="lg:col-span-2">
                        <h1 class="mb-4 font-bold text-lg text-left">Akad Pernikah</h1>
                        
                        <div class="grid grid-cols-2 items-center mt-4">
                            <div class="label-text text-sm text-gray-600">Tanggal berlangsung</div>
                            <div class="datepicker relative form-floating" data-mdb-toggle-button="false">
                                <input id="Tanggal-akad" data-name="tanggal-akad" type="text"
                                    placeholder="Atur tanggal" class="input input-bordered input-sm rounded-md"
                                    data-mdb-toggle="datepicker" />
                            </div>
                        </div>

                        <div class="grid grid-cols-2 items-center mt-4">
                            <div class="label-text text-sm text-gray-600">Waktu Mulai</div>
                            <div class="timepicker" data-mdb-with-icon="false">
                                <input type="text" placeholder="Select a date"
                                    class="input input-bordered input-sm rounded-md"
                                    data-mdb-toggle="input-toggle-timepicker" />
                            </div>
                        </div>
                    </section>

                    <section class="lg:col-span-2">
                        <h1 class="mb-4 font-bold text-lg text-left">Resepsi Pernikah</h1>
                    </section>
                </div>
            </section>
            <section></section>
        </form>


        <div class="flex justify-center mt-6">
            <button class="w-40 btn btn-primary lg:flex lg:gap-1 items-center btn-handle" id="handleDataAcara">
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
