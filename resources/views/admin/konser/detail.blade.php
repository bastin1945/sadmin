<x-admin-layout>

    <!-- Container -->
    <div class="max-w-7xl mx-auto bg-white rounded-lg overflow-hidden mt-0 mb-40 shadow-md">

        <!-- Back Button -->


        <!-- Event Content -->
        <div class="flex flex-col md:flex-row p-5">

            <!-- Image Section -->
            <div class="flex-shrink-0 md:w-1/2">
                <img src="{{ asset('storage/' . $konser->image) }}" alt="Event Image"
                    class="object-cover rounded-lg shadow-lg" style="width: 600px; height: 400px">
            </div>

            <!-- Event Details -->
            <div class="px-5 md:w-1/2">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">{{ $konser->nama }}</h2>
                <ul class="text-sm text-gray-600 space-y-4">
                    <li class="flex items-center">
                        <i class="fa-solid fa-calendar fa-1x text-gray-800"></i>
                        <span class="text-gray-800 pl-2 font-medium">Tanggal:</span>
                        <strong class="text-black pl-2">{{ $konser->tanggal }}</strong>
                    </li>
                    <li class="flex items-center">
                        <i class="fa-solid fa-clock fa-1x text-gray-800"></i>
                        <span class="text-gray-800 pl-2 font-medium">Waktu:</span>
                        <strong class="text-black pl-2">{{ $konser->jam }}</strong>
                    </li>
                    <li class="flex items-center">
                        <i class="fa-solid fa-location-dot fa-1x text-gray-800"></i>
                        <span class="text-gray-800 pl-2 font-medium">Lokasi:</span>
                        <strong class="text-black pl-2">{{ $konser->lokasi->location }}</strong>
                    </li>
                    <li class="flex items-center">
                        <i class="fa-solid fa-map-marker-alt fa-1x text-gray-800"></i>
                        <span class="text-gray-800 pl-2 font-medium">Lokasi Penukaran:</span>
                        <strong class="text-black pl-2">{{ $konser->lokasi_penukaran }}</strong>
                    </li>
                    <li class="flex items-center">
                        <i class="fa-solid fa-calendar-check fa-1x text-gray-800"></i>
                        <span class="text-gray-800 pl-2 font-medium">Tanggal Penukaran:</span>
                        <strong class="text-black pl-2">{{ $konser->tanggal_penukaran }}</strong>
                    </li>
                </ul>

                <!-- Description -->
                <h3 class="mt-6 font-semibold text-gray-700">Deskripsi Event</h3>
                <p class="text-gray-600 mt-2 text-sm leading-relaxed">{{ $konser->deskripsi }}</p>
            </div>
        </div>

          <div class="flex justify-start p-5">
            <a href="{{ route('admin.konsers.index') }}" class="text-blue-600 hover:text-blue-800 font-semibold">
                &larr; Kembali ke Daftar Konser
            </a>
        </div>
    </div>
</x-admin-layout>
