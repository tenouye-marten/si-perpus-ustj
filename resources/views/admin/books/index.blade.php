@extends('layouts.admin.admin')

@section('title', 'Data Buku')

@section('content')

<div x-data="{
    modalHapus: false,
    selectedBook: { id: null, judul: '' }
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
            <h2 class="text-2xl font-bold tracking-tight text-slate-800 uppercase">Manajemen Koleksi Buku</h2>
            <p class="mt-1 text-sm text-slate-500 font-medium italic">Kelola arsip buku dan pustaka digital kampus.</p>
        </div>

        <a href="{{ route('admin.books.create') }}" 
           class="flex items-center justify-center gap-2 px-6 py-3 bg-slate-800 text-white text-sm font-bold rounded-lg transition-all hover:bg-slate-700 active:scale-95 shadow-md">
            <i class="fa-solid fa-plus text-xs"></i>
            Tambah Buku Baru
        </a>
    </header>

    {{-- FILTER SEARCH AREA --}}
    <div class="bg-white border border-slate-200 rounded-2xl p-6 mb-8 shadow-sm">
        <form method="GET" action="{{ route('admin.books.index') }}" class="grid grid-cols-1 lg:grid-cols-12 gap-5">
            
            <div class="lg:col-span-5">
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Pencarian Global</label>
                <div class="relative">
                    <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Judul, Penulis, atau ISBN..."
                           class="w-full bg-slate-50 border border-slate-200 pl-11 pr-4 py-2.5 text-sm rounded-lg focus:bg-white focus:border-slate-800 focus:ring-0 transition-all outline-none">
                </div>
            </div>

            <div class="lg:col-span-3">
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Program Studi</label>
                <select name="prodi" class="w-full bg-slate-50 border border-slate-200 px-4 py-2.5 text-sm rounded-lg focus:bg-white focus:border-slate-800 focus:ring-0 outline-none transition-all cursor-pointer font-medium text-slate-700">
                    <option value="">Semua Jurusan</option>
                    @foreach ($prodis as $prodi)
                        <option value="{{ $prodi->id }}" {{ request('prodi') == $prodi->id ? 'selected' : '' }}>{{ $prodi->nama_prodi }}</option>
                    @endforeach
                </select>
            </div>

            <div class="lg:col-span-2">
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Tahun Terbit</label>
                <select name="tahun" class="w-full bg-slate-50 border border-slate-200 px-4 py-2.5 text-sm rounded-lg focus:bg-white focus:border-slate-800 focus:ring-0 outline-none transition-all cursor-pointer font-medium text-slate-700">
                    <option value="">Semua</option>
                    @foreach ($tahuns as $tahun)
                        <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>{{ $tahun }}</option>
                    @endforeach
                </select>
            </div>

            <div class="lg:col-span-2 flex items-end gap-2">
                <button type="submit" class="flex-1 py-2.5 bg-slate-800 text-white rounded-lg text-sm font-bold hover:bg-slate-700 transition-all">Filter</button>
                <a href="{{ route('admin.books.index') }}" class="py-2.5 px-4 bg-slate-100 text-slate-600 rounded-lg hover:bg-slate-200 transition-all" title="Reset">
                    <i class="fa-solid fa-rotate-left"></i>
                </a>
            </div>
        </form>
    </div>

    {{-- DATA TABLE --}}
    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
        <div class="px-6 py-4 bg-slate-50/50 border-b border-slate-100 flex justify-between items-center">
            <h3 class="text-sm font-bold text-slate-700 uppercase tracking-tight">Katalog Koleksi ({{ $books->total() }})</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[1000px] border-collapse text-left">
                <thead>
                    <tr class="text-[11px] font-black uppercase tracking-widest text-slate-400 border-b border-slate-100">
                        <th class="px-6 py-4 text-center w-16">No</th>
                        <th class="px-6 py-4 w-28 text-center">Cover</th>
                        <th class="px-6 py-4">Informasi Buku</th>
                        <th class="px-6 py-4">Relevansi Prodi</th>
                        <th class="px-6 py-4">Penerbitan</th>
                        <th class="px-6 py-4 text-center w-40">Opsi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @forelse ($books as $item)
                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <td class="px-6 py-6 text-center align-top font-bold text-slate-400">
                                {{ $books->firstItem() + $loop->index }}
                            </td>

                            <td class="px-6 py-6 align-top">
                                <div class="flex justify-center">
                                    @if ($item->cover)
                                        <img src="{{ asset('storage/books/' . $item->cover) }}" class="w-14 h-20 object-cover rounded shadow-sm border border-slate-200 grayscale-[30%] group-hover:grayscale-0 transition-all">
                                    @else
                                        <div class="w-14 h-20 bg-slate-100 border-2 border-dashed border-slate-200 rounded flex flex-col items-center justify-center text-slate-300">
                                            <i class="fa-solid fa-image text-xs"></i>
                                        </div>
                                    @endif
                                </div>
                            </td>

                            <td class="px-6 py-6 align-top">
                                <h4 class="text-sm font-black text-slate-800 leading-tight uppercase mb-1">{{ $item->judul }}</h4>
                                <p class="text-xs font-medium text-slate-400 tracking-tight">ISBN: {{ $item->isbn ?? 'N/A' }}</p>
                            </td>

                            <td class="px-6 py-6 align-top">
                                <div class="flex flex-wrap gap-1.5">
                                    @foreach ($item->prodis as $prodi)
                                        <span class="inline-block px-2 py-0.5 bg-slate-100 text-slate-600 text-[10px] font-bold rounded border border-slate-200 uppercase tracking-tighter">
                                            {{ $prodi->nama_prodi }}
                                        </span>
                                    @endforeach
                                </div>
                            </td>

                            <td class="px-6 py-6 align-top">
                                <p class="text-sm font-bold text-slate-700 leading-none">{{ $item->penerbit }}</p>
                                <p class="text-[11px] font-medium text-slate-400 mt-2 tracking-wide uppercase">Tahun: {{ $item->tahun_terbit }}</p>
                            </td>

                            <td class="px-6 py-6 align-top">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.books.show', $item) }}" class="flex h-8 w-8 items-center justify-center bg-slate-800 text-white rounded transition-all hover:bg-slate-600 active:scale-90" title="Detail">
                                        <i class="fa-solid fa-eye text-[10px]"></i>
                                    </a>
                                    <a href="{{ route('admin.books.edit', $item) }}" class="flex h-8 w-8 items-center justify-center bg-slate-800 text-white rounded transition-all hover:bg-indigo-600 active:scale-90" title="Edit">
                                        <i class="fa-solid fa-pen text-[10px]"></i>
                                    </a>
                                    <button @click="
    selectedBook = {
        slug: '{{ $item->slug }}',
        judul: '{{ $item->judul }}'
    };
    modalHapus = true
"
                                            class="flex h-8 w-8 items-center justify-center bg-slate-400 text-white rounded transition-all hover:bg-rose-600 active:scale-90" title="Hapus">
                                        <i class="fa-solid fa-trash text-[10px]"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-20 text-center italic text-slate-400 font-medium">
                                <i class="fa-solid fa-box-open text-3xl mb-4 block opacity-20"></i>
                                Tidak ditemukan data buku yang sesuai.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- PAGINATION --}}
    <div class="mt-8">
        {{ $books->links() }}
    </div>

    {{-- MODALS --}}
    <div class="fixed z-[99]">
        @include('admin.books.delete')
    </div>

</div>

@endsection