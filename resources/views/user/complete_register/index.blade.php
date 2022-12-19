@extends('layouts.master')

@section('title', 'Complete Register')

@section('content')
    @include('components.navbar')
    <main class="hero mb-10">
        <div class="hero-content block">
            <section class="mb-10 mt-10 flex justify-center">
                <ul class="steps text-sm">
                    <li id="st-1" class="step step-primary text-primary/50">Daftar Akun</li>
                    <li id="st-2" class="step step-primary {{ $dataMempelaiExists === true ? 'text-primary/50' : 'text-gray-700' }}">
                        Info Mempelai</li>
                    <li id="st-3"
                        class="step {{ $dataMempelaiExists === true ? 'step-primary text-gray-700' : 'text-gray-400' }}">
                        Informasi Acara</li>
                    <li id="st-4" class="step text-gray-400">Receive Product</li>
                </ul>
            </section>

            <section id="step-2" class="{{ $dataMempelaiExists === true ? 'hidden' : '' }}">
                @include('user.complete_register.register_step._step_2_data_mempelai')
            </section>

            <section id="step-3" class="{{ $dataMempelaiExists === true ? '' : 'hidden' }}">
                @include('user.complete_register.register_step._step_3_data_acara')
            </section>
        </div>
    </main>

    <x-toast-alert id="toast-success" type="success" message="Berhasil." />
@endsection

@push('scripts')
    <script type="module">
        // Variabel
        localStorage.clear();
        var dataNull = {
            'dataMempelaiPria' : true,
            'dataMempelaiWanita' : true,
        }

        // Feature
        

        // Function
        getDataMempelai()

        function getDataMempelai(){
            $.ajax({
                url: `/route-mempelai/get-data-mempelai`,
                type: 'GET',
                dataType: 'json',
                data: {},
                beforeSend: function() {
                    $('#loading-data-mempelai').removeClass('hidden')
                    $('#form-mempelai').addClass('hidden')
                },
                error: function(error) {

                },
                success: function(response) {
                    $('#loading-data-mempelai').addClass('hidden')
                    $('#form-mempelai').removeClass('hidden')
                    if(response.data.mempelai_pria !== null) {
                        dataNull.dataMempelaiPria = false
                        $('#id-pria').val(response.data.mempelai_pria.id)
                        $('#nama-lengkap-pria').val(response.data.mempelai_pria.nama_lengkap)
                        $('#nama-panggilan-pria').val(response.data.mempelai_pria.nama_panggilan)
                        $('#tanggal-lahir-pria').val(response.data.mempelai_pria.tanggal_lahir)
                        $('#tempat-lahir-pria').val(response.data.mempelai_pria.tempat_lahir)
                        $('#nama-ayah-pria').val(response.data.mempelai_pria.nama_ayah)
                        $('#nama-ibu-pria').val(response.data.mempelai_pria.nama_ibu)
                        $('#instagram-pria').val(response.data.mempelai_pria.instagram === 'null' ? '' : response.data.mempelai_pria.instagram)
                    }
                    
                    if(response.data.mempelai_wanita !== null) {
                        dataNull.dataMempelaiWanita = false
                        $('#id-wanita').val(response.data.mempelai_wanita.id)
                        $('#nama-lengkap-wanita').val(response.data.mempelai_wanita.nama_lengkap)
                        $('#nama-panggilan-wanita').val(response.data.mempelai_wanita.nama_panggilan)
                        $('#tanggal-lahir-wanita').val(response.data.mempelai_wanita.tanggal_lahir)
                        $('#tempat-lahir-wanita').val(response.data.mempelai_wanita.tempat_lahir)
                        $('#nama-ayah-wanita').val(response.data.mempelai_wanita.nama_ayah)
                        $('#nama-ibu-wanita').val(response.data.mempelai_wanita.nama_ibu)
                        $('#instagram-wanita').val(response.data.mempelai_wanita.instagram === 'null' ? '' : response.data.mempelai_wanita.instagram)
                    }

                    if(response.data.mempelai_pria !== null && response.data.mempelai_wanita !== null) {
                        $('#st-2').removeClass('font-bold text-gray-700').addClass('text-primary/50')
                        $('#st-3').addClass('step-primary text-gray-700').removeClass('text-gray-400')
                        $('#step-2').addClass('hidden');
                        $('#step-3').removeClass('hidden');
                    }
                }
            });
        }

        $(document).on('click', '#handleStoreDataMempelai', function (){
            storeDataMempelai()
        })

        function storeDataMempelai (){
            var dataMempelaiPria = {
                id: $('#id-pria').val(),
                nama_lengkap: $('#nama-lengkap-pria').val(),
                nama_panggilan: $('#nama-panggilan-pria').val(),
                tanggal_lahir: $('#tanggal-lahir-pria').val(),
                tempat_lahir: $('#tempat-lahir-pria').val(),
                nama_ayah: $('#nama-ayah-pria').val(),
                nama_ibu: $('#nama-ibu-pria').val(),
                instagram: $('#instagram-pria').val(),
            }

            var dataMempelaiWanita = {
                id: $('#id-wanita').val(),
                nama_lengkap: $('#nama-lengkap-wanita').val(),
                nama_panggilan: $('#nama-panggilan-wanita').val(),
                tanggal_lahir: $('#tanggal-lahir-wanita').val(),
                tempat_lahir: $('#tempat-lahir-wanita').val(),
                nama_ayah: $('#nama-ayah-wanita').val(),
                nama_ibu: $('#nama-ibu-wanita').val(),
                instagram: $('#instagram-wanita').val(),
            }

            $.ajax({
                url: `/route-mempelai/store-data-mempelai`,
                type: 'GET',
                dataType: 'json',
                data: {
                    dataMempelaiPria,
                    dataMempelaiWanita,
                    dataNull,
                },
                beforeSend: function() {
                    $('.btn-handle').html('Loading...').addClass('opacity-50 cursor-not-allowed');
                },
                error: function(error) {
                    $('.btn-handle').html('Coba lagi').removeClass('opacity-50 cursor-not-allowed').addClass('bg-red-500');
                },
                success: function(response) {
                    $('#toast-success').removeClass('hidden');
                    $('.btn-handle').html('Lanjutkan').removeClass('opacity-50 cursor-not-allowed');
                    setTimeout(() => {
                       $('#toast-success').addClass('hidden') 
                    }, 3000);
                    $('#st-2').removeClass('font-bold')
                    $('#st-3').addClass('step-primary text-gray-700').removeClass('text-gray-400')
                    $('#step-2').addClass('hidden');
                    $('#step-3').removeClass('hidden');
                    getDataMempelai()
                }
            });
        }
</script>
@endpush
