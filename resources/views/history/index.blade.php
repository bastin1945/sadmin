@include('layouts.app')

<x-slot name=""></x-slot>

<div class="max-w-7xl mx-auto flex justify-between bg-white mt-[7rem] mb-6 gap-6">
    <!-- Sidebar -->
    <div class="w-64 bg-white p-4">
        <div class="flex items-center space-x-3 border-b pb-4 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-10 w-10">
                <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
            </svg>
            <div>
                <p class="font-semibold">{{ Auth::user()->name }}</p>
                <a href="{{ route('profile.edit') }}">
                    <button>
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4" style="margin-top: 3px; margin-right: 3px;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                            <p class="text-sm text-black">Ubah profil</p>
                        </div>
                    </button>
                </a>
            </div>
        </div>
        <nav>
            <p class="mb-2">Akun Saya</p>
            <p class="">Pesanan Saya</p>
        </nav>
    </div>
    <!-- Content -->
    <div class="flex-1 p-8" x-data="{ openDetail: false, openReview: false, selectedOrder: null }">
        <h1 class="text-xl font-bold mb-4">Transaksi</h1>
        <div class="border-b mb-4">
            <p class="text-blue-600 font-semibold border-b-2 border-blue-600 inline-block pb-1">
                Pesanan Online
            </p>
        </div>
        <!-- Order Card -->
        @foreach ($order as $orde)
            <div class="bg-white p-4 rounded-lg mb-4 flex items-start"
                style="box-shadow: -2px 0 5px rgba(0, 0, 0, 0.03), 2px 0 5px rgba(0, 0, 0, 0.03), 0 -2px 5px rgba(0, 0, 0, 0.03), 0 2px 5px rgba(0, 0, 0, 0.03);">
                <img src="{{ asset('storage/' . $orde->tiket->konser->image) }}" alt="Gambar HD" class="rounded-lg object-cover pr-3"
                    style="width: 230px; height: 130px;">

                <div class="flex-1">
                    <p class="font-semibold text-2xl ">{{ $orde->tiket->konser->nama }}</p>
                    <p class="text-sm text-gray-600 pt-1">Varian: {{ $orde->tiket->jenis_tiket }}</p>
                    <p class="text-md text-red-500 font-bold">{{ number_format($orde->tiket->harga_tiket, 0, ',', '.') }}</p>
                </div>

                <div class="text-right mt-10">
                    <p class="text-sm">Tiket {{ $orde->jumlah_tiket }}</p>
                    <div class="flex">
                        <p class="text-sm text-gray-500 mr-8">Subtotal Harga ({{ $orde->jumlah_tiket }} Tiket)</p>
                        <p class="text-sm font-semibold">Rp {{ number_format($orde->harga_total, 0, ',', '.') }}</p>
                    </div>

                    <div class="flex space-x-2 mt-2">
                        <button @click="openDetail = true; selectedOrder = {{ $orde->id }}" class="bg-blue-800 text-xs text-white px-1 py-2 rounded-lg" style="width: 120px; height: 36px;">Detail</button>
                        <button @click="openReview = true; selectedOrder = {{ $orde->id }}" class="bg-blue-800 text-xs text-white px-1 py-2 rounded-lg ml-2" style="width: 120px; height: 36px;">Review</button>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Pop-up Detail Tiket -->
        <div x-show="openDetail" class="fixed inset-0 flex items-center justify-center p-8">
            <div class="bg-white rounded-lg p-6 transform transition-all duration-300 shadow-lg" style="width:700px;">
                <template x-if="selectedOrder">
                    <div>
                        <h2 class="text-lg font-semibold mb-1" x-text="orders.find(order => order.id === selectedOrder).tiket.konser.nama"></h2>
                        <ul class="text-sm text-gray-600 space-y-2">
                            <li>
                                <span class="text-gray-800">Tanggal:</span>
                                <strong x-text="orders.find(order => order.id === selectedOrder).tiket.konser.tanggal"></strong>
                            </li>
                            <li>
                                <span class="text-gray-800">Waktu:</span>
                                <strong x-text="orders.find(order => order.id === selectedOrder).tiket.konser.jam"></strong>
                            </li>
                            <li>
                                <span class="text-gray-800">Lokasi:</span>
                                <strong x-text="orders.find(order => order.id === selectedOrder).tiket.konser.lokasi.location"></strong>
                            </li>
                            <li>
                                <span class="text-gray-800">Jumlah Tiket:</span>
                                <strong x-text="orders.find(order => order.id === selectedOrder).jumlah_tiket"></strong>
                            </li>
                            <li>
                                <span class="text-gray-800">Total:</span>
                                <strong x-text="'Rp ' + new Intl.NumberFormat('id-ID').format(orders.find(order => order.id === selectedOrder).harga_total)"></strong>
                            </li>
                        </ul>
                    </div>
                </template>
                <div class="flex justify-end mt-4">
                    <button @click="openDetail = false" class="border border-gray-400 px-4 py-2 rounded-lg text-gray-600 text-sm">Kembali</button>
                </div>
            </div>
        </div>

        <!-- Pop-up Review -->
        <div x-show="openReview" class="fixed inset-0 flex items-center justify-center p-4">
            <div class="bg-white rounded-lg px-10 py-6 transform transition-all duration-300 w-[700px] shadow-lg">
                <h2 class="text-xl font-semibold mb-4">Review</h2>

                <template x-if="selectedOrder">
                    <div class="flex items-start space-x-4 mb-4">
                        <img :src="orders.find(order => order.id === selectedOrder).tiket.konser.image" alt="Tiket" class="rounded-lg object-cover" style="width:100px; height: 100px;">
                        <div>
                            <p class="text-lg mb-3 font-semibold" x-text="orders.find(order => order.id === selectedOrder).tiket.konser.nama"></p>
                            <p class="text-sm text-gray-500">Jumlah: <span x-text="orders.find(order => order.id === selectedOrder).jumlah_tiket"></span> Tiket</p>
                        </div>
                    </div>
                </template>

                <label class="text-sm text-gray-900">Komentar</label>
                <textarea class="w-full border rounded-2xl p-2 mt-1 h-32 resize-none"></textarea>

                <div class="flex justify-end mt-10 space-x-2">
                    <button @click="openReview = false" class="border border-gray-400 px-4 py-1 rounded-lg text-gray-600 text-sm">Nanti saja</button>
                    <button class="bg-blue-800 text-white px-4 py-1 rounded-lg text-sm">Review</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let orders = @json($order); // Menggunakan Laravel untuk mengonversi data menjadi JSON
</script>
