@if ($type === 'success')
    <div class="toast-center toast toast-top right-1/4 top-24 hidden min-w-max max-w-[20px] transform duration-100 md:toast-bottom" id="{{ $id }}">
        <div class="alert alert-success items-center rounded-xl bg-gray-700 p-4 shadow-md">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0 stroke-current text-green-600" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="font-sans text-sm font-bold text-white">{{ $message }}</span>
            </div>
        </div>
    </div>
@elseif($type === 'failed')
    <div class="toast-center toast toast-top right-1/4 top-24 hidden min-w-max max-w-[20px] transform duration-100 md:toast-bottom" id="{{ $id }}">
        <div class="alert alert-error rounded-xl bg-gray-700 p-4 shadow-md">
            <div>
                <svg class="h-6 w-6 text-red-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2" />
                    <line x1="12" y1="8" x2="12" y2="12" />
                    <line x1="12" y1="16" x2="12.01" y2="16" />
                </svg>
                <span class="font-sans text-sm font-bold text-white">{{ $message }}</span>
            </div>
        </div>
    </div>
@elseif($type === 'loading')
    <div class="toast-center toast toast-top right-1/4 top-24 hidden min-w-max max-w-[20px] transform duration-100 md:toast-bottom" id="{{ $id }}">
        <div class="alert alert-error rounded-xl bg-gray-700 p-4 shadow-md">
            <div class="flex items-start justify-start gap-1">
                <div class="lds-ring">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <span class="font-sans text-sm font-bold text-white">{{ $message }}</span>
            </div>
        </div>
    </div>
@endif
