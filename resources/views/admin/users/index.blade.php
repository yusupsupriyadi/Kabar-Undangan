@extends('layouts.admin')

@section('content')
    <main>
        <div class="form-control w-full max-w-xs">
            <label class="label">
                <span class="label-text"><span class="font-bold">Cari: </span> nama/email/telp</span>
            </label>
            <input type="text" id="search-email" placeholder="Type here" class="input-bordered input w-full max-w-xs" />
        </div>
        <div class="overflow-x-auto mt-2">
            <table class="table w-full shadow-lg">
                <thead>
                    <tr>
                        <th class="!bg-sky-200"></th>
                        <th class="!bg-sky-200">Name</th>
                        <th class="!bg-sky-200">No.Telp</th>
                        <th class="!bg-sky-200">Email</th>
                        <th class="!bg-sky-200">PREMIUM</th>
                    </tr>
                </thead>
                <tbody id="data-body">
                </tbody>
            </table>
        </div>
    </main>

    <x-toast-alert id="toast-success" type="success" message="Berhasil mengupdate" />
    <x-toast-alert id="toast-success-delete" type="success" message="Berhasil menghapus" />
    <x-toast-alert id="toast-failed" type="failed" message="Gagal mengupdate" />
    <x-toast-alert id="toast-failed-delete" type="failed" message="Gagal menghapus" />
    <x-toast-alert id="toast-loading" type="loading" message="Sedang memproses" />
    <x-toast-alert id="toast-validate" type="failed" message="Periksa kembali yang wajib diisi." />
@endsection

@push('scripts')
    <script type="module">
        $('#users-link').addClass('drawer-item-active');

        $(document).ready(function() {
            $('#open-drawer').click(function() {
                $('.drawer-button').click()
            });
        });

        getData()
        function getData() {
            $.ajax({
                url: "{{ route('admin.get-users') }}",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    renderDataUser(data)
                }
            });
        }

        function renderDataUser(data) {
            let html = ''
            data.forEach((item, index) => {
                html += `
                    <tr class="hover">
                        <th>${index + 1}</th>
                        <td>${item.name}</td>
                        <td>${item.phone}</td>
                        <td>${item.email}</td>
                        <td>
                            <input type="checkbox" class="toggle toggle-success !bg-none btn-premium" data-id="${item.id}" ${parseInt(item.vip) === 1 ? 'checked' : ''} />
                        </td>
                    </tr>
                `
            })
            $('#data-body').html(html)
        }

        $(document).on('click', '.btn-premium', function() {
            let id = $(this).data('id')
            let status = $(this).is(':checked') ? 1 : 0
            $.ajax({
                url: "{{ route('admin.update-user') }}",
                type: "POST",
                data: {
                    id: id,
                    status: status
                },
                dataType: "json",
                berforeSend: function() {
                    $('#toast-loading').fadeIn('past')
                },
                success: function(data) {
                    $('#toast-loading').fadeOut('past')
                    if (data.status === 'success') {
                        $('#toast-success').fadeIn('past')
                        setTimeout(() => {
                            $('#toast-success').fadeOut('past')
                        }, 2000);
                        getData()
                    } else {
                        $('#toast-failed').fadeIn('past')
                        setTimeout(() => {
                            $('#toast-failed').fadeOut('past')
                        }, 2000);
                    }
                }
            });
        })

        $('#search-email').on('keyup', function() {
            let value = $(this).val().toLowerCase()
            $('#data-body tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            })
        })
    </script>
@endpush
