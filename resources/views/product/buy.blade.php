@include('layouts.app')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

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
</style>

<div class="max-w-7xl mx-auto flex justify-between bg-white mt-[8rem] mb-6 gap-6">
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

        <form id="payment-form" action="{{ route('product.store') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <input type="hidden" id="harga_total" name="harga_total" value="0">
            
            <div class="mb-2 p-2 rounded-sm" style="box-shadow: 0 -2px 3px rgba(0, 0, 0, 0.05), 0 2px 3px rgba(0, 0, 0, 0.05), -2px 0 3px rgba(0, 0, 0, 0.05), 2px 0 3px rgba(0, 0, 0, 0.05);">

                <label for="category" class="block mb-2 text-md font-medium text-black-600">Pilih kategori konser</label>
                <select name="tiket_id" id="category" class="w-full px-4 py-2 text-sm font-medium text-black-600 border border-white rounded focus:ring focus:ring-indigo-200 mb-3" onchange="updateHarga()">
                    <option value="" class="text-gray-400">Kategori</option>
                    @foreach ($konser->tiket as $kt)
                        <option value="{{ $kt->id }}" data-harga="{{ $kt->harga_tiket }}">{{ $kt->jenis_tiket }} | Rp:{{ number_format($kt->harga_tiket) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-2 p-4 rounded-sm" style="box-shadow: 0 -2px 3px rgba(0, 0, 0, 0.05), 0 2px 3px rgba(0, 0, 0, 0.05), -2px 0 3px rgba(0, 0, 0, 0.05), 2px 0 3px rgba(0, 0, 0, 0.05);">
            <div class="flex items-center justify-between">
                    <label for="jumlah" class="text-sm font-medium text-black">Atur Jumlah</label>
                    <div class="flex items-center space-x-3">
                        <button id="decrease" type="button" class="text-lg font-bold text-black border-2 border-black rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                        </svg>
                        </button>
                        <input id="jumlah" type="text" name="jumlah_tiket" value="1" readonly class="w-12 text-center text-gray-800 font-semibold border border-white rounded">
                        <button id="increase" type="button" class="text-lg font-bold text-black border-2 border-black rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="p-4 rounded-sm" style="box-shadow: 0 -2px 3px rgba(0, 0, 0, 0.05), 0 2px 3px rgba(0, 0, 0, 0.05), -2px 0 3px rgba(0, 0, 0, 0.05), 2px 0 3px rgba(0, 0, 0, 0.05);">
                <label for="promo_code" class="block mb-2 text-sm font-medium text-black">Masukkan Kode Promo</label>
                <input id="promo_code" type="text" name="promo_id" class="w-full px-4 py-2 text-sm font-medium text-black-600 border border-gray-300 rounded uppercase" placeholder="Kode Promo">
                <button id="apply-promo" type="button" class="mt-3 px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-indigo-700">Gunakan Promo</button>
            </div>

        </form>
    </div>

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

        <button type="button" id="bayar-btn" class="mt-4 w-full px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-indigo-700">Bayar Sekarang</button>
    </div>
</div>

<div id="modal" class="fixed inset-0 flex items-center justify-center hidden bg-gray-600 bg-opacity-50">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-lg font-semibold mb-4">Konfirmasi Pembayaran</h2>
        <p id="konser-detail">Apakah Anda yakin ingin melakukan pembayaran?</p>
        <div class="mt-4 flex justify-end space-x-3">
            <button id="batal-btn" class="px-4 py-2 bg-gray-400 text-white rounded">Batal</button>
            <button id="konfirmasi-btn" class="px-4 py-2 bg-blue-500 text-white rounded">Bayar</button>
        </div>
    </div>
</div>

<div class="popup-container" id="popupContainer">
    <div class="popup">
        <div class="flex justify-end">
            <button id="close" class="">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-red">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </button>
        </div>
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
            <div class="text-popup p-4 flex justify-between items-center mx-20">
                <span class="text-lg font-semibold">Total:</span>
                <span id="popup-total" class="text-3xl font-bold mt-2">Rp 0</span>
            </div>
            <hr class="my-4 border-gray-300">
            <div class="text-popup mt-2 flex justify-between items-center mx-8">
                <span class="text-gray-700">Nama Konser:</span>
                <strong class="text-black">{{ $konser->nama }}</strong>
            </div>
            <div class="text-popup flex justify-between items-center mx-8">
                <span class="text-gray-700">Tanggal Pembayaran:</span>
                <strong>
                    <span class="text-black" id="created-at-date"></span>
                </strong>
            </div>
            <div class="text-popup flex justify-between items-center mx-8">
                <span class="text-gray-700">Pembeli:</span>
                <strong>
                    <span class="text-black">{{ Auth::user()->name }}</span>
                </strong>
            </div>
            <div class="text-center mt-4">
                <span class="text-lg font-semibold">Akan diarahkan ke riwayat dalam</span>
                <div id="timer" class="text-2xl font-bold text-blue-500 mt-2">00:29</div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Function to update ticket price and total payment
        function updateHarga() {
            let category = $("#category");
            let hargaTiket = parseInt(category.find(':selected').data('harga')) || 0;
            let jumlahTiket = parseInt($("#jumlah").val()) || 0;
            let totalBayar = hargaTiket * jumlahTiket;

            $("#harga-tiket").text(`Rp ${totalBayar.toLocaleString()}`);
            $("#total-pembayaran").text(`Rp ${totalBayar.toLocaleString()}`);
            $("#harga_total").val(totalBayar);
        }

        // Increase ticket quantity
        $("#increase").click(function() {
            let jumlahInput = $("#jumlah");
            jumlahInput.val(parseInt(jumlahInput.val()) + 1);
            updateHarga();
        });

        // Decrease ticket quantity
        $("#decrease").click(function() {
            let jumlahInput = $("#jumlah");
            if (parseInt(jumlahInput.val()) > 1) {
                jumlahInput.val(parseInt(jumlahInput.val()) - 1);
                updateHarga();
            }
        });

        // Apply promo code
        // Apply promo code
$("#apply-promo").click(function() {
    let promoCode = $("#promo_code").val();
    let hargaTiket = parseInt($("#harga-tiket").text().replace(/\D/g, ''));

    if (!promoCode) {
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: 'Silakan masukkan kode promo!',
            timer: 3000, // Auto close after 3 seconds
            showConfirmButton: false // Hide confirm button
        });
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
        success: function(response) {
            if (response.success) {
                $("#total-pembayaran").text(`Rp ${response.total_setelah_diskon.toLocaleString()}`);
                $("#potongan-diskon").text(`Rp ${response.diskon.toLocaleString()}`);
                $("#harga_total").val(response.total_setelah_diskon);
                
                Swal.fire({
                    icon: 'success',
                    title: 'Promo Berhasil!',
                    text: response.message,
                    timer: 3000, // Auto close after 3 seconds
                    showConfirmButton: false // Hide confirm button
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: response.message,
                    timer: 3000, // Auto close after 3 seconds
                    showConfirmButton: false // Hide confirm button
                });
            }
        },
        error: function(xhr) {
            Swal.fire({
                icon: 'error',
                title: 'Terjadi kesalahan!',
                text: 'Coba lagi.',
                timer: 3000, // Auto close after 3 seconds
                showConfirmButton: false // Hide confirm button
            });
        }
    });
});

        // Handling modal popup confirmation
        $("#bayar-btn").click(function(event) {
            event.preventDefault(); // Prevent form submission
            var totalPembayaran = $("#total-pembayaran").text();
            $("#konser-detail").text("Total Pembayaran: " + totalPembayaran);
            $("#modal").removeClass('hidden'); // Show the modal
        });

        // Hide modal on 'Batal' button click
        $("#batal-btn").click(function() {
            $("#modal").addClass('hidden'); // Hide modal
        });

        // Handle payment confirmation
        $("#konfirmasi-btn").click(function() {
            let createdAt = new Date().toLocaleString(); // Get the current date/time
            $("#created-at-date").text(createdAt); // Set the created_at date in the popup
            showPopup(); // Show payment success popup
            $("#modal").addClass('hidden'); // Hide modal after confirmation
        });
    });

    // Function to show payment success popup
    function showPopup() {
        let popupContainer = $('#popupContainer');
        let totalPembayaran = $("#total-pembayaran").text() || "Rp0";
        $("#popup-total").text(totalPembayaran);
        popupContainer.css('display', 'flex');

        // Timer countdown logic
        let countdownTime = 29; // 29 seconds
        let timerElement = $("#timer");

        let countdownInterval = setInterval(function() {
            timerElement.text(`00:${String(countdownTime).padStart(2, '0')}`);
            countdownTime--;

            if (countdownTime < 0) {
                clearInterval(countdownInterval);
                window.location.href = "{{ route('history.index') }}"; // Redirect to history page
            }
        }, 1000); // Update every 1 second
    }

    document.getElementById('close').addEventListener('click', function() {
        document.getElementById('popupContainer').style.display = 'none'; // Hide the popup
    });
</script>