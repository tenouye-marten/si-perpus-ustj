<div x-show="modalTambah" 
     x-cloak 
     class="fixed inset-0 z-[100] flex items-center justify-center p-4">

    {{-- Backdrop: Soft Blur --}}
    <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-[2px]" 
         @click="modalTambah = false"
         x-show="modalTambah"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"></div>

    {{-- Modal Content --}}
    <div x-show="modalTambah" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95 translate-y-4"
         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100 translate-y-0"
         x-transition:leave-end="opacity-0 scale-95 translate-y-4"
         class="relative bg-white w-full max-w-lg rounded-2xl shadow-2xl border border-slate-200 overflow-hidden">

        {{-- Header --}}
        <div class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex justify-between items-center">
            <h4 class="text-base font-bold text-slate-800 flex items-center gap-2">
                <i class="fa-solid fa-plus-circle text-slate-400"></i>
                Tambah Program Studi
            </h4>
            <button @click="modalTambah = false" 
                    class="text-slate-400 hover:text-slate-600 transition-colors">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>
        </div>

        {{-- Form --}}
        <form action="{{ route('admin.prodi.store') }}" method="POST" class="p-6">
            @csrf

            <div class="space-y-5">
                {{-- Select: Fakultas --}}
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">
                        Pilih Fakultas
                    </label>
                    <select name="fakultas_id" 
                            required
                            class="w-full px-4 py-2.5 rounded-lg border border-slate-200 bg-slate-50 focus:bg-white focus:border-slate-800 focus:ring-0 outline-none transition-all text-sm text-slate-700 cursor-pointer">
                        <option value="" disabled selected>Pilih Fakultas...</option>
                        @foreach ($fakultas as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_fakultas }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Input: Kode --}}
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">
                        Kode Program Studi
                    </label>
                    <input type="text" 
                           name="kode_prodi" 
                           placeholder="Contoh: TI-01"
                           required
                           class="w-full px-4 py-2.5 rounded-lg border border-slate-200 bg-slate-50 focus:bg-white focus:border-slate-800 focus:ring-0 outline-none transition-all text-sm text-slate-700 placeholder:text-slate-400">
                </div>

                {{-- Input: Nama --}}
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">
                        Nama Program Studi
                    </label>
                    <input type="text" 
                           name="nama_prodi" 
                           placeholder="Contoh: Teknik Informatika"
                           required
                           class="w-full px-4 py-2.5 rounded-lg border border-slate-200 bg-slate-50 focus:bg-white focus:border-slate-800 focus:ring-0 outline-none transition-all text-sm text-slate-700 placeholder:text-slate-400">
                </div>
            </div>

            {{-- Footer: Actions --}}
<div class="flex items-center gap-3 mt-8 pt-6 border-t border-slate-100">

    <button 
        type="button"
        @click="modalTambah = false"
        class="flex-1 py-2.5 px-4 rounded-lg text-sm font-bold text-slate-500 bg-slate-100 hover:bg-slate-200 transition-all">

        Batal

    </button>

   <button 
    type="button"
    x-data="{ loading: false }"
    @click="
        loading = true;

        setTimeout(() => {
            $root.closest('form').submit();
        }, 800);
    "
    :disabled="loading"
    class="flex-1 py-2.5 px-4 rounded-lg text-sm font-bold text-white bg-slate-800 hover:bg-slate-900 shadow-sm transition-all disabled:opacity-70 disabled:cursor-not-allowed">

    {{-- NORMAL --}}
    <span x-show="!loading" class="flex items-center justify-center gap-2">
        <i class="fa-solid fa-floppy-disk text-xs"></i>
        Simpan Data
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