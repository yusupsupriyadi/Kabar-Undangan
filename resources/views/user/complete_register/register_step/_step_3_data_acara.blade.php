<div class="card flex-shrink-0 w-full max-w-5xl shadow-2xl bg-base-100 indicator">
    <div class="card-body">
        <section>
            <h1 class="text-center text-2xl">Informasi Acara Pernikahan</h1>
            <p class="mx-auto w-10/12 text-center text-gray-700 text-sm font-serif mt-2">
                Silahkan masukan informasi acara pernikahanmu <br> yang meliputi informasi acara Akad Nikah dan Acara
                resepsi Pernikahan.
            </p>
        </section>

        <form class="lg:flex lg:gap-20 justify-between items-start mt-6" enctype="multipart/form-data" id="form">
            <section>
                <h1 class="mb-2 font-bold text-lg text-left">Informasi Acara</h1>
                <div class="lg:grid lg:grid-cols-12 lg:gap-20 justify-between items-start">
                    <div class="col-span-6 grid grid-cols-12 items-center">
                        <div class="label-text text-sm text-gray-600 col-span-5 font-semibold">Zona Waktu</div>
                        <select class="select select-bordered select-sm w-full max-w-xs text-xs rounded-md col-span-7">
                            <option disabled selected>Pilih zona waktu</option>
                            <option value="WIB">WIB</option>
                            <option value="WIT">WIT</option>
                            <option value="WITA">WITA</option>
                        </select>
                    </div>
                    <div class="col-span-6"></div>
                </div>


                <div class="lg:grid lg:grid-cols-4 lg:gap-20 lg:justify-between lg:items-start mt-8">
                    <section class="lg:col-span-2">
                        <h1 class="mb-4 font-bold text-lg text-left">Akad Pernikah</h1>

                        <div class="grid grid-cols-12 items-center mt-4">
                            <div class="label-text text-sm text-gray-600 col-span-5 font-semibold">Tanggal berlangsung</div>
                            <div class="datepicker grid grid-cols-12 items-center gap-3 col-span-7" data-mdb-toggle-button="false">
                                <input id="tanggal-akad" data-name="tanggal-akad" type="text" placeholder="00/00/000"
                                    class="input input-bordered input-sm rounded-md col-span-10"
                                    data-mdb-toggle="datepicker" />
                                <div data-mdb-toggle="datepicker">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-600">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-12 items-center mt-4">
                            <div class="label-text text-sm text-gray-600 col-span-5 font-semibold">Waktu</div>
                            <div class="flex items-start gap-2 col-span-7">
                                <div class="timepicker" data-mdb-with-icon="false">
                                    <input type="text" id="waktu-mulai-akad" placeholder="00:00"
                                        class="input input-bordered input-sm rounded-md w-16"
                                        data-mdb-toggle="input-toggle-timepicker" />
                                </div>
                                <div class="text-sm text-gray-500">
                                    sampai
                                </div>
                                <div class="timepicker" data-mdb-with-icon="false">
                                    <input type="text" id="waktu-selesai-akad" placeholder="00:00"
                                        class="input input-bordered input-sm rounded-md w-16"
                                        data-mdb-toggle="input-toggle-timepicker" />
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-12 items-center mt-4">
                            <div class="label-text text-sm text-gray-600 col-span-5 font-semibold">Tempat dan Alamat</div>
                            <textarea id="alamat-akad" class="textarea textarea-bordered rounded-md col-span-7" placeholder="alamat tempat akad nikah"></textarea>
                        </div>
                    </section>

                    <section class="lg:col-span-2 mt-8 lg:mt-0">
                        <h1 class="mb-4 font-bold text-lg text-left">Resepsi Pernikah</h1>
                        <div class="grid grid-cols-12 items-center mt-4">
                            <div class="label-text text-sm text-gray-600 col-span-5">Tanggal berlangsung</div>
                            <div class="datepicker grid grid-cols-12 items-center gap-3 col-span-7" data-mdb-toggle-button="false">
                                <input id="tanggal-resepsi" data-name="tanggal-akad" type="text" placeholder="00/00/000"
                                    class="input input-bordered input-sm rounded-md col-span-10"
                                    data-mdb-toggle="datepicker" />
                                <div data-mdb-toggle="datepicker">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-600">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-12 items-center mt-4">
                            <div class="label-text text-sm text-gray-600 col-span-5">Waktu</div>
                            <div class="flex justify-start items-start gap-2 col-span-7">
                                <div class="timepicker" data-mdb-with-icon="false">
                                    <input id="waktu-mulai-resepsi" type="text" placeholder="00:00"
                                        class="input input-bordered input-sm rounded-md w-16"
                                        data-mdb-toggle="input-toggle-timepicker" />
                                </div>
                                <div class="text-sm text-gray-500">
                                    sampai
                                </div>
                                <div class="timepicker" data-mdb-with-icon="false">
                                    <input id="waktu-selesai-resepsi" type="text" placeholder="00:00"
                                        class="input input-bordered input-sm rounded-md w-16"
                                        data-mdb-toggle="input-toggle-timepicker" />
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-12 items-center mt-4">
                            <div class="label-text text-sm text-gray-600 col-span-5">Tempat dan Alamat</div>
                            <textarea id="alamat-resepsi" class="textarea textarea-bordered rounded-md col-span-7" placeholder="alamat tempat akad nikah"></textarea>
                        </div>
                    </section>
                </div>
            </section>
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
