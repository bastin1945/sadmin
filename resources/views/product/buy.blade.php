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
    /* Add other styles here... */
</style>

<div class="max-w-5xl mx-auto flex justify-between bg-white mt-[7rem] mb-6 gap-6">
    <!-- Bagian Kiri -->
    <div class="w-1/2 mr-4 bg-white rounded-lg">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('product.store') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <input type="hidden" id="harga_total" name="harga_total" value="0">

             <div class="mb-6 p-2 rounded-sm shadow-md">
                <label for="category" class="block mb-2 text-md font-medium text-black-600">Pilih kategori konser</label>
                <select name="tiket_id" id="category" class="w-full px-4 py-2 text-sm font-medium text-black-600 border border-white rounded focus:ring focus:ring-indigo-200 mb-3" onchange="updateHarga()">
                    <option value="" class="text-gray-400">Kategori</option>
                    @foreach ($konser->tiket as $kt)
                        <option value="{{ $kt->id }}" data-harga="{{ $kt->harga_tiket }}">{{ $kt->jenis_tiket }} | Rp:{{ number_format($kt->harga_tiket) }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Container untuk Atur Jumlah -->
            <div class="p-4 rounded-sm shadow-md">
                <div class="flex items-center justify-between">
                    <label for="jumlah" class="text-sm font-medium text-gray-600">Atur Jumlah</label>
                    <div class="flex items-center space-x-3">
                        <button id="decrease" type="button" class="text-lg font-bold text-gray-600 border border-gray-600 rounded">-</button>
                        <input id="jumlah" type="text" name="jumlah_tiket" value="1" readonly class="w-12 text-center text-gray-800 font-semibold border border-white rounded">
                        <button id="increase" type="button" class="text-lg font-bold text-gray-600 border border-gray-600 rounded">+</button>
                    </div>
                </div>
            </div>

           

            <div class="p-4 rounded-sm shadow-md">
                <label for="promo_code" class="block mb-2 text-sm font-medium text-gray-600">Masukkan Kode Promo</label>
                <input id="promo_code" type="text" name="promo_id" class="w-full px-4 py-2 text-sm font-medium text-black-600 border border-gray-300 rounded uppercase" placeholder="Kode Promo">
                <button id="apply-promo" type="button" class="mt-2 px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-indigo-700">Gunakan Promo</button>
            </div>

            <button type="submit" id="bayar-btn" class="mt-4 w-full px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-indigo-700">Bayar Sekarang</button>
        </form>
    </div>

    <!-- Bagian Kanan -->
    <div class="w-1/2 p-6 bg-white border border-gray-200 rounded-lg shadow-md">
        <div class="w-auto h-60 border border-gray-300 rounded-md">
            <img src="{{ asset('storage/' . $konser->image) }}" alt="Gambar HD" class="rounded-md w-full h-full">
        </div>
        <h2 class="mb-6 mt-4 text-lg font-semibold text-gray-800">{{ $konser->nama }}</h2>
        <div class="flex items-start mb-0 space-x-4">
            <div class="flex-1 mb-4">
                <div class="flex items-center space-x-2">
                    <i class="fa-solid fa-calendar-days text-blue-500"></i>
                    <span class="text-gray-800">Tanggal</span>
                </div>
                <strong class="text-black pl-5 block">{{ $konser->tanggal }}</strong>
            </div>
            <div class="flex-1">
                <div class="flex items-center space-x-2">
                    <i class="fa-solid fa-clock text-blue-500"></i>
                    <span class="text-gray-800">Waktu</span>
                </div>
                <strong class="text-black pl-5 block">{{ $konser->jam }}</strong>
            </div>
            <div class="flex-1">
                <div class="flex items-center space-x-2">
                    <i class="fa-solid fa-location-dot text-blue-500"></i>
                    <span class="text-gray-800">Lokasi</span>
                </div>
                <strong class="text-black pl-5 block">{{ $konser->lokasi->location }}</strong>
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
                <span id="potongan-diskon" class="text-sm text-black-800 font-medium">-Rp 0</span>
            </div>
            <hr class="border-t-2 border-gray-300 my-2">
        </div>
        <div class="mb-6">
            <div class="flex justify-between font-semibold">
                <span>Total Pembayaran</span>
                <span id="total-pembayaran">Rp 0</span>
            </div>
        </div>
    </div>
</div>

<!-- Modal Popup -->
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

<!-- Popup Pembayaran Sukses -->
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
            <div class="text-popup p-4 flex flex-between items-center text-center mx-8">
                <span class="text-lg font-semibold">Total:</span>
                <span id="popup-total" class="text-3xl font-bold mt-2">Rp 0</span>
            </div>
            <hr class="my-4 border-gray-300">
            <div class="text-popup mt-2 text-center">
                <span class="text-gray-700">Nama Konser:</span>
                <strong class="text-black">{{ $konser->nama }}</strong>
            </div>
            <div class="text-popup text-center">
                <span class="text-gray-700">Tanggal Pembayaran:</span>
                <strong>
                    <span class="text-black">{{ now()->format('M d, Y, H:i:s') }}</span>
                </strong>
            </div>
            <div class="text-popup text-center">
                <span class="text-gray-700">Pembeli:</span>
                <strong>
                    <span class="text-black">{{ auth()->user()->name }}</span>
                </strong>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        function updateHarga() {
            let category = document.getElementById("category");
            let jumlahInput = document.getElementById("jumlah");
            let hargaTiket = category.options[category.selectedIndex].getAttribute("data-harga");
            let jumlahTiket = parseInt(jumlahInput.value) || 0;
            let totalBayar = (parseInt(hargaTiket) || 0) * jumlahTiket;

            document.getElementById("harga-tiket").innerText = "Rp " + totalBayar.toLocaleString();
            document.getElementById("total-pembayaran").innerText = "Rp " + totalBayar.toLocaleString();
            
            // Update input harga_total
            document.getElementById("harga_total").value = totalBayar; 
        }

        $("#increase").click(function() {
            let jumlahInput = document.getElementById("jumlah");
            jumlahInput.value = parseInt(jumlahInput.value) + 1;
            updateHarga();
        });

        $("#decrease").click(function() {
            let jumlahInput = document.getElementById("jumlah");
            if (jumlahInput.value > 1) {
                jumlahInput.value = parseInt(jumlahInput.value) - 1;
            }
            updateHarga();
        });

        $("#apply-promo").click(function() {
    let promoCode = $("#promo_code").val();
    let hargaTiket = parseInt($("#harga-tiket").text().replace(/\D/g, ''));

    if (promoCode === "") {
        alert("Silakan masukkan kode promo!");
        return;
    }

    $.ajax({
        url: "{{ route('apply.promo') }}",
        type: "POST",
        data: {
            promo_code: promoCode,
            harga_tiket: hargaTiket, // Tambahkan harga_tiket di sini
            _token: "{{ csrf_token() }}"
        },
        success: function(response) {
            if (response.success) {
                // Update UI dengan diskon dan total setelah diskon
                $("#total-pembayaran").text(`Rp ${response.total_setelah_diskon.toLocaleString()}`);
                $("#potongan-diskon").text(`Rp ${response.diskon.toLocaleString()}`);

                // Update input harga_total
                $("#harga_total").val(response.total_setelah_diskon);
                
                alert(response.message);
            } else {
                alert(response.message);
            }
        },
        error: function(xhr) {
            alert("Terjadi kesalahan, coba lagi.");
        }
    });
});

        $("form").on("submit", function(event) {
            updateHarga(); // Pastikan harga total terupdate sebelum submit
            if (parseInt($("#harga_total").val()) === 0) { // Cek input harga_total
                event.preventDefault();
                alert("Harga total harus diisi!");
            }
        });
    });
</script>