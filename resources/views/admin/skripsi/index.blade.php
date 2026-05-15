@extends('layouts.admin.admin')

@section('title', 'Data Skripsi')

@section('content')

<div x-data="{
    modalHapus: false,
    selectedSkripsi: { id: null, judul: '' }
}">

    {{-- FEEDBACK --}}
<div class="mb-5 space-y-2">

    {{-- BERHASIL --}}
    @if (session('success'))
        <div 
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 3000)"
            x-show="show"
            x-transition
            class="flex items-center justify-between px-4 py-3 border border-green-200 rounded-xl bg-green-50">

            <div class="flex items-center gap-2 text-sm text-green-700">
                <i class="fa-solid fa-check-circle text-green-600"></i>

                <span>
                    {{ session('success') }}
                </span>
            </div>

            <button 
                @click="show = false"
                class="text-green-500 hover:text-green-700">

                <i class="fa-solid fa-xmark text-sm"></i>

            </button>
        </div>
    @endif


    {{-- GAGAL --}}
    @if (session('error'))
        <div 
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 4000)"
            x-show="show"
            x-transition
            class="flex items-center justify-between px-4 py-3 border border-red-200 rounded-xl bg-red-50">

            <div class="flex items-center gap-2 text-sm text-red-700">
                <i class="fa-solid fa-circle-exclamation text-red-600"></i>

                <span>
                    {{ session('error') }}
                </span>
            </div>

            <button 
                @click="show = false"
                class="text-red-500 hover:text-red-700">

                <i class="fa-solid fa-xmark text-sm"></i>

            </button>
        </div>
    @endif


    {{-- VALIDASI --}}
    @if ($errors->any())
        <div 
            x-data="{ show: true }"
            x-show="show"
            x-transition
            class="px-4 py-3 border border-yellow-200 rounded-xl bg-yellow-50">

            <div class="flex justify-between gap-3">

                <div class="flex gap-2">

                    <i class="fa-solid fa-triangle-exclamation text-yellow-600 mt-0.5"></i>

                    <div class="text-sm text-yellow-700 space-y-1">

                        @foreach ($errors->all() as $error)
                            <div>
                                • {{ $error }}
                            </div>
                        @endforeach

                    </div>

                </div>

                <button 
                    @click="show = false"
                    class="text-yellow-500 hover:text-yellow-700">

                    <i class="fa-solid fa-xmark text-sm"></i>

                </button>

            </div>
        </div>
    @endif

</div>

    {{-- PAGE HEADER --}}
    <header class="mb-8 flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-slate-800 uppercase">Repositori Skripsi Mahasiswa</h2>
            <p class="mt-1 text-sm text-slate-500 font-medium italic">Arsip karya ilmiah dan tugas akhir civitas <span class="text-slate-700 font-bold tracking-tight">USTJ</span>.</p>
        </div>

        <a href="{{ route('admin.skripsi.create') }}" 
           class="flex items-center justify-center gap-2 px-6 py-3 bg-slate-800 text-white text-sm font-bold rounded-lg transition-all hover:bg-slate-700 active:scale-95 shadow-md">
            <i class="fa-solid fa-plus text-xs"></i>
            Tambah Skripsi
        </a>
    </header>

    {{-- FILTER SEARCH AREA --}}
    <div class="bg-white border border-slate-200 rounded-2xl p-6 mb-8 shadow-sm">
        <form method="GET" action="{{ route('admin.skripsi.index') }}" class="grid grid-cols-1 lg:grid-cols-12 gap-5">
            
            <div class="lg:col-span-5">
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Pencarian Global</label>
                <div class="relative">
                    <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Judul, Nama Mahasiswa, atau NPM..."
                           class="w-full bg-slate-50 border border-slate-200 pl-11 pr-4 py-2.5 text-sm rounded-lg focus:bg-white focus:border-slate-800 focus:ring-0 transition-all outline-none">
                </div>
            </div>

            <div class="lg:col-span-4">
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Program Studi</label>
                <select name="prodi" class="w-full bg-slate-50 border border-slate-200 px-4 py-2.5 text-sm rounded-lg focus:bg-white focus:border-slate-800 focus:ring-0 outline-none transition-all cursor-pointer font-medium text-slate-700">
                    <option value="">Semua Jurusan</option>
                    @foreach ($prodis as $prodi)
                        <option value="{{ $prodi->id }}" {{ request('prodi') == $prodi->id ? 'selected' : '' }}>{{ $prodi->nama_prodi }}</option>
                    @endforeach
                </select>
            </div>

            <div class="lg:col-span-2">
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Tahun Lulus</label>
                <select name="tahun" class="w-full bg-slate-50 border border-slate-200 px-4 py-2.5 text-sm rounded-lg focus:bg-white focus:border-slate-800 focus:ring-0 outline-none transition-all cursor-pointer font-medium text-slate-700">
                    <option value="">Semua</option>
                    @foreach ($tahuns as $tahun)
                        <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>{{ $tahun }}</option>
                    @endforeach
                </select>
            </div>

            <div class="lg:col-span-1 flex items-end">
                <button type="submit" class="w-full py-2.5 bg-slate-800 text-white rounded-lg text-sm font-bold hover:bg-slate-700 transition-all shadow-sm">
                    Filter
                </button>
            </div>
        </form>
    </div>

    {{-- DATA TABLE --}}
    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[1100px] border-collapse text-left">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-[11px] font-black uppercase tracking-widest text-slate-400">
                        <th class="px-6 py-4 text-center w-16">No</th>
                        <th class="px-6 py-4 w-28 text-center">Cover</th>
                        <th class="px-6 py-4">Informasi Skripsi</th>
                        <th class="px-6 py-4">Penulis & Pembimbing</th>
                        <th class="px-6 py-4">Program Studi</th>
                        <th class="px-6 py-4 text-center">Tahun</th>
                        <th class="px-6 py-4 text-center w-40">Opsi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @forelse ($skripsis as $item)
                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <td class="px-6 py-6 text-center align-top font-bold text-slate-400">
                                {{ $skripsis->firstItem() + $loop->index }}
                            </td>

                            <td class="px-6 py-6 align-top">
                                <div class="flex justify-center">
                                    @if ($item->cover)
                                        <img src="{{ asset('storage/skripsi/' . $item->cover) }}" class="w-14 h-20 object-cover rounded shadow-sm border border-slate-200 grayscale-[30%] group-hover:grayscale-0 transition-all">
                                    @else
                                        <div class="w-14 h-20 bg-slate-100 border-2 border-dashed border-slate-200 rounded flex flex-col items-center justify-center text-slate-300">
                                            <i class="fa-solid fa-file-invoice text-xs"></i>
                                        </div>
                                    @endif
                                </div>
                            </td>

                            <td class="px-6 py-6 align-top">
                                <h4 class="text-sm font-black text-slate-800 leading-tight uppercase mb-2">{{ $item->judul }}</h4>
                                <span class="inline-flex px-2 py-0.5 bg-slate-100 text-slate-500 text-[10px] font-black rounded border border-slate-200 uppercase tracking-tighter">
                                    NPM: {{ $item->npm }}
                                </span>
                            </td>

                            <td class="px-6 py-6 align-top">
                                <p class="text-sm font-bold text-slate-700 uppercase tracking-tight mb-1">{{ $item->nama_penulis }}</p>
                                <div class="flex items-center gap-1.5 text-slate-400">
                                    <i class="fa-solid fa-user-tie text-[10px]"></i>
                                    <p class="text-[11px] font-medium leading-relaxed italic">{{ $item->dosen_pembimbing }}</p>
                                </div>
                            </td>

                            <td class="px-6 py-6 align-top">
                                <p class="text-xs font-black text-slate-800 uppercase tracking-tight mb-1">{{ $item->prodi->nama_prodi }}</p>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter">{{ $item->prodi->fakultas->nama_fakultas }}</p>
                            </td>

                            <td class="px-6 py-6 align-top text-center">
                                <span class="text-sm font-black text-slate-700">{{ $item->tahun }}</span>
                            </td>

                            <td class="px-6 py-6 align-top">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.skripsi.show', $item) }}" class="flex h-8 w-8 items-center justify-center bg-slate-800 text-white rounded transition-all hover:bg-slate-600 active:scale-90" title="Detail">
                                        <i class="fa-solid fa-eye text-[10px]"></i>
                                    </a>
                                    <a href="{{ route('admin.skripsi.edit', $item) }}" class="flex h-8 w-8 items-center justify-center bg-slate-800 text-white rounded transition-all hover:bg-indigo-600 active:scale-90" title="Edit">
                                        <i class="fa-solid fa-pen text-[10px]"></i>
                                    </a>
                                   <button 
    @click="
        selectedSkripsi = {
            slug: '{{ $item->slug }}',
            judul: '{{ addslashes($item->judul) }}'
        };

        modalHapus = true
    "
    class="flex h-8 w-8 items-center justify-center bg-slate-400 text-white rounded transition-all hover:bg-rose-600 active:scale-90"
    title="Hapus">

    <i class="fa-solid fa-trash text-[10px]"></i>

</button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-20 text-center italic text-slate-400 font-medium bg-slate-50/30">
                                <i class="fa-solid fa-folder-open text-3xl mb-4 block opacity-20"></i>
                                Tidak ditemukan data skripsi yang sesuai.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- PAGINATION --}}
    <div class="mt-8">
        {{ $skripsis->links() }}
    </div>

    {{-- MODALS --}}
    <div class="fixed z-[99]">
        @include('admin.skripsi.delete')
    </div>

</div>

@endsection