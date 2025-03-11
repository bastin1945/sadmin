<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IBESTIX</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    </noscript>
    <style>
        input::placeholder {
            color: #a1a1aa;
            font-size: 14px;
            font-weight: 500;
        }

        button:active {
            transform: scale(0.98);
        }

        /* Header Styles */
        #header {
            box-shadow: 0 -3px 6px rgba(0, 0, 0, 0.1),
                        0 3px 6px rgba(0, 0, 0, 0.1),
                        -3px 0 6px rgba(0, 0, 0, 0.1),
                        3px 0 6px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        nav {
            max-width: 800px; /* Atur sesuai ukuran ideal */
            width: 100%;
        }

        .hidden-header {
            transform: translateY(-135%);
            transition: transform 0.3s ease-in-out;
        }

        .visible-header {
            transform: translateY(0);
            transition: transform 0.3s ease-in-out;
        }

        .dropdown-menu {
            position: absolute;
            right: 0;
            z-index: 10;
            margin-top: 2px;
            width: 48px;
            overflow-hidden;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            background-color: white;
            padding: 2px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@900&display=swap');
        .custom-bold {
            font-family: 'Poppins', sans-serif;
            font-weight: 900;
        }

        /* Styling Active Navbar */
        .nav-link {
            font-size: 1rem;
            font-weight: 600;
            color: #374151;
            transition: all 0.3s ease-in-out;
            padding: 10px;
        }

        .nav-link:hover, .nav-link.active {
            color: #1e40af;
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <header id="header" class="fixed inset-x-0 top-0 z-30 mx-auto max-w-screen-xl bg-white/80 py-4 shadow-lg backdrop-blur-lg md:top-3 md:rounded-2xl transition-all duration-300">
        <div class="px-10 m-3">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center">
                        <img src="{{ asset('assets/removebg.png') }}" alt="Logo" class="h-8 w-8">
                        <h1 class="text-lg text-blue-700 ml-0 font-bold">IBESTIX</h1>
                    </a>
                </div>
                <!-- Navigation Links -->
                <nav class="flex items-center justify-start gap-5 mr-14 my-0 pl-96 py-0">
                    <a href="{{ route('dashboard') }}" class="m-0 text-gray-700 font-semibold text-base transition-all duration-300 hover:text-blue-700 hover:scale-110 {{ request()->routeIs('dashboard') ? 'text-blue-700 scale-110' : '' }}">Home</a>
                    <a href="{{ route('lainya.index') }}" class="m-0 text-gray-700 font-semibold text-base transition-all duration-300 hover:text-blue-700 hover:scale-110 {{ request()->routeIs('lainya.index') ? 'text-blue-700 scale-110' : '' }}">Jelajahi</a>
                    <a href="{{ route('hubungi.index') }}" class="m-0 text-gray-700 font-semibold text-base transition-all duration-300 hover:text-blue-700 hover:scale-110 {{ request()->routeIs('hubungi.index') ? 'text-blue-700 scale-110' : '' }}">Hubungi Kami</a>
                </nav>
                <!-- User Section -->
                <div x-data="{ open: false }" class="relative flex items-center gap-4">
                    @if(Auth::check())
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="flex items-center gap-2 text-sm font-medium text-gray-900 focus:outline-none transition-all duration-200 hover:text-blue-600 hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-9 w-9">
                                <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                            </svg>
                            Hi, {{ Auth::user()->name }}
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.7071 14.7071C12.3166 15.0976 11.6834 15.0976 11.2929 14.7071L6.29289 9.70711C5.90237 9.31658 5.90237 8.68342 6.29289 8.29289C6.68342 7.90237 7.31658 7.90237 7.70711 8.29289L12 12.5858L16.2929 8.29289C16.6834 7.90237 17.3166 7.90237 17.7071 8.29289C18.0976 8.68342 18.0976 9.31658 17.7071 9.70711L12.7071 14.7071Z"></path>
                            </svg>
                        </button>
                        <ul x-show="open" @click.outside="open = false" x-transition class="absolute right-0 mt-1 w-48 overflow-hidden rounded-lg border border-slate-200 bg-white p-2 shadow-lg">
                            <li><a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-gray-200">Dashboard</a></li>
                            <li><a href="{{ route('history.index') }}" class="block px-4 py-2 hover:bg-gray-200">History</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 hover:bg-gray-200">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @else
                    <a href="{{ route('login') }}" class="text-sm font-medium text-gray-900">Login</a>
                    @endif
                </div>
            </div>
        </div>
    </header>
    <script>

        let lastScrollY = window.scrollY;
        const header = document.getElementById("header");
        window.addEventListener("scroll", () => {
            if (window.scrollY > lastScrollY) {
                header.classList.add("-translate-y-full");
            } else {
                header.classList.remove("-translate-y-full");
            }
            lastScrollY = window.scrollY;
        });
    </script>
</body>
</html>
