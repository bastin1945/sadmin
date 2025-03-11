<x-admin-layout>

    <style>
        .custom-select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            padding-left: 2rem;
            /* Menambahkan padding untuk ruang ikon */
        }

        .custom-select::after {
            content: '\f078';
            /* Kode ikon FontAwesome untuk dropdown */
            font-family: 'Font Awesome 5 Free';
            /* Pastikan FontAwesome dimuat */
            position: absolute;
            right: 1rem;
            /* Ikon di kanan */
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
        }
    </style>


    <div class="bg-white min-h-screen px-5">
        <div class="flex justify-between items-center px-5 py-5">
            <h1 class="text-2xl font-bold">Atur rekomendeasi</h1>
            <div class="flex items-center space-x-4">
                <div class="flex justify-between items-center px-5 py-5">

                    <a href="{{ route('admin.admin.populer.create', 'rekomend') }}"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Tambah Konser
                    </a>
                </div>
            </div>
        </div>
        <div class="flex justify-end px-5 mb-7"> <!-- Tambahkan flex justify-end -->

            <div class="relative mx-4 lg:mx-0">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
                <form action="" method="get">
                    <input id="search-input"
                        class="w-32 pl-10 pr-4 rounded-full form-input sm:w-64 focus:border-indigo-600" type="text"
                        placeholder="Search for something" name="search" value="{{ request()->get('search') }}">

                </form>
            </div>
        </div>

        <table class="w-full border-collapse border border-gray-300 rounded-lg overflow-hidden">
    <thead class="bg-gray-100 text-gray-700 font-bold rounded-md">
        <tr>
            <th class="px-4 py-2">No</th>
            <th class="px-4 py-2">Nama konser</th>
            <th class="px-4 py-2 text-center">Aksi</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($recommend as $index => $pop)
            <tr class="text-gray-700">
                <td class="border-b border-gray-300 px-4 py-2 text-center">{{ $index + 1 }}</td>
                <td class="border-b border-gray-300 px-4 py-2 text-center">{{ $pop->konser->nama }}</td>
                <td class="border-b border-gray-300 px-4 py-2 text-center">
                    <form id="delete-form-{{ $pop->id }}" action="{{ route('admin.admin.populer.rekomend', $pop->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="border text-red-700 px-3 py-2 rounded hover:bg-red-600 hover:text-white" onclick="confirmDelete({{ $pop->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="py-8">
                    <div class="flex flex-col items-center justify-center py-8">
                        <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 200 200" fill="none" class="mb-5">
    <rect x="40" y="60" width="120" height="80" rx="10" fill="#F3F4F6" stroke="#9CA3AF" stroke-width="4"/>
    <g transform="translate(75, 75)">
        <circle cx="25" cy="25" r="25" fill="#9CA3AF"/>
        <path d="M25,10 L29,19 L39,20 L32,27 L34,37 L25,32 L16,37 L18,27 L11,20 L21,19 Z" fill="white"/>
    </g>
    <line x1="60" y1="75" x2="140" y2="125" stroke="#9CA3AF" stroke-width="4" stroke-linecap="round"/>
    <line x1="140" y1="75" x2="60" y2="125" stroke="#9CA3AF" stroke-width="4" stroke-linecap="round"/>
</svg>
                        <h3 class="text-xl font-semibold text-gray-700 mb-2">Data Konser Rekomendasi Kosong</h3>
                        <p class="text-gray-500 text-center mb-6 max-w-md">Tidak ada data konser rekomendasi yang tersedia untuk ditampilkan</p>
                        <a href="{{ route('admin.admin.populer.create', 'rekomend') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md flex items-center transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            Tambah Konser Rekomendasi
                        </a>
                    </div>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

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
    </div>

    </div>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</x-admin-layout>
