<button {{ $attributes->merge(['type' => 'submit', 'class' => 'px-6 py-2 text-sm font-medium tracking-wide text-black capitalize transition-colors duration-300 transform bg-gray-100 rounded-lg hover:bg-blue-100 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-50']) }}>
    {{ $slot }}
</button>
