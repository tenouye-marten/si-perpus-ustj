@extends('layouts.admin.admin')

@section('title', 'Fakultas')

@section('content')

<div x-data="{
    modalTambah: false,
    modalEdit: false,
    modalHapus: false,
    selectedFakultas: { id: null, kode: '', nama: '' }
}">

    {{-- FEEDBACK MESSAGES --}}
    <div class="mb-6 space-y-3">
        {{-- BERHASIL --}}
        @if (session('success'))
            <div x-data="{ show: true }" 
                 x-init="setTimeout(() => show = false, 3000)" 
                 x-show="show" 
                 x-transition 
                 class="flex items-center justify-between px-4 py-3 border border-emerald-200 rounded-xl bg-emerald-50 text-emerald-700 shadow-sm">
                <div class="flex items-center gap-3 text-sm font-medium">
                    <i class="fa-solid fa-check-circle text-emerald-500"></i>
                    <span>{{ session('success') }}</span>
                </div>
                <button @click="show = false" class="text-emerald-400 hover:text-emerald-600 transition-colors">
                    <i class="fa-solid fa-xmark text-sm"></i>
                </button>
            </div>
        @endif

        {{-- GAGAL --}}
        @if (session('error'))
            <div x-data="{ show: true }" 
                 x-init="setTimeout(() => show = false, 4000)" 
                 x-show="show" 
                 x-transition 
                 class="flex items-center justify-between px-4 py-3 border border-rose-200 rounded-xl bg-rose-50 text-rose-700 shadow-sm">
                <div class="flex items-center gap-3 text-sm font-medium">
                    <i class="fa-solid fa-circle-exclamation text-rose-500"></i>
                    <span>{{ session('error') }}</span>
                </div>
                <button @click="show = false" class="text-rose-400 hover:text-rose-600 transition-colors">
                    <i class="fa-solid fa-xmark text-sm"></i>
                </button>
            </div>
        @endif

        {{-- VALIDASI --}}
        @if ($errors->any())
            <div x-data="{ show: true }" 
                 x-show="show" 
                 x-transition 
                 class="px-4 py-3 border border-amber-200 rounded-xl bg-amber-50 shadow-sm">
                <div class="flex justify-between items-start gap-3">
                    <div class="flex gap-3">
                        <i class="fa-solid fa-triangle-exclamation text-amber-500 mt-1"></i>
                        <div class="text-sm text-amber-800 font-medium space-y-1">
                            @foreach ($errors->all() as $error)
                                <div>• {{ $error }}</div>
                            @endforeach
                        </div>
                    </div>
                    <button @click="show = false" class="text-amber-400 hover:text-amber-600 transition-colors">
                        <i class="fa-solid fa-xmark text-sm"></i>
                    </button>
                </div>
            </div>
        @endif
    </div>

    {{-- PAGE HEADER --}}
    <header class="mb-10 flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-slate-800 uppercase">Manajemen Fakultas</h2>
            <p class="mt-1 text-sm text-slate-500 font-medium">Daftar unit fakultas aktif di lingkungan <span class="text-slate-700 font-bold tracking-tight">USTJ</span>.</p>
        </div>

        <button @click="modalTambah = true" 
                class="flex items-center gap-2 px-5 py-2.5 bg-slate-800 text-white text-sm font-bold rounded-lg transition-all hover:bg-slate-700 active:scale-95 shadow-md">
            <i class="fa-solid fa-plus text-xs"></i>
            Tambah Fakultas
        </button>
    </header>

    {{-- DATA TABLE --}}
    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[700px]">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-[11px] font-bold uppercase tracking-widest text-slate-500">
                        <th class="p-4 w-20 text-center">No</th>
                        <th class="p-4">Kode Fakultas</th>
                        <th class="p-4">Nama Fakultas</th>
                        <th class="p-4 w-32 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse ($fakultas as $item)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="p-4 text-center font-bold text-slate-400">{{ $loop->iteration }}</td>
                            
                            <td class="p-4">
                                <span class="inline-flex px-2.5 py-1 bg-slate-100 text-slate-700 text-xs font-black rounded border border-slate-200">
                                    {{ $item->kode_fakultas }}
                                </span>
                            </td>

                            <td class="p-4 font-bold text-slate-700 uppercase tracking-tight">{{ $item->nama_fakultas }}</td>

                            <td class="p-4">
                                <div class="flex items-center justify-center gap-2">
                                    {{-- BUTTON EDIT --}}
                                    <button @click="
                                                selectedFakultas = {
                                                    id: '{{ $item->id }}',
                                                    kode: '{{ $item->kode_fakultas }}',
                                                    nama: '{{ $item->nama_fakultas }}'
                                                };
                                                modalEdit = true
                                            "
                                            class="flex h-8 w-8 items-center justify-center bg-slate-800 text-white rounded transition-all hover:bg-indigo-600 active:scale-90 shadow-sm">
                                        <i class="fa-solid fa-pen text-[10px]"></i>
                                    </button>

                                    {{-- BUTTON DELETE --}}
                                    <button @click="
                                                selectedFakultas = {
                                                    id: '{{ $item->id }}',
                                                    nama: '{{ $item->nama_fakultas }}'
                                                };
                                                modalHapus = true
                                            "
                                            class="flex h-8 w-8 items-center justify-center bg-slate-400 text-white rounded transition-all hover:bg-rose-600 active:scale-90 shadow-sm">
                                        <i class="fa-solid fa-trash text-[10px]"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-12 text-center text-slate-400 font-medium tracking-wide italic bg-slate-50/30">
                                Belum ada data fakultas tersimpan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- MODALS WRAPPER --}}
    <div class="fixed z-[99]">
        @include('admin.fakultas.create')
        @include('admin.fakultas.edit')
        @include('admin.fakultas.delete')
    </div>

</div>

@endsection