<form class="md:flex md:gap-4">
    <div class="w-full">
        <input type="hidden" id="id-data">
        <div class="form-control w-full">
            <label class="label flex items-center justify-start gap-1">
                <svg class="h-5 w-5 text-gray-800" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <path d="M12 20l-7 -7a4 4 0 0 1 6.5 -6a.9 .9 0 0 0 1 0a4 4 0 0 1 6.5 6l-7 7" />
                </svg>
                <span class="form-label text-sm font-normal">Judul Photo</span>
            </label>
            <input id="judul" type="text" placeholder="Masukan Judul Photo" class="input-primary !max-w-md" />
            <x-label-validate id="judul-validate" />
        </div>

        <div class="form-control mt-4 w-full">
            <label class="label flex items-center justify-start gap-1">
                <svg class="h-5 w-5 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                </svg>
                <span class="form-label text-sm font-normal">Keterangan Photo</span>
            </label>
            <textarea id="keterangan" type="text" placeholder="Ceritakan tentang photo yang kamu tambahkan" class="input-primary h-44 !max-w-md"></textarea>
            <x-label-validate id="keterangan-validate" />
        </div>
    </div>

    <div class="form-control mt-4 w-full md:mt-0">
        <label class="label flex items-center justify-start gap-1">
            <svg class="h-5 w-5 text-black" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                <circle cx="8.5" cy="8.5" r="1.5" />
                <polyline points="21 15 16 10 5 21" />
            </svg>
            <span class="form-label text-sm font-normal">Pilih Foto</span>
        </label>
        <div id="image-index">
            <img id="output" width="300">
        </div>
        <div class="w-full max-w-xs mb-2">
            <label class="text-md inline-block w-[300px] rounded-sm bg-yellow-500 px-6 py-2 text-center font-bold uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-yellow-800 hover:shadow-lg"> UPLOAD GAMBAR
                <input type="file" name="image_file" id="image-file" accept="image/jpeg, image/png" type="file" multiple>
            </label>
        </div>
        <x-label-validate id="gambar-validate" />
    </div>
</form>

<div class="mt-4 flex items-center gap-2">
    <button type="button" id="btn-action" class="btn-save mt-4 inline-block rounded bg-green-600 px-6 py-2.5 text-sm font-bold uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-green-800 hover:shadow-lg">
        Simpan
    </button>
    <button type="button" class="btn-cancel mt-4 inline-block rounded bg-red-600 px-6 py-2.5 text-sm font-bold uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-red-800 hover:shadow-lg">
        Batal
    </button>
</div>
