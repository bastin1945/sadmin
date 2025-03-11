<x-admin-layout>
@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        });
    </script>
@endif

<div class="bg-white min-h-screen px-5 rounded-lg">
    <div class="flex justify-between items-center px-5 py-5">
        <h1 class="text-2xl font-bold">Manajemen Lokasi</h1>

        <div class="flex items-center space-x-4">

            <a href="{{ route('admin.lokasi.create') }}">
                <button class="bg-blue-700 text-white px-6 py-2 text-lg rounded-xl hover:bg-blue-500">
                    + Tambah Lokasi
                </button>
            </a>
        </div>
    </div>
    <div class="flex justify-end px-5 mb-7"> <!-- Tambahkan flex justify-end -->
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

            <table class="w-full border-collapse border border-gray-300 rounded-lg overflow-hidden">
    <thead class="bg-gray-100 text-gray-700 font-bold rounded-md">
        <tr>
            <th class="px-4 py-2">No</th>
            <th class="px-4 py-2">Nama Lokasi</th>
            <th class="px-4 py-2 text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($lokasi as $key => $data)
            <tr class="text-gray-700">
                <td class="border-b border-gray-300 px-4 py-2 text-center">{{ $key + 1 }}</td>
                <td class="border-b border-gray-300 px-4 py-2 text-center">{{ $data->location }}</td>
                <td class="border-b border-gray-300 px-4 py-2 text-center">
                    <div class="flex justify-center gap-2">
                        <a href="{{ route('admin.lokasi.edit', $data->id) }}">
                            <button class="border px-3 py-2 rounded hover:bg-green-600 hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </button>
                        </a>

                        <form id="delete-form-{{ $data->id }}" action="{{ route('admin.lokasi.destroy', $data->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>

                        <button type="button" class="border text-red-700 px-3 py-2 rounded hover:bg-red-600 hover:text-white" onclick="confirmDelete({{ $data->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="py-8">
                    <div class="flex flex-col items-center justify-center py-8">
                        <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 200 200" fill="none" class="mb-5">
                            <rect x="40" y="60" width="120" height="80" rx="10" fill="#F3F4F6" stroke="#9CA3AF" stroke-width="4"/>
                            <g transform="translate(75, 65)">
                                <path d="M25,0 C11.2,0 0,11.2 0,25 C0,43.8 25,70 25,70 C25,70 50,43.8 50,25 C50,11.2 38.8,0 25,0 Z" fill="#9CA3AF"/>
                                <circle cx="25" cy="25" r="10" fill="white"/>
                            </g>
                            <line x1="60" y1="75" x2="140" y2="125" stroke="#9CA3AF" stroke-width="4" stroke-linecap="round"/>
                            <line x1="140" y1="75" x2="60" y2="125" stroke="#9CA3AF" stroke-width="4" stroke-linecap="round"/>
                        </svg>
                        <h3 class="text-xl font-semibold text-gray-700 mb-2">Data Lokasi Kosong</h3>
                        <p class="text-gray-500 text-center mb-6 max-w-md">Tidak ada data lokasi yang tersedia</p>

                        <a href="{{ route('admin.lokasi.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md flex items-center transition-colors">
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
    <!-- Pagination Links -->
</div>
<div class="flex justify-center mt-4">
    <nav class="inline-flex -space-x-px" aria-label="Pagination">
        @if ($lokasi->onFirstPage())
            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-300 bg-gray-200 border border-gray-300 cursor-default">
                &laquo; Prev
            </span>
        @else
            <a href="{{ $lokasi->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-blue-600 bg-white border border-gray-300 hover:bg-blue-100">
                &laquo; Prev
            </a>
        @endif

        @foreach ($lokasi->getUrlRange(1, $lokasi->lastPage()) as $page => $url)
            @if ($page == $lokasi->currentPage())
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-blue-600 cursor-default">
                    {{ $page }}
                </span>
            @else
                <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-blue-600 bg-white border border-gray-300 hover:bg-blue-100">
                    {{ $page }}
                </a>
            @endif
        @endforeach

        @if ($lokasi->hasMorePages())
            <a href="{{ $lokasi->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-blue-600 bg-white border border-gray-300 hover:bg-blue-100">
                Next &raquo;
            </a>
        @else
            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-300 bg-gray-200 border border-gray-300 cursor-default">
                Next &raquo;
            </span>
        @endif
    </nav>
</div>

<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: 'Konser ini akan dihapus secara permanen!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById(`delete-form-${id}`).submit();
        }
    });
}
</script>
</x-admin-layout>
