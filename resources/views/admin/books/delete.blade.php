{{-- MODAL DELETE BOOK --}}
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
         class="relative bg-white w-full max-w-sm rounded-[2rem] shadow-2xl border border-slate-200 overflow-hidden p-8 text-center">

        {{-- Icon: Warning Style --}}
        <div class="w-20 h-20 bg-rose-50 text-rose-500 rounded-full flex items-center justify-center mx-auto mb-6 border border-rose-100">
            <i class="fa-solid fa-trash-can text-3xl"></i>
        </div>

        {{-- Typography --}}
        <h4 class="text-xl font-black text-slate-800 uppercase tracking-tight mb-2">Hapus Buku?</h4>
        <p class="text-sm font-medium text-slate-500 mb-4">
            Tindakan ini bersifat permanen. Anda yakin ingin menghapus data buku:
        </p>
        
        {{-- Book Title Display --}}
        <div class="px-4 py-3 bg-slate-50 border border-slate-100 rounded-2xl mb-8">
            <p class="text-sm font-black text-slate-700 uppercase tracking-tight leading-relaxed" x-text="selectedBook.judul"></p>
        </div>

        {{-- Action Form --}}
        <form :action="'/admin/books/' + selectedBook.slug" method="POST">
            @csrf
            @method('DELETE')

            <div class="flex flex-col sm:flex-row gap-3">
                {{-- Button: Batal --}}
                <button type="button" 
                        @click="modalHapus = false" 
                        class="flex-1 py-3 px-6 rounded-xl text-xs font-black uppercase tracking-widest text-slate-500 bg-slate-100 hover:bg-slate-200 transition-all">
                    Batal
                </button>

                {{-- Button: Confirm Delete --}}
                <button type="submit" 
                        class="flex-1 py-3 px-6 rounded-xl text-xs font-black uppercase tracking-widest text-white bg-rose-600 hover:bg-rose-700 shadow-lg shadow-rose-100 transition-all active:scale-95">
                    Ya, Hapus
                </button>
            </div>
        </form>
    </div>
</div>