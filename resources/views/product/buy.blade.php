@include('layouts.app')

<style>
            body {
            font-family: 'Poppins', sans-serif;

        }
        .popup-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            animation: fadeIn 0.3s ease-in-out;
        }
        .popup {
            background: white;
            padding: 40px;
            border-radius: 12px;
            text-align: center;
            width: 45vw; 
            max-width: 100%;
            transform: scale(1);
            transition: transform 0.3s ease-in-out;
        }

        .text-popup {
            display: flex;
            justify-content: space-between;
            margin-bottom:5px;
        }
        .popup-container.show .popup {
            transform: scale(1);
        }
        .success-icon {
            background: #d4f8d4;
            width: 90px;
            height: 90px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            margin: auto;   
            margin-bottom: 15px;
            position: relative;
            overflow: hidden;
        }

        .success-icon svg {
            
            width: 40px;
            height: 40px;
            transform: scale(0);
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
            stroke: white;
            fill: none;
            animation: checkmark-animation 1s ease forwards;
        }

        @keyframes checkmark-animation {
            0% {
                transform: scale(0) rotate(0deg);
                stroke: transparent;
            }
            50% {
                transform: scale(1.2) rotate(45deg);
                stroke: transparent;
            }
            100% {
                transform: scale(1) rotate(0deg);
                stroke: white;
            }
        }


        .popup button {
            margin-top: 15px;
            padding: 8px 15px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .popup button:hover {
            background: #0056b3;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
</style>

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
        </form>
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
        <button id="bayar-btn" class="mt-4 w-full px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-indigo-700">Bayar Sekarang</button>
    </div>
</div>



        <!-- modalllll popup -->
        <div id="modal" class="fixed inset-0 flex items-center justify-center hidden bg-gray-600 bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                <h2 class="text-lg font-semibold mb-4">Konfirmasi Pembayaran</h2>
                <p>Apakah Anda yakin ingin melakukan pembayaran?</p>
                <div class="mt-4 flex justify-end space-x-3">
                    <button id="batal-btn" class="px-4 py-2 bg-gray-400 text-white rounded">Batal</button>
                    <button id="konfirmasi-btn" class="px-4 py-2 bg-blue-500 text-white rounded">Bayar</button>
                </div>
            </div>
        </div>

        <!-- popup sudah bayar -->
        <div class="popup-container" id="popupContainer">
    <div class="popup">
        <div class="success-icon flex items-center justify-center">
            <div class="bg-green-500 rounded-full p-1 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-8 h-8 text-white">
                    <path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
        </div>

        <h2 class="text-2xl font-bold mb-2 text-center">Pembayaran Sukses!</h2>
        <p class="text-center text-gray-600">Pembayaran Anda telah berhasil dilakukan.</p>

        <div class="bg-gray-100 rounded-xl p-6 mt-4">
            <!-- Bagian Total -->
            <div class="text-popup p-4 flex flex-between items-center text-center mx-8">
                <span class="text-lg font-semibold">Total:</span>
                <span id="popup-total" class="text-3xl font-bold mt-2">Rp 0</span>
            </div>

            <hr class="my-4 border-gray-300">

            <!-- Detail Pembayaran -->
            <div class="text-popup mt-2 text-center">
                <span class="text-gray-700">Nama Konser:</span>
                <strong class="text-black">Sedjiwa</strong>
            </div>

            <div class="text-popup text-center">
                <span class="text-gray-700">Tanggal Pembayaran:</span>
                <strong>
                <span class="text-black">Mar 22, 2023, 13:22:16</span>
                </strong>
            </div>

            <div class="text-popup text-center">
                <span class="text-gray-700">Pembeli:</span>
                <strong>
                <span class="text-black">Sasti Juni</span>
                </strong>
            </div>
        </div>
    </div>
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



  // Handling modal popup confirmation
document.getElementById('bayar-btn').addEventListener('click', function() {
    document.getElementById('modal').classList.remove('hidden'); // Show modal on 'Bayar Sekarang' click
});

// Hide modal on 'Batal' button click
document.getElementById('batal-btn').addEventListener('click', function() {
    document.getElementById('modal').classList.add('hidden');
});

// Handle form submission on 'Bayar' button click (payment confirmation)
document.getElementById('konfirmasi-btn').addEventListener('click', function() {
    // Simulate payment success (could be replaced with actual payment logic)
    showPopup(); // Show payment success popup

    // Optionally submit the form here
    // document.querySelector('form').submit();
    document.getElementById('modal').classList.add('hidden'); // Hide modal after confirmation
});

// Function to show payment success popup
function showPopup() {
    let popupContainer = document.getElementById('popupContainer');
    let totalPembayaran = document.getElementById('total-pembayaran').textContent || "Rp0";
    document.getElementById('popup-total').textContent = totalPembayaran;
    popupContainer.style.display = 'flex';
    setTimeout(() => popupContainer.classList.add('show'), 10);
}

// Function to close the payment success popup
function closePopup() {
    let popupContainer = document.getElementById('popupContainer');
    popupContainer.classList.remove('show');
    setTimeout(() => popupContainer.style.display = 'none', 300);
}


</script>