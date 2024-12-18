<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
};
?>
<nav x-data="{ activeRoute: '{{ Route::currentRouteName() }}' }" class="dark:bg-gray-800 dark:border-gray-700 fixed top-32 h-full">
    <div class="flex flex-col text-primary bg-background-dark w-[40%] h-full">
        <div class="w-[80%] mx-auto" wire:permanent>
            <a href="/"
                class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-primary-dark text-decoration-none">
                <x-application-logo></x-application-logo>
            </a>
        </div>

        <div class="flex-grow max-h-[70%] mt-8 space-y-3 text-2xl pr-[30px]">

            <!-- Dashboard Link -->
            <a href="{{ route('dashboard') }}" wire:navigate x-on:click="activeRoute = 'dashboard'"
                class="block cursor-pointer px-12 py-2 rounded-r-full transition-all duration-300 ease-out"
                :class="activeRoute === 'dashboard' ? 'text-white bg-primary' : ''">
                Dashboard
            </a>

            <!-- Events Link -->
            <a href="{{ route('events.index') }}" wire:navigate x-on:click="activeRoute = 'events.index'"
                class="block cursor-pointer px-12 py-2 rounded-r-full transition-all duration-300 ease-out"
                :class="(activeRoute === 'events.index' || activeRoute === 'events.details') ? 'text-white bg-primary' : ''">
                Events
            </a>

            <!-- Profile Link -->
            <a href="{{ route('profile') }}" wire:navigate x-on:click="activeRoute = 'profile'"
                class="block cursor-pointer px-12 py-2 rounded-r-full transition-all duration-300 ease-out"
                :class="activeRoute === 'profile' ? 'text-white bg-primary' : ''">
                Profile
            </a>
        </div>

        <div class="w-fit mt-0">
            <!-- Authentication -->
            <button wire:click="logout"
                class="block cursor-pointer ml-12 py-2 text-2xl text-left rounded w-full mt-auto hover:text-inactive-dark">
                {{ __('Log Out') }}
            </button>
        </div>
    </div>
</nav>
