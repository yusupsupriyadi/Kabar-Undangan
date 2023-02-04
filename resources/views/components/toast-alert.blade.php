@if ($type === 'success')
    <div class="toast toast-center right-1/4 hidden transform duration-100" id="{{ $id }}">
        <div class="alert alert-success shadow-md rounded-xl p-4">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-5 w-5" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="text-sm font-sans font-bold">{{ $message }}</span>
            </div>
        </div>
    </div>
@else
    <div class="toast toast-center right-1/4 hidden transform duration-100" id="{{ $id }}">
        <div class="alert alert-error shadow-md rounded-xl p-4">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-5 w-5" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="text-sm font-sans font-bold">{{ $message }}</span>
            </div>
        </div>
    </div>
@endif
