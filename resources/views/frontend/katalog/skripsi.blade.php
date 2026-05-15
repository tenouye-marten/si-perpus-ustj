@extends('layouts.frontend.app')

@section('title', 'Katalog Skripsi / KTI |  Perpustakaan USTJ')

@section('content')

<section class="min-h-screen bg-slate-50 pt-28 pb-16 lg:pt-36 lg:pb-24">
    <div class="container mx-auto max-w-7xl px-4">
        
        <div class="flex flex-col gap-8 lg:flex-row lg:items-start">
            
            {{-- SIDEBAR FILTER --}}
            <aside class="w-full shrink-0 lg:sticky lg:top-32 lg:w-1/3 xl:w-[300px]">
                
                {{-- HEADER --}}
                <div class="mb-6">
                    <div class="mb-4 inline-flex items-center gap-2 rounded-lg bg-blue-50 px-3 py-1.5 text-blue-700">
                        <span class="h-1.5 w-1.5 rounded-full bg-blue-600"></span>
                        <span class="text-[11px] font-bold uppercase tracking-widest">Repository</span>
                    </div>

                    <h1 class="mb-2 text-3xl font-bold text-slate-800">Karya Ilmiah</h1>

                    <p class="text-sm leading-relaxed text-slate-500">
                        Eksplorasi koleksi skripsi dan karya ilmiah mahasiswa USTJ.
                    </p>
                </div>

                {{-- FILTER BOX --}}
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                    <h3 class="mb-4 text-xs font-bold uppercase tracking-wider text-slate-400">Filter</h3>
                    
                    <form method="GET" class="flex flex-col gap-3">
                        
                        {{-- SEARCH --}}
                        <div class="relative">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input 
                                type="text" 
                                name="search" 
                                value="{{ request('search') }}" 
                                placeholder="Cari judul/penulis..." 
                                onchange="this.form.submit()" 
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 py-2.5 pl-9 pr-3 text-sm text-slate-700 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-1 focus:ring-blue-500"
                            >
                        </div>

                        {{-- PRODI --}}
                        <div>
                            <select 
                                name="prodi" 
                                onchange="this.form.submit()" 
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2.5 text-sm text-slate-700 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-1 focus:ring-blue-500"
                            >
                                <option value="">Semua Prodi</option>
                                @foreach ($prodis as $item)
                                    <option value="{{ $item->id }}" @selected($prodi == $item->id)>
                                        {{ $item->nama_prodi }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- TAHUN --}}
                        <div>
                            <select 
                                name="tahun" 
                                onchange="this.form.submit()" 
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2.5 text-sm text-slate-700 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-1 focus:ring-blue-500"
                            >
                                <option value="">Semua Tahun</option>
                                @foreach ($tahunList as $item)
                                    <option value="{{ $item }}" @selected($tahun == $item)>
                                        {{ $item }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- RESET --}}
                        @if(request('search') || request('prodi') || request('tahun'))
                            <a 
                                href="{{ route(Route::currentRouteName()) }}" 
                                class="mt-1 flex w-full justify-center rounded-xl bg-red-50 px-4 py-2.5 text-sm font-semibold text-red-600 transition-colors hover:bg-red-100"
                            >
                                Reset Filter
                            </a>
                        @endif

                    </form>
                </div>
            </aside>

            {{-- CONTENT & GRID --}}
            <main class="flex-1">
                
                {{-- HEADER DATA --}}
                <div class="mb-6 flex items-center justify-between border-b border-slate-200 pb-3">
                    <h2 class="text-lg font-bold text-slate-800">Daftar Skripsi & KTI</h2>
                    <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">
                        Total: {{ $skripsis->total() }}
                    </span>
                </div>

                {{-- GRID --}}
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-3">
                    
                    @forelse ($skripsis as $skripsi)
                        <div x-data="{ open: false }" class="flex flex-col overflow-hidden rounded-xl border border-slate-200 bg-white transition-colors hover:border-blue-300">

                            {{-- COVER --}}
                            <div class="relative aspect-[3/4] bg-slate-100 border-b border-slate-100">
                                <img 
                                    src="{{ $skripsi->cover ? asset('storage/skripsi/' . $skripsi->cover) : asset('cover_default.svg') }}" 
                                    alt="{{ $skripsi->judul }}" 
                                    class="h-full w-full object-cover"
                                >
                                {{-- BADGE --}}
                                <div class="absolute top-3 left-3">
                                    <span class="rounded bg-white/90 px-2 py-1 text-[10px] font-bold uppercase text-slate-700 shadow-sm backdrop-blur">
                                        {{ $skripsi->prodi?->fakultas?->kode_fakultas ?? 'UMUM' }}
                                    </span>
                                </div>
                            </div>

                            {{-- CARD CONTENT --}}
                            <div class="flex flex-1 flex-col p-4">
                                <p class="mb-1 text-[10px] font-semibold uppercase text-blue-600">
                                    {{ $skripsi->prodi?->nama_prodi ?? 'Tanpa Prodi' }}
                                </p>
                                
                                <h3 class="mb-2 line-clamp-2 flex-1 text-sm font-bold leading-snug text-slate-800">
                                    {{ $skripsi->judul }}
                                </h3>
                                
                                <div class="mb-4 text-xs text-slate-500 truncate">
                                    {{ $skripsi->nama_penulis }}
                                </div>
                                
                                <button 
                                    @click="open = true" 
                                    class="w-full rounded-lg bg-blue-600 px-3 py-2 text-xs font-semibold text-white transition-colors hover:bg-blue-700"
                                >
                                    Detail
                                </button>
                            </div>

                            {{-- MODAL --}}
                            <template x-teleport="body">
                                <div x-show="open" x-cloak class="fixed inset-0 z-[999] flex items-center justify-center p-4">
                                    
                                    {{-- BACKDROP --}}
                                    <div 
                                        x-show="open" 
                                        x-transition.opacity 
                                        @click="open = false"
                                        class="absolute inset-0 bg-slate-900/50 backdrop-blur-sm"
                                    ></div>

                                    {{-- MODAL PANEL --}}
                                    <div 
                                        x-show="open" 
                                        x-transition:enter="transition ease-out duration-200"
                                        x-transition:enter-start="opacity-0 scale-95"
                                        x-transition:enter-end="opacity-100 scale-100"
                                        x-transition:leave="transition ease-in duration-150"
                                        x-transition:leave-start="opacity-100 scale-100"
                                        x-transition:leave-end="opacity-0 scale-95"
                                        class="relative z-10 flex max-h-[90vh] w-full max-w-4xl flex-col overflow-hidden rounded-2xl bg-white shadow-xl md:flex-row"
                                    >
                                        
                                        {{-- CLOSE BUTTON --}}
                                        <button 
                                            @click="open = false" 
                                            class="absolute top-4 right-4 z-20 rounded-full bg-slate-100 p-2 text-slate-500 transition-colors hover:bg-red-50 hover:text-red-600"
                                        >
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>

                                        {{-- MODAL IMAGE --}}
                                        <div class="flex items-center justify-center border-r border-slate-100 bg-slate-50 p-6 md:w-2/5">
                                            <img 
                                                src="{{ $skripsi->cover ? asset('storage/skripsi/' . $skripsi->cover) : asset('storage/cover_default.svg') }}" 
                                                alt="{{ $skripsi->judul }}" 
                                                class="max-h-[300px] rounded object-cover shadow-sm md:max-h-[500px]"
                                            >
                                        </div>

                                        {{-- MODAL DETAIL --}}
                                        <div class="flex-1 overflow-y-auto p-6 md:p-8">
                                            <div class="mb-3 inline-flex items-center rounded bg-slate-100 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-slate-600">
                                                Skripsi / KTI
                                            </div>

                                            <h2 class="mb-5 pr-8 text-xl font-bold text-slate-800">
                                                {{ $skripsi->judul }}
                                            </h2>

                                            {{-- TABLE INFO --}}
                                            <div class="mb-6 rounded-xl border border-slate-200 text-sm">
                                                <div class="flex border-b border-slate-100 px-4 py-2.5">
                                                    <span class="w-1/3 text-slate-500">Penulis</span>
                                                    <span class="w-2/3 font-medium text-slate-800">{{ $skripsi->nama_penulis }}</span>
                                                </div>
                                                <div class="flex border-b border-slate-100 px-4 py-2.5">
                                                    <span class="w-1/3 text-slate-500">NPM</span>
                                                    <span class="w-2/3 font-medium text-slate-800">{{ $skripsi->npm }}</span>
                                                </div>
                                                <div class="flex border-b border-slate-100 px-4 py-2.5">
                                                    <span class="w-1/3 text-slate-500">Pembimbing</span>
                                                    <span class="w-2/3 font-medium text-slate-800">{{ $skripsi->dosen_pembimbing }}</span>
                                                </div>
                                                <div class="flex border-b border-slate-100 px-4 py-2.5">
                                                    <span class="w-1/3 text-slate-500">Prodi</span>
                                                    <span class="w-2/3 font-medium text-slate-800">{{ $skripsi->prodi?->nama_prodi }}</span>
                                                </div>
                                                <div class="flex border-b border-slate-100 px-4 py-2.5">
                                                    <span class="w-1/3 text-slate-500">Fakultas</span>
                                                    <span class="w-2/3 font-medium text-slate-800">{{ $skripsi->prodi?->fakultas?->nama_fakultas ?? $skripsi->prodi?->fakultas?->kode_fakultas }}</span>
                                                </div>
                                                <div class="flex px-4 py-2.5">
                                                    <span class="w-1/3 text-slate-500">Tahun</span>
                                                    <span class="w-2/3 font-medium text-slate-800">{{ $skripsi->tahun }}</span>
                                                </div>
                                            </div>

                                            {{-- ABSTRAK --}}
                                            <div class="mb-6">
                                                <h4 class="mb-2 text-xs font-bold uppercase text-slate-400">Abstrak</h4>
                                                <p class="text-sm leading-relaxed text-slate-600">
                                                    {{ $skripsi->abstrak ?: 'Abstrak tidak tersedia.' }}
                                                </p>
                                            </div>

                                            {{-- INFO AKSES --}}
                                            <div class="flex items-center gap-3 rounded-xl bg-blue-50 px-4 py-3 text-sm text-blue-800">
                                                <svg class="h-5 w-5 shrink-0 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <span>Tersedia untuk dibaca di <strong> Perpustakaan USTJ</strong>.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>

                    @empty

                        {{-- EMPTY STATE --}}
                        <div class="col-span-full py-16 text-center">
                            <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-slate-100">
                                <svg class="h-6 w-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-slate-800">Tidak Ditemukan</h3>
                            <p class="mt-1 text-sm text-slate-500">Ubah kata kunci atau filter pencarian Anda.</p>
                        </div>

                    @endforelse

                </div>

                {{-- PAGINATION --}}
                @if ($skripsis->hasPages())
                    <div class="mt-8 flex justify-center">
                        {{ $skripsis->withQueryString()->links() }}
                    </div>
                @endif

            </main>
        </div>
    </div>
</section>

@endsection