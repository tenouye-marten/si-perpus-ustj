@extends('layouts.admin.admin')

@section('title', 'Program Studi')

@section('content')

<div x-data="{
    modalTambah: false,
    modalEdit: false,
    modalHapus: false,
    selectedProdi: {
        id: null,
        fakultas_id: '',
        kode: '',
        nama: ''
    }
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
    <header class="mb-10 flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-slate-800 uppercase">Manajemen Program Studi</h2>
            <p class="mt-1 text-sm text-slate-500 font-medium">
                Daftar jurusan aktif di lingkungan <span class="text-slate-700 font-bold tracking-tight">USTJ</span>.
            </p>
        </div>

        <button @click="modalTambah = true" 
                class="flex items-center gap-2 px-5 py-2.5 bg-slate-800 text-white text-sm font-bold rounded-lg transition-all hover:bg-slate-700 active:scale-95 shadow-md">
            <i class="fa-solid fa-plus text-xs"></i>
            Tambah Prodi
        </button>
    </header>

    {{-- DATA TABLE --}}
    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[800px]">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-[11px] font-bold uppercase tracking-widest text-slate-500">
                        <th class="p-4 w-16 text-center">No</th>
                        <th class="p-4 w-1/4">Fakultas</th>
                        <th class="p-4">Kode Prodi</th>
                        <th class="p-4">Nama Program Studi</th>
                        <th class="p-4 w-32 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse ($prodis as $item)
                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <td class="p-4 text-center font-bold text-slate-400">
                                {{ $loop->iteration }}
                            </td>

                            <td class="p-4 uppercase tracking-tight font-bold text-slate-800 text-xs">
                                {{ $item->fakultas->nama_fakultas }}
                            </td>

                            <td class="p-4">
                                <span class="inline-flex px-2.5 py-1 bg-slate-100 text-slate-700 text-[10px] font-black rounded border border-slate-200 tracking-tighter">
                                    {{ $item->kode_prodi }}
                                </span>
                            </td>

                            <td class="p-4 font-bold text-slate-700 uppercase tracking-tight">
                                {{ $item->nama_prodi }}
                            </td>

                            <td class="p-4">
                                <div class="flex items-center justify-center gap-2">
                                    {{-- BUTTON EDIT --}}
                                    <button @click="
                                                selectedProdi = {
                                                    id: '{{ $item->id }}',
                                                    fakultas_id: '{{ $item->fakultas_id }}',
                                                    kode: '{{ $item->kode_prodi }}',
                                                    nama: '{{ $item->nama_prodi }}'
                                                };
                                                modalEdit = true
                                            "
                                            class="flex h-8 w-8 items-center justify-center bg-slate-800 text-white rounded transition-all hover:bg-indigo-600 active:scale-90 shadow-sm">
                                        <i class="fa-solid fa-pen text-[10px]"></i>
                                    </button>

                                    {{-- BUTTON DELETE --}}
                                    <button @click="
                                                selectedProdi = {
                                                    id: '{{ $item->id }}',
                                                    nama: '{{ $item->nama_prodi }}'
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
                            <td colspan="5" class="p-12 text-center text-slate-400 font-medium tracking-wide italic bg-slate-50/30">
                                Belum ada data program studi tersimpan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- MODALS WRAPPER --}}
    <div class="fixed z-[99]">
        @include('admin.prodi.create')
        @include('admin.prodi.edit')
        @include('admin.prodi.delete')
    </div>

</div>

@endsection