{{-- MODAL TAMBAH STAFF --}}
<div
    x-show="modalTambah"
    x-cloak
    class="fixed inset-0 z-[100] flex items-center justify-center p-4"
>

    {{-- BACKDROP --}}
    <div
        class="fixed inset-0 bg-slate-900/40 backdrop-blur-[2px]"
        @click="modalTambah = false"
        x-show="modalTambah"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
    ></div>

    {{-- MODAL --}}
    <div
        x-show="modalTambah"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95 translate-y-4"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
        class="relative bg-white w-full max-w-4xl rounded-3xl shadow-2xl border border-slate-200 overflow-hidden"
    >

        {{-- HEADER --}}
        <div class="px-8 py-6 border-b border-slate-100 bg-slate-50 flex items-center justify-between">

            <div>

                <h3 class="text-sm font-black text-slate-700 uppercase tracking-widest">
                    Tambah Struktur Organisasi
                </h3>

                <p class="mt-1 text-[10px] font-bold text-slate-400 uppercase italic tracking-wider">
                    Input data kepala, koordinator, dan staff perpustakaan
                </p>

            </div>

            {{-- CLOSE --}}
            <button
                @click="modalTambah = false"
                class="w-9 h-9 flex items-center justify-center rounded-full bg-white border border-slate-200 text-slate-400 hover:text-rose-500 transition-all shadow-sm"
            >

                <i class="fa-solid fa-xmark text-sm"></i>

            </button>

        </div>

        {{-- FORM --}}
        <form
            action="{{ route('admin.staff.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="p-8"
            x-data="{ preview: null }"
        >

            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                {{-- FOTO --}}
                <div class="lg:col-span-4 space-y-4">

                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest">

                        Foto Profil

                    </label>

                    {{-- PREVIEW --}}
                    <div class="w-full aspect-square rounded-3xl overflow-hidden border-2 border-dashed border-slate-200 bg-slate-50 flex items-center justify-center group hover:border-slate-700 transition-all">

                        <template x-if="preview">

                            <img
                                :src="preview"
                                class="w-full h-full object-cover"
                            >

                        </template>

                        <template x-if="!preview">

                            <div class="flex flex-col items-center text-slate-300 group-hover:text-slate-400 transition-all">

                                <i class="fa-solid fa-camera text-4xl mb-3"></i>

                                <span class="text-[10px] font-black uppercase tracking-widest">
                                    Preview Foto
                                </span>

                            </div>

                        </template>

                    </div>

                    {{-- INPUT FOTO --}}
                    <div>

                        <input
                            type="file"
                            name="foto"
                            id="foto"
                            class="hidden"
                            accept="image/*"
                            @change="preview = URL.createObjectURL($event.target.files[0])"
                        >

                        <label
                            for="foto"
                            class="flex items-center justify-center w-full py-3 rounded-2xl bg-slate-100 border border-slate-200 text-[10px] font-black uppercase tracking-[0.2em] text-slate-600 hover:bg-slate-200 cursor-pointer transition-all"
                        >

                            Pilih Foto

                        </label>

                    </div>

                </div>

                {{-- FORM INPUT --}}
                <div class="lg:col-span-8 space-y-5">

                    {{-- NAMA --}}
                    <div>

                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">

                            Nama Lengkap

                        </label>

                        <input
                            type="text"
                            name="nama"
                            value="{{ old('nama') }}"
                            required
                            placeholder="Masukkan nama lengkap"
                            class="w-full px-4 py-3 rounded-2xl border border-slate-200 bg-slate-50 text-sm font-semibold focus:bg-white focus:border-slate-800 outline-none transition-all"
                        >

                    </div>

                   

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        {{-- JABATAN --}}
                        <div>

                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">

                                Jabatan

                            </label>

                            <input
                                type="text"
                                name="jabatan"
                                value="{{ old('jabatan') }}"
                                required
                                placeholder="Contoh: Koordinator Layanan"
                                class="w-full px-4 py-3 rounded-2xl border border-slate-200 bg-slate-50 text-sm font-semibold focus:bg-white focus:border-slate-800 outline-none transition-all"
                            >

                        </div>

                        {{-- LEVEL --}}
                        <div>

                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">

                                Level Struktur

                            </label>

                            <select
                                name="level"
                                required
                                class="w-full px-4 py-3 rounded-2xl border border-slate-200 bg-slate-50 text-sm font-semibold focus:bg-white focus:border-slate-800 outline-none transition-all"
                            >

                                <option value="">
                                    Pilih Level
                                </option>

                                <option value="kepala">
                                    Kepala
                                </option>

                                <option value="koordinator">
                                    Koordinator
                                </option>

                                <option value="staff">
                                    Staff
                                </option>

                            </select>

                        </div>

                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        {{-- BIDANG --}}
                        <div>

                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">

                                Bidang / Divisi

                            </label>

                            <input
                                type="text"
                                name="bidang"
                                value="{{ old('bidang') }}"
                                placeholder="Contoh: Layanan"
                                class="w-full px-4 py-3 rounded-2xl border border-slate-200 bg-slate-50 text-sm font-semibold focus:bg-white focus:border-slate-800 outline-none transition-all"
                            >

                        </div>

                        {{-- URUTAN --}}
                        <div>

                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">

                                Urutan Tampil

                            </label>

                            <input
                                type="number"
                                name="urutan"
                                value="{{ old('urutan', 1) }}"
                                required
                                min="1"
                                class="w-full px-4 py-3 rounded-2xl border border-slate-200 bg-slate-50 text-sm font-semibold focus:bg-white focus:border-slate-800 outline-none transition-all"
                            >

                        </div>

                    </div>

                </div>

            </div>

            {{-- FOOTER --}}
            <div class="flex flex-col sm:flex-row gap-3 pt-8 mt-8 border-t border-slate-100">

                {{-- CANCEL --}}
                <button
                    type="button"
                    @click="modalTambah = false"
                    class="flex-1 py-3.5 rounded-2xl bg-slate-100 text-slate-500 text-[10px] font-black uppercase tracking-[0.2em] hover:bg-slate-200 transition-all"
                >

                    Batalkan

                </button>

                {{-- SUBMIT --}}
                <button
                    type="submit"
                    class="flex-1 py-3.5 rounded-2xl bg-slate-800 text-white text-[10px] font-black uppercase tracking-[0.2em] hover:bg-slate-900 transition-all active:scale-95 shadow-lg shadow-slate-200"
                >

                    Simpan Data

                </button>

            </div>

        </form>

    </div>

</div>