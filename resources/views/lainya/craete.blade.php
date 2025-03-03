<x-admin-layout>
    <div class="bg-white min-h-screen px-5">
        <h1 class="text-2xl font-bold mb-5">Tambah Konser</h1>

        @if(session('success'))
            <div class="bg-green-500 text-white p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.populer.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="nama_konser" class="block text-gray-700">Nama Konser</label>
                <input type="text" name="nama_konser" id="nama_konser" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-600" required>
                @error('nama_konser')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Simpan
            </button>
            <a href="{{ route('admin.populer.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 ml-2">
                Kembali
            </a>
        </form>
    </div>
</x-admin-layout>
