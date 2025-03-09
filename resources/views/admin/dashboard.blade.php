
<x-admin-layout>

<div class="mt-4">
    <div class="flex flex-wrap -mx-6">

        <div class="w-full px-6 sm:w-1/2 xl:w-1/3">
                <div class="relative flex justify-between items-start px-5 py-3 shadow-sm rounded-lg bg-white">
                    <div id="ticket-container">
                        <h5 class="mb-2 font-semibold text-gray-500">Total tiket terjual</h5>
                        <h2 id="total-tickets" class="mb-2 text-3xl font-bold text-gray-700">{{ $totalTickets }}</h2>
                        <div class="flex items-center">
                            <div id="percentage" class="mr-1 font-semibold text-green-500">
                                {{ number_format($percentage, 2) }}%</div>
                            <div class="text-md font-semibold text-gray-500">Naik dalam 1 minggu</div>
                        </div>
                    </div>
                    <div class="absolute top-7 right-8 p-3 rounded-3xl bg-indigo-600 bg-opacity-35 transform translate-x-2 -translate-y-2">
                <svg class="h-10 w-10 text-indigo-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd" d="M1.5 6.375c0-1.036.84-1.875 1.875-1.875h17.25c1.035 0 1.875.84 1.875 1.875v3.026a.75.75 0 0 1-.375.65 2.249 2.249 0 0 0 0 3.898.75.75 0 0 1 .375.65v3.026c0 1.035-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 0 1 1.5 17.625v-3.026a.75.75 0 0 1 .374-.65 2.249 2.249 0 0 0 0-3.898.75.75 0 0 1-.374-.65V6.375Zm15-1.125a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-1.5 0V6a.75.75 0 0 1 .75-.75Zm.75 4.5a.75.75 0 0 0-1.5 0v.75a.75.75 0 0 0 1.5 0v-.75Zm-.75 3a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-1.5 0v-.75a.75.75 0 0 1 .75-.75Zm.75 4.5a.75.75 0 0 0-1.5 0V18a.75.75 0 0 0 1.5 0v-.75ZM6 12a.75.75 0 0 1 .75-.75H12a.75.75 0 0 1 0 1.5H6.75A.75.75 0 0 1 6 12Zm.75 2.25a.75.75 0 0 0 0 1.5h3a.75.75 0 0 0 0-1.5h-3Z" clip-rule="evenodd" />
                </svg>

                </div>
                </div>
            </div>

       <div class="w-full px-6 sm:w-1/2 xl:w-1/3">
    <div class="relative flex justify-between items-start px-5 py-3 shadow-sm rounded-lg bg-white">
        <div id="revenue-container">
            <h5 class="mb-2 font-semibold text-gray-500">Total Pendapatan</h5>
            <h2 id="total-revenue" class="mb-2 text-3xl font-bold text-gray-700">{{ number_format($websiteRevenue, 2) }}</h2>
            <div class="flex items-center">
                <svg id="icon" class="h-4 w-4 mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path id="icon-path" class="fill-current text-green-500" d="M24 3.875l-6 1.221 1.716 1.708-5.351 5.358-3.001-3.002-7.336 7.242 1.41 1.418 5.922-5.834 2.991 2.993 6.781-6.762 1.667 1.66 1.201-6.002zm0 17.125v2h-24v-22h2v20h22z"/>
                </svg>
                <div id="percentage" class="mr-1 font-semibold text-green-500">{{ number_format($websitePercentage, 2) }}%</div>
                <div class="text-md font-semibold text-gray-500">Naik dalam 1 minggu</div>
            </div>
        </div>
        <div class="absolute top-7 right-8 p-3 rounded-3xl bg-yellow-600 bg-opacity-35 transform translate-x-2 -translate-y-2">
            <svg class="h-10 w-10 text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path d="M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 0 1-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004ZM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 0 1-.921.42Z" />
                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v.816a3.836 3.836 0 0 0-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 0 1-.921-.421l-.879-.66a.75.75 0 0 0-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 0 0 1.5 0v-.81a4.124 4.124 0 0 0 1.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 0 0-1.821-.75V8.354c.29.082.559.213.786.393l.415.33a.75.75 0 0 0 .933-1.175l-.415-.33a3.836 3.836 0 0 0-1.719-.755V6Z" clip-rule="evenodd" />
            </svg>
        </div>
    </div>
</div>

      <div class="w-full px-6 sm:w-1/2 xl:w-1/3">
    <div class="relative flex justify-between items-start px-5 py-3 shadow-sm rounded-lg bg-white">
        <div id="vendor-revenue-container">
            <h5 class="mb-2 font-semibold text-gray-500">Total Pendapatan Vendor</h5>
            <h2 id="vendor-revenue" class="mb-2 text-3xl font-bold text-gray-700">{{ number_format($vendorRevenue, 2) }}</h2>
            <div class="flex items-center">
                <svg id="icon" class="h-4 w-4 mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path id="icon-path" class="fill-current text-green-500" d="M24 3.875l-6 1.221 1.716 1.708-5.351 5.358-3.001-3.002-7.336 7.242 1.41 1.418 5.922-5.834 2.991 2.993 6.781-6.762 1.667 1.66 1.201-6.002zm0 17.125v2h-24v-22h2v20h22z"/>
                </svg>
                <div id="vendor-percentage" class="mr-1 font-semibold text-green-500">{{ number_format($vendorPercentage, 2) }}%</div>
                <div class="text-md font-semibold text-gray-500">Naik dalam 1 minggu</div>
            </div>
        </div>
        <div class="absolute top-7 right-8 p-3 rounded-3xl bg-yellow-600 bg-opacity-35 transform translate-x-2 -translate-y-2">
            <svg class="h-10 w-10 text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path d="M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 0 1-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004ZM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 0 1-.921.42Z" />
                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v.816a3.836 3.836 0 0 0-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 0 1-.921-.421l-.879-.66a.75.75 0 0 0-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 0 0 1.5 0v-.81a4.124 4.124 0 0 0 1.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 0 0-1.821-.75V8.354c.29.082.559.213.786.393l.415.33a.75.75 0 0 0 .933-1.175l-.415-.33a3.836 3.836 0 0 0-1.719-.755V6Z" clip-rule="evenodd" />
            </svg>
        </div>
    </div>
</div>
<div class="relative flex justify-between items-start px-5 py-3 shadow-sm rounded-md mt-5 w-full">
    <!-- Grafik Garis 1 -->
    <div class="mt-8 w-full max-w-[600px] bg-white rounded-md mr-5">
        <canvas id="lineChart1" width="500" height="300" class="mx-auto"></canvas>
    </div>

    <!-- Grafik Garis 2 -->
    <div class="mt-8 w-full max-w-[600px] bg-white rounded-md">
        <canvas id="lineChart2" width="500" height="300" class="mx-auto"></canvas>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Grafik Garis 1



    var ctxLine1 = document.getElementById('lineChart1').getContext('2d');
    var lineChart1 = new Chart(ctxLine1, {
        type: 'line',
        data: {

            labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
            datasets: [{
                label: 'Pengguna Aktif',
                data: @json($activeUsers), // Menggunakan data dari controller
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 2,
                fill: true
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });


        // Grafik Garis 2 (Model Berbeda)
         var ctxLine2 = document.getElementById('lineChart2').getContext('2d');
    var lineChart2 = new Chart(ctxLine2, {
        type: 'line', // Jenis grafik garis
        data: {
            labels: @json($dates), // Menggunakan data tanggal dari controller
            datasets: [{
                label: 'Penjualan Tiket',
                data: @json($totals), // Menggunakan data total tiket dari controller
                borderColor: 'rgba(255, 159, 64, 1)', // Warna garis berbeda
                backgroundColor: 'rgba(255, 159, 64, 0.2)', // Warna latar belakang area grafik berbeda
                borderWidth: 2,
                fill: true
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>
</div>

    <div class=" mt-0 w-full max-w-[1210px] bg-gray-100 rounded-md">
        <canvas id="myChart" width="1170" height="400" class="mx-auto"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar', // Jenis chart (bar, line, pie, dll)
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'], // Label untuk sumbu X
            datasets: [{
                label: 'Pendapatan Bulanan',
                data: @json($revenueData), // Menggunakan data dari controller
                backgroundColor: 'rgba(54, 162, 235, 0.2)', // Warna latar belakang bar
                borderColor: 'rgba(54, 162, 235, 1)', // Warna border bar
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true // Mulai dari angka 0
                }
            }
        }
    });

        // Data otomatif
        async function fetchData() {
            try {
            // Ambil data pengguna aktif
                const responseUsers = await fetch('/api/users/active');
                const dataUsers = await responseUsers.json();

                const totalUsersElement = document.getElementById('total-active-users');
                const percentageElementUsers = document.getElementById('active-users-percentage');
                const iconPath = document.getElementById('active-users-icon-path');

                let prevTotalUsers = parseInt(totalUsersElement.textContent.replace(/,/g, ''), 10) || 0;
                let newTotalUsers = parseInt(dataUsers.total_active_users) || 0;
                let percentageIncreaseUsers = prevTotalUsers === 0 ? 0 : ((newTotalUsers - prevTotalUsers) / prevTotalUsers) * 100;

                // Update tampilan pengguna aktif
                totalUsersElement.textContent = newTotalUsers.toLocaleString('id-ID');
                percentageElementUsers.textContent = percentageIncreaseUsers.toFixed(1) + "%";

                // Update warna berdasarkan tren pengguna aktif
                if (newTotalUsers > prevTotalUsers) {
                    percentageElementUsers.classList.add('text-green-500');
                    percentageElementUsers.classList.remove('text-red-500');
                    iconPath.setAttribute('class', 'fill-current text-green-500');
                } else if (newTotalUsers < prevTotalUsers) {
                    percentageElementUsers.classList.add('text-red-500');
                    percentageElementUsers.classList.remove('text-green-500');
                    iconPath.setAttribute('class', 'fill-current text-red-500');
                }

                // Ambil data tiket
                const responseTickets = await fetch('/api/tickets');
                const dataTickets = await responseTickets.json();

                const totalTicketsElement = document.getElementById('total-tickets');
                const percentageElementTickets = document.getElementById('percentage');
                const iconElement = document.getElementById('icon');

                let prevTotalTickets = parseInt(totalTicketsElement.textContent.replace(/,/g, ''), 10) || 0;
                let newTotalTickets = dataTickets.total_tickets || 0;
                let percentageIncreaseTickets = ((newTotalTickets - prevTotalTickets) / (prevTotalTickets || 1)) * 100;

                // Update tampilan tiket
                totalTicketsElement.textContent = newTotalTickets.toLocaleString(); // Format angka
                percentageElementTickets.textContent = percentageIncreaseTickets.toFixed(1) + "%";

                // Update warna berdasarkan tren tiket
                if (newTotalTickets > prevTotalTickets) {
                    percentageElementTickets.classList.add('text-green-500');
                    percentageElementTickets.classList.remove('text-red-500');
                    iconElement.querySelector('path').classList.add('text-green-500');
                    iconElement.querySelector('path').classList.remove('text-red-500');
                } else if (newTotalTickets < prevTotalTickets) {
                    percentageElementTickets.classList.add('text-red-500');
                    percentageElementTickets.classList.remove('text-green-500');
                    iconElement.querySelector('path').classList.add('text-red-500');
                    iconElement.querySelector('path').classList.remove('text-green-500');
                }

                // Ambil data pendapatan
                const responseRevenue = await fetch('/api/revenue');
                const dataRevenue = await responseRevenue.json();

                const totalRevenueElement = document.getElementById('total-revenue');
                const percentageElementRevenue = document.getElementById('percentage-revenue');
                const iconPathRevenue = document.getElementById('icon-path-revenue');

                let prevRevenue = parseInt(totalRevenueElement.textContent.replace(/,/g, ''), 10) || 0;
                let newRevenue = parseInt(dataRevenue.total_revenue) || 0;
                let percentageIncreaseRevenue = prevRevenue === 0 ? 0 : ((newRevenue - prevRevenue) / prevRevenue) * 100;

                // Update tampilan dengan format angka
                totalRevenueElement.textContent = newRevenue.toLocaleString('id-ID');
                percentageElementRevenue.textContent = percentageIncreaseRevenue.toFixed(1) + "%";

                // Update warna berdasarkan tren pendapatan
                if (newRevenue > prevRevenue) {
                    percentageElementRevenue.classList.add('text-green-500');
                    percentageElementRevenue.classList.remove('text-red-500');
                    iconPathRevenue.setAttribute('class', 'fill-current text-green-500');
                } else if (newRevenue < prevRevenue) {
                    percentageElementRevenue.classList.add('text-red-500');
                    percentageElementRevenue.classList.remove('text-green-500');
                    iconPathRevenue.setAttribute('class', 'fill-current text-red-500');
                }
            } catch (error) {
            console.error("Gagal mengambil data:", error);
            }
        }

        // Ambil data pertama kali dan set interval untuk update otomatis
        fetchData();
        setInterval(fetchData, 5000); // Update setiap 5 detik
    </script>
</div>

</x-admin-layout>

