@extends('layouts.master')

@section('content')
    @include('components.navbar')
    <main class="hero min-h-screen bg-base-200">
        <div class="hero-content block">
            <section class="mb-10 mt-10 flex justify-center">
                <ul class="steps">
                    <li id="st-1" class="step step-primary text-primary/50">Daftar Akun</li>
                    <li id="st-2" class="step step-primary text-gray-700">Info Mempelai</li>
                    <li id="st-3" class="step text-gray-400">Atur Acara</li>
                    <li id="st-4" class="step text-gray-400">Receive Product</li>
                </ul>
            </section>

            <section id="step-2">
                @include('auth.register_step._step_2')
            </section>
        </div>
    </main>

    <x-toast-alert id="toast-success" type="success" message="Berhasil." />
@endsection

@push('scripts')
    <script type="module">
        localStorage.clear();

        $(document).on('click', '#handlePostDataCouple', function (){
            $.ajax({
                url: `/data-couple`,
                type: 'GET',
                dataType: 'json',
                data: {
                    
                },
                beforeSend: function() {
                    $('#').html('Loading...').addClass('opacity-50 cursor-not-allowed');
                },
                error: function(error) {
                    $('#').html('Coba lagi').removeClass('opacity-50 cursor-not-allowed').addClass('bg-red-500');
                },
                success: function(response) {
                    $('#toast-success').removeClass('hidden');
                    $('#').html('Lanjutkan').removeClass('opacity-50 cursor-not-allowed');
                    setTimeout(() => {
                       $('#toast-success').addClass('hidden') 
                    }, 3000);
                    $('#st-2').removeClass('font-bold')
                    $('#st-3').addClass('step-primary text-gray-700').removeClass('text-gray-400')
                    $('#step-2').addClass('hidden');
                    $('#step-3').removeClass('hidden');
                }
            });
        })
</script>
@endpush
