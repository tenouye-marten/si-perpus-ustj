<div x-show="modalEdit" 
     x-cloak 
     class="fixed inset-0 z-[100] flex items-center justify-center p-4">

    {{-- Backdrop: Soft Dark Blur --}}
    <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-[2px]" 
         @click="modalEdit = false"
         x-show="modalEdit"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"></div>

    {{-- Modal Content --}}
    <div x-show="modalEdit" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95 translate-y-4"
         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100 translate-y-0"
         x-transition:leave-end="opacity-0 scale-95 translate-y-4"
         class="relative bg-white w-full max-w-lg rounded-2xl shadow-2xl border border-slate-200 overflow-hidden">

        {{-- Header: Solid Slate --}}
        <div class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex justify-between items-center">
            <h4 class="text-base font-bold text-slate-800 flex items-center gap-2">
                <i class="fa-solid fa-pen-to-square text-slate-400"></i>
                Update Data Fakultas
            </h4>
            <button @click="modalEdit = false" 
                    class="text-slate-400 hover:text-slate-600 transition-colors">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>
        </div>

        {{-- Form --}}
      <form 
    :action="'/admin/fakultas/' + selectedFakultas.id"
    method="POST"
    class="p-6"
    x-data="{ loading: false }"
    @submit="loading = true">

    @csrf
    @method('PUT')

            <div class="space-y-5">
                {{-- Input: Kode --}}
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">
                        Kode Fakultas
                    </label>
                    <input type="text" 
                           name="kode_fakultas" 
                           x-model="selectedFakultas.kode"
                           required
                           class="w-full px-4 py-2.5 rounded-lg border border-slate-200 bg-slate-50 focus:bg-white focus:border-slate-800 focus:ring-0 outline-none transition-all text-sm text-slate-700">
                </div>

                {{-- Input: Nama --}}
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">
                        Nama Fakultas
                    </label>
                    <input type="text" 
                           name="nama_fakultas" 
                           x-model="selectedFakultas.nama"
                           required
                           class="w-full px-4 py-2.5 rounded-lg border border-slate-200 bg-slate-50 focus:bg-white focus:border-slate-800 focus:ring-0 outline-none transition-all text-sm text-slate-700">
                </div>
            </div>

        {{-- Footer: Action Buttons --}}
<div class="flex items-center gap-3 mt-8 pt-6 border-t border-slate-100">

    {{-- BUTTON BATAL --}}
    <button 
        type="button"
        @click="modalEdit = false"
        :disabled="loading"
        class="flex-1 py-2.5 px-4 rounded-lg text-sm font-bold text-slate-500 bg-slate-100 hover:bg-slate-200 transition-all disabled:opacity-70">

        Batal

    </button>

    {{-- BUTTON UPDATE --}}
    <button 
        type="submit"
        :disabled="loading"
        class="flex-1 py-2.5 px-4 rounded-lg text-sm font-bold text-white bg-slate-800 hover:bg-slate-900 shadow-sm transition-all shadow-slate-200 disabled:opacity-70 disabled:cursor-not-allowed">

        {{-- NORMAL --}}
        <span x-show="!loading" class="flex items-center justify-center gap-2">
            <i class="fa-solid fa-floppy-disk text-xs"></i>
            Update Perubahan
        </span>

        {{-- LOADING --}}
        <span x-show="loading" class="flex items-center justify-center gap-2">
            <i class="fa-solid fa-spinner animate-spin text-xs"></i>
            Menyimpan...
        </span>

    </button>

</div>
        </form>
    </div>
</div>