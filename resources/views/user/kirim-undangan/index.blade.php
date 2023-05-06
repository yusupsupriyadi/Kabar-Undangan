@extends('layouts.app')

@section('libraries')
    <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.10/dist/clipboard.min.js"></script>
@endsection

@section('content')
    <main class="bg-gray-100">
        <x-app.navbar />
        <div class="mx-auto mt-4 flex flex-wrap px-2 pt-4 md:px-12 lg:pt-10">
            <!--Menu-->
            <x-app.menu active="kirim-undangan">
                <x-slot name="activeDisplay">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <p class="text-left text-sm">Kirim Undangan</p>
                    </div>
                </x-slot>
            </x-app.menu>

            <!--Main Content-->
            <div class="border-rounded mt-6 w-full border border-gray-400 bg-white p-8 leading-normal text-gray-900 lg:mt-0 lg:w-4/5">

                <section class="{{ intval($user['vip']) === 1 ? 'hidden' : '' }} mb-6">
                    <x-app.card-premium />
                </section>

                <x-app.title title="Kirim Undangan" desc="Fasilitas ini dapat anda gunakan untuk mengirimkan undangan khusus ke teman-teman anda dengan mencantumkan nama teman atau saudara anda. " />

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

                <main class="{{ intval($user['vip']) === 1 ? '' : 'hidden' }} py-5">
                    <form class="md:flex md:gap-4">
                        <div class="form-control w-full">
                            <section class="wallet-index">
                                <div class="bank-index form-control mt-4 w-full">
                                    <label class="label flex items-center justify-start gap-1">
                                        <span class="form-label text-md font-semibold">Penerima</span>
                                    </label>
                                    <div class="flex !max-w-md items-center gap-4">
                                        <input id="nama1" type="text" placeholder="Masukan nama" value="" class="input-primary" />
                                        <h1>&</h1>
                                        <input id="nama2" type="text" placeholder="Masukan nama partner" value="" class="input-primary" />
                                    </div>
                                    <small class="mt-2 !max-w-md text-sm">Form ini untuk mengirim undangan kamu khusus ke orang yang kamu ingin undangan. <br> Contoh: <span class="font-bold">kevin & partner</span></small>
                                </div>
                                <h1 class="mt-3 text-sm">link: <span data-clipboard-target=".link" class="copy-link cursor-pointer text-blue-500 hover:underline"><span class="link"></span></span></h1>
                                <div class="form-control mt-4 w-full">
                                    <label class="label flex items-center justify-start gap-1">
                                        <span class="form-label text-md font-bold">Template pesan wa</span>
                                        <button id="copy-template-wa" data-clipboard-target="#template-wa" type="button" class="ml-2 rounded-full border-2 border-black p-1 text-sm font-bold">Copy</button>
                                    </label>
                                    <textarea id="template-wa" type="text" class="input-primary h-[32rem] !max-w-md !text-white md:h-[30rem]" style="background-color: darkgreen" readonly></textarea>
                                </div>
                            </section>
                        </div>
                    </form>
                </main>
                <x-app.testimoni-bar />
            </div>
        </div>

        <x-app.footer />
    </main>
@endsection

@push('scripts')
    <script>
        let mempelaiWanita = @json($mempelaiWanita);
        let mempelaiPria = @json($mempelaiPria);
        let user = @json($user);
        let nama1 = $('#nama1').val();
        let nama2 = $('#nama2').val();
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

        $('.link').text(`https://${user['name']}.kabarundangan.com`);
        let template = `Assalamu'alaikum Wr. Wb,\n\nTanpa mengurangi rasa hormat, perkenankan kami mengundang Bapak/Ibu/Saudara/i, teman sekaligus sahabat, untuk menghadiri acara pernikahan kami :\n\n "${mempelaiWanita['nama_panggilan']} & ${mempelaiPria['nama_panggilan']}" \n\nBerikut link undangan kami untuk info lengkap dari acara bisa kunjungi :\n\nhttps://${user['name']}.kabarundangan.com \n\nMerupakan suatu kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan untuk hadir dan memberikan doa restu.\n\nWassalamu'alaikum Wr. Wb.\nTerima kasih🌹 \n\nWith Love,\n${mempelaiWanita['nama_panggilan']} & ${mempelaiPria['nama_panggilan']}`;
        $(document).ready(function() {
            let nama = $('#nama').val();
            $('#template-wa').val(template);
        })

        $(document).on('keyup', '#nama1', function() {
            nama1 = $(this).val();
            template = `Assalamu'alaikum Wr. Wb,\n\nTanpa mengurangi rasa hormat, perkenankan kami mengundang Bapak/Ibu/Saudara/i, teman sekaligus sahabat, untuk menghadiri acara pernikahan kami :\n\n "${mempelaiWanita['nama_panggilan']} & ${mempelaiPria['nama_panggilan']}" \n\nBerikut link undangan kami untuk info lengkap dari acara bisa kunjungi :\n\nhttps://${user['name']}.kabarundangan.com/${nama1 !==  '' ? '?untuk=' : ''}${nama1}${nama2 !== '' ? '%20%26%20' : ''}${nama2} \n\nMerupakan suatu kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan untuk hadir dan memberikan doa restu.\n\nWassalamu'alaikum Wr. Wb.\nTerima kasih🌹 \n\nWith Love,\n${mempelaiWanita['nama_panggilan']} & ${mempelaiPria['nama_panggilan']}`;
            $('#template-wa').val(template);
            $('.link').text(`https://${user['name']}.kabarundangan.com/${nama1 !== '' ? '?untuk=' : ''}${nama1}${nama2 !== '' ? '%20%26%20' : ''}${nama2}`);
        })

        $(document).on('keyup', '#nama2', function() {
            nama2 = $(this).val();
            template = `Assalamu'alaikum Wr. Wb,\n\nTanpa mengurangi rasa hormat, perkenankan kami mengundang Bapak/Ibu/Saudara/i, teman sekaligus sahabat, untuk menghadiri acara pernikahan kami :\n\n "${mempelaiWanita['nama_panggilan']} & ${mempelaiPria['nama_panggilan']}" \n\nBerikut link undangan kami untuk info lengkap dari acara bisa kunjungi :\n\nhttps://${user['name']}.kabarundangan.com/${nama1 !==  '' ? '?untuk=' : ''}${nama1}${nama2 !== '' ? '%20%26%20' : ''}${nama2} \n\nMerupakan suatu kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan untuk hadir dan memberikan doa restu.\n\nWassalamu'alaikum Wr. Wb.\nTerima kasih🌹 \n\nWith Love,\n${mempelaiWanita['nama_panggilan']} & ${mempelaiPria['nama_panggilan']}`;
            $('#template-wa').val(template);
            $('.link').text(`https://${user['name']}.kabarundangan.com/${nama1 !==  '' ? '?untuk=' : ''}${nama1}${nama2 !== '' ? '%20%26%20' : ''}${nama2}`);
        })

        var clipboardLink = new ClipboardJS('.copy-link');

        $(document).ready(function() {
            clipboardLink.on('success', function(e) {
                alert('Link berhasil disalin');
            });

            clipboardLink.on('error', function(e) {
                alert('Gagal menyalin');
            });
        });

        var clipboardTemplateWa = new ClipboardJS('#copy-template-wa');

        $(document).ready(function() {
            clipboardTemplateWa.on('success', function(e) {
                alert('Template Wa berhasil disalin');
            });

            clipboardTemplateWa.on('error', function(e) {
                alert('Gagal menyalin');
            });
        });
    </script>
@endpush
