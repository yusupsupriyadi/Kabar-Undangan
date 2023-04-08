@extends('layouts.undangan')
@section('title')
    {{ $data['mempelai_pria_api']['nama_panggilan'] }} dan {{ $data['mempelai_wanita_api']['nama_panggilan'] }} | Undangan Pernikahan Online
@endsection

@section('styles')
@endsection

@section('content')
    @include('undangan.template.basic')

    @if ($data['vip'] === true)
        <audio id="music-background" loop src="{{ asset('/audios' . '/' . $data['music_background_api']['music']) }}"></audio>
    @endif

    @include('undangan._modal')
    <x-toast-alert id="toast-loading" type="loading" message="Sedang proses" />
    <x-toast-alert id="toast-validate" type="failed" message="Periksa kembali yang wajib diisi." />
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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        let data = @json($data);
        var tanggalResepsi = data['setting_akad_api']['tanggal'].split("/");
        var tanggalFormatted = tanggalResepsi[2] + "-" + tanggalResepsi[1] + "-" + tanggalResepsi[0];
        var date = new Date(`${tanggalFormatted} ${data['setting_akad_api']['waktu_mulai']}`);
        var now = new Date();
        const imageUrl = '{{ asset("storage/images") }}/'
        const imagePublic = '{{ asset("/images") }}/'

        $("#body").css("overflow", "hidden");

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
            var reader = new FileReader();
            reader.readAsDataURL(e.target.files[0]);
            reader.onload = function(){
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
                setTimeout(function(){
                    $(`.copy-${key}`).hide('past')
                }, 2000)
            });
        });
        
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
            if(data['vip'] === true ){
                audio.play();
            }

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

        $(document).on('click', '.btn-send', function(){
            validateForm();
        })

        function validateForm(){
            $('#nama').val() == '' ? $('#nama-validation').show() : $('#nama-validation').hide();
            $('#pesan').val() == '' ? $('#pesan-validation').show() : $('#pesan-validation').hide();

            if ($('#nama').val() != '' && $('#pesan').val() != '') {
                sendPesan();
            }else{
                $('#toast-validate').fadeIn('past')
                setTimeout(function(){
                    $('#toast-validate').fadeOut('past')
                }, 5000)
            }
        }

        function sendPesan(){
            const imageFile = document.getElementById('image-file');
            var myformData = new FormData();
            myformData.append('nama', $('#nama').val());
            myformData.append('instagram', $('#instagram').val());
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
                error: function(error) {
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        }

    </script>
@endpush
