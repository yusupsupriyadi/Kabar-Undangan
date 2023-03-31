<form id="form-story-edit" class="hidden">
    <input type="hidden" id="id-cerita">
    <section class="md:flex md:gap-4">
        <div class="w-full">
            <div class="form-control">
                <label class="label flex items-center justify-start gap-1">
                    <svg class="h-5 w-5 text-gray-800" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <rect x="4" y="5" width="16" height="16" rx="2" />
                        <line x1="16" y1="3" x2="16" y2="7" />
                        <line x1="8" y1="3" x2="8" y2="7" />
                        <line x1="4" y1="11" x2="20" y2="11" />
                        <rect x="8" y="15" width="2" height="2" />
                    </svg>
                    <span class="form-label text-sm font-normal">Tanggal</span>
                </label>
                <input id="tanggal-update" type="text" class="input-primary !max-w-md !bg-gray-100" placeholder="masukan tanggal" required>
                <label-validate id="tanggal-update-validate">Wajib disi</label-validate>
            </div>

            <div class="form-control mt-4 w-full">
                <label class="label flex items-center justify-start gap-1">
                    <svg class="h-5 w-5 text-gray-800" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <path d="M12 20l-7 -7a4 4 0 0 1 6.5 -6a.9 .9 0 0 0 1 0a4 4 0 0 1 6.5 6l-7 7" />
                    </svg>
                    <span class="form-label text-sm font-normal">Judul</span>
                </label>
                <input id="judul-update" type="text" placeholder="masukan Judul ceria cinta kamu" class="input-primary !max-w-md" />
                <x-label-validate id="judul-update-validate" />
            </div>

            <div class="form-control mt-4 w-full">
                <label class="label flex items-center justify-start gap-1">
                    <svg class="h-5 w-5 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                    </svg>
                    <span class="form-label text-sm font-normal">Cerita Cinta</span>
                </label>
                <textarea id="cerita-update" type="text" placeholder="masukan ceria cinta kamu" class="input-primary h-44 !max-w-md"></textarea>
                <x-label-validate id="cerita-update-validate" />
            </div>
        </div>

        <div class="form-control mt-4 w-full md:mt-0 hidden">
            <label class="label flex items-center justify-start gap-1">
                <svg class="h-5 w-5 text-black" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                    <circle cx="8.5" cy="8.5" r="1.5" />
                    <polyline points="21 15 16 10 5 21" />
                </svg>
                <span class="form-label text-sm font-normal">Foto Kenangan<span class="text-red-500">*<span class="text-xs text-gray-500">optional</span></span></span>
            </label>
            <img id="output-update" width="300">
            <button type="button" class="btn-delete-image mt-2 inline-block w-[120px] rounded-sm bg-red-500 px-2 py-2 text-xs font-bold uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-red-800 hover:shadow-lg">
                Hapus Gambar
            </button>
            <div class="mt-4 w-full max-w-xs">
                <label class="inline-block w-[300px] rounded-sm bg-yellow-500 text-center px-6 py-2 text-md font-bold uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-yellow-800 hover:shadow-lg"> UPLOAD GAMBAR
                    <input type="file" name="image_file" id="image-file-update" accept="image/jpeg, image/png, image/webp" class="custom-file-input" multiple>
                </label>
            </div>
        </div>
    </section>



    <div class="mt-4 flex items-center gap-2">
        <button type="button" class="btn-store-story-update mt-4 inline-block rounded bg-green-600 px-6 py-2.5 text-sm font-bold uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-green-800 hover:shadow-lg">
            Simpan
        </button>
        <button type="button" class="btn-cancel-story-update mt-4 inline-block rounded bg-red-600 px-6 py-2.5 text-sm font-bold uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-red-800 hover:shadow-lg">
            Batal
        </button>
    </div>
</form>
