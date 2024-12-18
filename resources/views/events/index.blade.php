<x-app-layout>
    <div class="sticky top-0 z-10 p-10 bg-background bg-opacity-60 backdrop-blur-lg">
        <!-- Filter Section -->
        <form method="GET" action="{{ route('events.index') }}" class="flex items-center space-x-4">
            <!-- Dropdown Filter -->
            <div class="relative w-[20%]">
                <select name="event_filter"
                    class="text-primary-dark p-2 pl-8 pr-4 border border-primary rounded-full w-full">
                    <option value="">Filter type</option>
                    <option value="lomba" {{ request('event_filter') == 'lomba' ? 'selected' : '' }}>Lomba</option>
                    <option value="seminar" {{ request('event_filter') == 'seminar' ? 'selected' : '' }}>Seminar
                    </option>
                    <option value="bootcamp" {{ request('event_filter') == 'bootcamp' ? 'selected' : '' }}>Bootcamp
                    </option>
                    <option value="talkshow" {{ request('event_filter') == 'talkshow' ? 'selected' : '' }}>Talkshow
                    </option>
                </select>
            </div>

            <!-- Apply Filter Button -->
            <button type="submit" class="px-4 py-2 bg-primary text-white rounded-full">
                Apply Filter
            </button>

            <!-- Reset Filter Button -->
            <a href="{{ route('events.index') }}"
                class="px-4 py-2 bg-gray-200 text-gray-600 rounded-full hover:bg-gray-300">
                Reset Filter
            </a>
        </form>
    </div>
    <div class="p-20 pt-0">
        <!-- Events Section -->
        @for ($i = 0; $i < 3; $i++)
            @foreach ($events as $event)
                <a href="{{ route('events.details', $event->id) }}" class="block">
                    <div
                        class="flex items-start my-10 space-x-6 p-10 bg-white rounded-xl cursor-pointer hover:bg-gray-50 transition shadow-lg border-2 border-gray-100">
                        <!-- Event Image -->
                        <div class="img flex-[1.5] bg-gray-500 h-[200px] rounded-lg overflow-hidden">
                            <img src="{{ asset('storage/images/' . $event->image) }}" alt="Event Image"
                                class="object-cover w-full h-full">
                        </div>
                        <!-- Event Details -->
                        <div class="container flex-1">
                            <h1 class="text-4xl font-bold text-font">{{ $event->judul }}</h1>
                        </div>
                        <!-- Event Metadata -->
                        <div class="container flex-1 flex flex-col justify-between text-right h-[200px]">
                            <p class="text-gray-600 uppercase text-xl font-bold">{{ $event->jenis }}</p>
                            <p class="text-gray-600 text-lg">{{ $event->formatted_start }}</p>
                            <div class="slots w-fit mt-auto ml-auto">
                                @php
                                    $slotPercentage = ($event->slot_terisi / $event->slot) * 100;
                                @endphp
                                <p
                                    class="text-xl p-2 rounded-lg text-white font-bold
                                @if ($slotPercentage >= 80) bg-red-400
                                @elseif($slotPercentage >= 50) bg-yellow-400
                                @else bg-secondary @endif">
                                    {{ $event->slot - $event->slot_terisi }} slots
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        @endfor

    </div>
</x-app-layout>
