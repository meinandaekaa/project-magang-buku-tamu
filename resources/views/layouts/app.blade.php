<!DOCTYPE html>
<html lang="id" x-data>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Buku Tamu</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        inter: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
</head>

<body class="font-inter bg-slate-100">

{{-- NAVBAR --}}
@include('layouts.navbar')

<div class="flex min-h-screen">

    {{-- SIDEBAR --}}
    <aside
        x-data="{ open: true }"
        :class="open ? 'w-[260px]' : 'w-[72px]'"
        class="bg-gradient-to-b from-blue-500 via-blue-600 to-blue-800
       text-white min-h-screen transition-all duration-300 shadow-xl">

        <!-- HEADER -->
        <div class="flex items-center justify-between px-4 py-4">
            <span x-show="open" x-transition class="text-lg font-semibold">
                Buku Tamu
            </span>

            <!-- TOGGLE -->
            <button @click="open = !open"
                    class="text-white text-xl focus:outline-none">
                ☰
            </button>
        </div>

        <!-- MENU -->
        <!-- MENU -->
<nav class="flex flex-col gap-1 px-2">

    <!-- DASHBOARD -->
    <a href="{{ route('dashboard') }}"
       class="flex items-center gap-3 px-4 py-3 rounded-lg
              bg-blue-500 hover:bg-blue-600 transform hover:scale-105
              transition-all duration-300 ease-in-out">
        <svg class="w-5 h-5" fill="none" stroke="currentColor"
             viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                  stroke-width="2"
                  d="M3 10h4V3H3v7zm0 11h4v-7H3v7zm7-11h4V3h-4v7zm0 11h4v-7h-4v7zm7-11h4V3h-4v7zm0 11h4v-7h-4v7z"/>
        </svg>
        <span x-show="open" x-transition class="transition-all duration-300 ease-in-out">Dashboard</span>
    </a>

    <!-- FORM -->
    <a href="{{ route('form') }}"
       class="flex items-center gap-3 px-4 py-3 rounded-lg
              hover:bg-blue-600 transform hover:scale-105
              transition-all duration-300 ease-in-out">
        <svg class="w-5 h-5" fill="none" stroke="currentColor"
             viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 4v16m8-8H4"/>
        </svg>
        <span x-show="open" x-transition class="transition-all duration-300 ease-in-out">Form</span>
    </a>

    <!-- DATA TAMU -->
    <a href="{{ route('data-tamu') }}"
       class="flex items-center gap-3 px-4 py-3 rounded-lg
              hover:bg-blue-600 transform hover:scale-105
              transition-all duration-300 ease-in-out">
        <svg class="w-5 h-5" fill="none" stroke="currentColor"
             viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                  stroke-width="2"
                  d="M17 20h5v-2a4 4 0 00-4-4h-1
                     m-4 6H2v-2a4 4 0 014-4h1
                     m6-6a4 4 0 11-8 0 4 4 0 018 0
                     zm6 4a4 4 0 10-8 0 4 4 0 008 0z"/>
        </svg>
        <span x-show="open" x-transition class="transition-all duration-300 ease-in-out">Data Tamu</span>
    </a>

    <!-- ABOUT -->
    <a href="{{ route('about') }}"
       class="flex items-center gap-3 px-4 py-3 rounded-lg
              hover:bg-blue-600 transform hover:scale-105
              transition-all duration-300 ease-in-out">
        <svg class="w-5 h-5" fill="none" stroke="currentColor"
             viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                  stroke-width="2"
                  d="M5.121 17.804A13.937 13.937 0 0112 15
                     c2.5 0 4.847.655 6.879 1.804
                     M15 10a3 3 0 11-6 0 3 3 0 016 0z"/>
        </svg>
        <span x-show="open" x-transition class="transition-all duration-300 ease-in-out">About</span>
    </a>

</nav>
    <!-- LOGOUT DI PALING BAWAH -->
    <form action="{{ route('logout') }}" method="POST" class="px-2 mb-4">
        @csrf
        <button type="submit"
                class="flex items-center gap-3 px-4 py-3 rounded-lg
                       hover:bg-blue-600 transform hover:scale-105
                       transition-all duration-300 ease-in-out shadow-md w-full text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-11V5" />
            </svg>
            <span x-show="open" x-transition>Logout</span>
        </button>
    </form>
    </aside>

    {{-- CONTENT --}}
    <main class="flex-1 p-6">
        @yield('body')
    </main>

</div>

</body>
</html>