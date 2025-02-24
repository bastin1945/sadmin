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

            <form id="search-form" action="{{ route('admin.adminhistory.index') }}" method="get">
    <select name="konser" id="konser-select" class="border border-gray-300 rounded px-2 py-2 text-gray-500 focus:outline-none appearance-none w-40  pr-3">
        <option value="">Semua Konser</option>
        @foreach ($konser as $konsr)
        <option value="{{ $konsr->id }}" {{ request()->get('konser') == $konsr->id ? 'selected' : '' }}>
            {{ $konsr->nama }}
        </option>
        @endforeach
    </select>

    <input id="search-input" class="w-32 pl-10 pr-4 rounded-full form-input sm:w-64 focus:border-indigo-600"
        type="text" placeholder="Cari nama Customer" name="search" value="{{ request()->get('search') }}">

      <input id="ticket-search-input" class="w-32 pl-10 pr-4 rounded-full form-input sm:w-64 focus:border-indigo-600"
        type="text" placeholder="Cari Kode Tiket" name="kode_tiket" value="{{ request()->get('kode_tiket') }}">
    <button type="submit" class="hidden"></button>
</form>

<script>
    document.getElementById('konser-select').addEventListener('change', function () {
        document.getElementById('search-form').submit();
    });

    document.getElementById('search-input').addEventListener('keyup', function (event) {
        if (event.key === 'Enter') {
            document.getElementById('search-form').submit();
        }
    });
</script>

        </div>
    </div>
</div>
<div class="flex justify-end px-5 mb-7"> <!-- Tambahkan flex justify-end -->


        </div>

<table class="w-full border-collapse border border-gray-300 rounded-lg overflow-hidden">
    <thead class="bg-gray-100 text-gray-700 font-bold rounded-md">
        <tr>
            <th class="px-4 py-2">Kode Tiket</th>
            <th class="px-4 py-2">Nama user</th>
            <th class="px-4 py-2">Tiket</th>
            <th class="px-4 py-2">Jumlah</th>
            <th class="px-4 py-2">Harga Tiket</th>
            <th class="px-4 py-2">Jenis Tiket</th>
            <th class="px-4 py-2">Status Pembayaran</th>
            <th class="px-4 py-2">hapus</th>
        </tr>
    </thead>

    <tbody>
    @foreach ($order as $index => $orde)

    <tr class="text-gray-700">
        <td class="border-b border-gray-300 px-4 py-2 text-center">{{ $orde->kode_tiket }}</td>
        <td class="border-b border-gray-300 px-4 py-2 text-center">{{ $orde->user->name }}</td>
        <td class="border-b border-gray-300 px-4 py-2 text-center">{{ $orde->tiket->konser->nama }}</td>
        <td class="border-b border-gray-300 px-4 py-2 text-center">{{ $orde->jumlah_tiket }}</td>
        <td class="border-b border-gray-300 px-4 py-2 text-center">{{ $orde->harga_total }}</td>
        <td class="border-b border-gray-300 px-4 py-2 text-center">{{ $orde->tiket->jenis_tiket }}</td>
      <td class="border-b border-gray-300 px-4 py-2 text-center">
    <form action="{{ route('admin.admin.adminhistory.updateStatus', $orde->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="flex justify-center items-center space-x-2">
            <select name="status_pembayaran"
                class="border rounded px-2 w-28 py-1 text-sm focus:outline-none focus:ring
                {{ $orde->status_pembayaran == 'pending' ? ' text-yellow-700' : '' }}
                {{ $orde->status_pembayaran == 'paid' ? ' text-green-700' : '' }}
                {{ $orde->status_pembayaran == 'cancelled' ? ' text-red-700' : '' }}">
                <option value="pending" style="color: orange;" {{ $orde->status_pembayaran == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="paid" style="color: green;" {{ $orde->status_pembayaran == 'paid' ? 'selected' : '' }}>Paid</option>
                <option value="cancelled" style="color: red;" {{ $orde->status_pembayaran == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
            <script>
    document.getElementById('dropdownButton').addEventListener('click', function () {
        const dropdown = document.getElementById('dropdownMenu');
        dropdown.classList.toggle('hidden');
    });
</script>

            <button type="submit" class="bg-blue-500 text-white px-3 py-1 text-sm rounded hover:bg-blue-600 transition">
                Update
            </button>
        </div>
    </form>
</td>
<td class="border-b border-gray-300 px-4 py-2 text-center">
        <form action="{{ route('admin.adminhistory.destroy', $orde->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus order ini?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-3 py-1 text-sm rounded hover:bg-red-600 transition">
                Delete
            </button>
        </form>
    </td>



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

