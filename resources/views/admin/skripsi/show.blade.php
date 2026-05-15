@extends('layouts.admin.admin')

@section('title', 'Detail Skripsi')

@section('content')

<div class="max-w-7xl mx-auto space-y-8">

    {{-- PAGE HEADER --}}
    <header class="flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-slate-800 uppercase">Arsip Tugas Akhir</h1>
            <p class="mt-1 text-sm text-slate-500 font-medium italic">Detail data karya ilmiah mahasiswa <span class="text-slate-700 font-bold">USTJ</span>.</p>
        </div>

        <div class="flex items-center gap-3">
            {{-- EDIT --}}
            <a href="{{ route('admin.skripsi.edit', $skripsi) }}" 
               class="flex items-center gap-2 px-6 py-2.5 bg-indigo-600 text-white text-sm font-bold rounded-lg transition-all hover:bg-indigo-700 active:scale-95 shadow-md shadow-indigo-100">
                <i class="fa-solid fa-pen-to-square text-xs"></i>
                Perbarui Data
            </a>

            {{-- KEMBALI --}}
            <a href="{{ route('admin.skripsi.index') }}" 
               class="flex items-center gap-2 px-5 py-2.5 bg-slate-100 text-slate-600 text-sm font-bold rounded-lg transition-all hover:bg-slate-200">
                <i class="fa-solid fa-arrow-left text-xs"></i>
                Kembali
            </a>
        </div>
    </header>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

        {{-- LEFT COLUMN: COVER --}}
        <div class="lg:col-span-4">
            <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm sticky top-6">
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4 text-center">Dokumen Cover</label>
                
                <div class="w-full aspect-[3/4] rounded-2xl overflow-hidden bg-slate-50 border border-slate-100 shadow-inner group">
                    @if ($skripsi->cover)
                        <img src="{{ asset('storage/skripsi/' . $skripsi->cover) }}" 
                             alt="{{ $skripsi->judul }}" 
                             class="w-full h-full object-cover grayscale-[30%] group-hover:grayscale-0 transition-all duration-700">
                    @else
                        <div class="w-full h-full flex flex-col items-center justify-center text-slate-300">
                            <i class="fa-solid fa-file-signature text-6xl mb-4 opacity-20"></i>
                            <span class="text-[10px] font-black uppercase tracking-widest opacity-50 text-center px-4">Lampiran Cover Tidak Tersedia</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- RIGHT COLUMN: DETAIL INFORMATION --}}
        <div class="lg:col-span-8 space-y-8">
            
            <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">
                
                {{-- TITLE SECTION --}}
                <div class="px-8 py-8 border-b border-slate-100 bg-slate-50/50">
                    <h2 class="text-xl font-black uppercase leading-relaxed tracking-tight text-slate-900 italic">
                        "{{ $skripsi->judul }}"
                    </h2>
                </div>

                {{-- CORE DATA GRID --}}
                <div class="p-8 space-y-10">
                    
                    {{-- ACADEMIC INFO --}}
                    <div>
                        <h4 class="text-[11px] font-black uppercase tracking-widest text-slate-400 mb-6 flex items-center gap-2">
                            <span class="w-8 h-[1px] bg-slate-200"></span>
                            Identitas Mahasiswa & Akademik
                        </h4>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-8 gap-x-12">
                            <div class="space-y-1.5">
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Nama Lengkap Penulis</p>
                                <p class="text-sm font-bold text-slate-800 uppercase">{{ $skripsi->nama_penulis }}</p>
                            </div>

                            <div class="space-y-1.5">
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Nomor Pokok Mahasiswa (NPM)</p>
                                <p class="text-sm font-bold text-slate-800 tracking-widest">{{ $skripsi->npm }}</p>
                            </div>

                            <div class="space-y-1.5">
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Dosen Pembimbing Utama</p>
                                <p class="text-sm font-bold text-slate-800 italic uppercase">{{ $skripsi->dosen_pembimbing }}</p>
                            </div>

                            <div class="space-y-1.5">
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Tahun Kelulusan / Sidang</p>
                                <p class="text-sm font-bold text-slate-800 tracking-widest">{{ $skripsi->tahun }}</p>
                            </div>

                            <div class="space-y-1.5">
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Unit Fakultas</p>
                                <p class="text-sm font-bold text-slate-800 uppercase tracking-tighter">{{ $skripsi->prodi->fakultas->nama_fakultas }}</p>
                            </div>

                            <div class="space-y-1.5">
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Program Studi</p>
                                <p class="text-sm font-bold text-slate-800 uppercase tracking-tighter">{{ $skripsi->prodi->nama_prodi }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- ABSTRACT SECTION --}}
                    <div class="pt-8 border-t border-slate-50">
                        <h4 class="text-[11px] font-black uppercase tracking-widest text-slate-400 mb-6 flex items-center gap-2">
                            <span class="w-8 h-[1px] bg-slate-200"></span>
                            Abstrak Penelitian
                        </h4>

                        <div class="bg-slate-50/50 border border-slate-100 p-8 rounded-2xl relative overflow-hidden group hover:border-slate-200 transition-colors">
                            {{-- Decorative Quote Icon --}}
                            <i class="fa-solid fa-quote-left absolute top-4 left-4 text-slate-100 text-6xl pointer-events-none"></i>
                            
                            <p class="text-sm leading-8 text-slate-600 font-medium whitespace-pre-line relative z-10 italic">
                                {{ $skripsi->abstrak }}
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            {{-- SYSTEM FOOTER --}}
            <div class="text-center pt-4">
                <p class="text-[10px] font-black text-slate-300 uppercase tracking-[0.3em]">
                    USTJ Repository System &bull; ID: {{ $skripsi->id }}
                </p>
            </div>
        </div>
    </div>
</div>

@endsection