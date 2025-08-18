<a {{ $attributes->merge(['class' => 'btn btn-outline-dark inline-flex items-center px-4 py-2 bg-gray-200  border border-gray-800 rounded-md font-semibold text-xs text-gray-800 tracking-widest hover:bg-gray-100 hover:text-gray-800 focus:bg-white  active:bg-gray-300  focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2  transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>
