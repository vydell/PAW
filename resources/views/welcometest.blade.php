<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginForm extends Component
{
    public $email, $password;

    protected $rules = [
        'email' => 'required|email|exists:users,email',
        'password' => 'required|string',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();
            return redirect()->route('dashboard'); // Redirect to the dashboard after successful login
        }

        // If authentication fails
        session()->flash('error', 'Invalid login credentials');
    }

    public function render()
    {
        return view('livewire.forms.login-form');
    }
}

?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-sans">
    <div
        class="my-44 p-[100px_100px] w-[35vw] mx-auto bg-white rounded-lg shadow-xl shadow-[#D25277]/25 text-black/50 dark:bg-black dark:text-white/50">
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form wire:submit="login">
            <img src="{{ asset('images/logo.png') }}" alt="Logo TagIT" class="mb-[50px] w-[320px] block mx-auto">
            <div class="mb-5">
                <input type="text" placeholder="username" id="username" wire:model="form.email"
                    class="pl-5 bg-gray-100 border border-transparent text-gray-800 placeholder-[#CA6D95] text-lg rounded-full focus:ring-pink-500 focus:border-pink-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required />
            </div>
            <div class="mb-5">
                <input type="password" placeholder="password" id="password" wire:model="form.password"
                    class="pl-5 bg-gray-100 border border-transparent text-gray-800 placeholder-[#CA6D95] text-lg rounded-full focus:ring-pink-500 focus:border-pink-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required />
            </div>
            <div class="w-full">
                @if (Route::has('password.request'))
                    <a class="pl-[10px] underline text-sm text-[#43BCB2] dark:text-gray-400 hover:text-[#279296] dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('password.request') }}" wire:navigate>
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                <button type="submit"
                    class="mt-12 mx-auto block text-white bg-[#DD728E] hover:bg-[#D25277] focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-xl font-black w-[300px] px-5 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>
    </div>

    <footer class="py-16 bg-[#FFD5D5] text-left">
        <p class="mx-[40px] text-gray-800 dark:text-blue">Copyright @ 2024 TagIT. All rights reserved</p>
    </footer>
</body>

</html>
