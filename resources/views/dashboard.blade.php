    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }


        .hero-section {
            position: relative;
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            overflow: hidden;
        }

        .card {
            border: 1px solid black;
            border-radius: 10px;
            overflow: hidden;
            background: #fff;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
            width: 300px;
            /* Menentukan lebar card */
            margin: 0 10px;
            /* Memberikan margin kiri dan kanan */
        }

        .card:hover {
            transform: scale(1.03);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .card-content {
            padding: 16px;
        }

        .card-content h4 {
            font-size: 18px;
            font-weight: bold;
            margin: 0 0 8px;
            color: #333;
        }

        .card-content p {
            font-size: 14px;
            color: #666;
            margin: 0 0 12px;
        }

        .card-content .price {
            font-size: 16px;
            font-weight: bold;
            color: #ff5722;
            margin: 0 0 12px;
        }

        .card-content .button {
            background: #007bff;
            color: #fff;
            text-align: center;
            border: none;
            border-radius: 20px;
            padding: 8px 16px;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
        }

        .card-content .button:hover {
            background: #0056b3;
        }

        .flex justify-center {
            justify-content: center;
        }



        .card {
            width: 300px;

        }


        .card-content {
            padding: 10px;
        }

        /* Custom style for box layout */
        .event-box {
            width: 350px;
            /* Atur lebar box sesuai keinginan */
            padding: 25px;
            margin: 0 auto;
            /* Pusatkan box */
        }

        .event-box img {
            height: 300px;
            height: 30%;
            object-fit: cover;
        }

        .event-details {
            font-size: 14px;
        }

        #slider {
            display: flex;
            transition: transform 0.5s ease-in-out;
            /* Menambahkan animasi transisi */
        }

        #slider>div {
            flex-shrink: 0;
            width: 100%;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            /* Transparan dengan warna dasar */
            backdrop-filter: blur(10px);
            /* Efek blur kaca */
            border: 1px solid rgba(255, 255, 255, 0.3);
            /* Border halus */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Efek bayangan lembut */
            transition: transform 0.2s, box-shadow 0.2s;
            /* Animasi pada hover */
        }

        .glass-effect:hover {
            transform: scale(1.05);
            /* Perbesar sedikit saat hover */
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            /* Bayangan lebih besar saat hover */
        }

        .shimmering-effect {
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.8) 25%, rgba(230, 230, 230, 0.8) 50%, rgba(255, 255, 255, 0.8) 75%);
            background-size: 200% 100%;
            animation: shimmer 1.5s infinite linear;
        }

        @keyframes shimmer {
            0% {
                background-position: 200% 0;
            }

            100% {
                background-position: -200% 0;
            }
        }

        /* Hover effect for the form */


        /* Hover effect for the select and input */
        .shimmering-effect:hover {
            border-color: #3b82f6;
            /* Blue border on hover */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

    </style>

    <x-app-layout>
        <x-slot name="header">

            <div>
                <section class="w-full">

                    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">

            </div>

            <!-- Slider Header -->
            <div>
                <section class="w-full">

                    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">

            </div>

           <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Slider with Glow Effect</title>
    <style>
        /* Glow effect for the images */
        #slider .slide img {
            transition: box-shadow 0.3s ease-in-out;
        }

        #slider .slide img:hover {
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.8), 0 0 40px rgba(0, 0, 255, 0.7);
        }

        /* Glow effect for buttons */
        button {
            transition: box-shadow 0.3s ease-in-out;
        }

        button:hover {
            box-shadow: 0 0 15px rgba(0, 0, 255, 0.7), 0 0 30px rgba(0, 0, 255, 0.5);
        }
    </style>
</head>
<body>
    <div id="targetSection" class="relative py-0 mx-auto w-[90%] max-w-7xl overflow-hidden bg-gray-100 mb-0 rounded-lg" style="margin-top:150px;">
        <div id="sliderWrapper" class="relative overflow-hidden">
            <div id="slider" class="flex transition-transform duration-400 ease-in-out">
                <!-- Slide Items -->
                <div class="flex-shrink-0 w-full slide">
                    <img src="assets/hd1.png" alt="Slide 1" class="w-full h-auto rounded-3xl">
                </div>
                <div class="flex-shrink-0 w-full slide">
                    <img src="assets/hd2.png" alt="Slide 2" class="w-full h-auto rounded-3xl">
                </div>
                <div class="flex-shrink-0 w-full slide">
                    <img src="assets/hd3.png" alt="Slide 3" class="w-full h-auto rounded-3xl">
                </div>
                <div class="flex-shrink-0 w-full slide">
                    <img src="assets/hd4.png" alt="Slide 4" class="w-full h-auto rounded-3xl">
                </div>
                <div class="flex-shrink-0 w-full slide">
                    <img src="assets/hd5.png" alt="Slide 5" class="w-full h-auto rounded-3xl">
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <button id="prevBtn" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white text-black rounded-full p-3 shadow hover:scale-110 transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <button id="nextBtn" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white text-black rounded-full p-3 shadow hover:scale-110 transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>

        <!-- Indicators -->
        <div id="indicators" class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
            <span class="w-3 h-3 bg-gray-400 rounded-full cursor-pointer"></span>
            <span class="w-3 h-3 bg-gray-400 rounded-full cursor-pointer"></span>
            <span class="w-3 h-3 bg-gray-400 rounded-full cursor-pointer"></span>
            <span class="w-3 h-3 bg-gray-400 rounded-full cursor-pointer"></span>
            <span class="w-3 h-3 bg-gray-400 rounded-full cursor-pointer"></span>
        </div>
    </div>
</body>
</html>
            <script>
                let currentIndex = 0;
                const slider = document.getElementById('slider');
                const slides = document.querySelectorAll('.slide');
                const totalSlides = slides.length;
                const prevBtn = document.getElementById('prevBtn');
                const nextBtn = document.getElementById('nextBtn');
                const indicators = document.querySelectorAll('#indicators span');

                function updateSlidePosition() {
                    slider.style.transform = `translateX(-${currentIndex * 100}%)`;
                }

                function updateIndicators() {
                    indicators.forEach((indicator, i) => {
                        if (i === currentIndex) {
                            indicator.classList.add('bg-gray-600');
                            indicator.classList.remove('bg-gray-400');
                        } else {
                            indicator.classList.add('bg-gray-400');
                            indicator.classList.remove('bg-gray-600');
                        }
                    });
                }

                function showSlide(index) {
                    if (index < 0) {
                        currentIndex = totalSlides - 1;
                    } else if (index >= totalSlides) {
                        currentIndex = 0;
                    } else {
                        currentIndex = index;
                    }
                    updateSlidePosition();
                    updateIndicators();
                }

                prevBtn.addEventListener('click', () => showSlide(currentIndex - 1));
                nextBtn.addEventListener('click', () => showSlide(currentIndex + 1));

                indicators.forEach((indicator, i) => {
                    indicator.addEventListener('click', () => showSlide(i));
                });

                setInterval(() => {
                    showSlide(currentIndex + 1);
                }, 5000); // Auto slide setiap 5 detik
            </script>


            <div class="container mx-auto  3xl:px-8 py-8 mt-10 pt-0">
                <div class=''>
                    <form id="search-form"
                        class="flex items-center justify-between max-w-full bg-white rounded-lg py-0 transition-shadow duration-300"
                        method="GET" action="{{ route('dashboard') }}">
                        <label for="voice-search" class="sr-only">Search</label>


                        <div class="relative pr-3 flex-grow">
                            <div
                                class="text-gray-500 absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="text" id="voice-search" name="query"
                                class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-3 shimmering-effect"
                                placeholder="Search Konsers....." oninput="this.form.submit()" />
                        </div>

                        <div class="flex-shrink-0">
                            <div class="pr-3 relative">
                                <select id="countries" name="location"
                                    class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 px-3 py-3 shimmering-effect"
                                    onchange="this.form.submit()">
                                    <option selected>Pilih Lokasi</option>
                                    @foreach ($locations as $loc)
                                        <!-- Loop through locations -->
                                        <option value="{{ $loc->location }}">{{ $loc->location }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div id="date-range-picker" class="flex items-center space-x-4">
                            <div class="relative">
                                <input id="datepicker-range-start" name="start" type="text"
                                    class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-3 shimmering-effect"
                                    placeholder="Select date start" onfocus="(this.type='date')"
                                    onblur="(this.type='text' && !this.value && (this.placeholder='Select date start'))"
                                    oninput="this.form.submit()">
                            </div>

                            <div class="relative">
                                <input id="datepicker-range-end" name="end" type="text"
                                    class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-3 shimmering-effect"
                                    placeholder="Select date end" onfocus="(this.type='date')"
                                    onblur="(this.type='text' && !this.value && (this.placeholder='Select date end'))"
                                    oninput="this.form.submit()">
                            </div>
                        </div>
                        <a href="{{ route('dashboard') }}" class="ml-auto flex items-center">
                            <i class="fas fa-sync-alt mr-2 spin heartbeat pl-3"></i>
                        </a>

                    </form>
                </div>



                <h2 class="text-2xl font-semibold px-0 ">Populer</h2>
                <div class="container mx-auto 3xl:px-8 py- mt-3 ">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7">
                        @foreach ($konsers as $knsr)
                            <div
                                class="bg-white border border-gray-400 rounded-lg  overflow-hidden transition-transform transform hover:scale-105 hover:shadow-xl">
                                <!-- Menampilkan gambar -->
                                @if ($knsr->image)
                                    <img src="{{ asset('storage/' . $knsr->image) }}" alt="Gambar {{ $knsr->nama }}"
                                        class="w-full h-40 object-cover transition-transform duration-300 ease-in-out">
                                @else
                                    <img src="{{ asset('images/default.jpg') }}" alt="Default Gambar"
                                        class="w-full h-40 object-cover transition-transform duration-300 ease-in-out">
                                @endif

                                <div class="p-3">
                                    <h3
                                        class="text-lg font-semibold text-gray-800 hover:text-blue-600 transition-colors duration-200">
                                        {{ $knsr->nama }}</h3>
                                    <ul class="event-details text-gray-600 mt-1 space-y-1">
                                        <li class="flex items-center text-sm">
                                            <i
                                                class="fa-solid fa-calendar-days mr-2 text-gray-500"></i>{{ $knsr->tanggal }}
                                        </li>
                                        <li class="flex items-center text-sm">
                                            <i
                                                class="fa-solid fa-map-marker-alt mr-2 text-gray-500"></i>{{ $knsr->lokasi->location }}
                                        </li>
                                    </ul>

                                    @foreach ($knsr->tiket as $kt)
                                        <div class="flex flex-col">
                                            <p class="text-sm font-bold text-orange-600">Stok: {{ $kt->jumlah_tiket }}
                                                tiket</p>
                                        </div>
                                        <div class="flex items-center justify-between pt-1 ">
                                            <p class="text-xl font-bold text-orange-600">
                                                Rp: {{ number_format($kt->harga_tiket, 0, ',', '.') }}</p>
                                    @endforeach

                                    <a href="{{ route('product.show', $knsr->id) }}"
                                        class=" inline-block bg-blue-700 text-white text-center py-2 px-7 rounded-md text-sm hover:bg-blue-800 transition duration-200 flex items-center justify-center">
                                        Detail
                                    </a>
                                </div>
                            </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="container mx-auto 3xl:px-8 py-8 mt-2 pt-0 pb-0">
                <h2 class="text-2xl font-semibold mb-4">Paling Laris</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7">
                    @foreach ($konsers as $knsr)
                        <div
                            class="bg-white border border-gray-400 rounded-lg  overflow-hidden transition-transform transform hover:scale-105 hover:shadow-xl">
                            <!-- Menampilkan gambar -->
                            @if ($knsr->image)
                                <img src="{{ asset('storage/' . $knsr->image) }}" alt="Gambar {{ $knsr->nama }}"
                                    class="w-full h-40 object-cover transition-transform duration-300 ease-in-out">
                            @else
                                <img src="{{ asset('images/default.jpg') }}" alt="Default Gambar"
                                    class="w-full h-40 object-cover transition-transform duration-300 ease-in-out">
                            @endif

                            <div class="p-3">
                                <h3
                                    class="text-lg font-semibold text-gray-800 hover:text-blue-600 transition-colors duration-200">
                                    {{ $knsr->nama }}</h3>
                                <ul class="event-details text-gray-600 mt-1 space-y-1">
                                    <li class="flex items-center text-sm">
                                        <i
                                            class="fa-solid fa-calendar-days mr-2 text-gray-500"></i>{{ $knsr->tanggal }}
                                    </li>
                                    <li class="flex items-center text-sm">
                                        <i
                                            class="fa-solid fa-map-marker-alt mr-2 text-gray-500"></i>{{ $knsr->lokasi->location }}
                                    </li>
                                </ul>

                                @foreach ($knsr->tiket as $kt)
                                    <div class="flex flex-col">
                                        <p class="text-sm font-bold text-orange-600">Stok: {{ $kt->jumlah_tiket }}
                                            tiket</p>
                                    </div>
                                    <div class="flex items-center justify-between pt-1 ">
                                        <p class="text-xl font-bold text-orange-600">
                                            Rp: {{ number_format($kt->harga_tiket, 0, ',', '.') }}</p>
                                @endforeach

                                <a href="{{ route('product.show', $knsr->id) }}"
                                    class=" inline-block bg-blue-700 text-white text-center py-2 px-7 rounded-md text-sm hover:bg-blue-800 transition duration-200 flex items-center justify-center">
                                    Detail
                                </a>
                            </div>
                        </div>
                </div>
                @endforeach
            </div>
            </div>
            <div class="container mx-auto 3xl:px-8 py-8 ">
                <h2 class="text-2xl font-semibold mb-4">Rekomendasi</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7">
                    @foreach ($konsers as $knsr)
                        <div
                            class="bg-white border border-gray-400 rounded-lg  overflow-hidden transition-transform transform hover:scale-105 hover:shadow-xl">
                            <!-- Menampilkan gambar -->
                            @if ($knsr->image)
                                <img src="{{ asset('storage/' . $knsr->image) }}" alt="Gambar {{ $knsr->nama }}"
                                    class="w-full h-40 object-cover transition-transform duration-300 ease-in-out">
                            @else
                                <img src="{{ asset('images/default.jpg') }}" alt="Default Gambar"
                                    class="w-full h-40 object-cover transition-transform duration-300 ease-in-out">
                            @endif

                            <div class="p-3">
                                <h3
                                    class="text-lg font-semibold text-gray-800 hover:text-blue-600 transition-colors duration-200">
                                    {{ $knsr->nama }}</h3>
                                <ul class="event-details text-gray-600 mt-1 space-y-1">
                                    <li class="flex items-center text-sm">
                                        <i
                                            class="fa-solid fa-calendar-days mr-2 text-gray-500"></i>{{ $knsr->tanggal }}
                                    </li>
                                    <li class="flex items-center text-sm">
                                        <i
                                            class="fa-solid fa-map-marker-alt mr-2 text-gray-500"></i>{{ $knsr->lokasi->location }}
                                    </li>
                                </ul>

                                @foreach ($knsr->tiket as $kt)
                                    <div class="flex flex-col">
                                        <p class="text-sm font-bold text-orange-600">Stok: {{ $kt->jumlah_tiket }}
                                            tiket</p>
                                    </div>
                                    <div class="flex items-center justify-between pt-1 ">
                                        <p class="text-xl font-bold text-orange-600">
                                            Rp: {{ number_format($kt->harga_tiket, 0, ',', '.') }}</p>
                                @endforeach

                                <a href="{{ route('product.show', $knsr->id) }}"
                                    class=" inline-block bg-blue-700 text-white text-center py-2 px-7 rounded-md text-sm hover:bg-blue-800 transition duration-200 flex items-center justify-center">
                                    Detail
                                </a>
                            </div>
                        </div>
                </div>
                @endforeach
            </div>
            </div>

            <center class="flex justify-center">
                <div>
                    <a href="{{ route('lainya.index') }}" class="block">
                        <button
                            class="glass-effect w-full text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-9 py-3 text-center mt-10 mb-10">
                            Lihat lainnya
                        </button>
                    </a>
                </div>
            </center>






            @extends('layouts.footer')


            <script>
                const slider = document.getElementById('slider');
                const prevBtn = document.getElementById('prevBtn');
                const nextBtn = document.getElementById('nextBtn');

                let currentIndex = 0;

                function updateSlider(index) {
                    slider.scrollTo({
                        left: slider.offsetWidth * index,
                        behavior: 'smooth'
                    });
                }

                prevBtn.addEventListener('click', () => {
                    currentIndex = (currentIndex - 1 + slider.children.length) % slider.children.length;
                    updateSlider(currentIndex);
                });

                nextBtn.addEventListener('click', () => {
                    currentIndex = (currentIndex + 1) % slider.children.length;
                    updateSlider(currentIndex);
                });
            </script>

            <style>
                .scroll-btn {
                    position: absolute;
                    /* Mengatur posisi tombol relatif ke container terdekat */
                    bottom: -60px;
                    /* Tombol berada 60px di bawah elemen pencarian */
                    left: 50%;
                    /* Pusatkan tombol secara horizontal */
                    transform: translateX(-50%);
                    /* Menyesuaikan posisi agar benar-benar di tengah */
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 70px;
                    /* Lebar tombol */
                    height: 70px;
                    /* Tinggi tombol */
                    border: 2px solid white;
                    background-color: transparent;
                    color: white;
                    /* Warna teks di tombol */
                    font-size: 24px;
                    border-radius: 50%;
                    /* Membuat tombol bundar */
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
                    /* Menambah bayangan */
                    transition: transform 0.3s ease-in-out, background-color 0.3s;
                    cursor: pointer;
                    margin-top: 20px;
                }

                .scroll-btn:hover {
                    background-color: rgba(13, 54, 165, 0.21);
                    /* Biru lebih gelap saat hover */
                    transform: translateX(-50%) scale(1.1);
                    /* Menjaga posisi tengah saat diperbesar */
                }

                .scroll-btn i {
                    animation: bounce 2s infinite;
                    /* Menambahkan animasi melompat */
                }

                .ri-arrow-down-double-line {
                    font-size: 2.5rem;
                    /* Sesuaikan ukuran panah */
                }

                /* Animasi untuk ikon */
                @keyframes bounce {

                    0%,
                    100% {
                        transform: translateY(0);
                    }

                    50% {
                        transform: translateY(-10px);
                    }
                }

                .scrollbar-hide {
                    -ms-overflow-style: none;
                    /* IE and Edge */
                    scrollbar-width: none;
                    /* Firefox */
                }

                .scrollbar-hide::-webkit-scrollbar {
                    display: none;
                    /* Chrome, Safari, Opera */
                }

                .rounded-lg {
                    border-radius: 0.5rem;
                }

                .shadow {
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                }

                .bg-white {
                    background-color: #ffffff;
                }

                .event-banner {
                    position: relative;
                    text-align: center;
                    color: white;
                }

                .event-photo {
                    width: 100%;
                    height: auto;
                }

                .event-text {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
                }

                h1 {
                    font-size: 2.5rem;
                    font-weight: bold;
                }

                .event-banner {
                    position: relative;
                    width: 100%;
                    max-width: 800px;
                    margin: auto;
                    border-radius: 15px;
                    overflow: hidden;
                    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
                }

                .event-photo {
                    width: 100%;
                    height: auto;
                    display: block;
                }

                .event-text {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    text-align: center;
                    color: white;
                    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
                }

                .event-text h1 {
                    font-size: 2.5rem;
                    font-weight: bold;
                    margin-bottom: 10px;
                }

                .event-text p {
                    font-size: 1.2rem;
                    margin: 5px 0;
                }

                .flex.items-center.justify-between {
                    margin-top: 15px;
                    display: flex;
                    justify-content: space-between;
                }

                .gambartopevent {

                    width: 300px;
                    heigh: 100px;
                }
            </style>
    </x-app-layout>
