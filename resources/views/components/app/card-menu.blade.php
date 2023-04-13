<div id="{{ $id }}" class="{{ $paint }} block w-auto rounded-lg border-2 border-b-4 border-black p-2 cursor-pointer active:scale-100 active:duration-75 hover:scale-110 duration-700 transform">
    @if ($paint === 'indicator')
        <span class="indicator-item scale-75 -translate-y-[1.2rem]  md:scale-100 translate-x-1/4 rounded-tr-lg rounded-br-lg rounded-tl-lg border-2 border-black bg-yellow-500 py-1 px-2 text-xs font-bold text-black">PREMIUM</span>
    @endif
    <div class="flex justify-center">
        {{ $icon }}
    </div>
    <div>
        {{ $slot }}
    </div>
</div>
