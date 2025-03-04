<x-admin-layout>
            <!-- Menampilkan pesan sukses jika ada -->
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
            <h1 class="text-2xl font-bold">Manajemen Promo</h1>


            <div class="flex items-center space-x-4">
                <a href="{{ route('admin.promo.create') }}">
                    <button class="bg-blue-700 text-white px-6 py-2 text-lg rounded-xl hover:bg-blue-500">
                        + Tambah Promo
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

        </div>
<form action="{{ route('admin.promo.index') }}" method="get">
    <input id="search-input" class="w-32 pl-10 pr-4 rounded-full form-input sm:w-64 focus:border-indigo-600"
           type="text" placeholder="Search for something" name="search" value="{{ request()->get('search') }}">



    <select name="status_promo" onchange="this.form.submit()" class="border border-gray-300 rounded-md pl-2 px-7 py-2 text-gray-500 focus:outline-none appearance-none w-40 pr-8">
    <option value="">Status Promo</option>
    <option value="Aktif" {{ request('status_promo') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
    <option value="Tidak Aktif" {{ request('status_promo') == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
</select>

    <input type="date"
           name="tanggal_mulai"
           id="tanggal_mulai"
           value="{{ request('tanggal_mulai') }}"
           class="border border-gray-300 rounded-md px-4 py-2 text-gray-500 focus:outline-none">

    <!-- Input Tanggal Berakhir -->

    <input type="date"
           name="tanggal_berakhir"
           id="tanggal_berakhir"
           value="{{ request('tanggal_berakhir') }}"
           class="border border-gray-300 rounded-md px-4 py-2 text-gray-500 focus:outline-none">

    <!-- Submit Button -->
    <button type="submit" class=" bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none">
        Filter
    </button>
</form>
            </div>

        <table class="w-full border-collapse border border-gray-300 rounded-lg overflow-hidden">
            <thead class="bg-gray-100 text-gray-700 font-bold rounded-md">
                <tr>
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Code Promo</th>
                    <th class="px-4 py-2">Nilai Diskon</th>
                    <th class="px-4 py-2">Tanggal Mulai</th>
                    <th class="px-4 py-2">Tanggal Berakhir</th>
                    <th class="px-4 py-2">Status Promo</th>
                    <th class="px-4 py-2 text-center">Aksi</th> <!-- Perhatikan text-center di sini -->
                </tr>
            </thead>

            <tbody>
                @forelse ($promo as $index => $p)
                    <tr class="text-gray-700">
                        <td class="border-b border-gray-300 px-4 py-2 text-center">{{ $index + 1 }}</td>
                        <td class="border-b border-gray-300 px-4 py-2 text-center">{{ $p->code_promo }}</td>
                        <td class="border-b border-gray-300 px-4 py-2 text-center">{{ $p->nilai_diskon }}%</td>
                        <td class="border-b border-gray-300 px-4 py-2 text-center">{{ $p->tanggal_mulai }}</td>
                        <td class="border-b border-gray-300 px-4 py-2 text-center">{{ $p->tanggal_berakhir }}</td>
                        <td class="border-b border-gray-300 px-4 py-2 text-center">
                            <button class="w-full h-8 flex items-center justify-center px-4 py-2 rounded text-white {{ $p->status_promo == 'Aktif' ? 'bg-yellow-500' : 'bg-red-500' }} hover:opacity-80 focus:outline-none">
                                {{ $p->status_promo }}
                            </button>
                        </td>
                        <td class="border-b border-gray-300 px-4 py-2 text-center"> <!-- text-center di sini untuk penjajaran -->
                            <div class="flex justify-center gap-2"> <!-- Gunakan flex untuk tombol berjejer -->
                                <!-- Edit Button -->
                                <a href="{{ route('admin.promo.edit', $p->id) }}">
    <button class="border px-3 py-2 rounded hover:bg-green-600 hover:text-white">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
        </svg>
    </button>
</a>

                                <!-- Delete Button -->
                                <form id="delete-form-{{ $p->id }}" action="{{ route('admin.promo.destroy', $p->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>

                                <button type="button" class="border text-red-700 px-3 py-2 rounded hover:bg-red-600 hover:text-white" onclick="confirmDelete({{ $p->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>

                            </div>
                        </td>
                    </tr>
                    @empty
                    <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
       <p class="">
        promo tidak ada pada lokasi ini.
        </p>
    </div>
                @endforelse
            </tbody>
        </table>
    </div>

<!-- Pagination Links -->
<div class="flex justify-center mt-4">
    <nav class="inline-flex -space-x-px" aria-label="Pagination">
        @if ($promo->onFirstPage())
            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-300 bg-gray-200 border border-gray-300 cursor-default">
                &laquo; Prev
            </span>
        @else
            <a href="{{ $promo->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-blue-600 bg-white border border-gray-300 hover:bg-blue-100">
                &laquo; Prev
            </a>
        @endif

        @foreach ($promo->getUrlRange(1, $promo->lastPage()) as $page => $url)
            @if ($page == $promo->currentPage())
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-blue-600 cursor-default">
                    {{ $page }}
                </span>
            @else
                <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-blue-600 bg-white border border-gray-300 hover:bg-blue-100">
                    {{ $page }}
                </a>
            @endif
        @endforeach

        @if ($promo->hasMorePages())
            <a href="{{ $promo->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-blue-600 bg-white border border-gray-300 hover:bg-blue-100">
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
            text: 'Promo ini akan dihapus secara permanen!',
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
