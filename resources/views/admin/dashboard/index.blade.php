@extends('layouts.admin')

@section('content')
    <main>
        <h1 class="text-2xl font-semibold text-gray-300">COMING SOON</h1>
    </main>

    <x-toast-alert id="toast-success" type="success" message="Berhasil menyimpan cerita" />
    <x-toast-alert id="toast-success-delete" type="success" message="Berhasil menghapus cerita" />
    <x-toast-alert id="toast-failed" type="failed" message="Gagal menyimpan cerita" />
    <x-toast-alert id="toast-failed-delete" type="failed" message="Gagal menghapus cerita" />
    <x-toast-alert id="toast-loading" type="loading" message="Sedang memproses" />
    <x-toast-alert id="toast-validate" type="failed" message="Periksa kembali yang wajib diisi." />
@endsection

@push('scripts')
    <script>
        $('#dashboard-link').addClass('drawer-item-active');
        $(document).ready(function() {
            $('#open-drawer').click(function() {
                $('.drawer-button').click()
            });
        });
    </script>
@endpush
