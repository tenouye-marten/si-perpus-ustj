@extends('layouts.admin.admin')

@section('title', 'Staff & Struktur Organisasi')

@section('content')

<div x-data="{
    modalTambah: false,
    modalEdit: false,
    modalHapus: false,

    selectedStaff: {
        id: null,
        nama: '',
      
        jabatan: '',
        level: '',
        bidang: '',
        urutan: '',
        foto: ''
    }
}">

    {{-- FEEDBACK --}}
    <div class="mb-5 space-y-2">

        {{-- SUCCESS --}}
        @if (session('success'))
            <div
                x-data="{ show: true }"
                x-init="setTimeout(() => show = false, 3000)"
                x-show="show"
                x-transition
                class="flex items-center justify-between px-4 py-3 border border-green-200 rounded-xl bg-green-50"
            >

                <div class="flex items-center gap-2 text-sm text-green-700">
                    <i class="fa-solid fa-check-circle text-green-600"></i>

                    <span>
                        {{ session('success') }}
                    </span>
                </div>

                <button
                    @click="show = false"
                    class="text-green-500 hover:text-green-700"
                >
                    <i class="fa-solid fa-xmark text-sm"></i>
                </button>

            </div>
        @endif

        {{-- ERROR --}}
        @if ($errors->any())
            <div
                x-data="{ show: true }"
                x-show="show"
                x-transition
                class="px-4 py-3 border border-yellow-200 rounded-xl bg-yellow-50"
            >

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
                        class="text-yellow-500 hover:text-yellow-700"
                    >
                        <i class="fa-solid fa-xmark text-sm"></i>
                    </button>

                </div>

            </div>
        @endif

    </div>

    {{-- PAGE HEADER --}}
    <header class="mb-10 flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">

        <div>

            <h2 class="text-2xl font-bold tracking-tight text-slate-800 uppercase">
                Manajemen Struktur Organisasi
            </h2>

            <p class="mt-1 text-sm text-slate-500 font-medium">
                Kelola data kepala, koordinator, dan staff perpustakaan.
            </p>

        </div>

        {{-- BUTTON --}}
        <button
            @click="modalTambah = true"
            class="flex items-center gap-2 px-5 py-2.5 bg-slate-800 text-white text-sm font-bold rounded-xl transition-all hover:bg-slate-700 active:scale-95 shadow-md"
        >

            <i class="fa-solid fa-plus text-xs"></i>

            Tambah Staff

        </button>

    </header>

    {{-- TABLE --}}
    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">

        <div class="overflow-x-auto">

            <table class="w-full min-w-[1100px]">

                {{-- TABLE HEAD --}}
                <thead>

                    <tr class="bg-slate-50 border-b border-slate-200 text-[11px] font-bold uppercase tracking-widest text-slate-500">

                        <th class="p-4 text-center w-16">
                            No
                        </th>

                        <th class="p-4 text-center w-24">
                            Foto
                        </th>

                      

                        <th class="p-4">
                            Jabatan
                        </th>

                        <th class="p-4">
                            Bidang
                        </th>

                        <th class="p-4 text-center w-40">
                            Level
                        </th>

                        <th class="p-4 text-center w-24">
                            Urutan
                        </th>

                        <th class="p-4 text-center w-32">
                            Aksi
                        </th>

                    </tr>

                </thead>

                {{-- TABLE BODY --}}
                <tbody class="divide-y divide-slate-100 text-sm">

                    @forelse ($staffs as $item)

                        <tr class="hover:bg-slate-50/50 transition-colors">

                            {{-- NO --}}
                            <td class="p-4 text-center font-bold text-slate-400">
                                {{ $loop->iteration }}
                            </td>

                            {{-- FOTO --}}
                            <td class="p-4">

                                <div class="flex justify-center">

                                    @if ($item->foto)

                                        <img
                                            src="{{ asset('storage/staff/' . $item->foto) }}"
                                            class="w-12 h-12 rounded-xl object-cover border border-slate-200 shadow-sm"
                                        >

                                    @else

                                        <div class="w-12 h-12 rounded-xl bg-slate-100 border border-slate-200 flex items-center justify-center text-slate-300">
                                            <i class="fa-solid fa-user"></i>
                                        </div>

                                    @endif

                                </div>

                            </td>

                            {{-- NAMA --}}
                            <td class="p-4">

                                <h4 class="font-bold text-slate-800 uppercase tracking-tight">
                                    {{ $item->nama }}
                                </h4>

                               

                            </td>

                            {{-- JABATAN --}}
                            <td class="p-4">

                                <span class="inline-flex px-3 py-1 rounded-lg bg-slate-100 border border-slate-200 text-[11px] font-black uppercase text-slate-700">
                                    {{ $item->jabatan }}
                                </span>

                            </td>

                            {{-- BIDANG --}}
                            <td class="p-4">

                                @if ($item->bidang)

                                    <span class="inline-flex px-3 py-1 rounded-lg bg-indigo-50 border border-indigo-100 text-[11px] font-bold text-indigo-700">
                                        {{ $item->bidang }}
                                    </span>

                                @else

                                    <span class="text-slate-300 text-xs italic">
                                        -
                                    </span>

                                @endif

                            </td>

                            {{-- LEVEL --}}
                            <td class="p-4 text-center">

                                @if ($item->level == 'kepala')

                                    <span class="inline-flex px-3 py-1 rounded-lg bg-amber-100 text-amber-700 text-[11px] font-black uppercase">
                                        Kepala
                                    </span>

                                @elseif ($item->level == 'koordinator')

                                    <span class="inline-flex px-3 py-1 rounded-lg bg-blue-100 text-blue-700 text-[11px] font-black uppercase">
                                        Koordinator
                                    </span>

                                @else

                                    <span class="inline-flex px-3 py-1 rounded-lg bg-emerald-100 text-emerald-700 text-[11px] font-black uppercase">
                                        Staff
                                    </span>

                                @endif

                            </td>

                            {{-- URUTAN --}}
                            <td class="p-4 text-center">

                                <span class="font-black text-slate-600">
                                    {{ $item->urutan }}
                                </span>

                            </td>

                            {{-- ACTION --}}
                            <td class="p-4">

                                <div class="flex items-center justify-center gap-2">

                                    {{-- EDIT --}}
                                    <button
                                        @click="
                                            selectedStaff = {
                                                id: '{{ $item->id }}',
                                                nama: '{{ $item->nama }}',
                                             
                                                jabatan: '{{ $item->jabatan }}',
                                                level: '{{ $item->level }}',
                                                bidang: '{{ $item->bidang }}',
                                                urutan: '{{ $item->urutan }}',
                                                foto: '{{ $item->foto }}'
                                            };

                                            modalEdit = true
                                        "
                                        class="flex h-9 w-9 items-center justify-center rounded-lg bg-slate-800 text-white transition-all hover:bg-indigo-600 active:scale-95"
                                    >

                                        <i class="fa-solid fa-pen text-[11px]"></i>

                                    </button>

                                    {{-- DELETE --}}
                                    <button
                                        @click="
                                            selectedStaff = {
                                                id: '{{ $item->id }}',
                                                nama: '{{ $item->nama }}'
                                            };

                                            modalHapus = true
                                        "
                                        class="flex h-9 w-9 items-center justify-center rounded-lg bg-rose-500 text-white transition-all hover:bg-rose-600 active:scale-95"
                                    >

                                        <i class="fa-solid fa-trash text-[11px]"></i>

                                    </button>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="8" class="p-14 text-center text-slate-400 italic">

                                Belum ada data struktur organisasi.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    {{-- MODALS --}}
    <div class="fixed z-[99]">

        @include('admin.staff.create')

        @include('admin.staff.edit')

        @include('admin.staff.delete')

    </div>

</div>

@endsection