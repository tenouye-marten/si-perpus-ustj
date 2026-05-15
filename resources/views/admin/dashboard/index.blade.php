@extends('layouts.admin.admin')

@section('title', 'Dashboard')

@section('content')

{{-- HEADER --}}
<header class="mb-8">
    <h1 class="text-2xl font-bold text-slate-800">Dashboard Overview</h1>
    <p class="text-sm text-slate-500 mt-1">Ringkasan data statistik sistem saat ini.</p>
</header>

{{-- GRID KARTU INFORMASI --}}
<div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
    
    {{-- CARD: TOTAL BUKU --}}
    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-xl flex items-center justify-center">
                <i class="fa-solid fa-book text-xl"></i>
            </div>
            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Koleksi</span>
        </div>
        <div>
            <p class="text-sm font-medium text-slate-500">Total Buku</p>
            <h3 class="text-3xl font-bold text-slate-900 mt-1">{{ $totalBooks ?? 0 }}</h3>
        </div>
    </div>

    {{-- CARD: TOTAL SKRIPSI --}}
    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center">
                <i class="fa-solid fa-file-lines text-xl"></i>
            </div>
            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Arsip</span>
        </div>
        <div>
            <p class="text-sm font-medium text-slate-500">Total Skripsi</p>
            <h3 class="text-3xl font-bold text-slate-900 mt-1">{{ $totalSkripsi ?? 0 }}</h3>
        </div>
    </div>

    {{-- CARD: TOTAL STAFF --}}
    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-orange-50 text-orange-600 rounded-xl flex items-center justify-center">
                <i class="fa-solid fa-users text-xl"></i>
            </div>
            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Internal</span>
        </div>
        <div>
            <p class="text-sm font-medium text-slate-500">Total Staff</p>
            <h3 class="text-3xl font-bold text-slate-900 mt-1">{{ $totalStaff ?? 0 }}</h3>
        </div>
    </div>

    {{-- CARD: TOTAL USER --}}
    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-rose-50 text-rose-600 rounded-xl flex items-center justify-center">
                <i class="fa-solid fa-user-gear text-xl"></i>
            </div>
            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Akses</span>
        </div>
        <div>
            <p class="text-sm font-medium text-slate-500">Total User</p>
            <h3 class="text-3xl font-bold text-slate-900 mt-1">{{ $totalUsers ?? 0 }}</h3>
        </div>
    </div>

</div>

@endsection