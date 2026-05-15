@extends('layouts.frontend.app')

@section('title', 'Beranda |  Perpustakaan USTJ')

@section('content')

<!-- HERO SECTION -->
<section class="relative min-h-screen overflow-hidden border-b border-slate-200 bg-gradient-to-br from-slate-50 via-white to-slate-100 flex items-center justify-center py-20 lg:py-0">

    <!-- BACKGROUND -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <!-- BLUR 1 -->
        <div class="absolute -top-32 -left-24 h-[20rem] w-[20rem] md:h-[28rem] md:w-[28rem] rounded-full bg-slate-300/20 blur-3xl"></div>

        <!-- BLUR 2 -->
        <div class="absolute right-0 bottom-0 h-[24rem] w-[24rem] md:h-[34rem] md:w-[34rem] rounded-full bg-slate-200/30 blur-3xl"></div>

        <!-- GRID -->
        <div class="absolute inset-0 opacity-[0.03]"
             style="background-image: linear-gradient(to right, #0f172a 1px, transparent 1px), linear-gradient(to bottom, #0f172a 1px, transparent 1px); background-size: 60px 60px;">
        </div>
    </div>

    <!-- CONTENT -->
    <div class="container relative z-10 mx-auto max-w-6xl px-4 sm:px-6 text-center">

        <!-- BADGE -->
        <div class="mb-6 md:mb-8 inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white/80 backdrop-blur-md px-4 py-1.5 md:px-5 md:py-2 shadow-sm">
            <span class="h-2 w-2 animate-pulse rounded-full bg-slate-500"></span>
            <span class="text-[9px] md:text-[10px] font-bold uppercase tracking-[0.2em] md:tracking-[0.25em] text-slate-600">
                Layanan Digital Perpustakaan
            </span>
        </div>

        <!-- TITLE -->
        <h1 class="mx-auto max-w-5xl text-4xl font-black leading-[1.1] tracking-tight text-slate-900 sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl">
            Pusat Literasi
            <span class="block text-slate-500 mt-1 md:mt-2">
                & Inovasi Akademik
            </span>
        </h1>

        <!-- LINE -->
        <div class="mx-auto mt-6 mb-6 md:mt-8 md:mb-8 h-[3px] w-16 md:w-28 rounded-full bg-slate-300"></div>

        <!-- DESC -->
        <p class="mx-auto max-w-3xl text-sm leading-relaxed text-slate-500 sm:text-base md:text-lg md:leading-8 lg:text-xl lg:leading-9 px-2 sm:px-0">
            Akses koleksi buku, jurnal ilmiah, serta karya akademik untuk mendukung pembelajaran, penelitian, dan pengembangan literasi digital Civitas Akademika USTJ.
        </p>

       

    </div>

    <!-- SCROLL INDICATOR (Hidden on very small mobile screens to prevent overflow) -->
    <div class="hidden sm:block absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
        <div class="flex h-10 w-6 items-start justify-center rounded-full border border-slate-300 p-1">
            <div class="h-2 w-2 rounded-full bg-slate-400"></div>
        </div>
    </div>

</section>


@endsection