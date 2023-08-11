@extends('layouts.undangan')
@section('title')
    {{ $data['setting_undangan_api']['judul_undangan'] }}
@endsection

@section('meta')
    <meta name="description" content="{{ \Carbon\Carbon::createFromFormat('d/m/Y', $data['setting_resepsi_api']['tanggal'])->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}. Tanpa Mengurangi Rasa Hormat, Kami Mengundang Anda Untuk Menghadiri Acara Pernikahan Kami.">
@endsection

@section('styles')
@endsection

@section('content')
    <section id="loading-screen" class="fixed inset-0 z-50 flex items-center justify-center bg-white">
        <div class="loader">
            <canvas width="480px" height="480px" id="loader"></canvas>
            <h1 class="pt-2 font-bold text-white">Sedang memuat...</h1>
        </div>
    </section>

    <div id="content-undangan" class="hidden">
        @if ($data['vip'] === true || $data['vip'] === 'true')
            @if ($data['name'] === 'demo')
                @include('undangan.template.' . request()->query('tema'))
            @else
                @include('undangan.template.' . $data['tema_api']['tema'])
            @endif
        @else
            @include('undangan.template.basic')
        @endif
    </div>

    @if ($data['vip'] === true || $data['vip'] === 'true')
        <audio id="music-background" loop src="{{ asset('/audios' . '/' . $data['music_background_api']['music']) }}"></audio>
    @endif

    <x-toast-alert id="toast-loading" type="loading" message="Sedang proses" />
    <x-toast-alert id="toast-validate" type="failed" message="Periksa kembali yang wajib diisi." />
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fontfaceobserver/2.3.0/fontfaceobserver.js" integrity="sha512-yGyu0Bs4Ktt2Wuws6CZIOe5XksY30AGXsqufHchKuDeuk6Twa3PiBbF1J8S0ddMJa260yY3P9AT/eV/sUKC/9w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        document.addEventListener("contextmenu", function(e) {
            e.preventDefault();
        });

        // Mencegah akses ke DevTools
        document.addEventListener("keydown", function(e) {
            if (e.key === "F12" || (e.ctrlKey && e.shiftKey && e.key === "I")) {
                e.preventDefault();
            }
        });

        $("#body").css("overflow", "hidden");

        Loadr = new(function Loadr(id) {
            const max_size = 24;
            const max_particles = 1500;
            const min_vel = 20;
            const max_generation_per_frame = 10;

            var canvas = document.getElementById(id);
            var ctx = canvas.getContext('2d');
            var height = canvas.height;
            var center_y = height / 2;
            var width = canvas.width;
            var center_x = width / 2;
            var animate = true;
            var particles = [];
            var last = Date.now(),
                now = 0;
            var died = 0,
                len = 0,
                dt;

            function isInsideHeart(x, y) {
                x = ((x - center_x) / (center_x)) * 3;
                y = ((y - center_y) / (center_y)) * -3;
                var x2 = x * x;
                var y2 = y * y;
                return (Math.pow((x2 + y2 - 1), 3) - (x2 * (y2 * y)) < 0);
            }

            function random(size, freq) {
                var val = 0;
                var iter = freq;
                do {
                    size /= iter;
                    iter += freq;
                    val += size * Math.random();
                } while (size >= 1);
                return val;
            }

            function Particle() {
                var x = center_x;
                var y = center_y;
                var size = ~~random(max_size, 2.4);
                var x_vel = ((max_size + min_vel) - size) / 2 - (Math.random() * ((max_size + min_vel) - size));
                var y_vel = ((max_size + min_vel) - size) / 2 - (Math.random() * ((max_size + min_vel) - size));
                var nx = x;
                var ny = y;
                var r, g, b, a = 0.05 * size;
                this.draw = function() {
                    r = ~~(255 * (x / width));
                    g = ~~(255 * (1 - (y / height)));
                    b = ~~(255 - r);
                    ctx.fillStyle = 'rgba(' + r + ',' + g + ',' + b + ',' + a + ')';
                    ctx.beginPath();
                    ctx.arc(x, y, size, 0, Math.PI * 2, true);
                    ctx.closePath();
                    ctx.fill();
                }
                this.move = function(dt) {
                    nx += x_vel * dt;
                    ny += y_vel * dt;
                    if (!isInsideHeart(nx, ny)) {
                        if (!isInsideHeart(nx, y)) {
                            x_vel *= -1;
                            return;
                        }
                        if (!isInsideHeart(x, ny)) {
                            y_vel *= -1;
                            return;
                        }
                        x_vel = -1 * y_vel;
                        y_vel = -1 * x_vel;
                        return;
                    }
                    x = nx;
                    y = ny;
                }
            }

            function movementTick() {
                var len = particles.length;
                var dead = max_particles - len;
                for (var i = 0; i < dead && i < max_generation_per_frame; i++) {
                    particles.push(new Particle());
                }

                now = Date.now();
                dt = last - now;
                dt /= 1000;
                last = now;
                particles.forEach(function(p) {
                    p.move(dt);
                });
            }

            function tick() {
                ctx.clearRect(0, 0, width, height);
                particles.forEach(function(p) {
                    p.draw();
                });
                requestAnimationFrame(tick);
            }
            setInterval(movementTick, 16);
            tick();
        })("loader");

        let data = @json($data);
        var tanggalResepsi = data['setting_resepsi_api']['tanggal'].split("/");
        var tanggalFormatted = tanggalResepsi[2] + "-" + tanggalResepsi[1] + "-" + tanggalResepsi[0];
        var date = new Date(`${tanggalFormatted} ${data['setting_resepsi_api']['waktu_mulai']}`);
        var now = new Date();
        const imageUrl = '{{ asset('storage/images') }}';
        const imagePublic = '{{ asset('/images') }}';
        const imageDefault = '{{ asset('/images/photo-blank.png') }}';
        const tema = data['name'] === 'demo' ? '{{ request()->query('tema') }}' : data['tema_api'] === null ? 'basic' : data['tema_api']['tema'];
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

        function handleRenderingComplete() {
            $('#loading-screen').fadeOut('slow', function() {
                $('#content-undangan').removeClass('hidden');
                $(this).remove();
            });
        }

        var assetsImages = [
            "{{ asset('images/bg/bg-brown-mobile.webp') }}",
            "{{ asset('images/bg/bg-2-brown.webp') }}",
            "{{ asset('images/bg/bg-3-brown.webp') }}",
            "{{ asset('images/bg/bg-4-brown.webp') }}",
        ];

        pushImageAssets();

        function pushImageAssets() {
            if (data['image_gallery'].length > 0) {
                $.each(data['image_gallery'], function(index, value) {
                    assetsImages.push(`{{ asset('/storage/images') }}/${value}`);
                });
            }
        }

        function preloadAssets(callback) {
            var images = assetsImages;
            var fonts = ['/public/fonts/Masthina.otf'];
            var audioUrls = [`{{ asset('audios') }}/${data['music_background_api']['music']}`];

            var totalAssets = images.length + audioUrls.length + fonts.length;
            var loadedAssets = 0;

            function assetLoaded() {
                loadedAssets++;
                if (loadedAssets === totalAssets) {
                    callback();
                }
            }

            images.forEach(function(imageUrl) {
                var img = new Image();
                img.onload = assetLoaded;
                img.src = imageUrl;
            });

            audioUrls.forEach(function(audioUrl) {
                var audio = new Audio();
                audio.addEventListener('canplaythrough', assetLoaded, false);
                audio.src = audioUrl;
            });

            fonts.forEach(function(fontUrl) {
                var font = new FontFaceObserver('Masthina');
                font.load().then(assetLoaded);
            });
        }

        preloadAssets(function() {
            handleRenderingComplete();
        });

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
