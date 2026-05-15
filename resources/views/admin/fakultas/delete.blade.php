<div x-show="modalHapus" 
     x-cloak 
     class="fixed inset-0 z-[100] flex items-center justify-center p-4">

    {{-- Backdrop: Soft Dark Blur --}}
    <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-[2px]" 
         @click="modalHapus = false"
         x-show="modalHapus"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"></div>

    {{-- Modal Content --}}
    <div x-show="modalHapus" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95 translate-y-4"
         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100 translate-y-0"
         x-transition:leave-end="opacity-0 scale-95 translate-y-4"
         class="relative bg-white w-full max-w-sm rounded-2xl shadow-2xl border border-slate-200 overflow-hidden p-8 text-center">

        {{-- Icon: Warning Style --}}
        <div class="w-16 h-16 bg-rose-50 text-rose-500 rounded-full flex items-center justify-center mx-auto mb-6 border border-rose-100">
            <i class="fa-solid fa-trash-can text-2xl"></i>
        </div>

        {{-- Typography --}}
        <h4 class="text-xl font-bold text-slate-800 mb-2">Hapus Fakultas?</h4>
        <p class="text-sm font-medium text-slate-500 mb-4">
            Tindakan ini tidak dapat dibatalkan. Anda yakin ingin menghapus data:
        </p>
        
        <div class="px-4 py-2 bg-slate-50 border border-slate-100 rounded-lg mb-8">
            <p class="text-sm font-black text-slate-700 uppercase tracking-tight" x-text="selectedFakultas.nama"></p>
        </div>

       {{-- Action Form --}}
{{-- Action Form --}}
<form 
    :action="'/admin/fakultas/' + selectedFakultas.id"
    method="POST"
    x-data="{ loading: false }"
    @submit="loading = true">

    @csrf
    @method('DELETE')

    <div class="flex flex-col sm:flex-row gap-3">

        {{-- BUTTON BATAL --}}
        <button 
            type="button"
            @click="modalHapus = false"
            :disabled="loading"
            class="flex-1 py-2.5 px-6 rounded-lg text-sm font-bold text-slate-500 bg-slate-100 hover:bg-slate-200 transition-all disabled:opacity-70">

            Batal

        </button>

        {{-- BUTTON HAPUS --}}
        <button 
            type="submit"
            :disabled="loading"
            class="flex-1 py-2.5 px-6 rounded-lg text-sm font-bold text-white bg-rose-600 hover:bg-rose-700 shadow-sm shadow-rose-100 transition-all disabled:opacity-70 disabled:cursor-not-allowed">

            {{-- NORMAL --}}
            <span x-show="!loading" class="flex items-center justify-center gap-2">
                <i class="fa-solid fa-trash text-xs"></i>
                Ya, Hapus
            </span>

            {{-- LOADING --}}
            <span x-show="loading" class="flex items-center justify-center gap-2">
                <i class="fa-solid fa-spinner animate-spin text-xs"></i>
                Menghapus...
            </span>

        </button>

    </div>

</form>
    </div>
</div>