@extends('layouts.frontend.app')

@section('title', 'Struktur Organisasi')

@section('content')

<!-- HERO SECTION -->
<section id="hero" class="relative flex min-h-screen items-center overflow-hidden border-b border-slate-200 bg-gradient-to-br from-slate-50 via-white to-slate-100 py-20 lg:py-0">

    <!-- BACKGROUND -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <!-- Blur -->
        <div class="absolute -top-32 -left-24 h-72 w-72 md:h-[30rem] md:w-[30rem] rounded-full bg-slate-300/20 blur-3xl"></div>
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
                  Perpustakaan USTJ
                </span>
            </div>

            <!-- TITLE -->
            <h1 class="text-5xl font-black leading-[1.1] tracking-tight text-slate-900 sm:text-6xl md:text-7xl lg:text-8xl">
               Struktur
                <span class="mt-1 block text-slate-500 md:mt-2">
                Organisasi
                </span>
            </h1>

            <!-- LINE -->
            <div class="mt-6 mb-6 h-[3px] w-16 rounded-full bg-slate-300 md:mt-8 md:mb-8 md:w-28"></div>

            <!-- DESCRIPTION -->
            <p class="mx-auto max-w-3xl px-2 text-sm leading-relaxed text-slate-500 sm:px-0 sm:text-base md:text-lg md:leading-8">
                Struktur organisasi perpustakaan yang mendukung
                pengelolaan layanan informasi, literasi digital,
                administrasi, serta pelayanan akademik
                secara profesional, modern, dan terintegrasi.
            </p>


        </div>
    </div>

    <!-- SCROLL INDICATOR -->
    <div class="absolute bottom-8 left-1/2 hidden -translate-x-1/2 animate-bounce sm:block">
        <div class="flex h-10 w-6 items-start justify-center rounded-full border border-slate-300 p-1">
            <div class="h-2 w-2 rounded-full bg-slate-400"></div>
        </div>
    </div>

</section>


<!-- STRUKTUR ORGANISASI -->
<section id="struktur"
    class="relative overflow-hidden bg-gradient-to-b from-slate-50 via-white to-slate-50 py-24">

    {{-- BACKGROUND --}}
    <div class="pointer-events-none absolute inset-0 overflow-hidden">

        <div
            class="absolute top-0 left-0 h-72 w-72 rounded-full bg-slate-200/30 blur-3xl">
        </div>

        <div
            class="absolute right-0 bottom-0 h-80 w-80 rounded-full bg-slate-100 blur-3xl">
        </div>

    </div>

    <div class="container relative z-10 mx-auto max-w-7xl px-4">

        {{-- HEADER --}}
        <div class="mx-auto mb-20 max-w-3xl text-center">

            <div
                class="mb-5 inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-5 py-2 shadow-sm">

                <span class="h-2 w-2 rounded-full bg-primary"></span>

                <span
                    class="text-[10px] font-black uppercase tracking-[0.25em] text-slate-500">

                    Struktur Organisasi

                </span>

            </div>

            <h2
                class="mb-5 text-4xl font-black tracking-tight text-slate-900 md:text-5xl">

                Tim Perpustakaan

            </h2>

            <p
                class="text-base leading-8 text-slate-500">

                Struktur organisasi UPT Perpustakaan Universitas Sains dan
                Teknologi Jayapura dalam mendukung layanan informasi dan
                literasi akademik.

            </p>

        </div>

        {{-- KEPALA --}}
        @if ($kepala)

            <div class="mb-20 flex justify-center">

                <div class="relative w-full max-w-sm">

                    {{-- CONNECTOR --}}
                    <div
                        class="absolute left-1/2 top-full h-12 w-px -translate-x-1/2 bg-slate-300">
                    </div>

                    {{-- CARD --}}
                    <div
                        class="group relative overflow-hidden rounded-[2rem] border border-slate-200 bg-white p-10 text-center shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">

                        {{-- FOTO --}}
                        <div
                            class="relative mx-auto mb-6 h-36 w-36 overflow-hidden rounded-full border-4 border-white shadow-lg">

                            <img
                                src="{{ $kepala->foto ? asset('storage/staff/' . $kepala->foto) : $defaultFoto }}"
                                alt="{{ $kepala->nama }}"
                                class="h-full w-full object-cover"
                                onerror="this.onerror=null;this.src='{{ $defaultFoto }}';">

                        </div>

                        {{-- BADGE --}}
                        <div
                            class="mb-5 inline-flex rounded-full bg-amber-50 px-4 py-1.5 text-[10px] font-black uppercase tracking-[0.2em] text-amber-700">

                            Kepala Perpustakaan

                        </div>

                        {{-- NAMA --}}
                        <h3
                            class="mb-2 text-2xl font-black tracking-tight text-slate-900">

                            {{ $kepala->nama }}

                        </h3>

                        {{-- JABATAN --}}
                        <p
                            class="text-sm font-semibold leading-relaxed text-slate-500">

                            {{ $kepala->jabatan }}

                        </p>

                    </div>

                </div>

            </div>

        @endif

        {{-- CONNECTOR --}}
        <div class="mb-16 flex justify-center">

            <div class="relative">

                <div
                    class="h-5 w-5 rounded-full border-4 border-slate-300 bg-white shadow-sm">
                </div>

                <div
                    class="absolute left-1/2 top-full h-10 w-px -translate-x-1/2 bg-slate-300">
                </div>

            </div>

        </div>

        {{-- KOORDINATOR --}}
        @if ($koordinators->count())

            <div
                class="mb-16 grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">

                @foreach ($koordinators as $item)

                    <div
                        class="group rounded-[2rem] border border-slate-200 bg-white p-8 text-center shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">

                        {{-- FOTO --}}
                        <div
                            class="mx-auto mb-5 h-28 w-28 overflow-hidden rounded-full border-4 border-white shadow-md">

                            <img
                                src="{{ $item->foto ? asset('storage/staff/' . $item->foto) : $defaultFoto }}"
                                alt="{{ $item->nama }}"
                                class="h-full w-full object-cover"
                                onerror="this.onerror=null;this.src='{{ $defaultFoto }}';">

                        </div>

                        {{-- BADGE --}}
                        <div
                            class="mb-4 inline-flex rounded-full bg-blue-50 px-4 py-1.5 text-[10px] font-black uppercase tracking-[0.18em] text-blue-700">

                            Koordinator

                        </div>

                        {{-- NAMA --}}
                        <h3
                            class="mb-2 text-xl font-black tracking-tight text-slate-900">

                            {{ $item->nama }}

                        </h3>

                        {{-- JABATAN --}}
                        <p
                            class="mb-4 text-sm leading-relaxed text-slate-500">

                            {{ $item->jabatan }}

                        </p>

                        {{-- BIDANG --}}
                        @if ($item->bidang)

                            <div
                                class="inline-flex rounded-full border border-blue-100 bg-blue-50 px-4 py-2 text-[11px] font-bold text-blue-700">

                                {{ $item->bidang }}

                            </div>

                        @endif

                    </div>

                @endforeach

            </div>

        @endif

        {{-- STAFF --}}
        @if ($staffs->count())

            <div
                class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

                @foreach ($staffs as $item)

                    <div
                        class="group rounded-[1.8rem] border border-slate-200 bg-white p-6 text-center shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md">

                        {{-- FOTO --}}
                        <div
                            class="mx-auto mb-5 h-24 w-24 overflow-hidden rounded-full border-4 border-white shadow-md">

                            <img
                                src="{{ $item->foto ? asset('storage/staff/' . $item->foto) : $defaultFoto }}"
                                alt="{{ $item->nama }}"
                                class="h-full w-full object-cover"
                                onerror="this.onerror=null;this.src='{{ $defaultFoto }}';">

                        </div>

                        {{-- NAMA --}}
                        <h3
                            class="mb-2 text-lg font-black tracking-tight text-slate-900">

                            {{ $item->nama }}

                        </h3>

                        {{-- JABATAN --}}
                        <p
                            class="mb-4 text-sm leading-relaxed text-slate-500">

                            {{ $item->jabatan }}

                        </p>

                        {{-- BIDANG --}}
                        @if ($item->bidang)

                            <div
                                class="inline-flex rounded-full border border-emerald-100 bg-emerald-50 px-3 py-1.5 text-[10px] font-bold uppercase tracking-[0.15em] text-emerald-700">

                                {{ $item->bidang }}

                            </div>

                        @endif

                    </div>

                @endforeach

            </div>

        @endif

    </div>

</section>

@endsection