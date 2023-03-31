<section class="card lg:w-96 bg-base-100 shadow-xl">
    <div class="card-body">
        <input id="id-pria" type="hidden">

        <div class="form-group">
            <label for="nama-lengkap-pria" class="form-label mb-2 inline-block text-gray-700">Nama lengkap</label>
            <input id="nama-lengkap-pria" type="text" class="input-form form-control" placeholder="masukan nama lengkap">
        </div>

        <div class="form-group mt-4">
            <label for="nama-panggilan-pria" class="form-label mb-2 inline-block text-gray-700">Nama panggilan</label>
            <input id="nama-panggilan-pria" type="text" class="input-form form-control" placeholder="masukan nama panggilan">
        </div>

        <div class="form-group mt-4 hidden">
            <label for="tempat-lahir-pria" class="form-label mb-2 inline-block text-gray-700">Tempat lahir</label>
            <input id="tempat-lahir-pria" type="text" value="null" class="input-form form-control" placeholder="masukan tempat lahir">
        </div>

        <div class="form-group datepicker mt-4 hidden" data-mdb-toggle-button="false">
            <label for="tanggal-lahir-pria" class="form-label mb-2 inline-block text-gray-700">Tanggal lahir</label>
            <input id="tanggal-lahir-pria" value="null" type="text" class="input-form form-control" data-mdb-toggle="datepicker" placeholder="masukan tanggal lahir">
        </div>

        <div class="form-group mt-4">
            <label for="nama-ayah-pria" class="form-label mb-2 inline-block text-gray-700">Nama ayah</label>
            <input id="nama-ayah-pria" type="text" class="input-form form-control" placeholder="masukan nama ayah">
        </div>

        <div class="form-group mt-4">
            <label for="nama-ibu-pria" class="form-label mb-2 inline-block text-gray-700">Nama ibu</label>
            <input id="nama-ibu-pria" type="text" class="input-form form-control" placeholder="masukan nama ibu">
        </div>

        <div class="card-actions mt-6 justify-end">
            <button id="handleStoreDataMempelaiPria" type="button" data-mdb-ripple="true" data-mdb-ripple-color="light" class="btn-handle inline-block rounded bg-blue-600 px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg">
                Lanjutkan
            </button>
        </div>
    </div>
</section>
