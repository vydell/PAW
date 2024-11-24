<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-[5%]" x-data="{ activeTab: 'update-profile' }">
        <!-- Tabs Navigation -->
        <div class="max-w-[50%] mx-auto mb-16 bg-white">

            <div class="flex rounded-full">
                <!-- Update Profile Button -->
                <button @click="activeTab = 'update-profile'"
                    class="flex-1 px-4 py-3 rounded-l-full border-2
                    transition-all duration-300 "
                    :class="activeTab === 'update-profile' ? ' text-secondary border-secondary' : ' border-inactive text-inactive-dark'">
                    Profile
                </button>
                <!-- Update Password Button -->
                <button @click="activeTab = 'update-password'"
                    class="flex-1 px-4 py-2 border-y-2
                    transition-all duration-300"
                    :class="activeTab === 'update-password' ? 'border-2 text-secondary border-secondary' : ' border-inactive text-inactive-dark'">
                    Update Password
                </button>
                <!-- Delete Account Button -->
                <button @click="activeTab = 'delete-user'"
                    class="flex-1 px-4 py-2 rounded-r-full border-2
                    transition-all duration-300 "
                    :class="activeTab === 'delete-user' ? 'text-secondary border-secondary' : ' border-inactive text-inactive-dark'">
                    QR-code
                </button>
            </div>

        </div>

        <!-- Tab Content -->
        <div class="max-w-[55%] mx-auto sm:px-6 lg:px-8">
            <!-- Update Profile Form -->
            <div class="border-2 border-[#f5d7d7] flex flex-col items-center mx-auto px-20 py-20 bg-white dark:bg-gray-800 shadow-xl shadow-[#BF8181]/25 rounded-xl"
                x-show="activeTab === 'update-profile'">
                <div class="min-w-[80%]">
                    <livewire:profile.update-profile-information-form />
                </div>
            </div>

            <!-- Update Password Form -->
            <div class="h-[650px] flex flex-col items-center mx-auto p-20 bg-white dark:bg-gray-800 shadow-lg rounded-xl border-5 border-primary"
                x-show="activeTab === 'update-password'">
                <div class="max-w-xl">
                    <livewire:profile.update-password-form />
                </div>
            </div>

            <!-- Delete Account Form -->
            <div class="h-[650px] flex flex-col items-center mx-auto p-20 bg-white dark:bg-gray-800 shadow-lg rounded-xl border-5 border-primary"
            x-show="activeTab === 'delete-user'">
                <div class="max-w-xl">
                    <livewire:profile.delete-user-form />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
