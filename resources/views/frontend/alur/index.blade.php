@extends('layouts.frontend.app')

@section('title', 'Sejarah | UPT Perpustakaan USTJ')

@section('content')

<!-- ========================================= -->
<!-- HERO SECTION                              -->
<!-- ========================================= -->
<section class="relative overflow-hidden border-b border-slate-200 bg-gradient-to-br from-slate-50 via-white to-slate-100 pt-24 pb-16 sm:pt-32 sm:pb-20 lg:pt-44 lg:pb-28">
    
    <!-- Background Decor -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-10 -left-10 w-48 h-48 sm:w-72 sm:h-72 bg-primary/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-64 h-64 sm:w-96 sm:h-96 bg-secondary/10 rounded-full blur-3xl"></div>
    </div>

    <div class="container relative z-10 max-w-5xl px-4 sm:px-6 mx-auto text-center">

        <!-- Badge -->
        <div class="inline-flex items-center gap-2 px-4 py-1.5 sm:px-5 sm:py-2 mb-6 sm:mb-8 text-[10px] sm:text-xs font-bold tracking-[0.2em] uppercase bg-white border border-slate-200 rounded-full shadow-sm text-dark">
            <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
            Layanan Perpustakaan
        </div>

        <!-- Title -->
        <h1 class="mb-4 sm:mb-6 text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black tracking-tight text-dark leading-[1.15]">
            Proses <span class="text-primary">Peminjaman</span> & 
            <span class="text-primary block sm:inline mt-1 sm:mt-0">Pengembalian</span> Buku
        </h1>

        <!-- Description -->
        <p class="max-w-3xl mx-auto text-sm sm:text-base md:text-lg leading-relaxed text-body px-2 sm:px-0">
            Panduan alur layanan peminjaman dan pengembalian bahan pustaka 
            di UPT Perpustakaan Universitas Sains dan Teknologi Jayapura 
            secara mudah, cepat, dan terstruktur.
        </p>

        <!-- CTA INFO -->
        <div class="mt-8 sm:mt-10 flex flex-col items-center justify-center gap-4 px-2 sm:px-0">
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 px-5 py-4 sm:px-6 bg-white/90 backdrop-blur border border-slate-200 rounded-2xl shadow-lg text-slate-700 max-w-2xl text-left w-full sm:w-auto">
                <div class="w-12 h-12 shrink-0 rounded-2xl bg-primary/10 text-primary flex items-center justify-center">
                    <i class="fa-solid fa-book-open-reader text-xl"></i>
                </div>
                <div>
                    <h3 class="text-xs sm:text-sm font-black uppercase tracking-wide text-dark mb-1">
                        Layanan Sirkulasi Perpustakaan
                    </h3>
                    <p class="text-[11px] sm:text-sm text-slate-500 leading-relaxed">
                        Ingin meminjam atau mengembalikan buku? 
                        Silakan kunjungi UPT Perpustakaan USTJ 
                        untuk mendapatkan layanan secara cepat, mudah, dan teratur.
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- ========================================= -->
<!-- CONTENT SECTION (SOP KARTU)               -->
<!-- ========================================= -->
<section class="relative py-12 sm:py-16 lg:py-24 bg-slate-50" x-data="{ showLightbox: false, activeImage: '' }">
    <div class="container max-w-6xl px-4 sm:px-6 mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8 items-start">

            <!-- KARTU 1: ALUR PEMINJAMAN -->
            <div class="bg-white rounded-[24px] sm:rounded-[2rem] p-5 sm:p-6 lg:p-8 shadow-xl shadow-slate-200/40 border border-slate-200 flex flex-col transition-all duration-300 hover:-translate-y-1 hover:shadow-indigo-100">
                
                <div class="flex items-center gap-3 sm:gap-4 mb-5 sm:mb-6 pb-4 sm:pb-5 border-b border-slate-100">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 bg-indigo-50 text-indigo-600 rounded-xl flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-book-open-reader text-lg sm:text-xl"></i>
                    </div>
                    <div>
                        <h2 class="text-base sm:text-lg font-black text-slate-800 uppercase tracking-tight">Alur Peminjaman</h2>
                        <p class="text-[9px] sm:text-[10px] font-bold text-slate-400 mt-0.5 uppercase tracking-wider">Prosedur peminjaman buku</p>
                    </div>
                </div>

                <div class="flex-1 w-full h-48 sm:h-64 lg:h-80 bg-slate-50 rounded-xl sm:rounded-2xl border border-dashed border-slate-300 overflow-hidden relative group flex items-center justify-center p-3 sm:p-4">
                    <img src="{{ asset('pinjam.png') }}" 
                         alt="Gambar Alur Peminjaman" 
                         @click="activeImage = '{{ asset('pinjam.png') }}'; showLightbox = true"
                         class="w-full h-full object-contain drop-shadow-md transition-transform duration-500 group-hover:scale-105 relative z-10 cursor-zoom-in"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    
                    <div class="absolute inset-0 flex flex-col items-center justify-center text-slate-400 z-0 hidden">
                        <i class="fa-solid fa-image text-2xl sm:text-3xl mb-2 opacity-40"></i>
                        <p class="text-[8px] sm:text-[9px] font-black uppercase tracking-widest text-center px-4 leading-relaxed">Letakkan Gambar<br>Peminjaman (pinjam.png)</p>
                    </div>

                    <div class="absolute top-2 right-2 sm:top-3 sm:right-3 bg-white/90 backdrop-blur text-indigo-600 px-2 sm:px-3 py-1 sm:py-1.5 rounded-full text-[8px] sm:text-[9px] font-black uppercase tracking-widest opacity-0 group-hover:opacity-100 transition-all z-20 shadow-sm border border-indigo-100">
                        <i class="fa-solid fa-magnifying-glass-plus mr-1"></i> Perbesar
                    </div>
                </div>
            </div>

            <!-- KARTU 2: ALUR PENGEMBALIAN -->
            <div class="bg-white rounded-[24px] sm:rounded-[2rem] p-5 sm:p-6 lg:p-8 shadow-xl shadow-slate-200/40 border border-slate-200 flex flex-col transition-all duration-300 hover:-translate-y-1 hover:shadow-emerald-100">
                
                <div class="flex items-center gap-3 sm:gap-4 mb-5 sm:mb-6 pb-4 sm:pb-5 border-b border-slate-100">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 bg-emerald-50 text-emerald-500 rounded-xl flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-book-circle-arrow-right text-lg sm:text-xl"></i>
                    </div>
                    <div>
                        <h2 class="text-base sm:text-lg font-black text-slate-800 uppercase tracking-tight">Alur Pengembalian</h2>
                        <p class="text-[9px] sm:text-[10px] font-bold text-slate-400 mt-0.5 uppercase tracking-wider">Prosedur pengembalian pustaka</p>
                    </div>
                </div>

                <div class="flex-1 w-full h-48 sm:h-64 lg:h-80 bg-slate-50 rounded-xl sm:rounded-2xl border border-dashed border-slate-300 overflow-hidden relative group flex items-center justify-center p-3 sm:p-4">
                    <img src="{{ asset('kembali.png') }}" 
                         alt="Gambar Alur Pengembalian" 
                         @click="activeImage = '{{ asset('kembali.png') }}'; showLightbox = true"
                         class="w-full h-full object-contain drop-shadow-md transition-transform duration-500 group-hover:scale-105 relative z-10 cursor-zoom-in"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    
                    <div class="absolute inset-0 flex flex-col items-center justify-center text-slate-400 z-0 hidden">
                        <i class="fa-solid fa-image text-2xl sm:text-3xl mb-2 opacity-40"></i>
                        <p class="text-[8px] sm:text-[9px] font-black uppercase tracking-widest text-center px-4 leading-relaxed">Letakkan Gambar<br>Pengembalian (kembali.png)</p>
                    </div>

                    <div class="absolute top-2 right-2 sm:top-3 sm:right-3 bg-white/90 backdrop-blur text-emerald-600 px-2 sm:px-3 py-1 sm:py-1.5 rounded-full text-[8px] sm:text-[9px] font-black uppercase tracking-widest opacity-0 group-hover:opacity-100 transition-all z-20 shadow-sm border border-emerald-100">
                        <i class="fa-solid fa-magnifying-glass-plus mr-1"></i> Perbesar
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- ========================================= -->
    <!-- LIGHTBOX MODAL                            -->
    <!-- ========================================= -->
    <div x-show="showLightbox" 
         x-cloak 
         class="fixed inset-0 z-[9999] flex items-center justify-center p-4 sm:p-8 print:hidden"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">
        
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-slate-900/90 backdrop-blur-sm cursor-pointer" @click="showLightbox = false"></div>

        <!-- Image Container -->
        <div class="relative z-10 w-[95vw] sm:w-auto sm:max-w-4xl max-h-full flex items-center justify-center pointer-events-none"
             x-show="showLightbox"
             x-transition:enter="transition ease-out duration-300 delay-100"
             x-transition:enter-start="opacity-0 scale-95 translate-y-8"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0">
            
            <div class="bg-white p-2 sm:p-3 rounded-[1.5rem] sm:rounded-3xl shadow-2xl relative pointer-events-auto">
                
                <!-- Close Button (Adjusted for Mobile) -->
                <button @click="showLightbox = false" 
                        class="absolute -top-3 -right-3 sm:-top-4 sm:-right-4 w-8 h-8 sm:w-10 sm:h-10 flex items-center justify-center bg-rose-500 hover:bg-rose-600 text-white rounded-full transition-all shadow-lg z-30 group active:scale-95 border-2 border-white">
                    <i class="fa-solid fa-xmark text-sm sm:text-lg group-hover:rotate-90 transition-transform"></i>
                </button>

                <!-- Full Image -->
                <img :src="activeImage" 
                     alt="SOP Perpustakaan Full" 
                     class="w-full max-w-full max-h-[70vh] sm:max-h-[80vh] object-contain rounded-xl sm:rounded-2xl bg-slate-50">
                
                <!-- Caption -->
                <div class="mt-2 mb-1 sm:mt-3 text-center">
                    <p class="text-[9px] sm:text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]" 
                       x-text="activeImage.includes('pinjam') ? 'Detail Prosedur Peminjaman' : 'Detail Prosedur Pengembalian'">
                    </p>
                </div>
            </div>
            
        </div>
    </div>
</section>

@endsection