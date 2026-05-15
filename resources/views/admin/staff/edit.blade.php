{{-- MODAL EDIT STAFF --}}
<div
    x-show="modalEdit"
    x-cloak
    class="fixed inset-0 z-[100] flex items-center justify-center p-4"
>

    {{-- BACKDROP --}}
    <div
        class="fixed inset-0 bg-slate-900/40 backdrop-blur-[2px]"
        @click="modalEdit = false"
        x-show="modalEdit"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
    ></div>

    {{-- MODAL --}}
    <div
        x-show="modalEdit"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95 translate-y-4"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
        class="relative bg-white w-full max-w-4xl rounded-3xl shadow-2xl border border-slate-200 overflow-hidden"
    >

        {{-- HEADER --}}
        <div class="px-8 py-6 border-b border-slate-100 bg-slate-50 flex items-center justify-between">

            <div>

                <h3 class="text-sm font-black text-slate-700 uppercase tracking-widest">
                    Edit Struktur Organisasi
                </h3>

                <p class="mt-1 text-[10px] font-bold text-slate-400 uppercase italic tracking-wider">
                    Perbarui data kepala, koordinator, dan staff
                </p>

            </div>

            {{-- CLOSE --}}
            <button
                @click="modalEdit = false"
                class="w-9 h-9 flex items-center justify-center rounded-full bg-white border border-slate-200 text-slate-400 hover:text-indigo-500 transition-all shadow-sm"
            >

                <i class="fa-solid fa-xmark text-sm"></i>

            </button>

        </div>

        {{-- FORM --}}
        <form
            :action="'/admin/staff/' + selectedStaff.id"
            method="POST"
            enctype="multipart/form-data"
            class="p-8"
            x-data="{ preview: null }"
        >

            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                {{-- FOTO --}}
                <div class="lg:col-span-4 space-y-4">

                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest">

                        Foto Profil

                    </label>

                    {{-- PREVIEW --}}
                    <div class="w-full aspect-square rounded-3xl overflow-hidden border-2 border-dashed border-slate-200 bg-slate-50 flex items-center justify-center hover:border-slate-700 transition-all">

                        {{-- FOTO BARU --}}
                        <template x-if="preview">

                            <img
                                :src="preview"
                                class="w-full h-full object-cover"
                            >

                        </template>

                        {{-- FOTO LAMA --}}
                        <template x-if="!preview && selectedStaff.foto">

                            <img
                                :src="'/storage/staff/' + selectedStaff.foto"
                                class="w-full h-full object-cover"
                            >

                        </template>

                        {{-- DEFAULT --}}
                        <template x-if="!preview && !selectedStaff.foto">

                            <div class="flex flex-col items-center text-slate-300">

                                <i class="fa-solid fa-user text-4xl mb-3"></i>

                                <span class="text-[10px] font-black uppercase tracking-widest">
                                    No Photo
                                </span>

                            </div>

                        </template>

                    </div>

                    {{-- INPUT FOTO --}}
                    <div>

                        <input
                            type="file"
                            name="foto"
                            id="edit-foto"
                            class="hidden"
                            accept="image/*"
                            @change="preview = URL.createObjectURL($event.target.files[0])"
                        >

                        <label
                            for="edit-foto"
                            class="flex items-center justify-center w-full py-3 rounded-2xl bg-slate-100 border border-slate-200 text-[10px] font-black uppercase tracking-[0.2em] text-slate-600 hover:bg-slate-200 cursor-pointer transition-all"
                        >

                            Ganti Foto

                        </label>

                    </div>

                </div>

                {{-- FORM --}}
                <div class="lg:col-span-8 space-y-5">

                    {{-- NAMA --}}
                    <div>

                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">

                            Nama Lengkap

                        </label>

                        <input
                            type="text"
                            name="nama"
                            x-model="selectedStaff.nama"
                            required
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
                                x-model="selectedStaff.jabatan"
                                required
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
                                x-model="selectedStaff.level"
                                required
                                class="w-full px-4 py-3 rounded-2xl border border-slate-200 bg-slate-50 text-sm font-semibold focus:bg-white focus:border-slate-800 outline-none transition-all"
                            >

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
                                x-model="selectedStaff.bidang"
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
                                x-model="selectedStaff.urutan"
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
                    @click="modalEdit = false"
                    class="flex-1 py-3.5 rounded-2xl bg-slate-100 text-slate-500 text-[10px] font-black uppercase tracking-[0.2em] hover:bg-slate-200 transition-all"
                >

                    Batalkan

                </button>

                {{-- SUBMIT --}}
                <button
                    type="submit"
                    class="flex-1 py-3.5 rounded-2xl bg-indigo-600 text-white text-[10px] font-black uppercase tracking-[0.2em] hover:bg-indigo-700 transition-all active:scale-95 shadow-lg shadow-indigo-100"
                >

                    Perbarui Data

                </button>

            </div>

        </form>

    </div>

</div>