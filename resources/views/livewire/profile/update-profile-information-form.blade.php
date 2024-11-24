<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

new class extends Component
{
    public string $name = '';
    public string $email = '';
    public ?string $nim = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->nim = Auth::user()->nim;
        $this->cv = Auth::user()->nim;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'nim' => ['required', 'string', 'max:15'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function sendVerification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}; ?>


<section>
    <header class="flex flex-col items-center justify-center mx-auto">
        <h2 class="text-3xl text-secondary-dark font-black text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        {{-- <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p> --}}
    </header>

    <form wire:submit="updateProfileInformation" class="w-full mt-6 space-y-10">
        <div>
            <x-input-label for="name" :value="__('Name')" class="flex flex-col items-center justify-center mx-auto"/>
            <x-text-input wire:model="name" id="name" name="name" type="text" class="mt-1 block w-full text-center" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" class="flex flex-col items-center justify-center mx-auto"/>
            <x-text-input wire:model="email" id="email" name="email" type="email" class="mt-1 block w-full text-center" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button wire:click.prevent="sendVerification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="nim" :value="__('NIM')" class="flex flex-col items-center justify-center mx-auto"/>
            <x-text-input wire:model="nim" id="nim" name="nim" type="text" class="mt-1 block w-full text-center" required autocomplete="nim" />
            <x-input-error class="mt-2" :messages="$errors->get('nim')" />
        </div>

        <div>
            <x-input-label for="cv" :value="__('Curriculum Vitae')" class="flex flex-col items-center justify-center mx-auto"/>
            <input wire:model="cv" id="cv" name="cv" type="file" class="block mx-auto border border-gray-300 rounded-sm"
            autocomplete="cv">
            <x-input-error class="mt-2" :messages="$errors->get('cv')" />
        </div>

        <div class="text-center gap-4 h-[50%]">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-action-message class="fixed bottom-8 left-[15%] right-0 mx-auto max-w-[150px] py-1 text-center text-white text-xl bg-secondary bg-opacity-90 backdrop-blur-md rounded-full z-50" on="profile-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section>
