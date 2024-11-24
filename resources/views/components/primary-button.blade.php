<button {{ $attributes->merge(['type' => 'submit', 'class' => 'mt-12 mx-auto block text-white bg-[#DD728E] hover:bg-[#D25277] focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-xl font-black w-[300px] px-5 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800']) }}>
    {{ $slot }}
</button>
