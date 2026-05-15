    <!-- Navbar -->
    <header
        :class="scrolled ? 'bg-white/95 backdrop-blur-md shadow-header py-3' : 'bg-transparent py-5'"
        class="fixed top-0 left-0 w-full z-50 transition-all duration-300">
        <div class="container max-w-7xl mx-auto flex justify-between items-center">

            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
           
            <div
    class="flex h-11 w-11 items-center justify-center overflow-hidden rounded-xl border border-white/20 bg-white shadow-lg shadow-primary/10 transition-transform duration-300 group-hover:scale-105">

    <img
        src="{{ asset('logo.png') }}"
        alt="Logo USTJ"
        class="h-8 w-8 object-contain">

</div>

                <div class="hidden sm:block">
                    <h1 class="text-xl font-extrabold text-dark tracking-tight leading-none">Perpustakaan</h1>
                    <p class="text-[10px] font-bold text-primary uppercase tracking-[0.2em] mt-1">USTJ Jayapura</p>
                </div>
            </a>

            <!-- Desktop Menu -->
            <nav class="hidden lg:flex items-center space-x-10">
                <a href="{{ route('home') }}" class="text-sm font-semibold text-dark hover:text-primary transition-colors">Beranda</a>

                <!-- Dropdown Profil -->
                <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="flex items-center gap-1 text-sm font-semibold text-dark hover:text-primary transition-colors focus:outline-none py-2">
                        Tentang Kami
                        <svg class="w-4 h-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <div
                        x-show="open"
                        x-cloak
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-4"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        class="absolute top-full left-0 w-60 bg-white shadow-dropdown rounded-xl py-3 border border-stroke z-[60]">
                        <a href="{{ route('sejarah') }}" class="block px-6 py-2.5 text-sm font-medium text-dark hover:text-primary hover:bg-light transition-all">Sejarah Perpustakaan</a>
                        <a href="{{ route('visi-misi') }}" class="block px-6 py-2.5 text-sm font-medium text-dark hover:text-primary hover:bg-light transition-all">Visi & Misi</a>
                        <a href="{{ route('struktur') }}" class="block px-6 py-2.5 text-sm font-medium text-dark hover:text-primary hover:bg-light transition-all">Struktur Organisasi</a>
                    </div>
                </div>

                <div
                    x-data="{ open: false }"
                    class="relative">

                    {{-- BUTTON --}}
                    <button
                        @click="open = !open"
                        class="flex items-center gap-2 text-sm font-semibold text-dark transition-colors hover:text-primary">

                        Katalog Online

                        <svg
                            class="h-4 w-4"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    {{-- DROPDOWN --}}
                    <div
                        x-show="open"
                        @click.outside="open = false"
                        x-transition
                        x-cloak
                        class="absolute top-full left-0 z-50 mt-3 w-56 overflow-hidden rounded-2xl border border-stroke bg-white shadow-dropdown">

                        {{-- BUKU --}}
                        <a
                            href="{{ route('buku') }}"
                            class="flex items-center gap-3 border-b border-stroke px-5 py-4 text-sm font-medium text-dark transition-all hover:bg-light hover:text-primary">

                            <svg
                                class="h-5 w-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5S19.832 5.477 21 6.253v13">
                                </path>
                            </svg>

                            Katalog Buku
                        </a>

                        {{-- SKRIPSI --}}
                        <a
                            href="{{ route('skripsi') }}"
                            class="flex items-center gap-3 px-5 py-4 text-sm font-medium text-dark transition-all hover:bg-light hover:text-primary">

                            <svg
                                class="h-5 w-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>

                            Skripsi / KTI
                        </a>
                    </div>
                </div>
                <a href="{{ route('alur') }}" class="text-sm font-semibold text-dark hover:text-primary transition-colors">Alur</a>
            </nav>

            <!-- Action Buttons -->
            <!-- ACTION -->
            <div class="flex items-center gap-3">

                {{-- AUTH BUTTON --}}
<div class="hidden lg:flex items-center gap-3">

    {{-- JIKA BELUM LOGIN --}}
    @guest

        <a
            href="{{ route('login') }}"
            class="inline-flex items-center justify-center rounded-full border border-primary/20 px-6 py-2.5 text-sm font-bold text-primary transition-all duration-300 hover:bg-primary hover:text-white">

            Masuk

        </a>

    @endguest

    {{-- JIKA SUDAH LOGIN --}}
    @auth

        {{-- USER NAME --}}
        <div
            class="flex items-center gap-2 rounded-full bg-slate-100 px-4 py-2 text-sm font-bold text-slate-700">

            <div
                class="flex h-8 w-8 items-center justify-center rounded-full bg-primary text-xs font-black text-white">

                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

            </div>

            <span>

                {{ auth()->user()->name }}

            </span>

        </div>

        {{-- LOGOUT --}}
        <form
            action="{{ route('logout') }}"
            method="POST">

            @csrf

            <button
                type="submit"
                class="inline-flex items-center justify-center rounded-full bg-rose-500 px-5 py-2.5 text-sm font-bold text-white transition-all duration-300 hover:bg-rose-600">

                Logout

            </button>

        </form>

    @endauth

</div>

                <!-- MOBILE BUTTON -->
                <button
                    @click="mobileMenu = true"
                    class="flex h-11 w-11 items-center justify-center rounded-xl text-dark transition-all duration-300 hover:bg-slate-100 lg:hidden">

                    <svg
                        class="h-7 w-7"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16">
                        </path>

                    </svg>

                </button>

            </div>
        </div>
    </header>