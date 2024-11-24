<nav class="mx-[50px] h-[50px] flex flex-1 justify-end">
    @auth
        <a
            href="{{ url('/dashboard') }}"
            class="hover:border-b-2 hover:border-primary px-3 py-2 text-primary ring-1 ring-transparent transition hover:text-primary-dark focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
            Dashboard
        </a>
    @else
        <a
            href="{{ route('login') }}"
            class="hover:border-b-2 hover:border-primary px-3 font-black py-2 text-xl text-primary  ring-1 ring-transparent transition hover:text-primary-dark  focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
            Log in
        </a>

        @if (Route::has('register'))
            <a
                href="{{ route('register') }}"
                class="hover:border-b-2 hover:border-primary font-black px-3 py-2 text-xl text-primary ring-1 ring-transparent transition hover:text-primary-dark  focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
            >
                Register
            </a>
        @endif
    @endauth
</nav>
