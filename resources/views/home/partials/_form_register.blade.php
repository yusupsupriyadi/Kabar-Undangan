<div class="card indicator mt-4 w-full max-w-sm flex-shrink-0 bg-base-100 shadow-2xl lg:mt-0">
    <span class="indicator-item translate-x-[15%] lg:translate-x-[50%] rounded-tr-2xl rounded-br-2xl rounded-tl-2xl border-4 border-black bg-pink-600 p-2 text-sm font-bold text-gray-100 shadow-xl lg:p-3 lg:text-lg">GRATIS!</span>
    <div class="card-body">
        <div class="form-control">
            <label class="label">
                <span class="label-text font-sans text-md font-semibold">Email</span>
            </label>
            <input id="email" name="email" type="email" placeholder="Email" class="input-bordered input" />
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text font-sans text-md font-semibold">No Telepon</span>
            </label>
            <input id="phone" name="phone" type="text" placeholder="No Telepon" class="input-bordered input" />
            <a href="/login" class="link-hover label-text-alt link mt-4 text-right text-blue-600 text-sm">Sudah mendaftar?</a>
        </div>
        <div class="form-control mt-6" x-data>
            <button id="handleRegister" class="btn-primary btn !flex !items-center gap-2">
                <div>Buat Undangan</div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                </div>
            </button>
        </div>
    </div>
</div>
