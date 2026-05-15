@extends('layouts.frontend.app')

@section('title', 'Sejarah |  Perpustakaan USTJ')

@section('content')

<!-- HERO SECTION -->
<section class="relative flex min-h-screen items-center overflow-hidden border-b border-slate-200 bg-gradient-to-br from-slate-50 via-white to-slate-100 py-20 lg:py-0">

    <!-- BACKGROUND -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">

        <!-- Blur 1 -->
        <div class="absolute -top-32 -left-24 h-72 w-72 md:h-[30rem] md:w-[30rem] rounded-full bg-slate-300/20 blur-3xl"></div>

        <!-- Blur 2 -->
        <div class="absolute bottom-0 right-0 h-80 w-80 md:h-[34rem] md:w-[34rem] rounded-full bg-slate-200/30 blur-3xl"></div>

        <!-- Grid -->
        <div class="absolute inset-0 opacity-[0.03]"
             style="background-image: linear-gradient(to right, #0f172a 1px, transparent 1px), linear-gradient(to bottom, #0f172a 1px, transparent 1px); background-size: 70px 70px;">
        </div>

    </div>

    <!-- CONTENT -->
    <div class="container relative z-10 mx-auto max-w-6xl px-4 sm:px-6">

        <div class="flex flex-col items-center text-center">

            <!-- BADGE -->
            <div class="mb-6 md:mb-8 inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white/80 px-4 py-1.5 md:px-5 md:py-2 backdrop-blur-md shadow-sm">
                <span class="h-2 w-2 rounded-full bg-slate-500 animate-pulse"></span>
                <span class="text-[9px] md:text-[10px] font-bold uppercase tracking-[0.2em] md:tracking-[0.25em] text-slate-600">
                    Profil Institusi
                </span>
            </div>

            <!-- TITLE -->
            <h1 class="max-w-5xl text-4xl font-black leading-[1.1] tracking-tight text-slate-900 sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl">
                Sejarah Perpustakaan
                <span class="mt-1 md:mt-2 block text-slate-500">
                    USTJ
                </span>
            </h1>

            <!-- LINE -->
            <div class="mt-6 mb-6 md:mt-8 md:mb-8 h-[3px] w-16 md:w-28 rounded-full bg-slate-300"></div>

            <!-- DESCRIPTION -->
            <p class="mx-auto max-w-3xl text-sm leading-relaxed text-slate-500 sm:text-base md:text-lg md:leading-8 lg:text-xl lg:leading-9 px-2 sm:px-0">
                Menelusuri akar sejarah dan perkembangan
                 Perpustakaan Universitas Sains dan Teknologi Jayapura
                dari awal berdiri hingga menjadi pusat literasi,
                riset, dan pengembangan ilmu pengetahuan.
            </p>

         

        </div>

    </div>

    <!-- SCROLL INDICATOR -->
    <div class="hidden sm:block absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
        <div class="flex h-10 w-6 items-start justify-center rounded-full border border-slate-300 p-1">
            <div class="h-2 w-2 rounded-full bg-slate-400"></div>
        </div>
    </div>

</section>

<!-- SEJARAH CONTENT -->
<section class="relative py-16 md:py-20 bg-slate-50">

    <div class="container max-w-7xl px-4 sm:px-6 mx-auto">

        <div class="flex flex-col lg:flex-row gap-8 lg:gap-12 items-start">
            
            <!-- Sidebar Profil Singkat (Sticky) -->
            <!-- Muncul di bawah pada mobile (order-2), dan di kiri pada Desktop (order-1) -->
            <aside class="w-full lg:w-4/12 lg:sticky lg:top-32 order-2 lg:order-1">
                
                <div class="relative overflow-hidden transition-all duration-300 bg-white border group border-slate-200 rounded-[24px] lg:rounded-3xl p-6 md:p-8 hover:-translate-y-2 hover:shadow-2xl">
                    
                    <!-- Decorative Hover Background -->
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition duration-500 bg-gradient-to-br from-primary/[0.03] to-secondary/[0.03]"></div>

                    <div class="relative z-10">
                        <div class="flex items-center gap-3 mb-6 md:mb-8 border-b border-slate-200 pb-4 md:pb-5">
                            <span class="w-6 h-1 rounded-full bg-primary"></span>
                            <h3 class="text-base md:text-lg font-black tracking-tight uppercase text-dark">Informasi Singkat</h3>
                        </div>
                        
                        <div class="space-y-5 md:space-y-6">
                            <div>
                                <span class="block mb-1 text-[10px] md:text-[11px] font-bold tracking-[0.2em] uppercase text-body">Didirikan Pada</span>
                                <span class="block text-base md:text-lg font-black text-dark">07 Juli 1984</span>
                            </div>
                            
                            <div>
                                <span class="block mb-1 text-[10px] md:text-[11px] font-bold tracking-[0.2em] uppercase text-body">Lokasi</span>
                                <span class="block text-base md:text-lg font-black text-dark">Kampus USTJ Jayapura</span>
                            </div>
                            
                            <div class="pt-2">
                                <span class="block mb-2 md:mb-3 text-[10px] md:text-[11px] font-bold tracking-[0.2em] uppercase text-body">Status Saat Ini</span>
                                <span class="inline-block px-4 py-2 text-[11px] md:text-xs font-bold border rounded-full bg-primary/10 text-primary border-primary/20">Terakreditasi Nasional</span>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </aside>

            <!-- Narasi Sejarah (Cards) -->
            <!-- Muncul di atas pada mobile (order-1), dan di kanan pada Desktop (order-2) -->
            <article class="w-full lg:w-8/12 order-1 lg:order-2">
                
                <div class="space-y-8">
                    
                    <!-- Card Sejarah Utama -->
                    <div class="relative overflow-hidden transition-all duration-300 bg-white border group border-slate-200 rounded-[24px] lg:rounded-[2rem] p-6 sm:p-8 lg:p-12 hover:-translate-y-2 hover:shadow-2xl">
                        
                        <!-- Decorative Hover Background -->
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition duration-500 bg-gradient-to-br from-primary/[0.03] to-secondary/[0.03]"></div>
                        
                        <div class="relative z-10">
                            
                            <!-- Badge -->
                            <div class="absolute top-4 right-4 md:top-5 md:right-5 px-3 py-1 text-[9px] md:text-[10px] font-bold tracking-wider uppercase border rounded-full bg-slate-50 border-slate-200 text-slate-500">
                                Tahap 01
                            </div>

                            <!-- Header Card -->
                            <div class="flex flex-col sm:flex-row sm:items-center gap-4 sm:gap-6 mb-6 md:mb-8 mt-6 sm:mt-0">
                                <div class="flex items-center justify-center shrink-0 w-12 h-12 md:w-14 md:h-14 rounded-full bg-primary/10 text-primary text-lg md:text-xl font-black transition-transform duration-300 group-hover:scale-110">
                                    01
                                </div>
                                <h2 class="text-xl sm:text-2xl md:text-3xl font-black tracking-tight text-dark">Sejarah Pendirian</h2>
                            </div>

                            <!-- Body Text -->
                            <div class="space-y-4 md:space-y-5 text-sm md:text-base font-medium leading-relaxed text-body">
                                <p>
                                    Berdirinya Perpustakaan Universitas Sains dan Teknologi Jayapura memiliki keterkaitan erat dengan sejarah berdirinya Universitas Sains dan Teknologi Jayapura (USTJ). Perpustakaan tersebut didirikan bersamaan dengan berdirinya USTJ, yaitu pada tanggal <strong class="text-dark font-black">07 Juli 1984</strong>.
                                </p>
                                <p>
                                    Pendirian ini diprakarsai oleh Bapak <span class="font-bold text-primary">Izaac Hindom</span> yang saat itu menjabat sebagai Gubernur Irian Jaya, bersama Bapak <span class="font-bold text-primary">H. Asaari Rumosan</span> yang ketika itu menjabat sebagai Kepala Kantor Wilayah Departemen Pekerjaan Umum Irian Jaya di Jayapura.
                                </p>
                            </div>

                        </div>
                    </div>

                </div>
            </article>

        </div>

    </div>

</section>

@endsection