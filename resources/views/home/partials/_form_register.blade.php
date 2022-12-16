<div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100 mt-4 lg:mt-0 indicator">
    <span
        class="indicator-item p-2 lg:p-3 bg-secondary rounded-tr-2xl rounded-br-2xl rounded-tl-2xl border-4 border-black text-white text-sm lg:text-lg font-bold shadow-xl">GRATIS!</span>
    <div class="card-body">
        <div class="form-control">
            <label class="label">
                <span class="label-text">Nama</span>
            </label>
            <input id="name" type="text" placeholder="nama" class="input input-bordered" />
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">No Handphone</span>
            </label>
            <input id="phone" type="text" placeholder="phone" class="input input-bordered" />
            <a href="/login" class="label-text-alt link link-hover text-right mt-4 text-blue-600">Masuk ?</a>
        </div>
        <div class="form-control mt-6" x-data>
            <button id="handleRegister" class="btn btn-primary flex gap-2 items-center">
                <span>Buat Undangan</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
            </button>
        </div>
    </div>
</div>