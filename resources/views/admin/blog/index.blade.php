@extends('layouts.admin')

@section('libraries')
    <script src="https://cdn.tiny.cloud/1/cuz29jbmxcvyqe5i6y7burswjzlxay4pmvns4uhtpo6z9tt1/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endsection

@section('content')
    <main>

        <section id="form-article" class="hidden">
            @include('admin.blog.partials.form')
        </section>

        <table id="list-article" class="table w-full shadow-lg">
            <thead>
                <tr>
                    <th class="!bg-sky-200"></th>
                    <th class="!bg-sky-200">Name</th>
                    <th class="!bg-sky-200">No.Telp</th>
                    <th class="!bg-sky-200">Email</th>
                    <th class="!bg-sky-200">Tanggal</th>
                    <th class="!bg-sky-200">PREMIUM</th>
                </tr>
            </thead>
            <tbody id="data-article">
            </tbody>
        </table>

    </main>

    @include('admin.blog.partials.modal')
    <x-toast-alert id="toast-success" type="success" message="Berhasil menyimpan" />
    <x-toast-alert id="toast-success-delete" type="success" message="Berhasil menghapus" />
    <x-toast-alert id="toast-failed" type="failed" message="Gagal menyimpan" />
    <x-toast-alert id="toast-failed-delete" type="failed" message="Gagal menghapus" />
    <x-toast-alert id="toast-loading" type="loading" message="Sedang memproses" />
    <x-toast-alert id="toast-validate" type="failed" message="Periksa kembali yang wajib diisi." />
@endsection

@push('scripts')
    <script>
        $('#blog-link').addClass('drawer-item-active');
        $(document).ready(function() {
            $('#open-drawer').click(function() {
                $('.drawer-button').click()
            });
        });

        tinymce.init({
            selector: '#content-article',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',    
        });

        $('#image-file').on('change', (e) => {
            var reader = new FileReader();
            reader.readAsDataURL(e.target.files[0]);
            reader.onload = function() {
                var output = document.getElementById('output');
                output.src = reader.result;
            }
        })

        $(document).on('click', '.open-modal-form', function() {
            var id = $(this).data('id');
            $('.type-form').html(id);
            $('#modal-form').addClass('modal-open');
        })

        $('.close-modal-form').on('click', function() {
            $('#modal-form').removeClass('modal-open');
        });

        $('#submit-form').on('click', function() {
            var id = $('.type-form').html();
            var value = $('#input-form').val();
            if (value == '') {
                $('#input-validate').show()
                $('#toast-validate').fadeIn('past')
                setTimeout(function() {
                    $('#toast-validate').fadeOut('past')
                }, 3000);
            } else {
                if (id == 'category') {
                    createCategory(value);
                } else {
                    createTag(value);
                }
                $('#input-validate').hide()
                $('#modal-form').removeClass('modal-open');
            }
        });

        $(document).on('click', '#close-form', function() {
            $('#list-article').show();
            $('#form-article').hide();
        })

        $(document).on('click', '#submit-article', function() {
            createArticle();
        })

        function createArticle() {
            tinymce.triggerSave();
            var title = $('#title-article').val();
            var description = $('#description-article').val();
            var content = $('#content-article').val();
            var category = $('#category-article').val();
            const image = $('#image-file').val()
            var tag = []
            $('.checkbox-tag:checked').each(function() {
                // Menambahkan nilai checkbox yang dipilih ke dalam array
                tag.push($(this).val());
            });
            console.log(tag);
            const imageFile = document.getElementById('image-file');
            var myformData = new FormData();
            myformData.append('image', imageFile.files[0]);
            myformData.append('title', title);
            myformData.append('content', content);
            myformData.append('category', category);
            myformData.append('tag', tag);
            myformData.append('description', description);

            $.ajax({
                url: "{{ route('create-article') }}",
                method: 'post',
                processData: false,
                contentType: false,
                cache: false,
                data: myformData,
                enctype: 'multipart/form-data',
                beforeSend: function() {
                    $('#toast-loading').fadeIn('past')
                },
                success: function(response) {
                    $('#toast-loading').fadeOut('past')
                    $('#toast-success').fadeIn('past')
                    setTimeout(function() {
                        $('#toast-success').fadeOut('past')
                    }, 3000);
                    getArticle();
                    $('#list-article').show();
                    $('#form-article').hide();
                },
                error: function(xhr, textStatus, errorThrown) {
                    $('#toast-loading').fadeOut('past')
                    $('#toast-failed').fadeIn('past')
                    setTimeout(function() {
                        $('#toast-failed').fadeOut('past')
                    }, 3000);
                }
            });
        }

        getArticle();

        function getArticle() {
            $.ajax({
                url: "{{ route('get-article') }}",
                method: 'GET',
                success: function(response) {
                    var data = response;
                    var html = '';
                    $.each(data, function(index, value) {
                        html += `<tr class="hover">
                        <th>${index + 1}</th>
                        <td>${item.title}</td>
                    </tr>`;
                    });

                    if (data.length == 0) {
                        html += `<tr><td colspan="6" class="text-center">Data tidak ditemukan</td></tr>`;
                    }

                    html += `<tr><td colspan="6" id="create-article" class="text-blue-600 font-semibold text-center cursor-pointer">Tambah Article</td></tr>`
                    $('#data-article').html(html);
                },
                error: function(xhr, textStatus, errorThrown) {
                    $('#toast-failed').fadeIn('past')
                    setTimeout(function() {
                        $('#toast-failed').fadeOut('past')
                    }, 3000);
                }
            });
        }

        $(document).on('click', '#create-article', function() {
            $('#list-article').hide();
            $('#form-article').show();
        })

        function createCategory() {
            var value = $('#input-form').val();
            $.ajax({
                url: "{{ route('create-category') }}",
                method: 'POST',
                data: {
                    name: value
                },
                success: function(response) {
                    $('#toast-success').fadeIn('past')
                    setTimeout(function() {
                        $('#toast-success').fadeOut('past')
                    }, 3000);
                    getCategory();
                },
                error: function(xhr, textStatus, errorThrown) {
                    $('#toast-failed').fadeIn('past')
                    setTimeout(function() {
                        $('#toast-failed').fadeOut('past')
                    }, 3000);
                }
            });
        }

        function createTag() {
            var value = $('#input-form').val();
            $.ajax({
                url: "{{ route('create-tag') }}",
                method: 'POST',
                data: {
                    name: value
                },
                success: function(response) {
                    $('#toast-success').fadeIn('past')
                    setTimeout(function() {
                        $('#toast-success').fadeOut('past')
                    }, 3000);
                    getTag();
                },
                error: function(xhr, textStatus, errorThrown) {
                    $('#toast-failed').fadeIn('past')
                    setTimeout(function() {
                        $('#toast-failed').fadeOut('past')
                    }, 3000);
                }
            });
        }

        getCategory();

        function getCategory() {
            $.ajax({
                url: "{{ route('get-category') }}",
                method: 'GET',
                success: function(response) {
                    var data = response.data;
                    var html = '';
                    html += `<option disabled selected class="text-gray-300">pilih categories</option>`;
                    $.each(response, function(index, value) {
                        html += `<option value="${value.id}">${value.name}</option>`;
                    });
                    $('.data-category').html(html);
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log(xhr);
                }
            });
        }

        getTag();

        function getTag() {
            $.ajax({
                url: "{{ route('get-tag') }}",
                method: 'GET',
                success: function(response) {
                    var data = response.data;
                    var html = '';
                    $.each(response, function(index, value) {
                        html += `
                        <label class="label block cursor-pointer">
                            <input type="checkbox" value="${value.id}" name="tag" class="checkbox checkbox-tag checkbox-sm" />
                            <span class="text-md label-text pl-2 capitalize">${value.name}</span>
                        </label>
                        `;
                    });
                    html += `
                    <div>
                        <button data-id="tag" class="open-modal-form rounded-full bg-primary-300 p-1 text-xs font-bold text-white duration-300 hover:scale-105 active:scale-95">
                            <svg class="h-5 w-5 text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                        </button>
                    </div>
                    `
                    $('#data-tag').html(html);
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log(xhr);
                }
            });
        }
    </script>
@endpush
