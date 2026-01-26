<nav class="relative bg-gradient-to-r from-yellow-300 via-amber-400 to-orange-400
            shadow-2xl shadow-amber-500/40 px-6 py-3 overflow-hidden">

    <!-- Glossy highlight atas -->
    <div class="absolute inset-0 bg-gradient-to-b from-white/50 via-white/20 to-transparent"></div>

    <!-- Glow line -->
    <div class="absolute bottom-0 left-0 w-full h-[2px] bg-gradient-to-r from-transparent via-white/70 to-transparent"></div>

    <div class="relative flex justify-between items-center">

        <!-- KIRI -->
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
            <img src="{{ asset('img/logo-kominfo.png') }}"
         class="h-9 drop-shadow-md group-hover:scale-105 transition">

            <span
                class="font-extrabold text-2xl tracking-wide
                        bg-gradient-to-r from-blue-700 via-sky-600 to-cyan-500
                        bg-clip-text text-transparent
                        transition-all duration-300
                        group-hover:tracking-widest">
                Sistem Buku Tamu
            </span>
        </a>


        <!-- KANAN -->
        <div class="flex items-center gap-5" x-data="{ showProfile: false }">

            <span class="text-bold font-light text-gray-800">
                {{ Auth::user()->name }}
            </span>

            <!-- FOTO PROFIL (klik untuk modal) -->
            <div class="relative">
                <img src="{{ Auth::user()->photo 
                              ? asset('uploads/profile/' . Auth::user()->photo) 
                              : asset('img/Admin.png') }}"
                     class="w-10 h-10 rounded-full
                            ring-2 ring-white/90
                            shadow-lg shadow-orange-500/40
                            hover:scale-105 transition cursor-pointer"
                     @click="showProfile = true">

                <!-- MODAL DETAIL PROFIL -->
                <div x-show="showProfile"
                     class="fixed inset-0 bg-black/50 flex items-center justify-center z-50"
                     x-transition>
                    <div class="bg-white rounded-xl shadow-2xl p-6 w-80 relative"
                         @click.away="showProfile = false">

                        <!-- TUTUP -->
                        <button @click="showProfile = false"
                                class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 text-lg">
                            ✕
                        </button>

                        <!-- FOTO & INFO -->
                        <div class="flex flex-col items-center gap-4">
                            <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-blue-500">
                                <img src="{{ Auth::user()->photo 
                                             ? asset('uploads/profile/' . Auth::user()->photo) 
                                             : asset('img/Admin.png') }}" 
                                     class="object-cover w-full h-full">
                            </div>
                            <h2 class="text-xl font-bold">{{ Auth::user()->name }}</h2>
                            <p class="text-gray-600">{{ Auth::user()->email }}</p>
                        </div>

                        <!-- EDIT PROFIL -->
                        <a href="{{ route('settings') }}"
                           class="mt-4 block text-center bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition">
                            Edit Profil
                        </a>
                    </div>
                </div>
            </div>

            <!-- SETTINGS -->
            <a href="{{ route('settings') }}"
               class="text-gray-800 hover:text-black text-xl transition
                      drop-shadow-sm">
                ⚙️
            </a>

        </div>

    </div>
</nav>
