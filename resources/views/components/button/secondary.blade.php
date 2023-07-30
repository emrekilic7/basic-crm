<button {{ $attributes->merge(['type' => 'submit', 'class' => 'text-gray-500 inline-flex items-center bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 hover:text-gray-900 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-700 dark:text-gray-300 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600']) }}>
    {{ $slot }}
</button>