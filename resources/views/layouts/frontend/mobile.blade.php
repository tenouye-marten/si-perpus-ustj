<!-- MOBILE MENU -->
<div
    x-show="mobileMenu"
    x-cloak
    class="fixed inset-0 z-[100] lg:hidden">

    <!-- BACKDROP -->
    <div
        x-show="mobileMenu"
        x-transition.opacity.duration.300ms
        @click="mobileMenu = false"
        class="absolute inset-0 bg-slate-900/50 backdrop-blur-sm">
    </div>

    <!-- PANEL -->
    <nav
        x-show="mobileMenu"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        class="absolute top-0 right-0 bottom-0 flex w-[85%] max-w-[320px] flex-col bg-white shadow-xl">

        <!-- HEADER -->
        <div class="flex items-center justify-between border-b border-slate-100 px-5 py-4">

            <div class="flex items-center gap-3">
                <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-blue-600 text-base font-bold text-white shadow-sm">
                    U
                </div>
                <div>
                    <h2 class="text-sm font-bold text-slate-800">
                        Perpustakaan
                    </h2>
                    <p class="text-[10px] font-bold uppercase tracking-widest text-blue-600">
                        USTJ Jayapura
                    </p>
                </div>
            </div>

            <!-- CLOSE -->
            <button
                @click="mobileMenu = false"
                class="flex h-8 w-8 items-center justify-center rounded-full bg-slate-50 text-slate-500 transition-colors hover:bg-red-50 hover:text-red-600">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

        </div>

        <!-- MENU -->
        <div class="flex-1 overflow-y-auto px-4 py-5">
            <div class="space-y-1">

                <!-- BERANDA -->
                <a
                    href="{{ route('home') }}"
                    class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 transition-colors hover:bg-slate-50 hover:text-blue-600">
                    <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m0-8H5m7 0h7"></path>
                    </svg>
                    Beranda
                </a>

                <!-- TENTANG -->
                <div x-data="{ subOpen: false }">
                    <button
                        @click="subOpen = !subOpen"
                        class="flex w-full items-center justify-between rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 transition-colors hover:bg-slate-50">
                        <div class="flex items-center gap-3">
                            <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Tentang Kami
                        </div>
                        <svg
                            class="h-4 w-4 text-slate-400 transition-transform duration-200"
                            :class="subOpen ? 'rotate-180' : ''"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <!-- SUBMENU -->
                    <div
                        x-show="subOpen"
                        x-transition
                        class="mt-1 space-y-1 px-4 pb-2">
                        <a href="{{ route('sejarah') }}" class="block rounded-lg px-4 py-2 text-sm text-slate-500 transition-colors hover:bg-slate-50 hover:text-blue-600">
                            Sejarah
                        </a>
                        <a href="{{ route('visi-misi') }}" class="block rounded-lg px-4 py-2 text-sm text-slate-500 transition-colors hover:bg-slate-50 hover:text-blue-600">
                            Visi & Misi
                        </a>
                        <a href="{{ route('struktur') }}" class="block rounded-lg px-4 py-2 text-sm text-slate-500 transition-colors hover:bg-slate-50 hover:text-blue-600">
                            Struktur Organisasi
                        </a>
                    </div>
                </div>

                <!-- KATALOG -->
                <div x-data="{ katalogOpen: false }">
                    <button
                        @click="katalogOpen = !katalogOpen"
                        class="flex w-full items-center justify-between rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 transition-colors hover:bg-slate-50">
                        <div class="flex items-center gap-3">
                            <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5S19.832 5.477 21 6.253v13"></path>
                            </svg>
                            Katalog Online
                        </div>
                        <svg
                            class="h-4 w-4 text-slate-400 transition-transform duration-200"
                            :class="katalogOpen ? 'rotate-180' : ''"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <!-- SUBMENU -->
                    <div
                        x-show="katalogOpen"
                        x-transition
                        class="mt-1 space-y-1 px-4 pb-2">
                        <a href="{{ route('buku') }}" class="block rounded-lg px-4 py-2 text-sm text-slate-500 transition-colors hover:bg-slate-50 hover:text-blue-600">
                            Buku
                        </a>
                        <a href="{{ route('skripsi') }}" class="block rounded-lg px-4 py-2 text-sm text-slate-500 transition-colors hover:bg-slate-50 hover:text-blue-600">
                            Skripsi / KTI
                        </a>
                    </div>
                </div>

                <!-- SIAKAD -->
                <a
                    href="#"
                    class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 transition-colors hover:bg-slate-50 hover:text-blue-600">
                    <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 4h14a2 2 0 012 2v7H3V6a2 2 0 012-2z"></path>
                    </svg>
                    SIAKAD
                </a>

            </div>
        </div>

        <!-- FOOTER -->
        <div class="border-t border-slate-100 p-4">
            <a
                href="{{ route('login') }}"
                class="flex w-full items-center justify-center rounded-xl bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white transition-colors hover:bg-blue-700">
                Login
            </a>
        </div>

    </nav>
</div>