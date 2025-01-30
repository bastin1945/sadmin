@include('layouts.app')
  <x-slot name="">
  </x-slot>

  <div class="max-w-5xl mx-auto flex justify-between bg-white mt-[7rem] mb-6 gap-6">
    <!-- Sidebar -->
    <div class="w-64 bg-white p-4">
      <div class="flex items-center space-x-3 border-b pb-4 mb-4">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-10 w-10">
                            <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                        </svg>
        <div>
          <p class="font-semibold">Sasti Juni</p>
<button>
<div class="flex">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4" style="margin-top: 3px; margin-right: 3px;">
            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
            </svg>
            <p class="text-sm text-black">Ubah profil</p>
          </div>
</button>
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
      @foreach ([1, 2] as $index)
      <div class="bg-white p-4 rounded-lg mb-4 flex items-start" style="box-shadow: -2px 0 5px rgba(0, 0, 0, 0.03), 
                     2px 0 5px rgba(0, 0, 0, 0.03),
                     0 -2px 5px rgba(0, 0, 0, 0.03), 
                     0 2px 5px rgba(0, 0, 0, 0.03);">
  <!-- Bagian kiri tetap di posisi semula -->
  <div class="w-20 h-20 bg-gray-300 rounded-md mr-4"></div>
  <div class="flex-1">
    <p class="font-semibold">Tiket Konser Sedjiwa</p>
    <p class="text-xs m-1 text-gray-600">Varian: VIP</p>
    <p class="text-sm text-red-500 font-bold">Rp 120.000</p>
  </div>
  
  <!-- Bagian kanan diturunkan lebih jauh dengan mt-10 -->
  <div class="text-right mt-10"> 
    <p class="text-sm">1 Tiket</p>
    <div class="flex">
      <p class="text-sm text-gray-500 mr-8">Subtotal Harga (1 Tiket)</p>
      <p class="text-sm font-semibold">Rp 120.000</p>
    </div>

    <div class="flex space-x-2 mt-2">
      <button class="bg-blue-800 text-xs text-white px-1 py-2 rounded-lg" style="width: 120px; height: 36px;">Detail</button>
    <button @click="open = true" class="bg-blue-800 text-xs text-white px-3 py-2 rounded-lg" style="width: 120px; height: 36px;">Review</button>
    </div>
  </div>
</div>
<body class="flex items-center justify-center min-h-screen bg-gray-100" x-data="{ open: false }">

    <!-- Pop-up Review -->
    <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 p-4">
        <div class="bg-white rounded-lg p-6 w-full max-w-lg">
            <h2 class="text-lg font-semibold mb-4">Review</h2>

            <div class="flex items-start space-x-4 mb-4">
                <img src="/mnt/data/Pop-up Review (2).png" alt="Tiket" class="w-16 h-16 rounded-lg object-cover">
                <div>
                    <p class="text-sm font-semibold">Tiket Konser Sedjiwa</p>
                    <p class="text-xs text-gray-500">Category : VIP</p>
                    <p class="text-xs text-gray-500">Jumlah : 1 Tiket</p>
                </div>
            </div>

            <label class="text-sm text-gray-700">Komentar</label>
            <textarea class="w-full border rounded-lg p-2 mt-1 h-24"></textarea>

            <button class="w-full flex items-center justify-center border rounded-lg p-2 mt-3 text-sm text-gray-700">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10l1-2a2 2 0 012-1h14a2 2 0 012 1l1 2m-3 10H6a2 2 0 01-2-2V8m16 12a2 2 0 002-2V8m-9 4h.01M12 16h.01"></path>
                </svg>
                Tambah Foto
            </button>

            <div class="flex justify-between mt-4">
                <button @click="open = false" class="border px-4 py-2 rounded-lg text-gray-700">Nanti saja</button>
                <button class="bg-blue-800 text-white px-4 py-2 rounded-lg">Review</button>
            </div>
        </div>
    </div>

</body>



      @endforeach
    </div>
  </div>
