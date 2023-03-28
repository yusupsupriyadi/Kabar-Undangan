<form class="md:flex md:gap-4">
    <div class="form-control w-full">
        <label class="label flex items-center justify-start gap-1">
            <svg class="h-5 w-5 text-grey-800" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" />
                <path d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12" />
                <path d="M20 12v4h-4a2 2 0 0 1 0 -4h4" />
            </svg>
            <span class="form-label text-sm font-normal">E-Money/Bank</span>
        </label>
        <input type="hidden" id="id-data">
        <input type="hidden" id="type-wallet">

        <div class="ml-2  grid md:flex grid-cols-3 md:grid-cols-5">
            <div class="form-check">
                <input value="gopay" class="checkbox-primary" type="radio" name="wallet" id="gopay">
                <label class="label-checkbox-primary" for="gopay">
                    Gopay
                </label>
            </div>
            <div class="form-check ml-4">
                <input value="dana" class="checkbox-primary" type="radio" name="wallet" id="dana">
                <label class="label-checkbox-primary" for="dana">
                    Dana
                </label>
            </div>
            <div class="form-check ml-4">
                <input value="ovo" class="checkbox-primary" type="radio" name="wallet" id="ovo">
                <label class="label-checkbox-primary" for="ovo">
                    Ovo
                </label>
            </div>
            <div class="form-check mt-3 cursor-pointer md:mt-0 md:ml-4">
                <input value="shopeepay" class="checkbox-primary" type="radio" name="wallet" id="shopeepay">
                <label class="label-checkbox-primary" for="shopeepay">
                    Shopeepay
                </label>
            </div>
            <div class="form-check mt-3 ml-4 md:mt-0">
                <input value="bank" class="checkbox-primary" type="radio" name="wallet" id="bank">
                <label class="label-checkbox-primary" for="bank">
                    Bank
                </label>
            </div>
        </div>

        <section class="wallet-index hidden">
            <div class="bank-index form-control mt-4 w-full">
                <label class="label flex items-center justify-start gap-1">
                    <span class="form-label text-sm font-normal">Nama Bank</span>
                </label>
                <input id="wallet" type="text" placeholder="Masukan nama bank" class="input-primary !max-w-md" />
                <x-label-validate id="wallet" />
            </div>

            <div class="form-control mt-4 w-full">
                <label class="label flex items-center justify-start gap-1">
                    <span class="form-label label-no-wallet text-sm font-normal">No Rekening</span>
                </label>
                <input id="no-wallet" type="text" placeholder="Masukan no rekening" class="input-primary !max-w-md" />
                <x-label-validate id="no-wallet-validate" />
            </div>

            <div class="form-control mt-4 w-full">
                <label class="label flex items-center justify-start gap-1">
                    <span class="form-label label-user-wallet text-sm font-normal">Atas Nama Rekening</span>
                </label>
                <input id="wallet-user" type="text" placeholder="Masukan atas nama rekening" class="input-primary !max-w-md" />
                <x-label-validate id="wallet-user-validate" />
            </div>
        </section>
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
