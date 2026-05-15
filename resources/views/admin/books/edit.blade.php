@extends('layouts.admin.admin')

@section('title', 'Edit Buku')

@section('content')

<div class="max-w-7xl mx-auto" x-data="{ imageUrl: '{{ $book->cover ? asset('storage/books/' . $book->cover) : '' }}' }">

    {{-- PAGE HEADER --}}
    <header class="mb-10 flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-slate-800 uppercase">Edit Data Pustaka</h2>
            <p class="mt-1 text-sm text-slate-500 font-medium italic">Perbarui informasi katalog buku: <span class="text-slate-700 font-bold tracking-tight">{{ $book->judul }}</span></p>
        </div>

        <a href="{{ route('admin.books.index') }}" 
           class="flex items-center gap-2 px-5 py-2.5 bg-slate-100 text-slate-600 text-sm font-bold rounded-lg transition-all hover:bg-slate-200 active:scale-95">
            <i class="fa-solid fa-arrow-left text-xs"></i>
            Kembali
        </a>
    </header>

    {{-- FEEDBACK: ERRORS --}}
    @if ($errors->any())
        <div class="mb-8 px-5 py-4 bg-rose-50 border border-rose-100 text-rose-700 rounded-2xl shadow-sm">
            <div class="flex items-center gap-3 font-bold mb-3">
                <i class="fa-solid fa-circle-exclamation text-rose-500"></i>
                <span>Terjadi Kesalahan Validasi</span>
            </div>
            <ul class="list-disc list-inside text-xs font-semibold space-y-1 opacity-90">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- MAIN FORM --}}
    <form action="{{ route('admin.books.update', $book->slug) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

            {{-- SIDEBAR: COVER UPLOAD & PREVIEW --}}
            <div class="lg:col-span-4 space-y-6">
                <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm">
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Cover Pustaka</label>
                    
                    {{-- PREVIEW CONTAINER --}}
                    <div class="relative w-full aspect-[3/4] bg-slate-50 border-2 border-dashed border-slate-200 rounded-2xl flex flex-col items-center justify-center text-slate-400 overflow-hidden transition-all mb-4">
                        
                        <template x-if="imageUrl">
                            <img :src="imageUrl" class="object-cover w-full h-full">
                        </template>

                        <template x-if="!imageUrl">
                            <div class="flex flex-col items-center">
                                <i class="fa-solid fa-book-open text-5xl mb-4 opacity-20"></i>
                                <span class="text-[10px] font-black uppercase tracking-widest opacity-60">Tanpa Cover</span>
                            </div>
                        </template>
                    </div>

                    <input type="file" name="cover" accept="image/*"
                           @change="const file = $event.target.files[0]; if (file) { imageUrl = URL.createObjectURL(file) }"
                           class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:uppercase file:tracking-widest file:bg-slate-800 file:text-white hover:file:bg-slate-700 transition-all cursor-pointer">
                    
                    <p class="mt-3 text-[10px] font-bold text-slate-400 leading-relaxed italic">
                        * Pilih file baru untuk mengganti cover saat ini.
                    </p>
                </div>
            </div>

            {{-- CONTENT: BOOK DETAILS --}}
            <div class="lg:col-span-8 space-y-8">
                
                <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">
                    <div class="px-8 py-5 border-b border-slate-100 bg-slate-50/50">
                        <h3 class="text-sm font-black text-slate-700 uppercase tracking-widest">Form Perbaruan Data</h3>
                    </div>

                    <div class="p-8 space-y-8">
                        
                        {{-- INFORMASI UTAMA --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="md:col-span-2">
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Judul Pustaka</label>
                                <input type="text" name="judul" value="{{ old('judul', $book->judul) }}" required
                                       class="w-full bg-slate-50 border border-slate-200 px-4 py-3 text-sm font-semibold rounded-xl focus:bg-white focus:border-slate-800 focus:ring-0 transition-all outline-none">
                            </div>

                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Penulis</label>
                                <input type="text" name="penulis" value="{{ old('penulis', $book->penulis) }}" required
                                       class="w-full bg-slate-50 border border-slate-200 px-4 py-3 text-sm font-semibold rounded-xl focus:bg-white focus:border-slate-800 focus:ring-0 transition-all outline-none">
                            </div>

                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Penerbit</label>
                                <input type="text" name="penerbit" value="{{ old('penerbit', $book->penerbit) }}" required
                                       class="w-full bg-slate-50 border border-slate-200 px-4 py-3 text-sm font-semibold rounded-xl focus:bg-white focus:border-slate-800 focus:ring-0 transition-all outline-none">
                            </div>

                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Tahun Terbit</label>
                                <input type="number" name="tahun_terbit" value="{{ old('tahun_terbit', $book->tahun_terbit) }}" required
                                       class="w-full bg-slate-50 border border-slate-200 px-4 py-3 text-sm font-semibold rounded-xl focus:bg-white focus:border-slate-800 focus:ring-0 transition-all outline-none">
                            </div>

                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">ISBN</label>
                                <input type="text" name="isbn" value="{{ old('isbn', $book->isbn) }}"
                                       class="w-full bg-slate-50 border border-slate-200 px-4 py-3 text-sm font-semibold rounded-xl focus:bg-white focus:border-slate-800 focus:ring-0 transition-all outline-none">
                            </div>
                        </div>

                        {{-- RELEVANSI PRODI --}}
                        <div class="pt-6 border-t border-slate-100">
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-4">Relevansi Program Studi</label>
                            <select id="prodi-select" name="prodis[]" multiple 
                                    class="w-full bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:border-slate-800 transition-all outline-none">
                                @foreach ($prodis->groupBy('fakultas.nama_fakultas') as $fakultas => $items)
                                    <optgroup label="FAKULTAS {{ strtoupper($fakultas) }}">
                                        @foreach ($items as $prodi)
                                            <option value="{{ $prodi->id }}" 
                                                {{ in_array($prodi->id, old('prodis', $book->prodis->pluck('id')->toArray())) ? 'selected' : '' }}>
                                                {{ $prodi->nama_prodi }}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>

                        {{-- DESKRIPSI --}}
                        <div class="pt-6 border-t border-slate-100">
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-4">Sinopsis / Deskripsi Buku</label>
                            <textarea name="deskripsi" rows="8"
                                      class="w-full bg-slate-50 border border-slate-200 p-5 text-sm font-medium leading-relaxed rounded-2xl focus:bg-white focus:border-slate-800 focus:ring-0 transition-all outline-none resize-none">{{ old('deskripsi', $book->deskripsi) }}</textarea>
                        </div>
                    </div>
                </div>

                {{-- FORM ACTIONS --}}
                <div class="flex items-center gap-4">
                    <button type="submit" 
                            class="flex-1 py-4 bg-slate-800 text-white text-sm font-black uppercase tracking-[0.2em] rounded-2xl shadow-lg shadow-slate-200 transition-all hover:bg-slate-900 active:scale-[0.98]">
                        Simpan Perubahan
                    </button>
                    
                    <a href="{{ route('admin.books.index') }}" 
                       class="px-8 py-4 bg-slate-100 text-slate-500 text-sm font-black uppercase tracking-[0.2em] rounded-2xl transition-all hover:bg-slate-200">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection