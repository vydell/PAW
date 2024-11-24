<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="login">
        <!-- Email Address -->
        <div>
            <x-text-input wire:model="form.email" id="email"
            type="email" name="email" placeholder="email@student.ub.ac.id" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-text-input wire:model="form.password" id="password"
            type="password" name="password" placeholder="password" autocomplete="current-password" />
            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember" class="inline-flex items-center">
                <input wire:model="form.remember" id="remember" type="checkbox"
                class="ml-4 rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-[#43BCB2] shadow-sm focus:ring-[#43BCB2] dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="mt-5 flex flex-col items-center">
            <button
            class="mt-12 mx-auto block text-white bg-[#DD728E] hover:bg-[#D25277] focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-xl font-black w-[300px] px-5 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                {{ __('Log in') }}
            </button>


            @if (Route::has('password.request'))
                <a class="mt-20 underline text-sm text-secondary-dark dark:text-gray-400 hover:text-secondary dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('password.request') }}" wire:navigate>
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>
    </form>
</div>


{{-- <div class="antialiased font-sans">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="login" >
        <!-- Email Address -->
        <div>
            <x-input-label wire:model for="email" :value="__('Email')" />
            <x-text-input id="email"
            class="pl-5 bg-gray-100 border border-transparent text-gray-800 placeholder-[#CA6D95] text-lg rounded-full focus:ring-pink-500 focus:border-pink-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            type="email" name="email" placeholder="email@student.ub.ac.id" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label wire:model for="password" :value="__('Password')" />
            <x-text-input id="password"
            class="pl-5 bg-gray-100 border border-transparent text-gray-800 placeholder-[#CA6D95] text-lg rounded-full focus:ring-pink-500 focus:border-pink-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="password"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember" class="inline-flex items-center">
                <input wire:model="form.remember" id="remember" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-[#43BCB2] shadow-sm focus:ring-[#43BCB2] dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="mt-5 flex flex-col items-center">
            @if (Route::has('password.request'))
                <a class="mb-5 underline text-sm text-secondary-dark dark:text-gray-400 hover:text-secondary dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}" wire:navigate>
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button
            class="mt-12 mx-auto block text-white bg-[#DD728E] hover:bg-[#D25277] focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-xl font-black w-[300px] px-5 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</div>
 --}}
