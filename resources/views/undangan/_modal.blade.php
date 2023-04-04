<div class="modal modal-bottom sm:modal-middle" id="modal-hadiah">
    <section class="modal-box hidden md:block">
        <label for="modal-hadiah" class="btn-close-modal btn-sm btn-circle btn sticky right-2 top-2 border-red-600 bg-red-600">✕</label>
        <div class="flex justify-center">
            <h1 class="font-tangerine text-5xl font-bold text-stone-600">Kado Nikah</h1>
        </div>
        @foreach ($data['kado_nikah_api'] as $val)
            <section class="mt-3 w-full rounded-md bg-stone-600 p-2 shadow-md">
                <div class="flex flex-col">
                    <div class="flex flex-row items-center justify-between px-4 py-4">
                        <div class="flex font-serif text-2xl font-medium uppercase text-white">{{ $val['wallet'] }}</div>
                    </div>
                    <div class="px-4">
                        <h2 class="text-xl font-medium text-white">{{ $val['no_wallet'] }}</h2>
                        <button class="mt-2 rounded-full bg-white py-1 px-2 text-xs text-black">copy</button>
                        <div class="mt-3 font-serif text-sm font-thin text-white">
                            <span class="btn-edit cursor-pointer">
                                a/n {{ $val['user_wallet'] }}
                            </span>
                        </div>
                    </div>
                </div>
            </section>
        @endforeach
        {{-- <section class="mt-3 w-full rounded-md bg-blue-400 p-2 shadow-md">
            <div class="flex flex-col">
                <div class="flex flex-row items-center justify-between px-4 py-4">
                    <div class="flex text-2xl font-medium font-serif uppercase text-white">Dana</div>
                </div>
                <div class="px-4">
                    <h2 class="text-xl font-medium text-white">089675008000</h2>
                    <button class="py-1 px-2 text-black bg-white text-xs mt-2 rounded-full">copy</button>
                    <div class="mt-3 text-sm font-serif font-thin text-white">
                        <span class="btn-edit cursor-pointer">
                            a/n salsabila nurul hikmah
                        </span>
                    </div>
                </div>
            </div>
        </section>
        <section class="mt-3 w-full rounded-md bg-green-600 p-2 shadow-md">
            <div class="flex flex-col">
                <div class="flex flex-row items-center justify-between px-4 py-4">
                    <div class="flex text-2xl font-medium font-serif uppercase text-white">Gopay</div>
                </div>
                <div class="px-4">
                    <h2 class="text-xl font-medium text-white">089675008000</h2>
                    <button class="py-1 px-2 text-black bg-white text-xs mt-2 rounded-full">copy</button>
                    <div class="mt-3 text-sm font-serif font-thin text-white">
                        <span class="btn-edit cursor-pointer">
                            a/n salsabila nurul hikmah
                        </span>
                    </div>
                </div>
            </div>
        </section>
        <section class="mt-3 w-full rounded-md bg-purple-700 p-2 shadow-md">
            <div class="flex flex-col">
                <div class="flex flex-row items-center justify-between px-4 py-4">
                    <div class="flex text-2xl font-medium font-serif uppercase text-white">OVO</div>
                </div>
                <div class="px-4">
                    <h2 class="text-xl font-medium text-white">089675008000</h2>
                    <button class="py-1 px-2 text-black bg-white text-xs mt-2 rounded-full">copy</button>
                    <div class="mt-3 text-sm font-serif font-thin text-white">
                        <span class="btn-edit cursor-pointer">
                            a/n salsabila nurul hikmah
                        </span>
                    </div>
                </div>
            </div>
        </section> --}}
    </section>
    <section class="modal-box block md:hidden">
        <label for="modal-hadiah" class="btn-close-modal btn-sm btn-circle btn sticky right-2 top-2 border-red-600 bg-red-600">✕</label>
        <div class="flex justify-center">
            <h1 class="font-tangerine text-5xl font-bold text-stone-600">Kado Nikah</h1>
        </div>
        @foreach ($data['kado_nikah_api'] as $val)
            <section class="{{ ($val['wallet'] === 'gopay' ? 'bg-green-600' : ($val['wallet'] === 'dana' ? 'bg-blue-400' : ($val['wallet'] === 'ovo' ? 'bg-purple-700' : ($val['wallet'] === 'shoopepay' ? 'bg-orange-500' : 'bg-yellow-400')))) }} mt-3 w-full rounded-md p-2 shadow-md">
                <div class="flex flex-col">
                    <div class="flex flex-row items-center justify-between px-4 pb-2">
                        <div class="flex font-serif text-2xl font-medium uppercase text-white">{{ $val['wallet'] }}</div>
                    </div>
                    <div class="px-4">
                        <h2 class="text-xl font-medium text-white">{{ $val['no_wallet'] }}</h2>
                        <button class="mt-2 rounded-full bg-white py-1 px-2 text-xs text-black">copy</button>
                        <div class="mt-3 font-serif text-sm font-thin text-white">
                            <span class="btn-edit cursor-pointer">
                                a/n {{ $val['user_wallet'] }}
                            </span>
                        </div>
                    </div>
                </div>
            </section>
        @endforeach
    </section>
</div>
