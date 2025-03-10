<style>
.refresh-icon {
    transition: transform 0.2s ease;
    animation: rotate 2s linear infinite; /* Tambahkan animasi rotasi */
}

.refresh-icon:hover {
    transform: scale(1.1); /* Zoom sedikit saat hover */
}

.grayscale {
    filter: grayscale(100%);
}

.opacity-50 {
    opacity: 0.5; /* Menambahkan transparansi jika diinginkan */
}

@keyframes rotate {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
</style>
<x-app-layout>
    <x-slot name="header">
        <div class="flex mt-20">
            <div class="flex bg-gradient-to-r via-white to-pink-100 min-h-screen">

                <!-- Sidebar Filter (Sticky) -->
              <aside class="w-1/4 bg-white rounded-lg space-y-4 mt-10 sticky pt-10">
    <div class="flex justify-between items-center">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
            </svg>
            <h2 class="text-xl font-semibold text-gray-800 pt-0 pl-2">Filter</h2>
        </div>

        <a href="{{ route('lainya.index') }}" class="flex items-center px-2 py-2">
            <!-- Refresh Icon with animation -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 refresh-icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
            </svg>
        </a>
    </div>

    <div>
        <h3 class="text-lg font-semibold pt-3 text-indigo-700">Konser</h3>
        <ul class="space-y-2">
           <form action="" method="get">
    <li class="pt-2 pb-0">
        <input type="text" placeholder="Cari Dan Temukan Konser" name="search" value="{{ request()->get('search') }}"
            class="w-full px-4 py-2 text-sm border rounded-lg focus:outline-none focus:ring focus:ring-blue-200 bg-gray-200">
    </li>

    <h3 class="text-lg font-semibold text-indigo-700 pt-3">Tanggal</h3>
    <div class="flex space-x-2 mb-3">
        <li class="pt-2 pb-0">
            <input type="date" name="date" value="{{ request()->get('date') }}"
                class="w-5xl px-20 py-2 text-sm border rounded-lg focus:outline-none focus:ring focus:ring-blue-200 bg-gray-200">
        </li>
    </div>
    <h3 class="text-lg font-semibold text-indigo-700 pt-1">Harga</h3>
    <div class="flex space-x-2 mb-3">
        <input type="text" name="min_price" placeholder="Min" value="{{ request()->get('min_price') }}"
            class="flex-1 w-24 pl-2 py-2 text-sm border rounded-lg focus:outline-none focus:ring focus:ring-blue-200 bg-gray-200">
        <input type="text" name="max_price" placeholder="Max" value="{{ request()->get('max_price') }}"
            class="flex-1 w-24 pl-2 py-2 text-sm border rounded-lg focus:outline-none focus:ring focus:ring-blue-200 bg-gray-200">
    </div>

    <div class="mt-3 flex space-x-3">
        <button type="submit" class="py-1 w-full bg-blue-500 text-white rounded hover:bg-blue-600">
            Filter
        </button>
    </div>
</form>

            <div class="max-w-md mx-auto">
                <h2 class="text-lg font-semibold mb-4 text-indigo-700 pt-3">Pilih Kota</h2>
                <div class="space-y-2">
                    <form method="GET" action="{{ route('lainya.index') }}" class="mb-5">
                        <div class="space-y-3">
                            @foreach ($locations->take(5) as $loc) <!-- Show only the first 5 locations -->
                                <label class="flex items-center space-x-3">
                                    <input
                                        type="radio"
                                        name="city"
                                        value="{{ $loc->location }}"
                                        class="hidden peer"
                                        {{ request('city') == $loc->location ? 'checked' : '' }}
                                        onchange="this.form.submit()" <!-- Add onchange event -->

                                    <div class="w-5 h-5 border-2 border-gray-300 rounded-full peer-checked:border-blue-500 peer-checked:bg-blue-500"></div>
                                    <span class="font-bold peer-checked:text-blue-500">{{ $loc->location }}</span>
                                </label>
                            @endforeach
                        </div>

                        <!-- Hidden section for additional locations -->
                        <div id="more-locations" class="hidden space-y-3 mt-2"> <!-- Hidden initially -->
                            @foreach ($locations->skip(5) as $loc) <!-- Show locations after the first 5 -->
                                <label class="flex items-center space-x-3">
                                    <input
                                        type="radio"
                                        name="city"
                                        value="{{ $loc->location }}"
                                        class="hidden peer"
                                        {{ request('city') == $loc->location ? 'checked' : '' }}
                                        onchange="this.form.submit()" <!-- Add onchange event -->

                                    <div class="w-5 h-5 border-2 border-gray-300 rounded-full peer-checked:border-blue-500 peer-checked:bg-blue-500"></div>
                                    <span class="font-bold peer-checked:text-blue-500">{{ $loc->location }}</span>
                                </label>
                            @endforeach
                        </div>

                        <!-- Button to see more locations -->
                        <button type="button" id="see-more" class="text-blue-500 hover:underline mt-2">
                            Lihat Lainnya
                        </button>
                    </form>
                </div>
            </div>
        </ul>
    </div>
</aside>

<script>
    document.getElementById('see-more').addEventListener('click', function() {
        const moreLocations = document.getElementById('more-locations');
        if (moreLocations.classList.contains('hidden')) {
            moreLocations.classList.remove('hidden');
            this.textContent = 'Lihat Lebih Sedikit'; // Change button text
        } else {
            moreLocations.classList.add('hidden');
            this.textContent = 'Lihat Lainnya'; // Reset button text
        }
    });
</script>

                <!-- Main Content -->
<div class="container w-full pl-5 mt-14">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-0 w-full">
{{-- @if ($isEmpty)
            <p class="text-red-500 font-semibold text-center">Konser tidak ada pada lokasi ini.</p>
        @else --}}

            @forelse ($konsers as $knsr)
                @php
                    $tanggal_konser = \Carbon\Carbon::parse($knsr->tanggal);
                    $isExpired = $tanggal_konser->isPast(); // Cek apakah tanggal sudah lewat
                @endphp
                <div class="relative m-2 border border-gray-200 rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105 hover:shadow-xl {{ $isExpired ? 'grayscale' : '' }}">

                    <!-- Label "Sudah Tayang" -->
                    @if ($isExpired)
                        <div class="absolute top-3 left-[-40px] w-[140px] bg-red-600 text-white text-xs font-bold py-2 text-center rotate-[-45deg]">
                            Sudah Tayang
                        </div>
                    @endif

                    <!-- Gambar Konser -->
                    @if ($knsr->image)
                        <img src="{{ asset('storage/' . $knsr->image) }}" alt="Gambar {{ $knsr->nama }}" class="w-full h-48 object-cover">
                    @else
                        <img src="{{ asset('images/default.jpg') }}" alt="Default Gambar" class="w-full h-48 object-cover">
                    @endif

                    <!-- Detail Konser -->
                    <div class="p-4 {{ $isExpired ? 'opacity-50' : '' }}">
                        <h3 class="text-xl font-semibold text-gray-800 hover:text-blue-600 mb-2">{{ $knsr->nama }}</h3>
                        <ul class="text-gray-600 mt-2 space-y-1">
                            <li class="flex items-center text-sm">
                                <i class="fa-solid fa-calendar-days mr-2 text-gray-500"></i> {{ $knsr->tanggal }}
                            </li>
                            <li class="flex items-center text-sm">
                                <i class="fa-solid fa-map-marker-alt mr-2 text-gray-500"></i> {{ $knsr->lokasi->location }}
                            </li>
                        </ul>

                        <!-- Informasi Tiket -->
                        <div class="flex items-center justify-between mt-4">
                            @foreach ($knsr->tiket as $kt)
                                <div class="flex flex-col">
                                    <p class="text-sm font-bold text-orange-600 mb-1">Stok: {{ $kt->jumlah_tiket }} tiket</p>
                                    <p class="text-xl font-bold text-orange-600 mb-2">Rp{{ number_format($kt->harga_tiket, 0, ',', '.') }}</p>
                                </div>
                            @endforeach

                            <!-- Tombol Detail -->
                            <a href="{{ route('product.show', $knsr->id) }}"
                               class="mt-4 inline-block bg-blue-700 text-white text-center py-2 px-6 rounded-md hover:bg-blue-800">
                                Detail
                            </a>
                        </div>
                    </div>
                </div>
                {{-- @endif --}}

                @empty
                  <div class="flex flex-col items-center justify-center  text-center">
            <!-- SVG Icon Panggung Kosong -->

            <p class="text-red-500 font-semibold text-2xl mt-4">
                Konser tidak ada pada lokasi ini.
            </p>
        </div>
                @endforelse



    <!-- Stylish Pagination Links -->
    <!-- Simple and Stylish Pagination Links -->
</div>
<div>
<div>
    @if ($konsers->count() > 0) <!-- Check if there are any concerts -->
        <div class="flex justify-center mt-6 text-center ">
            <nav class="flex justify-center items-center space-x-2">
                @if ($konsers->onFirstPage())
                    <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed">Prev «</span>
                @else
                    <a href="{{ $konsers->previousPageUrl() }}" class="px-4 py-2 text-blue-600 bg-white border border-gray-300 rounded-md hover:bg-blue-50">« Prev</a>
                @endif

                @foreach ($konsers->getUrlRange(1, $konsers->lastPage()) as $page => $url)
                    @if ($page == $konsers->currentPage())
                        <span class="px-4 py-2 text-white bg-blue-600 rounded-md">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="px-4 py-2 text-blue-600 bg-white border border-gray-300 rounded-md hover:bg-blue-50">{{ $page }}</a>
                    @endif
                @endforeach

                @if ($konsers->hasMorePages())
                    <a href="{{ $konsers->nextPageUrl() }}" class="px-4 py-2 text-blue-600 bg-white border border-gray-300 rounded-md hover:bg-blue-50">Next »</a>
                @else
                    <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed">Next »</span>
                @endif
            </nav>
        </div>
    @endif
</div>
</div>
<style>
    /* Card hover effect */
    .card {
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .card:hover {
        transform: translateY(-5px); /* Lift effect */
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15); /* Deeper shadow */
    }

    /* Button styles */
    .btn {
        background-color: #4f46e5; /* Indigo background */
        color: white;
        border-radius: 5px;
        padding: 10px 15px;
        text-align: center;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: #4338ca; /* Darker indigo on hover */
    }

    /* Responsive grid */
    @media (min-width: 640px) {
        .grid-cols-2 {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (min-width: 1024px) {
        .grid-cols-3 {
            grid-template-columns: repeat(3, 1fr);
        }
    }
</style>
            </div>
        </div>
    </x-slot>
    @extends('layouts.footer')
</x-app-layout>
