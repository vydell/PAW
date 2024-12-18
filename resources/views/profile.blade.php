<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-[5%] flex flex-col items-center" x-data="{ activeTab: 'update-profile' }">
        <!-- Tabs Navigation -->
        <div class="w-[50%] mx-auto mb-16 bg-white">
            <div class="flex rounded-full">
                <!-- Update Profile Button -->
                <button @click="activeTab = 'update-profile'"
                    class="flex-1 px-4 py-3 rounded-l-full border-2
                    transition-all duration-300 "
                    :class="activeTab === 'update-profile' ? ' text-secondary border-secondary' :
                        ' border-inactive text-inactive-dark'">
                    Profile
                </button>
                <!-- Update Password Button -->
                <button @click="activeTab = 'update-password'"
                    class="flex-1 px-4 py-3 border-y-2
                    transition-all duration-300"
                    :class="activeTab === 'update-password' ? 'border-2 text-secondary border-secondary' :
                        ' border-inactive text-inactive-dark'">
                    Update Password
                </button>
                <!-- Delete Account Button -->
                <button @click="activeTab = 'delete-user'"
                    class="flex-1 px-4 py-3 rounded-r-full border-2
                    transition-all duration-300 "
                    :class="activeTab === 'delete-user' ? 'text-secondary border-secondary' :
                        ' border-inactive text-inactive-dark'">
                    QR-code
                </button>
            </div>

        </div>

        <div class="max-w-[55%] mx-auto sm:px-6 lg:px-8 pb-10" style="width: 100%; overflow-x: hidden;">
            <!-- Update Profile Form -->
            <div class="border-2 border-[#f5d7d7] flex flex-col items-center mx-auto py-20 bg-white dark:bg-gray-800 shadow-xl shadow-[#BF8181]/25 rounded-xl"
            x-show="activeTab === 'update-profile'" x-cloak>
                <livewire:profile.update-profile-information-form />
            </div>

            <!-- Update Password Form -->
            <div class="border-2 border-[#f5d7d7] flex flex-col items-center mx-auto py-20 bg-white dark:bg-gray-800 shadow-xl shadow-[#BF8181]/25 rounded-xl"
            x-show="activeTab === 'update-password'" x-cloak>
                <livewire:profile.update-password-form />
            </div>

            <!-- QR Code Tab -->
            <div class="border-2 border-[#f5d7d7] flex flex-col items-center mx-auto py-20 bg-white dark:bg-gray-800 shadow-xl shadow-[#BF8181]/25 rounded-xl"
            x-show="activeTab === 'delete-user'" x-cloak>
                <livewire:profile.qr-code />
            </div>
        </div>


    </div>
</x-app-layout>
