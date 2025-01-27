@include('layouts.app')

<div class="max-w-5xl mx-auto flex justify-between bg-white mt-[7rem] mb-6 gap-6">

    <!-- Bagian Kiri -->
    <div class="w-1/2 mr-4 bg-white rounded-lg">

        <!-- Container untuk Pilih Category -->
        <form action="{{ route('product.store') }}" method="post">
            @csrf
            <div class="mb-6 p-2 rounded-sm shadow-md">
                <label for="category" class="block mb-2 text-md font-medium text-black-600">Pilih kategori konser</label>
                <select name="tiket_id" id="category" class="w-full px-4 py-2 text-sm font-medium text-black-600 border border-white rounded focus:ring focus:ring-indigo-200 mb-3" onchange="updateHarga()">
                    <option value="" class="text-gray-400">Kategori</option>
                    @foreach ($konser->tiket as $kt)
                        <option value="{{ $kt->id }}" data-harga="{{ $kt->harga_tiket }}">{{ $kt->jenis_tiket }} | Rp:{{ $kt->harga_tiket }}</option>
                    @endforeach
                </select>
            </div>
            <input type="hidden" id="harga_total" name="harga_total" value="0">

            <!-- Container untuk Atur Jumlah -->
            <div class="p-4 rounded-sm shadow-md">
                <div class="flex items-center justify-between">
                    <label for="jumlah" class="text-sm font-medium text-gray-600">Atur Jumlah</label>
                    <div class="flex items-center space-x-3">
                        <button id="decrease" type="button" class="text-lg font-bold text-gray-600 border border-gray-600 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                            </svg>
                        </button>
                        <input id="jumlah" type="text" name="jumlah_tiket" value="1" readonly class="w-12 text-center text-gray-800 font-semibold border border-white rounded">
                        <button id="increase" type="button" class="text-lg font-bold text-gray-600 border border-gray-600 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
    </div>

    <!-- Bagian Kanan -->
    <div class="w-1/2 p-6 bg-white border border-gray-200 rounded-lg shadow-md">
        <div class="w-auto h-60 border border-gray-300 rounded-md">
            <img src="{{ asset('storage/' . $konser->image) }}" alt="Gambar HD2" class="rounded-md w-full h-full">
        </div>
        <h2 class="mb-6 mt-4 text-lg font-semibold text-gray-800">{{$konser->nama}}</h2>
        <div class="flex items-start mb-0 space-x-4">
            <!-- Informasi Tanggal -->
            <div class="flex-1 mb-4">
                <div class="flex items-center space-x-2">
                    <i class="fa-solid fa-calendar-days text-blue-500"></i>
                    <span class="text-gray-800">Tanggal</span>
                </div>
                <strong class="text-black pl-5 block">{{$konser->tanggal}}</strong>
            </div>

            <!-- Informasi Waktu -->
            <div class="flex-1">
                <div class="flex items-center space-x-2">
                    <i class="fa-solid fa-clock text-blue-500"></i>
                    <span class="text-gray-800">Waktu</span>
                </div>
                <strong class="text-black pl-5 block">{{$konser->jam}}</strong>
            </div>

            <!-- Informasi Lokasi -->
            <div class="flex-1">
                <div class="flex items-center space-x-2">
                    <i class="fa-solid fa-location-dot text-blue-500"></i>
                    <span class="text-gray-800">Lokasi</span>
                </div>
                <strong class="text-black pl-5 block">{{$konser->lokasi->location}}</strong>
            </div>
        </div>
        <hr class="border-t-2 border-gray-300 my-2">

        <div class="mb-2">
            <div class="flex justify-between">
                <span class="text-md text-black-600">Harga tiket</span>
                <span id="harga-tiket" class="text-sm text-black-800 font-medium">Rp 0</span>
            </div>
            <hr class="border-t-2 border-gray-300 my-2">
        </div>
        <div class="mb-2">
            <div class="flex justify-between">
                <span class="text-md text-black-600">Diskon</span>
                <span class="text-sm text-black-800 font-medium">-Rp 0</span>
            </div>
            <hr class="border-t-2 border-gray-300 my-2">
        </div>
        <div class="mb-6">
            <div class="flex justify-between font-semibold">
                <span>Total Pembayaran</span>
                <span id="total-pembayaran">Rp 0</span>
            </div>
        </div>
        <button type="submit" class="mt-4 w-full px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-indigo-700">Bayar Sekarang</button>
    </div>
        </form>

</div>

<script>
  // Function to update ticket price and total payment
  function updateHarga() {
    var category = document.getElementById('category');
    var hargaTiket = category.options[category.selectedIndex].getAttribute('data-harga');
    var jumlahTiket = parseInt(document.getElementById('jumlah').value);

    if (hargaTiket) {
        var totalHarga = hargaTiket * jumlahTiket;
        
        // Update harga tiket dan total pembayaran
        document.getElementById('harga-tiket').textContent = `Rp ${hargaTiket}`;
        document.getElementById('total-pembayaran').textContent = `Rp ${totalHarga}`;

        // Update nilai input harga_total yang tersembunyi
        document.getElementById('harga_total').value = totalHarga;
    }
  }

  // Event listener for increasing the quantity
  document.getElementById('increase').addEventListener('click', function() {
    var jumlahInput = document.getElementById('jumlah');
    var currentValue = parseInt(jumlahInput.value);
    jumlahInput.value = currentValue + 1;
    updateHarga();  // Recalculate total price when quantity changes
  });

  // Event listener for decreasing the quantity
  document.getElementById('decrease').addEventListener('click', function() {
    var jumlahInput = document.getElementById('jumlah');
    var currentValue = parseInt(jumlahInput.value);
    if (currentValue > 1) {
      jumlahInput.value = currentValue - 1;
      updateHarga();  // Recalculate total price when quantity changes
    }
  });
</script>

