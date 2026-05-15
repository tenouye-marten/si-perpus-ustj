@extends('layouts.admin.admin')

@section('title', 'Profil Saya')

@section('content')
<div class="max-w-7xl mx-auto pb-12">

    {{-- NOTIFIKASI SUKSES --}}
    @if (session('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             class="mb-8 flex items-center justify-between px-5 py-3 border border-indigo-100 rounded-2xl bg-white shadow-sm ring-1 ring-indigo-500/5">
            <div class="flex items-center gap-3 text-sm text-slate-600">
                <div class="w-6 h-6 rounded-full bg-indigo-500 flex items-center justify-center text-[10px] text-white">
                    <i class="fa-solid fa-check"></i>
                </div>
                <span class="font-bold tracking-tight">{{ session('success') }}</span>
            </div>
            <button @click="show = false" class="text-slate-400 hover:text-indigo-500 transition-colors">
                <i class="fa-solid fa-xmark text-xs"></i>
            </button>
        </div>
    @endif

    {{-- HEADER HALAMAN --}}
    <header class="flex flex-col gap-1 mb-10">
        <div class="flex items-center gap-2">
            <h2 class="text-xl font-black tracking-tighter text-slate-800 uppercase italic">Profil</h2>
        </div>
    </header>

    {{-- WRAPPER GRID: KIRI & KANAN --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">

        {{-- ========================================== --}}
        {{-- CARD KIRI: INFORMASI IDENTITAS             --}}
        {{-- ========================================== --}}
        <div x-data="{ isEditing: {{ $errors->has('name') || $errors->has('email') ? 'true' : 'false' }} }" 
             class="bg-white border border-slate-200 rounded-[2rem] shadow-[0_4px_20px_-5px_rgba(0,0,0,0.03)] overflow-hidden transition-all duration-500">
             
            <div class="px-8 py-6 border-b border-slate-50 flex justify-between items-center bg-white">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-indigo-50 border border-indigo-100/50 flex items-center justify-center text-indigo-500">
                        <i class="fa-regular fa-id-badge text-lg"></i>
                    </div>
                    <h3 class="text-xs font-black text-slate-800 uppercase tracking-widest">Identitas</h3>
                </div>
                <button x-show="!isEditing" @click="isEditing = true" x-transition.opacity.duration.300ms
                        class="px-5 py-2 text-[10px] font-black text-indigo-500 bg-indigo-50 border border-indigo-100 rounded-full hover:bg-slate-900 hover:text-white transition-all uppercase tracking-widest shadow-sm active:scale-95">
                    Ubah
                </button>
            </div>

            <div class="relative">
                {{-- VIEW MODE --}}
                <div x-show="!isEditing" x-collapse.duration.500ms>
                    <div class="p-8 space-y-8">
                        <div class="group">
                            <span class="text-[9px] font-black text-slate-300 uppercase tracking-[0.3em] group-hover:text-indigo-500 transition-colors duration-300">Display Name</span>
                            <p class="mt-1 text-sm font-bold text-slate-700 tracking-tight">{{ auth()->user()->name }}</p>
                        </div>
                        <div class="group">
                            <span class="text-[9px] font-black text-slate-300 uppercase tracking-[0.3em] group-hover:text-indigo-500 transition-colors duration-300">Email Address</span>
                            <p class="mt-1 text-sm font-semibold text-slate-500 italic lowercase">{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                </div>

                {{-- EDIT MODE --}}
                <div x-show="isEditing" x-collapse.duration.500ms x-cloak>
                    <form action="{{ route('admin.profile.update') }}" method="POST" class="p-8 bg-slate-50/30 border-t border-slate-50">
                        @csrf
                        @method('PATCH')
                        <div class="space-y-6">
                            <div class="space-y-2">
                                <label class="text-[9px] font-black uppercase tracking-[0.3em] text-slate-400 ml-1">Nama Lengkap</label>
                                <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" required 
                                    class="w-full px-5 py-3.5 text-sm border-2 rounded-2xl outline-none transition-all focus:border-indigo-500 bg-white border-slate-100 text-slate-700 font-bold placeholder-slate-300">
                                @error('name') <p class="ml-1 text-[10px] text-rose-500 font-bold uppercase italic tracking-tighter">{{ $message }}</p> @enderror
                            </div>
                            <div class="space-y-2">
                                <label class="text-[9px] font-black uppercase tracking-[0.3em] text-slate-400 ml-1">Email Sistem</label>
                                <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" required 
                                    class="w-full px-5 py-3.5 text-sm border-2 rounded-2xl outline-none transition-all focus:border-indigo-500 bg-white border-slate-100 text-slate-700 font-bold lowercase">
                                @error('email') <p class="ml-1 text-[10px] text-rose-500 font-bold uppercase italic tracking-tighter">{{ $message }}</p> @enderror
                            </div>
                            <div class="flex flex-col sm:flex-row items-center gap-3 pt-4">
                                <button type="submit" class="w-full sm:w-auto px-8 py-3.5 text-[10px] font-black text-white bg-slate-800 rounded-2xl hover:bg-slate-700 shadow-lg shadow-slate-200 transition-all uppercase tracking-widest active:scale-95">Simpan Data</button>
                                <button type="button" @click="isEditing = false" class="w-full sm:w-auto px-8 py-3.5 text-[10px] font-black text-slate-400 bg-white border-2 border-slate-100 rounded-2xl hover:bg-slate-50 transition-all uppercase tracking-widest text-center">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- CARD KANAN: KEAMANAN & KREDENSIAL          --}}
        {{-- ========================================== --}}
        <div x-data="{ isPassEditing: {{ $errors->has('current_password') || $errors->has('password') ? 'true' : 'false' }} }" 
             class="bg-white border border-slate-200 rounded-[2rem] shadow-[0_4px_20px_-5px_rgba(0,0,0,0.03)] overflow-hidden transition-all duration-500">
             
            <div class="px-8 py-6 border-b border-slate-50 flex justify-between items-center bg-white">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-indigo-50 border border-indigo-100/50 flex items-center justify-center text-indigo-500">
                        <i class="fa-solid fa-fingerprint text-lg"></i>
                    </div>
                    <h3 class="text-xs font-black text-slate-800 uppercase tracking-widest">Keamanan</h3>
                </div>
                <button x-show="!isPassEditing" @click="isPassEditing = true" x-transition.opacity.duration.300ms
                        class="px-4 py-2 text-[10px] font-black text-indigo-500 bg-indigo-50 border border-indigo-100 rounded-full hover:bg-slate-900 hover:text-white transition-all uppercase tracking-widest shadow-sm active:scale-95">
                    Ubah Sandi
                </button>
            </div>

            <div class="relative">
                {{-- VIEW MODE --}}
                <div x-show="!isPassEditing" x-collapse.duration.500ms>
                    <div class="p-8">
                        <span class="text-[9px] font-black text-slate-300 uppercase tracking-[0.3em]">Encrypted Password Status</span>
                        <div class="flex items-center gap-3 mt-4">
                            <div class="flex gap-1.5">
                                @for($i=0; $i<6; $i++) <div class="w-1.5 h-1.5 rounded-full bg-indigo-100"></div> @endfor
                            </div>
                            <span class="text-[10px] font-black text-indigo-400 uppercase tracking-tighter italic">Verified Secure</span>
                        </div>
                    </div>
                </div>

                {{-- EDIT MODE --}}
                <div x-show="isPassEditing" x-collapse.duration.500ms x-cloak>
                    <form action="{{ route('admin.profile.password.update') }}" method="POST" class="p-8 bg-slate-50/30 border-t border-slate-50">
                        @csrf
                        @method('PUT')
                        <div class="space-y-6">
                            <div x-data="{ show: false }" class="space-y-2">
                                <label class="text-[9px] font-black uppercase tracking-[0.3em] text-slate-400 ml-1">Password Saat Ini</label>
                                <div class="relative group">
                                    <input :type="show ? 'text' : 'password'" name="current_password" required 
                                        class="w-full pl-5 pr-14 py-3.5 text-sm border-2 rounded-2xl outline-none transition-all focus:border-indigo-500 bg-white border-slate-100 text-slate-700 font-bold">
                                    <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 px-5 flex items-center text-slate-300 hover:text-indigo-500 transition-colors focus:outline-none">
                                        <i class="fa-solid" :class="show ? 'fa-eye-slash' : 'fa-eye text-xs'"></i>
                                    </button>
                                </div>
                                @error('current_password') <p class="ml-1 text-[10px] text-rose-500 font-bold uppercase italic tracking-tighter">{{ $message }}</p> @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div x-data="{ show: false }" class="space-y-2">
                                    <label class="text-[9px] font-black uppercase tracking-[0.3em] text-slate-400 ml-1">Password Baru</label>
                                    <div class="relative group">
                                        <input :type="show ? 'text' : 'password'" name="password" required 
                                            class="w-full pl-5 pr-14 py-3.5 text-sm border-2 rounded-2xl outline-none transition-all focus:border-indigo-500 bg-white border-slate-100 text-slate-700 font-bold">
                                        <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 px-5 flex items-center text-slate-300 hover:text-indigo-500 transition-colors">
                                            <i class="fa-solid" :class="show ? 'fa-eye-slash' : 'fa-eye text-xs'"></i>
                                        </button>
                                    </div>
                                </div>
                                <div x-data="{ show: false }" class="space-y-2">
                                    <label class="text-[9px] font-black uppercase tracking-[0.3em] text-slate-400 ml-1">Konfirmasi Sandi</label>
                                    <div class="relative group">
                                        <input :type="show ? 'text' : 'password'" name="password_confirmation" required 
                                            class="w-full pl-5 pr-14 py-3.5 text-sm border-2 rounded-2xl outline-none transition-all focus:border-indigo-500 bg-white border-slate-100 text-slate-700 font-bold">
                                        <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 px-5 flex items-center text-slate-300 hover:text-indigo-500 transition-colors">
                                            <i class="fa-solid" :class="show ? 'fa-eye-slash' : 'fa-eye text-xs'"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @error('password') <p class="ml-1 text-[10px] text-rose-500 font-bold uppercase italic tracking-tighter">{{ $message }}</p> @enderror

                            <div class="flex flex-col sm:flex-row items-center gap-3 pt-4">
                                <button type="submit" class="w-full sm:w-auto px-8 py-3.5 text-[10px] font-black text-white bg-slate-800 rounded-2xl hover:bg-slate-700 shadow-lg shadow-slate-200 transition-all uppercase tracking-widest active:scale-95">Update Sandi</button>
                                <button type="button" @click="isPassEditing = false" class="w-full sm:w-auto px-8 py-3.5 text-[10px] font-black text-slate-400 bg-white border-2 border-slate-100 rounded-2xl hover:bg-slate-50 transition-all uppercase tracking-widest text-center">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection