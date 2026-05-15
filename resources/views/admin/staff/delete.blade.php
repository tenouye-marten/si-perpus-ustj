{{-- MODAL DELETE STAFF --}}
<div
    x-show="modalHapus"
    x-cloak
    class="fixed inset-0 z-[100] flex items-center justify-center p-4"
>

    {{-- BACKDROP --}}
    <div
        class="fixed inset-0 bg-slate-900/40 backdrop-blur-[2px]"
        @click="modalHapus = false"
        x-show="modalHapus"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
    ></div>

    {{-- MODAL --}}
    <div
        x-show="modalHapus"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95 translate-y-4"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
        class="relative w-full max-w-md overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-2xl"
    >

        {{-- HEADER --}}
        <div class="border-b border-slate-100 bg-slate-50 px-8 py-6 text-center">

            {{-- ICON --}}
            <div class="mx-auto mb-5 flex h-20 w-20 items-center justify-center rounded-3xl border border-rose-100 bg-rose-50 text-rose-500 shadow-sm">

                <i class="fa-solid fa-trash-can text-3xl"></i>

            </div>

            {{-- TITLE --}}
            <h3 class="text-lg font-black uppercase tracking-tight text-slate-800">

                Hapus Data Staff

            </h3>

            {{-- DESC --}}
            <p class="mt-2 text-sm font-medium leading-relaxed text-slate-500">

                Data personel yang dihapus tidak dapat dikembalikan lagi.

            </p>

        </div>

        {{-- BODY --}}
        <div class="px-8 py-7">

            {{-- CARD INFO --}}
            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">

                <div class="flex items-center gap-4">

                    {{-- FOTO --}}
                    <div class="flex-shrink-0">

                        <template x-if="selectedStaff.foto">

                            <img
                                :src="'/storage/staff/' + selectedStaff.foto"
                                class="h-14 w-14 rounded-2xl border border-slate-200 object-cover"
                            >

                        </template>

                        <template x-if="!selectedStaff.foto">

                            <div class="flex h-14 w-14 items-center justify-center rounded-2xl border border-slate-200 bg-white text-slate-300">

                                <i class="fa-solid fa-user"></i>

                            </div>

                        </template>

                    </div>

                    {{-- INFO --}}
                    <div class="flex-1 min-w-0">

                        {{-- NAMA --}}
                        <h4
                            class="truncate text-sm font-black uppercase tracking-tight text-slate-800"
                            x-text="selectedStaff.nama"
                        ></h4>

                        {{-- JABATAN --}}
                        <p
                            class="mt-1 truncate text-[11px] font-bold uppercase tracking-wider text-slate-500"
                            x-text="selectedStaff.jabatan"
                        ></p>

                        {{-- LEVEL --}}
                        <div class="mt-3">

                            <span
                                class="inline-flex rounded-lg bg-rose-100 px-2.5 py-1 text-[10px] font-black uppercase tracking-wider text-rose-700"
                            >

                                Akan Dihapus

                            </span>

                        </div>

                    </div>

                </div>

            </div>

            {{-- FORM --}}
            <form
                :action="'/admin/staff/' + selectedStaff.id"
                method="POST"
                class="mt-8 space-y-3"
            >

                @csrf
                @method('DELETE')

                {{-- DELETE --}}
                <button
                    type="submit"
                    class="flex w-full items-center justify-center gap-2 rounded-2xl bg-rose-600 py-4 text-[10px] font-black uppercase tracking-[0.2em] text-white shadow-lg shadow-rose-100 transition-all hover:bg-rose-700 active:scale-[0.98]"
                >

                    <i class="fa-solid fa-trash text-[11px]"></i>

                    Konfirmasi Hapus

                </button>

                {{-- CANCEL --}}
                <button
                    type="button"
                    @click="modalHapus = false"
                    class="w-full rounded-2xl bg-slate-100 py-4 text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 transition-all hover:bg-slate-200"
                >

                    Batalkan

                </button>

            </form>

        </div>

    </div>

</div>