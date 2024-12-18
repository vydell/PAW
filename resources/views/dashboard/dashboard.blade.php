<x-applayout>
    <div class="p-6">
        <h1 class="my-12 ml-2 text-4xl">Your Bookings</h1>

        @if ($events->isEmpty())
            <p class="text-gray-500">You haven't booked any events yet.</p>
        @else
            @foreach ($events as $event)
                <div class="bg-white shadow-md rounded-lg p-4 mb-4 flex items-center">

                    <div class="flex-none ml-4 mr-12 w-[800px] h-[200px] bg-gray-500 rounded-lg overflow-hidden">
                        <img src="{{ asset('storage/images/' . $event->image) }}" alt="Event Image"
                            class="object-cover w-full h-full">
                    </div>

                    <div class="flex-1 pr-4">
                        <h2 class="text-lg font-bold">{{ $event->judul }}</h2>
                        <p class="text-gray-600">{{ $event->formatted_start }}</p>
                        <p class="text-gray-600">{{ $event->jenis }}</p>
                        <div class="mt-4 flex space-x-4">
                            @if ($event->is_checked_in)
                                <button type="button"
                                    class="px-4 py-2 bg-gray-400 text-white rounded-lg cursor-not-allowed" disabled>
                                    Already Checked In
                                </button>
                            @else
                                <form method="POST" action="{{ route('dashboard.checkin', $event->id) }}">
                                    @csrf
                                    <button type="submit"
                                        class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400">
                                        Mark Presence
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</x-applayout>
