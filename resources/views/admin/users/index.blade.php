@extends('layouts.admin.admin')
@section('title', 'Manajemen User')
@section('content')

<div x-data="{
    // Buka otomatis jika ada error & bukan dari proses Edit/Delete (artinya dari Create)
    modalTambah: {{ $errors->any() && !old('_method') ? 'true' : 'false' }},
    
    // Buka otomatis jika ada error & method-nya PUT (artinya dari proses Edit)
    modalEdit: {{ $errors->any() && old('_method') == 'PUT' ? 'true' : 'false' }},
    
    modalHapus: false,
    
    selectedUser: { 
        id: '{{ old('user_id') }}', 
        name: '{!! addslashes(old('name', '')) !!}', 
        email: '{{ old('email') }}' 
    }
}">

    {{-- FEEDBACK MESSAGES & GLOBAL ERRORS --}}
    <div class="mb-5 space-y-3">
        {{-- Pesan Sukses --}}
        @if (session('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
                class="flex items-center justify-between px-4 py-3 border border-emerald-200 rounded-xl bg-emerald-50 shadow-sm">
                <div class="flex items-center gap-2 text-sm text-emerald-700 font-bold">
                    <i class="fa-solid fa-check-circle text-emerald-600 text-lg"></i>
                    <span>{{ session('success') }}</span>
                </div>
                <button @click="show = false" class="text-emerald-500 hover:text-emerald-700 transition-colors">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>
        @endif

        {{-- Pesan Error Global / Exception (Misal: Hapus Diri Sendiri) --}}
        @if (session('error'))
            <div x-data="{ show: true }" x-show="show" x-transition
                class="flex items-center justify-between px-4 py-3 border border-rose-200 rounded-xl bg-rose-50 shadow-sm">
                <div class="flex items-center gap-2 text-sm text-rose-700 font-bold">
                    <i class="fa-solid fa-triangle-exclamation text-rose-600 text-lg"></i>
                    <span>{{ session('error') }}</span>
                </div>
                <button @click="show = false" class="text-rose-500 hover:text-rose-700 transition-colors">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>
        @endif
    </div>

    {{-- PAGE HEADER --}}
    <header class="mb-10 flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-slate-800 uppercase">Akses Administrator</h2>
            <p class="mt-1 text-sm text-slate-500 font-medium">
                Kelola kredensial dan hak akses user <span class="text-slate-700 font-bold tracking-tight">USTJ</span>.
            </p>
        </div>
        <button @click="modalTambah = true; selectedUser = { id: null, name: '', email: '' }" 
                class="flex items-center gap-2 px-5 py-2.5 bg-slate-800 text-white text-sm font-bold rounded-lg transition-all hover:bg-slate-700 active:scale-95 shadow-md">
            <i class="fa-solid fa-user-plus text-xs"></i> Tambah User
        </button>
    </header>

    {{-- DATA TABLE --}}
    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[800px]">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-[11px] font-bold uppercase tracking-widest text-slate-500">
                        <th class="p-4 w-16 text-center">No</th>
                        <th class="p-4">Nama Administrator</th>
                        <th class="p-4">Alamat Email</th>
                        <th class="p-4 w-32 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse ($users as $item)
                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <td class="p-4 text-center font-bold text-slate-400">{{ $loop->iteration }}</td>
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-slate-100 flex items-center justify-center text-slate-400 border border-slate-200 group-hover:bg-slate-800 group-hover:text-white transition-all">
                                        <i class="fa-solid fa-user-shield text-[10px]"></i>
                                    </div>
                                    <span class="font-bold text-slate-700 uppercase tracking-tight">{{ $item->name }}</span>
                                </div>
                            </td>
                            <td class="p-4 font-medium text-slate-500 italic">{{ $item->email }}</td>
                            <td class="p-4">
                                <div class="flex items-center justify-center gap-2">
                                    <button @click="selectedUser = { id: '{{ $item->id }}', name: '{{ addslashes($item->name) }}', email: '{{ $item->email }}' }; modalEdit = true"
                                            class="flex h-8 w-8 items-center justify-center bg-slate-800 text-white rounded transition-all hover:bg-indigo-600 active:scale-90 shadow-sm">
                                        <i class="fa-solid fa-pen text-[10px]"></i>
                                    </button>
                                    <button @click="selectedUser = { id: '{{ $item->id }}', name: '{{ addslashes($item->name) }}' }; modalHapus = true"
                                            class="flex h-8 w-8 items-center justify-center bg-slate-400 text-white rounded transition-all hover:bg-rose-600 active:scale-90 shadow-sm">
                                        <i class="fa-solid fa-trash text-[10px]"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-12 text-center">
                                <div class="flex flex-col items-center justify-center opacity-20">
                                    <i class="fa-solid fa-user-slash text-5xl mb-4"></i>
                                    <p class="text-sm font-black uppercase tracking-[0.3em] text-slate-400">Data User Kosong</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- MODALS --}}
    <div class="fixed z-[99]">
        @include('admin.users.create')
        @include('admin.users.edit')
        @include('admin.users.delete')
    </div>
</div>
@endsection