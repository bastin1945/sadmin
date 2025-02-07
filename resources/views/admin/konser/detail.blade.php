<x-admin-layout>

<!-- Container -->
<div class="max-w-7xl mx-auto bg-white rounded-lg overflow-hidden mt-0 mb-40">


    <!-- Event Content -->
    <div class="flex flex-col md:flex-row p-5">

        <!-- Image Section -->
        <div class="flex-shrink-0 md:w-1/2 ">
            <img src="{{ asset('storage/' . $konser->image) }}" alt="Event Image"
                class="object-cover rounded-lg" style="width: 600px; height: 400px">
        </div>

        <!-- Event Details -->
        <div class=" px-5 md:w-1/2">
            <h2 class="text-lg font-semibold mb-4"> {{ $konser->nama }}</h2>
            <ul class="text-sm text-gray-600 space-y-2">
                <div class="mb-4">
                    <li>
                        <div>
                            <i class="fa-solid fa-calendar fa-1x"></i>
                            <span class=" text-gray-800 pl-1">Tanggal</span><br>
                        </div>
                        <strong class="text-bold text-black pl-5"> {{ $konser->tanggal }}</strong>
                    </li>
                </div>
                <div class="mb-4">
                    <div>
                        <li>
                            <div class="flex">
                                <i class="fa-solid fa-clock fa-1x"></i>
                                <span class=" text-gray-800 pl-1">Waktu</span><br>
                            </div>
                            <strong class="text-black pl-5">{{ $konser->jam }}</strong>
                        </li>
                    </div>
                </div>
                <div class="mb-4">
                    <li>
                        <div class="flex">
                                <i class="fa-solid fa-location-dot fa-1x"></i>

                            <span class=" text-gray-800 pl-2">Lokasi</span><br>
                        </div>
                        <strong class=" text-black pl-5">{{ $konser->lokasi->location }}</strong>
                    </li>

                </div>
            </ul>
            <!-- Description -->
            <h3 class="mt-6 font-semibold text-gray-700">Deskripsi Event</h3>
            <p class="text-gray-600 mt-2 text-sm leading-relaxed">{{ $konser->deskripsi }}</p>
        </div>
    </div>



    <div class="p-6 md:w-1/2">
        <ul class="text-sm text-gray-600 space-y-2">
            <div>
                @foreach ($konser->tiket as $kt)
                    <h1 class="text-orange-800 font-extrabold text-2xl">
                        Rp:{{ number_format($kt->harga_tiket, 0, ',', '.') }}</h1>
            </div>
            @endforeach
            <div class="mb-4">


                <!-- Reviews Section -->
<div class="text-3xl mt-5 font-extrabold">
    Review pembeli
</div>



                <!-- Review Card -->
                <div class="flex items-start space-x-4 mt-10">
                    <div class="bg-gray-300 rounded-full h-12 w-12 flex items-center justify-center">
                        <span class="text-gray-700 font-bold text-lg">S</span>
                    </div>
                    <div>
                        <p class="font-medium text-gray-800">Sasti Juni</p>
                        {{-- <p class="text-yellow-500 text-sm">⭐ 4/5</p> --}}
                        <p class="text-gray-600 text-sm mt-1">This icon pack is just what I need for my latest project.
                            Love the playful look!</p>
                        <!-- Placeholder for thumbnails -->
                        <div class="mt-2 flex space-x-2">
                            <div class="h-12 w-12 bg-gray-300 rounded-md"></div>
                            <div class="h-12 w-12 bg-gray-300 rounded-md"></div>
                            <div class="h-12 w-12 bg-gray-300 rounded-md"></div>
                        </div>
                    </div>
                </div>

                <!-- Repeat the review card -->
                <div class="flex items-start space-x-4">
                    <div class="bg-gray-300 rounded-full h-12 w-12 flex items-center justify-center">
                        <span class="text-gray-700 font-bold text-lg">S</span>
                    </div>
                    <div>
                        <p class="font-medium text-gray-800">Sasti Juni</p>
                        {{-- <p class="text-yellow-500 text-sm">⭐ 4/5</p> --}}
                        <p class="text-gray-600 text-sm mt-1">This icon pack is just what I need for my latest project.
                            Love the playful look!</p>
                        <!-- Placeholder for thumbnails -->
                        <div class="mt-2 flex space-x-2">
                            <div class="h-12 w-12 bg-gray-300 rounded-md"></div>
                            <div class="h-12 w-12 bg-gray-300 rounded-md"></div>
                            <div class="h-12 w-12 bg-gray-300 rounded-md"></div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
</x-admin-layout>
