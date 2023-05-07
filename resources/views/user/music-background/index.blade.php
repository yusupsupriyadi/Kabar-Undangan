@extends('layouts.app')

@section('content')
    <main class="bg-gray-100">
        <x-app.navbar />
        <div class="mx-auto mt-4 flex flex-wrap px-2 pt-4 md:px-12 lg:pt-10">
            <!--Menu-->
            <x-app.menu active="music-background">
                <x-slot name="activeDisplay">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <p class="text-left text-sm">Musik Background</p>
                    </div>
                </x-slot>
            </x-app.menu>

            <!--Main Content-->
            <div class="border-rounded mt-6 w-full border border-gray-400 bg-white p-8 leading-normal text-gray-900 lg:mt-0 lg:w-4/5">

                <section class="{{ intval($user['vip']) === 1 ? 'hidden' : '' }} mb-6">
                    <x-app.card-premium />
                </section>

                <x-app.title title="Musik Background" desc="Kamu bisa menambahkan audio atau musik selama website pernikahan kamu dibuka, silahkan pilih audio/musik pilihan kamu." />

                <section class="{{ intval($user['vip']) === 1 ? 'hidden' : '' }} mt-2">
                    <div class="alert alert-error animate-pulse shadow-lg">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0 stroke-current text-white" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-sm text-white">Fitur ini akan Aktip bila kamu sudah langganan <b>PREMIUM!</b></span>
                        </div>
                    </div>
                </section>

                <main class="py-5">
                    <section>
                        <div class="mx-auto rounded-sm border border-gray-200 bg-white shadow-lg">
                            <header class="border-b border-gray-100 px-5 py-4">
                                <h2 class="font-semibold text-gray-800">Lagu Rekomendasi</h2>
                            </header>
                            <div class="p-3">
                                <div class="overflow-x-auto">
                                    <table class="w-full table-auto">
                                        <thead class="bg-gray-50 text-xs font-semibold uppercase text-gray-400">
                                            <tr>
                                                <th class="whitespace-nowrap p-2">
                                                    <div class="text-left font-semibold">Judul</div>
                                                </th>
                                                <th class="whitespace-nowrap p-2">
                                                    <div class="text-left font-semibold">Musik</div>
                                                </th>
                                                <th class="whitespace-nowrap p-2">
                                                    <div class="text-left font-semibold">Aksi</div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-100 text-sm" id="table-audio">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>

                </main>
                <x-app.testimoni-bar />
            </div>


        </div>

        <x-app.footer />
    </main>

    <x-toast-alert id="toast-success" type="success" message="Berhasil memilih lagu" />
    <x-toast-alert id="toast-failed" type="failed" message="Gagal memilih lagu" />
    <x-toast-alert id="toast-loading" type="loading" message="Sedang memproses" />
@endsection

@push('scripts')
    <script>
        const storage = '{{ asset('storage/audios') }}/'
        const asset = '{{ asset('/audios/') }}/'
        const dataAudio = [{
                'judul': 'My Heart Will Go On',
                'audio': 'My Heart Will Go On - Sexaphone.mp3'
            },
            {
                'judul': 'Cant Help Falling In Love',
                'audio': 'Elvis Presley - Cant Help Falling In Love.mp3'
            },
            {
                'judul': 'All of Me',
                'audio': 'John Legend - All of Me.mp3'
            },
            {
                'judul': 'Perfect',
                'audio': 'Perfect - Ed Sheeran.mp3'
            },
            {
                'judul': 'A Thousand Years',
                'audio': 'Christina Perri - A Thousand Years.mp3'
            },
            {
                'judul': 'I Will Always Love You',
                'audio': 'Whitney Houston - I Will Always Love You.mp3'
            },
        ];
        var data = @json($data);

        var vip = @json($user['vip']);
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

        indexTable(data !== null ? data.music : null);

        function indexTable(index = null) {
            var html = ``;
            $.each(dataAudio, function(key, val) {
                html += `
                <tr>
                    <td class="whitespace-nowrap p-2">
                        <div class="flex items-center">
                            <div class="font-medium text-gray-800">${val.judul}</div>
                        </div>
                    </td>
                    <td class="whitespace-nowrap p-2">
                        <div class="text-left">
                            <audio class="hidden" id="audio-${key}" controlsList="nodownload">
                                <source src="${asset+val.audio}" type="audio/mpeg">
                            </audio>
                            <button type="button" data-id="${key}" class="btn-play-${key} inline-block rounded border-black border-2 bg-transparent px-4 py-2 text-xs font-bold uppercase leading-tight text-black shadow-md transition duration-150 ease-in-out hover:shadow-lg">
                                Play
                            </button>
                        </div>
                    </td>
                    <td class="whitespace-nowrap p-2">
                        <button type="button" data-id="${key}" class="btn-pilih inline-block rounded ${index === val.audio ? 'bg-yellow-600' : 'bg-green-600'} px-6 py-2.5 text-sm font-bold uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out ${index === val.audio ? '' : 'hover:bg-green-800'}  hover:shadow-lg">
                            ${index === val.audio ? 'TERPILIH' : 'PILIH'}
                        </button>
                    </td>
                </tr>
                `

                $(document).on('click', `.btn-play-${key}`, function() {
                    const id = $(this).data('id');
                    const audio = $(`#audio-${id}`)[0];
                    if (audio.paused) {
                        audio.play();
                        $(this).html('STOP');
                        $(this).addClass('!bg-red-500 text-white');
                    } else {
                        audio.pause();
                        audio.currentTime = 0;
                        $(this).html('PLAY');
                        $(this).removeClass('!bg-red-500 text-white');
                    }
                })

            })
            $('#table-audio').html(html)
        }

        $(document).on('click', '.btn-pilih', function() {
            var id = $(this).data('id');
            updateMusicBackground(id)
        })

        function updateMusicBackground(id) {
            const value = dataAudio[id].audio;
            const dataExist = data !== null ? data.music : null;
            $.ajax({
                url: `/music-background/update`,
                type: 'post',
                dataType: 'json',
                data: {
                    value,
                    dataExist
                },
                beforeSend: function() {
                    $('#toast-loading').show()
                    $('#toast-validate').hide()
                },
                error: function(error) {
                    setTimeout(function() {
                        $('#toast-loading').hide()
                        $('#toast-failed').fadeIn('past')
                    }, 1000)
                    setTimeout(function() {
                        $('#toast-failed').fadeOut('past')
                    }, 4000)
                },
                success: function(response) {
                    setTimeout(function() {
                        $('#toast-loading').hide()
                        $('#toast-success').fadeIn('past')
                        indexTable(value)
                    }, 1000)
                    setTimeout(function() {
                        $('#toast-success').fadeOut('past')
                    }, 4000)
                }
            });
        }
    </script>
@endpush
