<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline items-center px-4 py-2 bg-white border border-gray-500 rounded-md text-gray-600 hover:bg-gray-800 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
