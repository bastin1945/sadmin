<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Jelajahi') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

    :root {
  --primary-color: #2f2f2f;
  --text-dark: #18181b;
  --text-light: #71717a;
  --white: #ffffff;
  --max-width: 1200px;
  --header-font: "poppins", serif;
}

nav {
  max-width: var(--max-width);
  margin: auto;
  padding: 1rem 1rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.nav__logo {
  flex: 1;
  margin:0;
}

.nav__logo a {
  font-size: 1.7rem; /* Dikurangi sedikit dari 1.8rem */
  font-weight: 700;
  font-family: var(--header-font);
  color: var(--white);
}

.nav__links {
  list-style: none;
  display: flex;
  align-items: center;
  gap: 2rem;
}

/* Header & Navigation */
.header {
  position: relative;
  top: 0;
  left: 0;
  width: 100%;
  background-color: #080113;
  transition: .4s;
}

.nav {
  height: var(--header-height);
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.nav__logo {
  color: #fff;
  display: inline-flex;
  align-items: center;
  column-gap: .25rem;
  font-weight: var(--font-medium);
  transition: .3s;
  font-size: 1.6rem; /* Dikurangi sedikit dari 1.7rem */
}

.nav__logo i {
  font-size: 1.2rem; /* Dikurangi sedikit dari 1.3rem */
}

.nav__logo:hover {
  color: var(--first-color);
}

@media screen and (max-width:1023px) {
  .nav__menu {
    position: fixed;
    bottom: 2rem;
    background-color: var(--container-color);
    box-shadow: 0 8px 24px hsla(228, 66%, 45%, .15);
    width: 90%;
    left: 0;
    right: 0;
    margin: 0 auto;
    padding: 1.4rem 3rem; /* Sedikit dikurangi dari 1.5rem */
    border-radius: 1.25rem;
    transition: .4s;
  }

  .nav__list {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .nav__link {
    color: var(--text-color);
    display: flex;
    padding: .55rem; /* Dikurangi sedikit dari .6rem */
    border-radius: 50%;
    font-size: 1.25rem; /* Dikurangi sedikit dari 1.3rem */
  }

  .nav__link i {
    font-size: 1.4rem; /* Dikurangi sedikit dari 1.5rem */
  }

  .nav__link span {
    display: none;
  }
}

.nav {
  height: calc(var(--header-height) + 1.8rem); /* Dikurangi sedikit */
}

header h1 {
  font-size: 2.1rem; /* Dikurangi sedikit dari 2.2rem */
}

header nav a {
  text-decoration: none;
  color: #fff;
  margin: 0 15px;
  font-weight: bold;
  font-size: 1.2rem; /* Dikurangi sedikit dari 1.3rem */
  transition: color 0.3s ease;
}

header nav a:hover {
  color: #f4d03f;
}


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
            overflow:hidden;
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
    background: rgba(255, 255, 255, 0.1); /* Transparan dengan warna dasar */
    backdrop-filter: blur(10px); /* Efek blur kaca */
    border: 1px solid rgba(255, 255, 255, 0.3); /* Border halus */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Efek bayangan lembut */
    transition: transform 0.2s, box-shadow 0.2s; /* Animasi pada hover */
}

.glass-effect:hover {
    transform: scale(1.05); /* Perbesar sedikit saat hover */
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2); /* Bayangan lebih besar saat hover */
}



</style>

<header class="header" id="header">
      <nav class="nav">
      <img src="assets/removebg.png" alt="" style="width: 50px; height: auto;"/>
          <a href="#" class="nav__logo" style="font-family: 'Poppins', sans-serif;  font-weight: 600;  font-size: 24px; ">
              IBESTIX <i class="bx bxs-home-alt-2"></i>
          </a>
          <div class="mr-8">
          <!-- Themechange button -->
          <a href="">
            Home
          </a>

          <a href="{{ route('jelajahi') }}">
    Jelajahi
</a>

          </div>
          @if (Route::has('login'))

                            @auth
                                <a href="{{ url('/dashboard') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Dashboard</a>
                            @else

                            <a
                                    href="{{ route('login') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                >
                                    Log in
                                </a>
                              <div class="text-white">|</div>
                                @if (Route::has('register'))
                                    <a
                                        href="{{ route('register') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Register
                                    </a>
                                @endif
                            @endauth

                    @endif
      </nav>
  </header>

            <div>
                <section class="w-full">

                    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">

                    </div>

                    <div id="targetSection" class="relative py-0 mx-auto w-[90%] max-w-7xl overflow-hidden bg-gray-100 mb-0 mt-10 rounded-lg">
    <div id="sliderWrapper" class="relative overflow-hidden">
        <div id="slider" class="flex transition-transform duration-400 ease-in-out">
            <!-- Slide Items -->
            <div class="flex-shrink-0 w-full slide"><img src="assets/hd1.png" alt="Slide 1" class="w-full h-auto rounded-3xl"></div>
            <div class="flex-shrink-0 w-full slide"><img src="assets/hd2.png" alt="Slide 2" class="w-full h-auto rounded-3xl"></div>
            <div class="flex-shrink-0 w-full slide"><img src="assets/hd3.png" alt="Slide 3" class="w-full h-auto rounded-3xl"></div>
            <div class="flex-shrink-0 w-full slide"><img src="assets/hd4.png" alt="Slide 4" class="w-full h-auto rounded-3xl"></div>
            <div class="flex-shrink-0 w-full slide"><img src="assets/hd5.png" alt="Slide 5" class="w-full h-auto rounded-3xl"></div>
        </div>
    </div>
    
    <!-- Navigasi -->
    <button id="prevBtn"
                            class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white text-black rounded-full p-3 shadow hover:scale-110 transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button id="nextBtn"
                            class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white text-black rounded-full p-3 shadow hover:scale-110 transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
    
    <!-- Indikator -->
    <div id="indicators" class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
        <span class="w-3 h-3 bg-gray-400 rounded-full cursor-pointer"></span>
        <span class="w-3 h-3 bg-gray-400 rounded-full cursor-pointer"></span>
        <span class="w-3 h-3 bg-gray-400 rounded-full cursor-pointer"></span>
        <span class="w-3 h-3 bg-gray-400 rounded-full cursor-pointer"></span>
        <span class="w-3 h-3 bg-gray-400 rounded-full cursor-pointer"></span>
    </div>
</div>

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

<div class="container mx-auto px-4 3xl:px-8 py-8 mt-10">
    <div class="grid grid-cols-3 gap-6">
        @foreach ($konsers as $knsr)
            <div class="m-4 bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105 hover:shadow-xl">
                <!-- Menampilkan gambar -->
                @if ($knsr->image)
                    <img src="{{ asset('storage/' . $knsr->image) }}" alt="Gambar {{ $knsr->nama }}"
                        class="w-full h-48 object-cover transition-transform duration-300 ease-in-out">
                @else
                    <img src="{{ asset('images/default.jpg') }}" alt="Default Gambar"
                        class="w-full h-48 object-cover transition-transform duration-300 ease-in-out">
                @endif

                <div class="p-4">
                    <h3 class="text-xl font-semibold text-gray-800 hover:text-blue-600 transition-colors duration-200">
                        {{ $knsr->nama }}</h3>
                    <ul class="event-details text-gray-600 mt-2 space-y-1">
                        <li class="flex items-center text-sm">
                            <i class="fa-solid fa-calendar-days mr-2 text-gray-500"></i>{{ $knsr->tanggal }}</li>
                        <li class="flex items-center text-sm">
                            <i class="fa-solid fa-map-marker-alt mr-2 text-gray-500"></i>{{ $knsr->lokasi->location }}</li>
                    </ul>

                    <div class="flex items-center justify-between mt-4">
                        @foreach ($knsr->tiket as $kt)
                            <div class="flex flex-col justify-between">
                                <p class="text-sm font-bold text-orange-600 mb-2">Stok: {{ $kt->jumlah_tiket }} tiket</p>
                                <p class="text-xl font-bold text-orange-600 mb-2">Rp:{{ number_format($kt->harga_tiket, 0, ',', '.') }},00</p>
                            </div>
                        @endforeach

                        <a href="{{ route('product.show', $knsr->id) }}"
                            class="mt-9 inline-block bg-blue-700 text-white text-center py-2 px-6 rounded-md text-sm hover:bg-blue-800 transition duration-200 h-full flex items-center justify-center">
                            Detail
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

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
                position: absolute; /* Mengatur posisi tombol relatif ke container terdekat */
                bottom: -60px; /* Tombol berada 60px di bawah elemen pencarian */
                left: 50%; /* Pusatkan tombol secara horizontal */
                transform: translateX(-50%); /* Menyesuaikan posisi agar benar-benar di tengah */
                display: flex;
                justify-content: center;
                align-items: center;
                width: 70px; /* Lebar tombol */
                height: 70px; /* Tinggi tombol */
                border:2px solid white;
                background-color: transparent;
                color: white; /* Warna teks di tombol */
                font-size: 24px;
                border-radius: 50%; /* Membuat tombol bundar */
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); /* Menambah bayangan */
                transition: transform 0.3s ease-in-out, background-color 0.3s;
                cursor: pointer;
                margin-top:20px;
            }

            .scroll-btn:hover {
                background-color: rgba(13, 54, 165, 0.21); /* Biru lebih gelap saat hover */
                transform: translateX(-50%) scale(1.1); /* Menjaga posisi tengah saat diperbesar */
            }

            .scroll-btn i {
                animation: bounce 2s infinite; /* Menambahkan animasi melompat */
            }
            .ri-arrow-down-double-line {
    font-size: 2.5rem; /* Sesuaikan ukuran panah */
}

            /* Animasi untuk ikon */
            @keyframes bounce {
                0%, 100% {
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
