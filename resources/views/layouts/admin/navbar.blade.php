<!-- Header -->
<header class="h-[76px] bg-white border-b border-slate-200 flex items-center justify-between px-4 lg:px-8 shrink-0 z-30">

    <div class="flex items-center gap-4 flex-1">
        <button
            @click="sidebarOpen = !sidebarOpen"
            class="text-slate-500 p-2 hover:bg-slate-100 hover:text-indigo-600 rounded-lg transition-all focus:outline-none"
        >
            <svg
                class="w-6 h-6"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"
                ></path>
            </svg>
        </button>
    </div>

    <div class="flex items-center gap-4 lg:gap-6">
    
        <!-- Profile Dropdown (Menggunakan Alpine.js) -->
        <div class="relative" x-data="{ profileOpen: false }">
            
            <!-- Tombol Trigger Profile -->
            <button 
                @click="profileOpen = !profileOpen" 
                @click.outside="profileOpen = false"
                class="flex items-center gap-3 pl-4 border-l border-slate-200 focus:outline-none group"
            >
                <!-- Name -->
                <div class="text-right hidden sm:block">
                    <p class="text-sm font-bold text-slate-900 leading-none group-hover:text-indigo-600 transition-colors">
                        {{ auth()->user()->name }}
                    </p>
                    <p class="text-[11px] text-slate-500 mt-1 capitalize">
                        {{ auth()->user()->getRoleNames()->first() ?? 'Administrator' }}
                    </p>
                </div>

                <!-- Avatar -->
                <img
                    src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=4F46E5&color=fff&rounded=true"
                    alt="Profile"
                    class="w-10 h-10 rounded-full shadow-sm ring-2 ring-transparent group-hover:ring-indigo-100 transition-all"
                >

                <!-- Chevron Icon -->
                <i class="fa-solid fa-chevron-down text-xs text-slate-400 group-hover:text-indigo-500 transition-transform duration-200"
                   :class="{ 'rotate-180': profileOpen }"></i>
            </button>

            <!-- Dropdown Menu -->
            <div 
                x-show="profileOpen"
                x-cloak
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                x-transition:leave-end="opacity-0 scale-95 translate-y-2"
                class="absolute right-0 mt-3 w-48 bg-white rounded-xl shadow-lg border border-slate-100 py-2 z-50"
            >
                <!-- Header Dropdown Mobile (Muncul hanya di layar kecil) -->
                <div class="block sm:hidden px-4 py-3 border-b border-slate-100 mb-2 bg-slate-50">
                    <p class="text-sm font-bold text-slate-800">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-slate-500 truncate">{{ auth()->user()->email }}</p>
                </div>

                <!-- Menu Item: Profil -->
                <a href="{{ route('admin.profile') }}" 
                   class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-slate-600 hover:text-indigo-600 hover:bg-indigo-50 transition-colors">
                    <i class="fa-regular fa-circle-user w-4 text-center"></i>
                    Profil Saya
                </a>

                <!-- Divider -->
                <hr class="my-2 border-slate-100">

                <!-- Menu Item: Logout (Membutuhkan Form POST) -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" 
                            class="w-full flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-rose-600 hover:text-rose-700 hover:bg-rose-50 transition-colors text-left">
                        <i class="fa-solid fa-arrow-right-from-bracket w-4 text-center"></i>
                        Keluar Sistem
                    </button>
                </form>
            </div>

        </div>

    </div>

</header>