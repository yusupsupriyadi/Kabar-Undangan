@extends('layouts.blog')

@section('content')
    <main class="px-5 md:container md:px-0">
        <section class="md:grid md:grid-cols-4">
            <div class="pt-8 md:col-span-3 md:px-20 md:pt-10">
                <div class="breadcrumbs text-sm">
                    <ul>
                        <li><a class="text-blue-500" href="/">Home</a></li>
                        <li><a class="text-blue-500" href="/blog">Blog</a></li>
                        <li><a class="text-blue-500" href="/Tips">Tips</a></li>
                        <li>
                            <div class="text-blue-500">Tutorial</div>
                        </li>
                    </ul>
                </div>
                <h1 class="mt-2 text-2xl font-semibold md:text-3xl">Mengelola Keuangan Untuk Pernikahan</h1>
                <small class="text-gray-500">Oktober 31, 2021 2 komentar</small>

                <img src="https://source.unsplash.com/random" alt="" class="mt-5 rounded-2xl shadow-xl md:rounded-3xl">

                <p class="mt-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad veniam ducimus harum excepturi, veritatis ex incidunt pariatur qui nisi officia vitae voluptas expedita repellat illum suscipit rem tempore quibusdam. Ad nemo libero numquam cumque sapiente officiis. Tempora ducimus repellat qui nobis et facere. Cupiditate dolorem nesciunt magnam similique, recusandae eos aperiam neque perferendis quaerat quod repellat quidem excepturi cum aliquid molestias amet, ullam quos? Soluta, cumque. Repellat numquam reprehenderit dolorem iste deleniti illo, debitis quisquam cumque officiis delectus ea dolorum illum nobis suscipit minima consequuntur, facere obcaecati consectetur magnam alias! Numquam, illo? Cupiditate nemo et quaerat illo ab sint deserunt?</p>
            </div>
            <div class="sticky hidden border-l border-gray-300 md:col-span-1 md:block">
                <div class="fixed px-10 pt-10" id="sidebar">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio nesciunt vero nam consequuntur modi eos, veniam nihil suscipit reprehenderit nemo aliquam pariatur qui magni numquam sunt fugit eaque. Pariatur, dicta?
                </div>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
    <script>
        window.addEventListener('scroll', () => {
            const scrollValue = window.scrollY;
            if (scrollValue === 0) {
                document.getElementById('sidebar').classList.add('pt-10');
            } else {
                document.getElementById('sidebar').classList.remove('pt-10');
            }
        });
    </script>
@endpush
