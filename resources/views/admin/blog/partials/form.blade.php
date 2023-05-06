<div class="form-control mb-6 w-full max-w-xl">
    <label class="label">
        <span class="label-text text-lg font-semibold">Judul</span>
    </label>
    <input type="text" id="title-article" placeholder="judul article" class="input-bordered input w-full" />

    <label class="label mt-4">
        <span class="label-text text-lg font-semibold">Descripsi</span>
    </label>
    <textarea class="textarea-bordered textarea h-24" id="description-article" placeholder="descripsi article"></textarea>

    <div class="form-control mt-4">
        <label class="label">
            <span class="label-text text-lg font-semibold">Tumbnail</span>
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

    <label class="label mt-4">
        <span class="label-text text-lg font-semibold">Category</span>
    </label>
    <div class="flex w-full items-center gap-4">
        <select class="select-bordered select data-category" id="category-article">
            <option disabled selected class="text-gray-300">pilih categories</option>
        </select>
        <button data-id="category" class="open-modal-form rounded-full bg-primary-300 p-1 text-sm font-bold text-white duration-300 hover:scale-105 active:scale-95">
            <svg class="h-5 w-5 text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" />
                <line x1="12" y1="5" x2="12" y2="19" />
                <line x1="5" y1="12" x2="19" y2="12" />
            </svg>
        </button>
    </div>

    <section>
        <label class="label mt-4">
            <span class="label-text text-lg font-semibold">Tags</span>
        </label>
        <div class="grid items-center gap-4 md:grid-cols-4" id="data-tag">
            <div>
                <button data-id="tag" class="open-modal-form rounded-full bg-primary-300 p-1 text-xs font-bold text-white duration-300 hover:scale-105 active:scale-95">
                    <svg class="h-5 w-5 text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>
                </button>
            </div>
        </div>
    </section>
</div>

<textarea id="content-article">
    
</textarea>

<div class="flex items-center gap-4 mt-6 pb-10">
    <button id="submit-article" class="text-semibold rounded-lg bg-primary-300 px-4 py-2 text-white">Submit</button>
    <button id="close-form" class="rounded-xl bg-red-500 px-4 py-2 font-semibold text-white">CLOSE</button> 
</div>
