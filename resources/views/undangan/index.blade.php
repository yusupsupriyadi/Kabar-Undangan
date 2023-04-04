@extends('layouts.undangan')
@section('title')
    {{ $data['mempelai_pria_api']['nama_panggilan'] }} dan {{ $data['mempelai_wanita_api']['nama_panggilan'] }} | Undangan Pernikahan Online
@endsection

@section('styles')
@endsection

@section('content')
    
    @include('undangan.template.basic')

    <audio id="music-background" src="{{ asset('/audios/My Heart Will Go On - Sexaphone.mp3') }}"></audio>

    @include('undangan._modal')
@endsection

@push('scripts')
    <script>
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
                    "value": "#332216"
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
    </script>
    <script type="module">
        var date = new Date('2023-04-25 08:00');
        var now = new Date();

        $("#body").css("overflow", "hidden");
        
        // Memperbarui countdown setiap detik
        var timer = setInterval(function() {
            // Mengambil tanggal saat ini
            var now = new Date();
            // Menghitung selisih waktu dalam milidetik
            var timeDiff = date.getTime() - now.getTime();
            // Menghentikan countdown jika waktu sudah habis
            if (timeDiff <= 0) {
                clearInterval(timer);
                $('#countdown').hide();
                $('#countdown-done').show();
                return;
            }
            // Mengonversi milidetik menjadi detik, menit, jam, dan hari
            var seconds = Math.floor(timeDiff / 1000);
            var minutes = Math.floor(seconds / 60);
            var hours = Math.floor(minutes / 60);
            var days = Math.floor(hours / 24);

            // Menghitung sisa jam, menit, dan detik
            var remainingHours = hours % 24;
            var remainingMinutes = minutes % 60;
            var remainingSeconds = seconds % 60;

            $('#countdown').show();
            $('#countdown-done').hide();
            // Menampilkan hasil countdown
            $('#day').html(days);
            $('#hour').html(remainingHours);
            $('#minute').html(remainingMinutes);
            $('#second').html(remainingSeconds);

            // countdown.innerHTML = "Countdown: " + days + " hari, " + remainingHours + " jam, " + remainingMinutes + " menit, " + remainingSeconds + " detik";
        }, 1000);
        
        $(document).on('click', '.btn-open-modal', function(){
            $('#modal-hadiah').addClass('modal-open');
        })

        $(document).on('click', '.btn-close-modal', function(){
            $('#modal-hadiah').removeClass('modal-open');
        })        

        $(document).on('change', '#toggle-music', function(){
            var audio = $('#music-background')[0];
            if (audio.paused) {
                audio.play();
            } else {
                audio.pause();
            }
        })

        $(document).on('click', '#open-undangan', function(){
            $('#opening').hide('slow')
            $("#body").css("overflow", "auto");
            var audio = $('#music-background')[0];
            audio.play();

            var elem = document.documentElement;
            if (elem.requestFullscreen) {
            elem.requestFullscreen();
            } else if (elem.mozRequestFullScreen) { /* Firefox */
            elem.mozRequestFullScreen();
            } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
            elem.webkitRequestFullscreen();
            } else if (elem.msRequestFullscreen) { /* IE/Edge */
            elem.msRequestFullscreen();
            }

        })
    </script>
@endpush
