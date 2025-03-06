@include('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

<div class="max-w-7xl mx-auto flex justify-between bg-white mt-[9rem] mb-0 gap-3 border border-gray-300 rounded-lg shadow-lg">
    <!-- Bagian Kiri -->
    <div class="w-1/2 p-6 bg-white rounded-l-lg shadow-md  hover:shadow-xl">
        @if ($errors->any())
            <div class="alert alert-danger mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
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

            <div class="mb-4">
                <label for="category" class="block mb-2 text-lg font-medium text-gray-700">
                    <i class="fas fa-tags"></i> Pilih Kategori Konser
                </label>
                <select name="tiket_id" id="category" required class="w-full px-4 py-3 text-sm font-medium text-gray-600 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 ease-in-out">
                    <option value="" class="text-gray-300">Kategori Konser</option>
                    @foreach ($konser->tiket as $kt)
                        <option value="{{ $kt->id }}" data-harga="{{ $kt->harga_tiket }}">{{ $kt->jenis_tiket }} | Rp:{{ number_format($kt->harga_tiket) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center justify-between mb-4 gap-4 border border-gray-300 p-3 rounded-md shadow-sm">
                <div class="w-full">
                    <label for="jumlah" class="block mb-1 text-sm font-semibold text-gray-700">
                        <i class="fas fa-percent"></i> Jumlah Tiket
                    </label>
                    <div class="flex items-center">
                        <button id="decrease" type="button" class="text-lg font-bold text-gray-600 border border-gray-600 rounded px-3 hover:bg-gray-200 transition">-</button>
                        <input id="jumlah" type="text" name="jumlah_tiket" value="1" readonly class="w-12 text-center text-gray-800 font-semibold border border-gray-300 rounded mx-2 shadow-sm">
                        <button id="increase" type="button" class="text-lg font-bold text-gray-600 border border-gray-600 rounded px-3 hover:bg-gray-200 transition">+</button>
                    </div>

                </div>
                <div class="w-full">
                    <div class="flex gap-2">
                        <input id="promo_code" type="text" name="promo_id" class="w-full px-4 py-3 text-sm font-medium text-gray-800 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Kode Promo">
                        <button id="apply-promo" type="button" class="px-4 py-3 text-white bg-blue-600 rounded-md hover:bg-blue-700 transition">
                            Gunakan Promo
                        </button>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <label for="email" class="block mb-2 text-sm font-semibold text-gray-700">
                    <i class="fas fa-envelope"></i> Isikan Gmail Anda
                </label>
                <input id="email" type="text" name="email" required class="w-full px-4 py-3 text-sm font-medium text-gray-800 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Isikan Gmail Anda">
            </div>

            <div class="mb-4">
                <label for="contact" class="block mb-2 text-sm font-semibold text-gray-700">
                    <i class="fas fa-phone"></i> Isikan Nomer Anda
                </label>
                <input id="contact" type="number" name="contact" required class="w-full px-4 py-3 text-sm font-medium text-gray-800 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Isikan Nomer">
            </div>

            <div class="mb-4">
                <label for="address" class="block mb-2 text-sm font-semibold text-gray-700">
                    <i class="fas fa-map-marker-alt"></i> Isikan Alamat Anda
                </label>
                <input id="address" type="text" name="alamat" required class="w-full px-4 py-3 text-sm font-medium text-gray-800 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Isikan Alamat Anda">
            </div>

             <button type="submit" id="bayar-btn" class="mt-5 w-full px-5 py-4 text-white bg-gradient-to-r from-blue-500 to-indigo-600 rounded-md hover:from-blue-600 hover:to-indigo-700 transition">
    <i class="fas fa-credit-card"></i> Pesan Sekarang
</button>

<script>
    document.getElementById('bayar-btn').addEventListener('click', function(event) {
        event.preventDefault(); // Mencegah pengiriman form jika ada

        // Cek status login pengguna (misal menggunakan localStorage)
        const isLoggedIn = localStorage.getItem('isLoggedIn');

        if (!isLoggedIn) {
            // Jika belum login, arahkan ke halaman login
            window.location.href = '../login'; // Ganti dengan URL halaman login yang sesuai
        } else {
            // Jika sudah login, lanjutkan dengan proses pemesanan
            console.log('Proses pemesanan...');
            // Tambahkan logika pemesanan di sini, misalnya mengirim form atau melakukan AJAX request
        }
    });
</script>
        </form>
    </div>

    <!-- Bagian Kanan -->
    <div class="w-1/2 p-6 bg-white rounded-r-lg shadow-md  hover:shadow-xl">
        <div class="w-auto h-60 border border-gray-300 rounded-md overflow-hidden shadow-sm">
            <img src="{{ asset('storage/' . $konser->image) }}" alt="Gambar HD" class="rounded-md w-full h-full object-cover transition-transform duration-300 hover:scale-110">
        </div>
        <h2 class="mb-6 mt-4 text-xl font-semibold text-gray-800">Tiket Konser {{ $konser->nama }}</h2>
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
        <div class="">
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
                    <p>Halo, {{ optional(Auth::user())->name ?? 'Pengunjung' }}</p>

                </strong>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
    function updateHarga() {
        let category = document.getElementById("category");
        let jumlahInput = document.getElementById("jumlah");
        let hargaTiket = category.options[category.selectedIndex].getAttribute("data-harga");
        let jumlahTiket = parseInt(jumlahInput.value) || 0;
        let totalBayar = (parseInt(hargaTiket) || 0) * jumlahTiket;

        document.getElementById("harga-tiket").innerText = "Rp " + totalBayar.toLocaleString();
        document.getElementById("total-pembayaran").innerText = "Rp " + totalBayar.toLocaleString();
        document.getElementById("harga_total").value = totalBayar;
    }

    // Pastikan binding event hanya terjadi sekali
    $(document).off('click', '#increase').on('click', '#increase', function () {
        let jumlahInput = document.getElementById("jumlah");
        jumlahInput.value = parseInt(jumlahInput.value) + 1;
        updateHarga();
    });

    $(document).off('click', '#decrease').on('click', '#decrease', function () {
        let jumlahInput = document.getElementById("jumlah");
        if (parseInt(jumlahInput.value) > 1) {
            jumlahInput.value = parseInt(jumlahInput.value) - 1;
        }
        updateHarga();
    });

    $("#apply-promo").click(function () {
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
                harga_tiket: hargaTiket,
                _token: "{{ csrf_token() }}"
            },
            success: function (response) {
                if (response.success) {
                    $("#total-pembayaran").text(`Rp ${response.total_setelah_diskon.toLocaleString()}`);
                    $("#potongan-diskon").text(`Rp ${response.diskon.toLocaleString()}`);
                    $("#harga_total").val(response.total_setelah_diskon);
                   Swal.fire({
    icon: "success",
    title: "Promo Sukses!",
    html: `
        <p>Promo berhasil di terapkan.</p>

    `,
    showConfirmButton: false,
    timer: 4000, // Auto-close setelah 4 detik
    customClass: {
        popup: 'swal2-custom-popup'
    }
});

                } else {
                    alert(response.message);
                }
            },
            error: function () {
                alert("Terjadi kesalahan, coba lagi.");
            }
        });
    });

    updateHarga();
});

</script>


