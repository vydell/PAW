@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'pl-5 bg-gray-100 border border-transparent text-gray-800 placeholder-[#CA6D95] text-lg rounded-full focus:ring-pink-500 focus:border-pink-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) }}>
