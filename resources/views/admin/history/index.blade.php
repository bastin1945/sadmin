<x-admin-layout>

<style>
.custom-select {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    padding-left: 2rem;  /* Menambahkan padding untuk ruang ikon */
}

.custom-select::after {
    content: '\f078';  /* Kode ikon FontAwesome untuk dropdown */
    font-family: 'Font Awesome 5 Free'; /* Pastikan FontAwesome dimuat */
    position: absolute;
    right: 1rem;       /* Ikon di kanan */
    top: 50%;
    transform: translateY(-50%);
    pointer-events: none;
}

</style>


    <div class="bg-white min-h-screen px-5">
        <div class="flex justify-between items-center px-5 py-5">
    <h1 class="text-2xl font-bold">Data History Order</h1>
    <div class="flex items-center space-x-4">
    <div class="relative mx-4 lg:mx-0">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                    <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </span>
            <form action="" method="get">
            <input id="search-input" class="w-32 pl-10 pr-4 rounded-full form-input sm:w-64 focus:border-indigo-600"
            type="text" placeholder="Search for something" name="search" value="{{ request()->get('search') }}">

            </form>
        </div>
    </div>
</div>
<div class="flex justify-end px-5 mb-7"> <!-- Tambahkan flex justify-end -->

                <select class="border border-gray-300 rounded px-2 py-1 text-gray-500 focus:outline-none appearance-none w-28 pr-3">
                    <option>October</option>
                </select>
        </div>

<table class="w-full border-collapse border border-gray-300 rounded-lg overflow-hidden">
    <thead class="bg-gray-100 text-gray-700 font-bold rounded-md">
        <tr>
            <th class="px-4 py-2">No</th>
            <th class="px-4 py-2">Nama user</th>
            <th class="px-4 py-2">Tiket</th>
            <th class="px-4 py-2">Jumlah</th>
            <th class="px-4 py-2">Harga Tiket</th>
            <th class="px-4 py-2">Jenis Tiket</th>
        </tr>
    </thead>

    <tbody>
    @foreach ($order as $index => $orde)

    <tr class="text-gray-700">
        <td class="border-b border-gray-300 px-4 py-2 text-center">{{ $index + 1 }}</td>
        <td class="border-b border-gray-300 px-4 py-2 text-center">{{ $orde->user->name }}</td>
        <td class="border-b border-gray-300 px-4 py-2 text-center">{{ $orde->tiket->konser->nama }}</td>
        <td class="border-b border-gray-300 px-4 py-2 text-center">{{ $orde->jumlah_tiket }}</td>
        <td class="border-b border-gray-300 px-4 py-2 text-center">{{ $orde->harga_total }}</td>
        <td class="border-b border-gray-300 px-4 py-2 text-center">{{ $orde->tiket->jenis_tiket }}</td>
    </tr>
    @endforeach

    </tbody>
</table>

        </div>

<!-- Pagination Links -->
<div class="flex justify-center mt-4">
    <nav class="inline-flex -space-x-px" aria-label="Pagination">
        @if ($order->onFirstPage())
            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-300 bg-gray-200 border border-gray-300 cursor-default">
                &laquo; Prev
            </span>
        @else
            <a href="{{ $order->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-blue-600 bg-white border border-gray-300 hover:bg-blue-100">
                &laquo; Prev
            </a>
        @endif

        @foreach ($order->getUrlRange(1, $order->lastPage()) as $page => $url)
            @if ($page == $order->currentPage())
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-blue-600 cursor-default">
                    {{ $page }}
                </span>
            @else
                <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-blue-600 bg-white border border-gray-300 hover:bg-blue-100">
                    {{ $page }}
                </a>
            @endif
        @endforeach

        @if ($order->hasMorePages())
            <a href="{{ $order->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-blue-600 bg-white border border-gray-300 hover:bg-blue-100">
                Next &raquo;
            </a>
        @else
            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-300 bg-gray-200 border border-gray-300 cursor-default">
                Next &raquo;
            </span>
        @endif
    </nav>
</div>
    </div>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</x-admin-layout>

