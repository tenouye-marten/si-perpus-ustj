<div x-show="modalTambah"
     x-cloak
     class="fixed inset-0 z-[100] flex items-center justify-center p-4">

    {{-- BACKDROP --}}
    <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-[2px]"
         @click="modalTambah = false"
         x-show="modalTambah"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">
    </div>

    {{-- MODAL --}}
    <div x-show="modalTambah"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95 translate-y-4"
         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100 translate-y-0"
         x-transition:leave-end="opacity-0 scale-95 translate-y-4"
         class="relative w-full max-w-lg overflow-hidden bg-white border border-slate-200 rounded-2xl shadow-2xl">

        {{-- HEADER --}}
        <div class="flex items-center justify-between px-6 py-4 border-b bg-slate-50 border-slate-200">

            <h4 class="flex items-center gap-2 text-base font-bold text-slate-800">
                <i class="fa-solid fa-plus-circle text-slate-400"></i>
                Tambah Fakultas Baru
            </h4>

            <button @click="modalTambah = false"
                    class="transition-colors text-slate-400 hover:text-slate-600">

                <i class="fa-solid fa-xmark text-lg"></i>

            </button>

        </div>

        {{-- FORM --}}
        <form action="{{ route('admin.fakultas.store') }}"
              method="POST"
              class="p-6"
              x-data="{ loading: false }"
              @submit="loading = true">

            @csrf

            <div class="space-y-5">

                {{-- KODE --}}
                <div>

                    <label class="block mb-2 text-xs font-bold tracking-wider uppercase text-slate-500">
                        Kode Fakultas
                    </label>

                    <input type="text"
                           name="kode_fakultas"
                           placeholder="Contoh: FK-01"
                           required
                           class="w-full px-4 py-2.5 text-sm transition-all border rounded-lg outline-none border-slate-200 bg-slate-50 text-slate-700 placeholder:text-slate-400 focus:bg-white focus:border-slate-800 focus:ring-0">

                </div>

                {{-- NAMA --}}
                <div>

                    <label class="block mb-2 text-xs font-bold tracking-wider uppercase text-slate-500">
                        Nama Fakultas
                    </label>

                    <input type="text"
                           name="nama_fakultas"
                           placeholder="Masukkan nama fakultas"
                           required
                           class="w-full px-4 py-2.5 text-sm transition-all border rounded-lg outline-none border-slate-200 bg-slate-50 text-slate-700 placeholder:text-slate-400 focus:bg-white focus:border-slate-800 focus:ring-0">

                </div>

            </div>

            {{-- FOOTER --}}
            <div class="flex items-center gap-3 pt-6 mt-8 border-t border-slate-100">

                {{-- BATAL --}}
                <button type="button"
                        @click="modalTambah = false"
                        :disabled="loading"
                        class="flex-1 px-4 py-2.5 text-sm font-bold transition-all rounded-lg text-slate-500 bg-slate-100 hover:bg-slate-200 disabled:opacity-70">

                    Batal

                </button>

                {{-- SIMPAN --}}
                <button type="submit"
                        :disabled="loading"
                        class="flex-1 px-4 py-2.5 text-sm font-bold text-white transition-all rounded-lg bg-slate-800 hover:bg-slate-900 shadow-sm shadow-slate-200 disabled:opacity-70 disabled:cursor-not-allowed">

                    {{-- NORMAL --}}
                    <span x-show="!loading"
                          class="flex items-center justify-center gap-2">

                        <i class="fa-solid fa-floppy-disk text-xs"></i>
                        Simpan Data

                    </span>

                    {{-- LOADING --}}
                    <span x-show="loading"
                          class="flex items-center justify-center gap-2">

                        <i class="fa-solid fa-spinner animate-spin text-xs"></i>
                        Menyimpan...

                    </span>

                </button>

            </div>

        </form>

    </div>

</div>