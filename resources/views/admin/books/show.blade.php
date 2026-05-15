@extends('layouts.admin.admin')

@section('title', 'Detail Buku')

@section('content')

<div class="max-w-7xl mx-auto space-y-8">

    {{-- PAGE HEADER --}}
    <header class="flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-slate-800 uppercase">Detail Informasi Pustaka</h2>
            <p class="mt-1 text-sm text-slate-500 font-medium italic">Manajemen arsip data buku perpustakaan.</p>
        </div>

        <div class="flex items-center gap-3">
            {{-- BUTTON EDIT: Solid Indigo --}}
            <a href="{{ route('admin.books.edit', $book->slug) }}" 
               class="flex items-center gap-2 px-6 py-2.5 bg-indigo-600 text-white text-sm font-bold rounded-lg transition-all hover:bg-indigo-700 active:scale-95 shadow-md shadow-indigo-100">
                <i class="fa-solid fa-pen-to-square text-xs"></i>
                Edit Data
            </a>

            {{-- BUTTON KEMBALI: Muted Slate --}}
            <a href="{{ route('admin.books.index') }}" 
               class="flex items-center gap-2 px-5 py-2.5 bg-slate-100 text-slate-600 text-sm font-bold rounded-lg transition-all hover:bg-slate-200">
                <i class="fa-solid fa-arrow-left text-xs"></i>
                Kembali
            </a>
        </div>
    </header>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

        {{-- LEFT COLUMN: COVER VIEW --}}
        <div class="lg:col-span-4">
            <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm sticky top-6">
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Cover Pustaka</label>
                
                <div class="w-full aspect-[3/4] rounded-2xl overflow-hidden bg-slate-50 border border-slate-100 shadow-inner">
                    @if ($book->cover)
                        <img src="{{ asset('storage/books/' . $book->cover) }}" 
                             alt="{{ $book->judul }}" 
                             class="w-full h-full object-cover grayscale-[20%] hover:grayscale-0 transition-all duration-500">
                    @else
                        <div class="w-full h-full flex flex-col items-center justify-center text-slate-300">
                            <i class="fa-solid fa-book-open text-6xl mb-4 opacity-20"></i>
                            <span class="text-[10px] font-black uppercase tracking-widest opacity-50">No Cover Available</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- RIGHT COLUMN: DETAILS --}}
        <div class="lg:col-span-8 space-y-8">
            
            {{-- DATA CARD --}}
            <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden text-slate-800">
                
                {{-- MAIN TITLE HEADER --}}
                <div class="px-8 py-8 border-b border-slate-100 bg-slate-50/50">
                    <h1 class="text-2xl font-black uppercase leading-tight tracking-tight text-slate-900">
                        {{ $book->judul }}
                    </h1>
                </div>

                <div class="p-8 space-y-10">
                    
                    {{-- SECTION: SPESIFIKASI --}}
                    <div>
                        <h4 class="text-[11px] font-black uppercase tracking-widest text-slate-400 mb-6 flex items-center gap-2">
                            <span class="w-8 h-[1px] bg-slate-200"></span>
                            Spesifikasi Buku
                        </h4>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-8 gap-x-12">
                            <div class="space-y-1">
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Penulis / Pengarang</p>
                                <p class="text-sm font-bold text-slate-700 uppercase tracking-tight">{{ $book->penulis }}</p>
                            </div>

                            <div class="space-y-1">
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Penerbit</p>
                                <p class="text-sm font-bold text-slate-700 uppercase tracking-tight">{{ $book->penerbit }}</p>
                            </div>

                            <div class="space-y-1">
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Tahun Terbit</p>
                                <p class="text-sm font-bold text-slate-700">{{ $book->tahun_terbit }}</p>
                            </div>

                            <div class="space-y-1">
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-wider">ISBN</p>
                                <p class="text-sm font-bold text-slate-700 tracking-widest">{{ $book->isbn ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- SECTION: PROGRAM STUDI --}}
                    <div class="pt-8 border-t border-slate-50">
                        <h4 class="text-[11px] font-black uppercase tracking-widest text-slate-400 mb-6 flex items-center gap-2">
                            <span class="w-8 h-[1px] bg-slate-200"></span>
                            Relevansi Program Studi
                        </h4>

                        <div class="flex flex-wrap gap-3">
                            @foreach ($book->prodis as $prodi)
                                <div class="px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl group transition-all hover:border-slate-800">
                                    <p class="text-[11px] font-black text-slate-800 uppercase tracking-tight group-hover:text-slate-900">
                                        {{ $prodi->nama_prodi }}
                                    </p>
                                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter mt-0.5">
                                        {{ $prodi->fakultas->nama_fakultas }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- SECTION: DESKRIPSI --}}
                    <div class="pt-8 border-t border-slate-50">
                        <h4 class="text-[11px] font-black uppercase tracking-widest text-slate-400 mb-6 flex items-center gap-2">
                            <span class="w-8 h-[1px] bg-slate-200"></span>
                            Sinopsis / Deskripsi
                        </h4>

                        @if ($book->deskripsi)
                            <div class="prose prose-slate max-w-none">
                                <p class="text-sm leading-8 text-slate-600 font-medium whitespace-pre-line italic bg-slate-50/30 p-6 rounded-2xl border border-slate-100">
                                    {{ $book->deskripsi }}
                                </p>
                            </div>
                        @else
                            <div class="p-6 rounded-2xl bg-slate-50 border border-dashed border-slate-200 text-center">
                                <p class="text-xs font-bold text-slate-400 italic">Deskripsi buku belum tersedia dalam basis data.</p>
                            </div>
                        @endif
                    </div>

                </div>
            </div>

            {{-- FOOTER INFO --}}
            <p class="text-center text-[10px] font-black text-slate-300 uppercase tracking-[0.3em]">
                USTJ Digital Library System &bull; 2026
            </p>
        </div>
    </div>
</div>

@endsection