@extends('layouts.undangan')
@section('title')
    {{ $data['setting_undangan_api']['judul_undangan'] }}
@endsection

@section('meta')
    <meta name="description" content="{{ \Carbon\Carbon::createFromFormat('d/m/Y', $data['setting_resepsi_api']['tanggal'])->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}. Tanpa Mengurangi Rasa Hormat, Kami Mengundang Anda Untuk Menghadiri Acara {{ $data['name'] === 'arilangga' ? 'Syukuran anak kami.' : 'Pernikahan Kami.' }}">
@endsection

@section('styles')
@endsection

@section('content')
    <section id="loading-screen" class="fixed inset-0 z-50 flex items-center justify-center bg-white">
        <div>
            <lottie-player src="https://res.cloudinary.com/dvnyeednh/raw/upload/v1692072582/animation_llbs9d91_upa48d.json" background="Transparent" speed="1" class="w-[200px]" direction="1" mode="normal" loop autoplay></lottie-player>
            <p class="text-center">Sedang Memuat...</p>
        </div>
    </section>

    <div id="content-undangan">
        @if ($data['vip'] === true || $data['vip'] === 'true')
            @if ($data['name'] === 'demo')
                @include('undangan.template.' . request()->query('tema'))
            @elseif ($data['name'] === 'arilangga')
                @include('undangan.template.arilangga')
            @else
                @if (request()->query('tema') !== null)
                    @include('undangan.template.' . request()->query('tema'))
                @else
                    @include('undangan.template.' . $data['tema_api']['tema'])
                @endif
            @endif
        @else
            @if (request()->query('tema') !== null)
                @include('undangan.template.' . request()->query('tema'))
            @else
                @include('undangan.template.basic')
            @endif
        @endif
    </div>

    @if ($data['vip'] === true || $data['vip'] === 'true')
        <audio id="music-background" loop src="{{ asset('/audios' . '/' . $data['music_background_api']['music']) }}"></audio>
    @endif

    <div class="toast toast-center toast-top right-1/4 top-[45%] hidden min-w-max max-w-[20px] transform duration-100 md:toast-bottom" id="toast-demo-tema">
        <div class="alert alert-success items-center rounded-xl bg-gray-700/20 p-4 shadow-md">
            <div>
                <span class="font-sans text-sm font-bold text-white/50">TEMA DEMO</span>
            </div>
        </div>
    </div>

    <x-toast-alert id="toast-loading" type="loading" message="Sedang proses" />
    <x-toast-alert id="toast-validate" type="failed" message="Periksa kembali yang wajib diisi." />
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/medium-zoom@1.0.2/dist/medium-zoom.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" integrity="sha512-q583ppKrCRc7N5O0n2nzUiJ+suUv7Et1JGels4bXOaMFQcamPk9HjdUknZuuFjBNs7tsMuadge5k9RzdmO+1GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        window.onload = function() {
            setTimeout(function() {
                $('#loading-screen').fadeOut('slow');
            }, 1500)
        }

        $("#body").css("overflow", "hidden");

        let data = @json($data);
        var tanggalResepsi = data['setting_resepsi_api']['tanggal'].split("/");
        var tanggalFormatted = tanggalResepsi[2] + "-" + tanggalResepsi[1] + "-" + tanggalResepsi[0];
        var date = new Date(`${tanggalFormatted} ${data['setting_resepsi_api']['waktu_mulai']}`);
        var now = new Date();
        const imageUrl = '{{ asset('storage/images') }}';
        const imagePublic = '{{ asset('/images') }}';
        const imageDefault = '{{ asset('/images/photo-blank.png') }}';
        const tema = data['name'] === 'demo' ? '{{ request()->query('tema') }}' : data['tema_api'] === null ? 'basic' : data['tema_api']['tema'];
        const temaDemo = '{{ request()->query('tema') }}';

        if (data['name'] !== 'demo') {
            if (temaDemo !== '') {
                $('#toast-demo-tema').fadeIn('past')
            }
        }

        if (data['setting_akad_api']['google_maps'] === null && data['setting_akad_api']['google_maps'] === "") {
            $('#gps-akad').removeClass('flex')
            $('#gps-akad').addClass('hidden')
        }

        if (data['setting_resepsi_api']['google_maps'] === null && data['setting_resepsi_api']['google_maps'] === "") {
            $('#gps-resepsi').removeClass('flex')
            $('#gps-resepsi').addClass('hidden')
        }

        var colorParticles = '#ffffff';
        switch (tema) {
            case 'basic':
                colorParticles = '#969595';
                break;
            case 'brown-premium':
                colorParticles = '#5c4848';
                break;
            case 'black-gold':
                colorParticles = '#e3a300';
                break;
            case 'deep-ocean':
                colorParticles = '#FFFFFF';
                break;
            case 'green-fantasy':
                colorParticles = '#598555';
                break;
            case 'lily':
                colorParticles = '#634051';
                break;
            default:
                break;
        }

        particlesJS('particles-js', {
            "particles": {
                "number": {
                    "value": 200,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": colorParticles
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 0,
                        "color": "#000000"
                    },
                    "polygon": {
                        "nb_sides": 5
                    },
                    "image": {
                        "src": "",
                        "width": 100,
                        "height": 100,
                        "position": "fixed",
                        "z-index": -100
                    }
                },
                "opacity": {
                    "value": 0.5,
                    "random": false,
                    "anim": {
                        "enable": true,
                        "speed": 1,
                        "opacity_min": 0.1,
                        "sync": false
                    }
                },
                "size": {
                    "value": 4,
                    "random": true,
                    "anim": {
                        "enable": false,
                        "speed": 40,
                        "size_min": 0.1,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": false,
                    "distance": 150,
                    "color": "#ffffff",
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 2,
                    "direction": "none",
                    "random": false,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false,
                    "attract": {
                        "enable": false,
                        "rotateX": 600,
                        "rotateY": 1200
                    }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": false,
                        "mode": "repulse"
                    },
                    "onclick": {
                        "enable": false,
                        "mode": "push"
                    },
                    "resize": true
                },
                "modes": {
                    "grab": {
                        "distance": 400,
                        "line_linked": {
                            "opacity": 1
                        }
                    },
                    "bubble": {
                        "distance": 400,
                        "size": 40,
                        "duration": 2,
                        "opacity": 8,
                        "speed": 3
                    },
                    "repulse": {
                        "distance": 200,
                        "duration": 0.4
                    },
                    "push": {
                        "particles_nb": 4
                    },
                    "remove": {
                        "particles_nb": 2
                    }
                }
            },
            "retina_detect": true
        });

        var timer = setInterval(function() {
            var now = new Date();
            var timeDiff = date.getTime() - now.getTime();
            if (timeDiff <= 0) {
                clearInterval(timer);
                $('#countdown').hide();
                $('#countdown-done').show();
                return;
            }

            var seconds = Math.floor(timeDiff / 1000);
            var minutes = Math.floor(seconds / 60);
            var hours = Math.floor(minutes / 60);
            var days = Math.floor(hours / 24);

            var remainingHours = hours % 24;
            var remainingMinutes = minutes % 60;
            var remainingSeconds = seconds % 60;

            $('#countdown').show();
            $('#countdown-done').hide();
            $('#day').html(days);
            $('#hour').html(remainingHours);
            $('#minute').html(remainingMinutes);
            $('#second').html(remainingSeconds);
        }, 1000);

        $('#image-file').on('change', (e) => {
            var fileName = e.target.files[0].name;
            var file = e.target.files[0];
            var fileSizeInMB = file.size / (1024 * 1024);

            if (fileSizeInMB > 5) {
                alert('Ukuran foto terlau besar, maksimal 5MB');
                $('#image-file').val('');
                $('#output').attr('src', imageDefault)
                return
            } else {
                var fileType = file.type;
                if (fileType !== "image/png" && fileType !== "image/jpeg" && fileType !== "image/jpg") {
                    alert("Jenis file yang diunggah harus berupa PNG, JPEG, atau JPG.");
                    $('#output').attr('src', imageDefault)
                    $('#image-file').val('');
                    return
                }
            }

            var reader = new FileReader();
            reader.readAsDataURL(e.target.files[0]);
            reader.onload = function() {
                var output = document.getElementById('output');
                output.src = reader.result;
            }
        })

        $(document).ready(function() {
            const btnCopy = $('.btn-copy');

            btnCopy.click(function() {
                const walletNo = $(this).attr('data-wallet');
                const key = $(this).attr('data-key');
                const tempInput = $('<input>');
                $('body').append(tempInput);
                tempInput.val(walletNo).select();
                document.execCommand('copy');
                tempInput.remove();
                $(`.copy-${key}`).show('past')
                $(`#wallet-${key}`).hide();
                setTimeout(function() {
                    $(`.copy-${key}`).hide()
                    $(`#wallet-${key}`).show();
                }, 2000)
            });
        });

        $(document).on('change', '#toggle-music', function() {
            var audio = $('#music-background')[0];
            if (audio.paused) {
                audio.play();
            } else {
                audio.pause();
            }
        })

        $(document).on('click', '#open-undangan', function() {
            $('#opening').hide('slow')
            $("#body").css("overflow", "auto");
            var audio = $('#music-background')[0];
            if (data['vip'] === true || data['vip'] === "true") {
                audio.play();
            }

            var elem = document.documentElement;
            if (elem.requestFullscreen) {
                elem.requestFullscreen();
            } else if (elem.mozRequestFullScreen) {
                /* Firefox */
                elem.mozRequestFullScreen();
            } else if (elem.webkitRequestFullscreen) {
                /* Chrome, Safari & Opera */
                elem.webkitRequestFullscreen();
            } else if (elem.msRequestFullscreen) {
                /* IE/Edge */
                elem.msRequestFullscreen();
            }
        })

        $(document).on('click', '.btn-send', function() {
            validateForm();
        })

        $(document).on('click', '.btn-demo', function() {
            alert('Maaf, ini hanya undangan demo/contoh.');
        })

        renderImageGallery()

        function renderImageGallery() {
            var html = '';
            var imageCount = 0;
            var dataGallery = data['gallery_api'];
            let chunkSize = 4;
            let slicedArrays = [];

            if (dataGallery.length >= 4) {
                for (let i = 0; i < dataGallery.length; i += chunkSize) {
                    let chunk = dataGallery.slice(i, i + chunkSize);
                    slicedArrays.push(chunk);
                }

                $.each(slicedArrays, function(index, value) {
                    if (value.length === 4) {
                        html += `<div class="grid grid-rows-3 grid-flow-col gap-2 h-[500px] md:h-[800px] mx-auto mt-2 max-w-5xl">`;
                    } else {
                        html += `<div class="max-w-5xl">`;
                    }
                    if (value.length === 4) {
                        $.each(value, function(index, val) {
                            if (index === 0) {
                                html += `
                            <div class="row-span-2 col-span-2">
                                <img data-src="${imageUrl}/${val['gambar']}" alt="bg-4" class="lazyload h-full w-full object-cover rounded-md zoomable-image">
                            </div>
                        `
                            } else if (index === 1) {
                                html += `
                            <div class="col-span-2 ">
                                <img data-src="${imageUrl}/${val['gambar']}" alt="bg-4" class="lazyload h-full w-full object-cover rounded-md zoomable-image">
                            </div>
                        `
                            } else if (index === 2) {
                                html += `
                            <div class="col-span-2 ">
                                <img data-src="${imageUrl}/${val['gambar']}" alt="bg-4" class="lazyload h-full w-full object-cover rounded-md zoomable-image">
                            </div>
                        `
                            } else if (index === 3) {
                                html += `
                            <div class="row-span-2 col-span-2 ">
                                <img data-src="${imageUrl}/${val['gambar']}" alt="bg-4" class="lazyload h-full w-full object-cover rounded-md zoomable-image">
                            </div>
                        `
                            }

                        });
                    } else {
                        $.each(value, function(index, val) {
                            html += `
                            <div class="col-span-2  mt-2">
                                <img src="${imageUrl}/${val['gambar']}" alt="bg-4" class="h-full w-full object-cover rounded-md zoomable-image">
                            </div>
                        `
                        });
                    }

                    html += `</div>`;
                });
            } else {
                html += `<div class="grid grid-cols-2 gap-4 mx-auto mt-5 max-w-5xl">`;
                $.each(dataGallery, function(index, value) {
                    html += `
                        <div class="col-span-2 ">
                            <img src="${imageUrl}/${value['gambar']}" alt="bg-4" class="h-full w-full object-cover rounded-md zoomable-image">
                        </div>
                    `
                });
                html += `</div>`;
            }

            $('#image-gallery').html(html);

            var zoomableImages = $('.zoomable-image');

            zoomableImages.each(function() {
                mediumZoom(this, {
                    margin: 50,
                    background: 'rgba(0, 0, 0, 0.7)',
                    scrollOffset: 0,
                    container: null,
                    template: null,
                    zIndex: 1000,
                });
            });
        }

        function validateForm() {
            $('#nama').val() == '' ? $('#nama-validation').show() : $('#nama-validation').hide();
            $('#pesan').val() == '' ? $('#pesan-validation').show() : $('#pesan-validation').hide();

            if ($('#nama').val() != '' && $('#pesan').val() != '') {
                sendPesan();
            } else {
                $('#toast-validate').fadeIn('past')
                setTimeout(function() {
                    $('#toast-validate').fadeOut('past')
                }, 5000)
            }
        }

        function sendPesan() {
            var instagram = $('#instagram').val();
            var usernameIg = instagram.replace(/@/g, "");
            const imageFile = document.getElementById('image-file');
            var myformData = new FormData();
            myformData.append('nama', $('#nama').val());
            myformData.append('instagram', usernameIg);
            myformData.append('pesan', $('#pesan').val());
            myformData.append('id', data['id']);
            myformData.append('imageFile', imageFile.files[0]);

            $.ajax({
                method: 'post',
                processData: false,
                contentType: false,
                cache: false,
                data: myformData,
                enctype: 'multipart/form-data',
                url: `/undangan/send-pesan`,
                beforeSend: function() {
                    $('#toast-loading').show()
                    $('#toast-validate').hide()
                },
                error: function(error) {},
                success: function(response) {
                    window.location.reload();
                }
            });
        }
    </script>
@endpush
