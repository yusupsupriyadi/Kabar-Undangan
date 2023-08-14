@extends('layouts.app')

@section('content')
    <main class="bg-gray-100">
        <x-app.navbar />
        <div class="mx-auto mt-4 flex flex-wrap px-2 pt-4 md:px-12 lg:pt-10">
            <!--Menu-->
            <x-app.menu active="tema">
                <x-slot name="activeDisplay">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <p class="text-left text-sm">Halaman Utama</p>
                    </div>
                </x-slot>
            </x-app.menu>
            <!--Main Content-->
            <div class="border-rounded mt-6 w-full border border-gray-400 bg-white p-8 leading-normal text-gray-900 lg:mt-0 lg:w-4/5">
                <section class="{{ intval($user['vip']) === 1 ? 'hidden' : '' }} mb-6">
                    <x-app.card-premium />
                </section>
                <x-app.title title="Ganti Tema" desc="Fasilitas ini digunakan untuk mengganti tampilan tema undangan mu." />

                <main id="tema-list" class="hidden">
                </main>

                <section id="loading-page" class="my-10 hidden">
                    <div class='flex items-center justify-center'>
                        <button type="button" class="h-max w-max rounded-lg bg-indigo-400 font-bold text-white duration-[500ms,800ms] hover:cursor-not-allowed hover:bg-indigo-300" disabled>
                            <div class="m-[10px] flex items-center justify-center">
                                <div class="h-5 w-5 animate-spin rounded-full border-4 border-solid border-white border-t-transparent"></div>
                                <div class="ml-2">Harap Menunggu ...<div>
                                    </div>
                        </button>
                    </div>
                </section>
                <x-app.testimoni-bar />
            </div>
        </div>
        <x-app.footer />
    </main>

    <x-toast-alert id="toast-success" type="success" message="Berhasil mengganti tema" />
    <x-toast-alert id="toast-failed" type="failed" message="Gagal mengganti tema" />
    <x-toast-alert id="toast-loading" type="loading" message="Sedang memproses" />
@endsection

@push('scripts')
    <script>
        var vip = @json($user['vip']);
        var userName = @json(Auth::user()->name);

        if (parseInt(vip)) {
            $('#promo-panel').hide()
            $('#menu-navigation').removeClass('pt-20')
            $('#menu-navigation').addClass('pt-16')
        } else {
            $('#promo-panel').show()
            $('#menu-navigation').removeClass('pt-16')
            $('#menu-navigation').addClass('pt-20')
            setTimeout(() => {
                $('#modal-promo').show()
            }, 2000);
        }

        getTemaSelect()

        function getTemaSelect() {
            $.ajax({
                url: `tema/get-data`,
                type: 'GET',
                dataType: 'json',
                data: {},
                beforeSend: function() {
                    $('#loading-page').show()
                    $('#tema-list').hide()
                },
                error: function(error) {
                    $('#loading-page').hide()
                    $('#tema-list').show()
                },
                success: function(response) {
                    $('#loading-page').hide()
                    $('#tema-list').show()
                    data = response;
                    $('#tema-list').html(renderTemaList(data));
                    return;
                }
            });
        }

        function renderTemaList(data) {
            var html = "";
            html = `
            <section id="tema-list" class="md:grid md:grid-cols-3 gap-4 py-5 ">
                ${temaComponent('gratis.webp', 'PURE WHITE', 'basic', 'GRATIS', data['tema'] === 'basic' ? true : false, data['id'])}
                ${temaComponent('brown-premium.webp', 'BROWN AESTHETIC', 'brown-premium', 'PREMIUM', data['tema'] === 'brown-premium' ? true : false, data['id'])}
                ${temaComponent('lily.webp', 'LILY', 'lily', 'PREMIUM', data['tema'] === 'lily' ? true : false, data['id'])}
                ${temaComponent('green-fantasy.webp', 'GREEN FANTASY', 'green-fantasy', 'PREMIUM', data['tema'] === 'green-fantasy' ? true : false, data['id'])}
                ${temaComponent('deep-ocean.webp', 'DEEP OCEAN', 'deep-ocean', 'PREMIUM', data['tema'] === 'deep-ocean' ? true : false, data['id'])}
                ${temaComponent('black-gold.webp', 'BLACK GOLD', 'black-gold', 'PREMIUM', data['tema'] === 'black-gold' ? true : false, data['id'])}
            </section>
            `
            return html;
        }

        const BASE_ASSET = "{{ asset('') }}";
        const ROUTE_SUBDOMAIN = `{{ route('subdomain', ['subdomain' => '__SUBDOMAIN__', 'tema' => '__TEMA__']) }}`;

        const temaComponent = (imageUrl, name, url, type, active, id) => {
            var html = "";
            var button = "";
            if (vip) {
                if(active){
                    button = `<button class="w-[110px] mt-2 border border-b-4 border-gray-700 bg-green-500 p-2 px-4 text-xs font-semibold text-white text-center">Tema Aktiv</button>`
                }else{
                    button = `<button data-name="${url}" data-id="${id}" class="btn-update-tema w-[110px] mt-2 border border-b-4 border-gray-700 bg-blue-500 p-2 px-4 text-xs font-semibold text-white text-center">Pakai Tema</button>`
                }
            }else{
                button = `<button class="w-[110px] mt-2 border border-b-4 border-gray-700 bg-blue-500 p-2 px-4 text-xs font-semibold text-white text-center">Premium</button>`
            }

            html = `
                <div class="md:hidden ${url === "basic" ? 'mt-0' : 'mt-12'}">
                    ${url === "basic" ? '' : '<div class="border-b-2 border-gray-300"></div>'}
                </div>
                <div class="flex items-start gap-2 border-black ${url === "basic" ? 'mt-0' : 'mt-12'} md:mt-0">
                    <img src="${BASE_ASSET}images/tema/${imageUrl}" class="w-24" alt="">
                    <div>
                        <h1 class="text-lg font-medium">${name}</h1>
                        <p class="text-sm">${type}</p>
                        <a href="${ROUTE_SUBDOMAIN.replace('__SUBDOMAIN__', userName).replace('__TEMA__', url)}" target="_blank">
                            <button class="mt-6 flex justify-center w-[110px] items-center gap-1 border border-b-4 border-gray-700 bg-white p-2 px-4 text-xs font-semibold text-black">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                Lihat
                            </button>
                        </a>
                        ${button}
                    </div>
                </div>
            `
            return html;
        }

        $(document).on('click', '.btn-update-tema', function() {
            var name = $(this).data('name');
            var id = $(this).data('id');
            $.ajax({
                url: `tema/update`,
                type: 'POST',
                dataType: 'json',
                data: {
                    tema: name,
                    id: id
                },
                beforeSend: function() {
                    $('#toast-loading').show()
                },
                error: function(error) {
                    $('#toast-error').show()
                    $('#toast-loading').hide()

                },
                success: function(response) {
                    getTemaSelect()
                    $('#toast-success').show()
                    $('#toast-loading').hide()
                    setTimeout(() => {
                        $('#toast-success').hide()
                    }, 3000);
                    return;
                }
            });
        })
    </script>
@endpush
