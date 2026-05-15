<div x-show="modalEdit" x-cloak class="fixed inset-0 z-[100] flex items-center justify-center p-4">
    <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-[2px]" @click="modalEdit = false" x-show="modalEdit" x-transition.opacity></div>

    <div x-show="modalEdit" x-transition class="relative bg-white w-full max-w-lg rounded-2xl shadow-2xl border border-slate-200 overflow-hidden">
        <div class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex justify-between items-center">
            <h4 class="text-base font-bold text-slate-800 flex items-center gap-2">
                <i class="fa-solid fa-user-pen text-slate-400"></i> Update Profil Admin
            </h4>
            <button @click="modalEdit = false" class="text-slate-400 hover:text-rose-500"><i class="fa-solid fa-xmark text-lg"></i></button>
        </div>

        <form :action="'{{ url('admin/users') }}/' + selectedUser.id" method="POST" class="p-6 space-y-4" x-data="{ loading: false }" @submit="loading = true">
            @csrf
            @method('PUT')

            {{-- Hidden Field untuk Preserve ID saat error --}}
            <input type="hidden" name="user_id" x-model="selectedUser.id">

            {{-- Peringatan Jika Error Form Edit --}}
            @if ($errors->any() && old('_method') == 'PUT')
                <div class="p-3 bg-rose-50 border border-rose-200 rounded-lg text-xs text-rose-600 font-bold flex items-center gap-2 mb-2">
                    <i class="fa-solid fa-circle-exclamation"></i> Gagal update! Periksa kembali inputan Anda.
                </div>
            @endif

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Nama Lengkap</label>
                <input type="text" name="name" x-model="selectedUser.name" required 
                    class="w-full px-4 py-2 rounded-lg border outline-none focus:border-slate-800 text-sm 
                    {{ $errors->has('name') && old('_method') == 'PUT' ? 'border-rose-500 bg-rose-50' : 'border-slate-200 bg-slate-50' }}">
                @if ($errors->has('name') && old('_method') == 'PUT')
                    <p class="mt-1 text-[11px] text-rose-500 font-bold">{{ $errors->first('name') }}</p>
                @endif
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Alamat Email</label>
                <input type="email" name="email" x-model="selectedUser.email" required 
                    class="w-full px-4 py-2 rounded-lg border outline-none focus:border-slate-800 text-sm 
                    {{ $errors->has('email') && old('_method') == 'PUT' ? 'border-rose-500 bg-rose-50' : 'border-slate-200 bg-slate-50' }}">
                @if ($errors->has('email') && old('_method') == 'PUT')
                    <p class="mt-1 text-[11px] text-rose-500 font-bold">{{ $errors->first('email') }}</p>
                @endif
            </div>

            <div class="p-4 bg-indigo-50 border border-indigo-100 rounded-xl mt-4">
                <label class="block text-xs font-bold text-indigo-800 uppercase mb-3">
                    <i class="fa-solid fa-key mr-1"></i> Ganti Password <span class="text-indigo-400 normal-case">(Opsional)</span>
                </label>
                <div class="grid grid-cols-2 gap-3">
                    <input type="password" name="password" placeholder="Sandi baru..." 
                        class="w-full px-3 py-2 rounded-lg border text-sm outline-none focus:border-indigo-500 
                        {{ $errors->has('password') && old('_method') == 'PUT' ? 'border-rose-500 bg-rose-50' : 'border-indigo-200' }}">
                    <input type="password" name="password_confirmation" placeholder="Konfirmasi sandi..." 
                        class="w-full px-3 py-2 rounded-lg border text-sm outline-none focus:border-indigo-500 
                        {{ $errors->has('password') && old('_method') == 'PUT' ? 'border-rose-500 bg-rose-50' : 'border-indigo-200' }}">
                </div>
                @if ($errors->has('password') && old('_method') == 'PUT')
                    <p class="mt-2 text-[11px] text-rose-500 font-bold">{{ $errors->first('password') }}</p>
                @else
                    <p class="text-[10px] text-indigo-500 mt-2 font-medium">Kosongkan jika tidak ingin mengubah password.</p>
                @endif
            </div>

            <div class="flex gap-3 pt-4 border-t border-slate-100">
                <button type="button" @click="modalEdit = false" :disabled="loading" class="flex-1 py-2 text-sm font-bold text-slate-500 bg-slate-100 rounded-lg hover:bg-slate-200">Batal</button>
                <button type="submit" :disabled="loading" class="flex-1 py-2 text-sm font-bold text-white bg-slate-800 hover:bg-slate-900 flex justify-center items-center gap-2">
                    <span x-show="!loading"><i class="fa-solid fa-floppy-disk"></i> Update</span>
                    <span x-show="loading" x-cloak><i class="fa-solid fa-spinner animate-spin"></i> Memproses...</span>
                </button>
            </div>
        </form>
    </div>
</div>