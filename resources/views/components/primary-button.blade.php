<button {{ $attributes->merge(['type' => 'submit', 'class' => 'flex justify-center py-3 bg-yellow-500/80 inline-flex items-center text-center px-4 text-md font-bold  border border-transparent rounded-xl text-gray-800 tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
