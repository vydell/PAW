<x-app-layout>
    {{--
    <div class="m-20 p-6 bg-white shadow-xl dark:bg-gray-800">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Event Details</h1>

        <div class="text-gray-700 dark:text-gray-300">
            <p><strong>Name:</strong> {{ $event->judul }}</p>
            <p><strong>Description:</strong> {{ $event->description }}</p>
            <p><strong>Date:</strong> {{ $event->formatted_date }}</p>
        </div>

        <a href="{{ route('events.index') }}" class="text-blue-500 hover:underline mt-4 inline-block">Back to Events</a>
    </div> --}}
    <!-- content -->
    <div class="main-content">


        <div class="breadcrumb">
            <p>
                <span>Home /</span>
                <span> {{ $event->jenis }} /</span>
                <span> {{ $event->judul }}</span>
            </p>
        </div>

        <div class="event-container">
            <div class="event-image">
                <img src="{{ asset('storage/images/' . $event->image) }}" alt="Event Image"
                                class="object-cover w-full h-full rounded-xl">
            </div>
            <div class="event-details">
                <h2>{{ $event->judul }}</h2>
                <p>{{ $event->formatted_start }} - {{ $event->formatted_end }}</p>
                <div class="status">
                    <span class="status-badge">Offline</span>
                </div>
            </div>
        </div>

        <div class="highlight">
            <h2>Highlight</h2>
            <p class="mt-5">
                @if ($event->deskripsi==null)
                    To be updated.
                @else
                    $event->deskripsi
                @endif</p>
        </div>

        <div class="ticket-card">
            <h2>Ticket</h2>
            <p>1 ticket for 1 person</p>
            <p>{{ $event->formatted_start }} - {{ $event->formatted_end }}</p>
            <div class="badges">
                <div class="badge red">Filkom Students Only</div>
                <div class="badge">Sold: {{ $event->slot_terisi }}/{{ $event->slot }}</div>
                <div class="badge">{{$event->lokasi}}</div>
            </div>
            <div class="button-wrapper">
                <form action="{{ route('events.book', $event->id) }}" method="POST">
                    @csrf
                    <button class="mt-5 px-6 py-2 text-white bg-teal-500 rounded-full cursor-pointer hover:bg-teal-600 disabled:cursor-default disabled:bg-gray-400"
                     type="submit" {{ auth()->user()->events->contains($event->id) ? 'disabled' : '' }}>
                        {{ auth()->user()->events->contains($event->id) ? 'Already Booked' : 'Book Now' }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    /* General Reset */
    * {
        font-family: "Poppins", serif;
    }

    /* MAIN CONTENT */
    .main-content {
        padding: 50px 100px;
    }

    .header-container {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 20px;
    }

    /* Kotak pencarian */
    .search-box {
        display: flex;
        align-items: center;
        gap: 10px;
        justify-content: flex-end;
        border: 1px solid #e1b5b5;
        border-radius: 50px;
        padding: 5px 10px;
        width: 300px;
        background-color: none;
    }

    /* Input pencarian */
    #search-input {
        border: none;
        outline: none;
        flex: 1;
        font-size: 14px;
        color: #4e4e4e;
    }

    /* Tombol pencarian */
    .search-button {
        background: none;
        border: none;
        cursor: pointer;
    }

    .search-button img {
        width: 18px;
        height: 18px;
    }

    .search-button:hover {
        transform: scale(1.05);
    }

    /* Ikon notifikasi */
    .notif-icon {
        position: relative;
        width: 35px;
        height: 35px;
        border: 1px solid #e1b5b5;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    /*
    .notif-icon:hover {
        transform: scale(1.1);
    } */

    /* Gambar notifikasi */
    .notif-icon img {
        width: 20px;
        height: 20px;
    }

    /* Titik notifikasi */
    .notif-dot {
        position: absolute;
        top: 5px;
        right: 5px;
        width: 8px;
        height: 8px;
        background-color: #24a096;
        border-radius: 50%;
        border: 1px solid white;
    }

    .breadcrumb {
        margin-bottom: 15px;
        font-size: 14px;
        color: #828080;
    }

    .breadcrumb span {
        transition: color 0.3s;
        cursor: pointer;
    }

    .breadcrumb span:hover {
        color: #24a096;
        transform: scale(1.1);
    }

    .event-container {
        display: flex;
        background-color: #f4f1f1;
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(97, 97, 97, 0.297);
        height: 300px;
    }

    .event-image {
        width: 50%;
        height: 300px;
        border-radius: 10px 0 0 10px;
    }

    .event-details {
        padding: 20px;
        width: 50%;
        display: flex;
        flex-direction: column;
    }

    .event-details h2 {
        margin: 0;
        margin-bottom: 10px;
        font-size: 20px;
        color: #24a096;
        font-weight: bold;
    }

    .event-details p {
        margin: 0;
        margin-bottom: auto;
        color: #4e4e4e;
        line-height: 1.2;
    }

    .status {
        margin-top: 10px;
    }

    .status span {
        padding: 5px 10px;
        font-size: 12px;
        color: #24a096;
        background-color: #ffffff;
        border: 1px solid #24a096;
        border-radius: 15px;
    }

    .highlight {
        margin-top: 30px;
        margin-bottom: 30px;
        background-color: #ffffff;
        box-shadow: 0 4px 4px #a4e3dd95;
        border-radius: 25px;
        height: auto;
        padding: 20px;
        font-size: 14px;
    }

    .highlight h2 {
        font-size: 20px;
        color: #24a096;
    }

    .highlight p {
        color: #4e4e4e;
    }

    .ticket-card {
        background: #ffffff;
        border-radius: 25px;
        box-shadow: 0 4px 4px #a4e3dd90;
        padding: 20px 30px;
        font-size: 14px;
        height: auto;
    }

    .ticket-card h2 {
        font-size: 20px;
        margin: 0 0 10px;
        color: #24a096;
    }

    .ticket-card p {
        margin: 5px 0;
        color: #4e4e4e;
    }

    .badges {
        display: flex;
        gap: 10px;
        /* Jarak antar badge */
        flex-wrap: wrap;
        /* Supaya badge tidak keluar dari container */
        margin-bottom: 20px;
    }

    .badge {
        display: inline-block;
        margin: 5px 2px;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 12px;
        color: #00a99d;
        background-color: #e6f8f7;
        border: 1px solid #24a096;
    }

    .badge.red {
        color: #d73b67;
        border: 1px solid #d73b67;
        background-color: #ffebee;
    }

    .button-wrapper {
        display: flex;
        justify-content: flex-end;
        /* Membuat tombol rata kanan */
    }

    .book-button {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: 500;
        color: #ffffff;
        background-color: #24a096;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        text-decoration: none;
        width: 150px;
    }

    .book-button:hover {
        background-color: #12cabe;
        transform: scale(1.05);
        color: #f4f4f4;
    }

    footer {
        background: linear-gradient(to right, #ffd5d5, #ffd5d5, #dd728e, #d25277);
        padding: 20px 300px;
        font-size: 14px;
        color: #4e4e4e;
    }

    .footer-content {
        max-width: 1200px;
        margin: 0 auto;
    }
</style>
