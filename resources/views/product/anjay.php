@include('layouts.app')
<x-slot name="">
</x-slot>

<div class="max-w-7xl mx-auto flex justify-between bg-white mt-[7rem] mb-6 gap-6">
    <!-- Sidebar -->
    <div class="w-64 bg-white p-4">
        <div class="flex items-center space-x-3 border-b pb-4 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-10 w-10">
                <path fill-rule="evenodd"
                    d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                    clip-rule="evenodd" />
            </svg>
            <div>
                <p class="font-semibold">{{ Auth::user()->name }}</p>
                <a href="{{ route('profile.edit') }}">
                    <button>
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-4"
                                style="margin-top: 3px; margin-right: 3px;">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
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
    <div class="flex-1 p-8">
        <h1 class="text-xl font-bold mb-4">Transaksi</h1>
        <div class="border-b mb-4">
            <p class="text-blue-600 font-semibold border-b-2 border-blue-600 inline-block pb-1">
                Pesanan Online
            </p>
        </div>
        <!-- Order Card -->
        @foreach ($order as $orde)
            <div class="bg-white p-4 rounded-lg mb-4 flex items-start"


            style="box-shadow: -2px 0 5px rgba(0, 0, 0, 0.03),
                     2px 0 5px rgba(0, 0, 0, 0.03),
                     0 -2px 5px rgba(0, 0, 0, 0.03),
                     0 2px 5px rgba(0, 0, 0, 0.03);">
                <!-- Bagian kiri tetap di posisi semula -->
                <img src="{{ asset('storage/' . $orde->tiket->konser->image) }}" alt="Gambar HD"  class="rounded-lg object-cover pr-3"
                                style="width: 230px; height: 130px;">



                <div class="flex-1">
                    <p class="font-semibold text-2xl ">{{ $orde->tiket->konser->nama }}</p>
                    <p class="text-sm  text-gray-600 pt-1">Varian: {{ $orde->tiket->jenis_tiket }}</p>
                    <p class="text-md text-red-500 font-bold">{{ number_format($orde->tiket->harga_tiket, 0, ',', '.') }}</p>
                </div>

                <!-- Bagian kanan diturunkan lebih jauh dengan mt-10 -->
                <div class="text-right mt-10">
                    <p class="text-sm">Tiket {{ $orde->jumlah_tiket }}</p>
                    <div class="flex">
                        <p class="text-sm text-gray-500 mr-8">Subtotal Harga ({{ $orde->jumlah_tiket }} Tiket)</p>
                        <p class="text-sm font-semibold">Rp {{ number_format($orde->harga_total, 0, ',', '.') }}</p>
                    </div>

                    <div class="flex space-x-2 mt-2">
                        <button @click="openDetail = true" class="bg-blue-800 text-xs text-white px-1 py-2 rounded-lg"
                            style="width: 120px; height: 36px;">Detail</button>
                        <button @click="openReview = true"
                            class="bg-blue-800 text-xs text-white px-1 py-2 rounded-lg ml-2"
                            style="width: 120px; height: 36px;">Review</button>
                    </div>
                </div>
            </div>

            <!-- Pop-up Detail Tiket -->

            <body class="flex items-center justify-center h-screen bg-gray-100" x-data="{ openDetail: false, openReview: false }">

                <!-- Overlay -->
                <div x-show="openDetail || openReview"
                    class="fixed inset-0 bg-black bg-opacity-50 transition-opacity duration-300"
                    x-transition:enter="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="opacity-100"
                    x-transition:leave-end="opacity-0"></div>

                <!-- Pop-up Detail Tiket -->
                <div x-show="openDetail" class="fixed inset-0 flex items-center justify-center p-8">
                    <div class="bg-white rounded-lg p-6 transform transition-all duration-300"
                        style="width:700px; height: 500px;" x-transition:enter="scale-75 opacity-0"
                        x-transition:enter-end="scale-100 opacity-100" x-transition:leave="scale-100 opacity-100"
                        x-transition:leave-end="scale-75 opacity-0">


                        <div class="flex items-start space-x-4 mb-4">
                            <img src="{{ asset('storage/' . $orde->tiket->konser->image) }}" alt="Gambar HD"  class="rounded-lg object-cover"
                                style="width: 300px; height: 170px;">
                            <div>
                                <h2 class="text-lg font-semibold mb-1">{{ $orde->tiket->konser->nama }}</h2>
                                <ul class="text-sm text-gray-600 space-y-2">
                                    <div class="mb-1">
                                        <div class=" mb-3">
                                            <li>
                                                <div>
                                                    <i class="fa-solid fa-calendar-days text-blue-500 mt-1 mr-1"></i>
                                                    <span class=" text-gray-800 pl-1">Tanggal</span><br>
                                                </div>
                                                <strong
                                                    class="text-bold text-black pl-5 ml-1">{{ $orde->tiket->konser->tanggal }}</strong>
                                            </li>
                                        </div>

                                        <div>
                                            <li>
                                                <div class="flex">
                                                    <i class="fa-solid fa-clock text-blue-500 mt-1 mr-1"></i>
                                                    <span class=" text-gray-800 pl-1">Waktu</span><br>
                                                </div>
                                                <strong
                                                    class="text-black pl-5 ml-1">{{ $orde->tiket->konser->jam }}</strong>
                                            </li>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <li>
                                            <div class="flex">
                                                <i class="fa-solid fa-location-dot text-blue-500 mt-1 mr-1 "></i>

                                                <span class=" text-gray-800 pl-2">Lokasi</span><br>
                                            </div>
                                            <strong
                                                class=" text-black pl-5 ml-1">{{ $orde->tiket->konser->lokasi->location }}</strong>
                                        </li>

                                    </div>
                                </ul>
                            </div>
                        </div>

                        <div class="bg-gray-100 rounded-xl p-6 mt-4">
                            <!-- Bagian Total -->
                            <div class="text-popup flex justify-between items-center text-center mx-32">
                                <span class="text-black-400 text-md">Total:</span>
                                <span id="popup-total" class="text-xl font-bold">
                                    Rp {{ number_format($orde->harga_total, 0, ',', '.') }}
                                </span>

                            </div>

                            <hr class="my-4 border-gray-300">

                            <!-- Detail Pembayaran -->

                            <div class="flex justify-between my-2 text-popup mt-2 text-center">
                                <span class="text-gray-700 text-sm">Nama Konser:</span>
                                <strong class="text-black text-sm">{{ $orde->tiket->konser->nama }}</strong>
                            </div>

                            <div class="flex justify-between my-2 text-popup mt-2 text-center">
                                <span class="text-gray-700 text-sm">Sub total pembelian:</span>
                                <strong class="text-black text-sm">{{ $orde->jumlah_tiket }}</strong>
                            </div>

                            <div class="flex justify-between my-2 text-popup text-center">
                                <span class="text-gray-700 text-sm">Tanggal Pembayaran:</span>
                                <strong class="text-black text-sm">{{ $orde->created_at }}</strong>
                            </div>

                            <div class="flex justify-between my-2 text-popup text-center">
                                <span class="text-gray-700 text-sm">Pembeli:</span>

                                <strong class="text-black text-sm">{{ $orde->user->name }}</strong>
                            </div>
                        </div>

                        <div class="flex justify-end mt-4">
                            <button @click="openDetail = false"
                                class="border border-gray-400 px-4 py-2 rounded-lg text-gray-600 text-sm"
                                style="width: 120px;">Kembali</button>
                        </div>
                    </div>
                </div>

                <!-- Pop-up Review -->
                <div x-show="openReview" class="fixed inset-0 flex items-center justify-center p-4">
                    <div class="bg-white rounded-lg px-10 py-6 transform transition-all duration-300 w-[700px] h-[500px]"
                        x-transition:enter="scale-75 opacity-0" x-transition:enter-end="scale-100 opacity-100"
                        x-transition:leave="scale-100 opacity-100" x-transition:leave-end="scale-75 opacity-0">

                        <h2 class="text-xl font-semibold mb-4">Review</h2>

                        <div class="flex items-start space-x-4 mb-4">
                            <img src="assets/hd1.png" alt="Tiket" class=" rounded-lg object-cover"
                                style="width:100px; height: 100px;">
                            <div>
                                <p class="text-lg mb-3 font-semibold">Tiket Konser Sedjiwa</p>
                                <p class="text-sm text-gray-500">Category: VIP</p>
                                <p class="text-sm text-gray-500">Jumlah: 1 Tiket</p>
                            </div>
                        </div>

                        <label class="text-sm text-gray-900">Komentar</label>
                        <textarea class="w-full border rounded-2xl p-2 mt-1 h-32 resize-none"></textarea>

                        <button
                            class="flex items-center justify-start border border-gray-700 rounded-md p-3 mt-4 text-sm text-gray-700"
                            style="width: 250px;">
                            <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path d="M12 9a3.75 3.75 0 1 0 0 7.5A3.75 3.75 0 0 0 12 9Z" />
                                <path fill-rule="evenodd"
                                    d="M9.344 3.071a49.52 49.52 0 0 1 5.312 0c.967.052 1.83.585 2.332 1.39l.821 1.317c.24.383.645.643 1.11.71.386.054.77.113 1.152.177 1.432.239 2.429 1.493 2.429 2.909V18a3 3 0 0 1-3 3h-15a3 3 0 0 1-3-3V9.574c0-1.416.997-2.67 2.429-2.909.382-.064.766-.123 1.151-.178a1.56 1.56 0 0 0 1.11-.71l.822-1.315a2.942 2.942 0 0 1 2.332-1.39ZM6.75 12.75a5.25 5.25 0 1 1 10.5 0 5.25 5.25 0 0 1-10.5 0Zm12-1.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                                    clip-rule="evenodd" />
                            </svg>
                            Tambah Foto
                        </button>

                        <div class="flex justify-end mt-10 space-x-2">
                            <button @click="openReview = false"
                                class="border border-gray-400 px-4 py-1 rounded-lg text-gray-600 text-sm"
                                style="width: 150px; height: 40px;">Nanti saja</button>
                            <button class="bg-blue-800 text-white px-4 py-1 rounded-lg text-sm ml-4"
                                style="width: 150px; height: 40px;">Review</button>
                        </div>
                    </div>
                </div>

            </body>
        @endforeach
    </div>
</div>
