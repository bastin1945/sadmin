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
            <th class="px-4 py-2">No</th>
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
    @forelse ($order as $index => $orde)
        <tr class="text-gray-700">
            <td class="border-b border-gray-300 px-3 py-2 text-center">{{ $index + 1 }}</td>
            <td class="border-b border-gray-300 px-3 py-2 text-center">{{ $orde->kode_tiket }}</td>
            <td class="border-b border-gray-300 px-3 py-2 text-center">{{ $orde->user->name }}</td>
            <td class="border-b border-gray-300 px-3 py-2 text-center">{{ $orde->tiket->konser->nama }}</td>
            <td class="border-b border-gray-300 px-3 py-2 text-center">{{ $orde->jumlah_tiket }}</td>
            <td class="border-b border-gray-300 px-3 py-2 text-center">{{ $orde->harga_total }}</td>
            <td class="border-b border-gray-300 px-3 py-2 text-center">{{ $orde->tiket->jenis_tiket }}</td>
            <td class="border-b border-gray-300 px-3 py-2 text-center">
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
                        <button type="submit" class="bg-blue-500 text-white px-3 py-1 text-sm rounded hover:bg-blue-600 transition">
                            Update
                        </button>
                    </div>
                </form>
            </td>
            <td class="border-b border-gray-300 px-4 py-2 text-center">
                <form action="{{ route('admin.adminhistory.destroy', $orde->id) }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="bg-red-500 text-white px-3 py-1 text-sm rounded hover:bg-red-600 transition delete-btn">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="9" class="py-8">
                <div class="flex flex-col items-center justify-center py-8">
                <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 200 200" fill="none" class="mb-5">
                    <rect x="40" y="60" width="120" height="80" rx="10" fill="#F3F4F6" stroke="#9CA3AF" stroke-width="4"/>
                    <g transform="translate(75, 70)">
                        <circle cx="25" cy="30" r="25" fill="#9CA3AF" stroke="#9CA3AF" stroke-width="2"/>
                        <circle cx="25" cy="30" r="20" fill="#F3F4F6"/>
                        <circle cx="25" cy="5" r="5" fill="#9CA3AF"/>
                        <line x1="25" y1="30" x2="25" y2="15" stroke="#9CA3AF" stroke-width="3" stroke-linecap="round"/>
                        <line x1="25" y1="30" x2="38" y2="30" stroke="#9CA3AF" stroke-width="3" stroke-linecap="round"/>
                    </g>
                    <line x1="60" y1="75" x2="140" y2="125" stroke="#9CA3AF" stroke-width="4" stroke-linecap="round"/>
                    <line x1="140" y1="75" x2="60" y2="125" stroke="#9CA3AF" stroke-width="4" stroke-linecap="round"/>
                </svg>


                    <h3 class="text-xl font-semibold text-gray-700 mb-2">Data Pesanan Kosong</h3>
                    <p class="text-gray-500 text-center mb-6 max-w-md">Tidak ada data pesanan yang tersedia</p>

                    <a href="{{ route('admin.adminhistory.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md flex items-center transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />
                        </svg>
                        Reset Filter
                    </a>
                </div>
            </td>
        </tr>
    @endforelse
    </tbody>
</table>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Order ini akan dihapus secara permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.closest('form').submit();
                    }
                });
            });
        });
    });
</script>

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

