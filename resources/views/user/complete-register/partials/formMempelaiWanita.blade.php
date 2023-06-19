<section class="card lg:w-96 bg-base-100 shadow-xl">
    <div class="card-body">
        <input id="id-wanita" type="hidden">
        <div class="flex items-center gap-2">
            <svg class="h-5 w-5 text-black"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
              </svg>
              
            <h1 class="font-semibold">DATA MEMPELAI WANITA</h1>
        </div>
        <hr>

        <div class="form-group">
            <label for="nama-lengkap-wanita" class="form-label mb-2 inline-block text-gray-700">Nama lengkap</label>
            <input id="nama-lengkap-wanita" type="text" class="input-form form-control" placeholder="masukan nama lengkap">
        </div>

        <div class="form-group mt-4">
            <label for="nama-panggilan-wanita" class="form-label mb-2 inline-block text-gray-700">Nama panggilan</label>
            <input id="nama-panggilan-wanita" type="text" class="input-form form-control" placeholder="masukan nama panggilan">
        </div>

        <div class="form-group mt-4 hidden">
            <label for="tempat-lahir-wanita" class="form-label mb-2 inline-block text-gray-700 ">Tempat lahir</label>
            <input id="tempat-lahir-wanita" value='null' type="text" class="input-form form-control" placeholder="masukan tempat lahir">
        </div>

        <div class="form-group datepicker mt-4 hidden" data-mdb-toggle-button="false">
            <label for="tanggal-lahir-wanita" class="form-label mb-2 inline-block text-gray-700">Tanggal lahir</label>
            <input id="tanggal-lahir-wanita" value='null' type="text" class="input-form form-control" data-mdb-toggle="datepicker" placeholder="masukan tanggal lahir">
        </div>

        <div class="form-group mt-4">
            <label for="nama-ayah-wanita" class="form-label mb-2 inline-block text-gray-700">Nama ayah</label>
            <input id="nama-ayah-wanita" type="text" class="input-form form-control" placeholder="masukan nama ayah">
        </div>

        <div class="form-group mt-4">
            <label for="nama-ibu-wanita" class="form-label mb-2 inline-block text-gray-700">Nama ibu</label>
            <input id="nama-ibu-wanita" type="text" class="input-form form-control" placeholder="masukan nama ibu">
        </div>

        <div class="card-actions mt-6 justify-end">
            <button id="handleStoreDataMempelaiwanita" type="button" data-mdb-ripple="true" data-mdb-ripple-color="light" class="btn-handle inline-block rounded bg-blue-600 px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg">
                Lanjutkan
            </button>
        </div>
    </div>
</section>
