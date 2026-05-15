<div x-show="modalTambah" x-cloak class="fixed inset-0 z-[100] flex items-center justify-center p-4">
    <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-[2px]" @click="modalTambah = false" x-show="modalTambah" x-transition.opacity></div>

    <div x-show="modalTambah" x-transition class="relative bg-white w-full max-w-lg rounded-2xl shadow-2xl border border-slate-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100 bg-slate-50 flex justify-between items-center">
            <h4 class="text-base font-bold text-slate-800 flex items-center gap-2">
                <i class="fa-solid fa-user-plus text-slate-400"></i> Registrasi Administrator
            </h4>
            <button @click="modalTambah = false" class="text-slate-400 hover:text-rose-500">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>
        </div>

        <form action="{{ route('admin.users.store') }}" method="POST" class="p-6 space-y-4" x-data="{ loading: false }" @submit="loading = true">
            @csrf
            
            {{-- Pesan Peringatan Jika Ada Error Form Create --}}
            @if ($errors->any() && !old('_method'))
                <div class="p-3 bg-rose-50 border border-rose-200 rounded-lg text-xs text-rose-600 font-bold flex items-center gap-2 mb-2">
                    <i class="fa-solid fa-circle-exclamation"></i> Gagal menyimpan! Periksa kembali inputan Anda.
                </div>
            @endif

            <div>
                <label class="block mb-2 text-xs font-bold uppercase tracking-wider text-slate-500">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" required placeholder="Masukkan nama..." 
                    class="w-full px-4 py-2 text-sm border rounded-lg outline-none transition-all focus:bg-white focus:border-slate-800 
                    {{ $errors->has('name') && !old('_method') ? 'border-rose-500 bg-rose-50' : 'border-slate-200 bg-slate-50' }}">
                @if ($errors->has('name') && !old('_method'))
                    <p class="mt-1 text-[11px] text-rose-500 font-bold">{{ $errors->first('name') }}</p>
                @endif
            </div>

            <div>
                <label class="block mb-2 text-xs font-bold uppercase tracking-wider text-slate-500">Alamat Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required placeholder="admin@example.com" 
                    class="w-full px-4 py-2 text-sm border rounded-lg outline-none transition-all focus:bg-white focus:border-slate-800 
                    {{ $errors->has('email') && !old('_method') ? 'border-rose-500 bg-rose-50' : 'border-slate-200 bg-slate-50' }}">
                @if ($errors->has('email') && !old('_method'))
                    <p class="mt-1 text-[11px] text-rose-500 font-bold">{{ $errors->first('email') }}</p>
                @endif
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2 text-xs font-bold uppercase tracking-wider text-slate-500">Kata Sandi</label>
                    <input type="password" name="password" required placeholder="••••••••" 
                        class="w-full px-4 py-2 text-sm border rounded-lg outline-none transition-all focus:bg-white focus:border-slate-800 
                        {{ $errors->has('password') && !old('_method') ? 'border-rose-500 bg-rose-50' : 'border-slate-200 bg-slate-50' }}">
                </div>
                <div>
                    <label class="block mb-2 text-xs font-bold uppercase tracking-wider text-slate-500">Konfirmasi</label>
                    <input type="password" name="password_confirmation" required placeholder="••••••••" 
                        class="w-full px-4 py-2 text-sm border rounded-lg outline-none transition-all focus:bg-white focus:border-slate-800 
                        {{ $errors->has('password') && !old('_method') ? 'border-rose-500 bg-rose-50' : 'border-slate-200 bg-slate-50' }}">
                </div>
            </div>
            @if ($errors->has('password') && !old('_method'))
                <p class="text-[11px] text-rose-500 font-bold -mt-2">{{ $errors->first('password') }}</p>
            @endif

            <div class="flex items-center gap-3 pt-4 mt-6 border-t border-slate-100">
                <button type="button" @click="modalTambah = false" :disabled="loading" class="flex-1 py-2 text-sm font-bold bg-slate-100 rounded-lg hover:bg-slate-200 disabled:opacity-50 text-slate-500">Batal</button>
                <button type="submit" :disabled="loading" class="flex-1 py-2 text-sm font-bold text-white bg-slate-800 rounded-lg hover:bg-slate-900 flex justify-center items-center gap-2">
                    <span x-show="!loading"><i class="fa-solid fa-floppy-disk"></i> Simpan User</span>
                    <span x-show="loading" x-cloak><i class="fa-solid fa-spinner animate-spin"></i> Menyimpan...</span>
                </button>
            </div>
        </form>
    </div>
</div>