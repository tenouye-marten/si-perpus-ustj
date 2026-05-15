<div x-show="modalHapus" x-cloak class="fixed inset-0 z-[100] flex items-center justify-center p-4">
    <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-[2px]" @click="modalHapus = false" x-show="modalHapus" x-transition.opacity></div>

    <div x-show="modalHapus" x-transition class="relative bg-white w-full max-w-sm rounded-2xl p-6 shadow-2xl text-center">
        <div class="w-16 h-16 bg-rose-100 text-rose-600 rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-rose-50">
            <i class="fa-solid fa-trash-can text-2xl"></i>
        </div>
        
        <h3 class="text-lg font-bold text-slate-800">Hapus Akses?</h3>
        <p class="text-sm text-slate-500 mt-2">Anda yakin ingin mencabut hak akses <span class="font-bold text-rose-600" x-text="selectedUser.name"></span> secara permanen?</p>

        <form :action="'{{ url('admin/users') }}/' + selectedUser.id" method="POST" class="mt-6 flex gap-3">
            @csrf
            @method('DELETE')
            <button type="button" @click="modalHapus = false" class="flex-1 py-2.5 text-sm font-bold text-slate-600 bg-slate-100 rounded-lg hover:bg-slate-200">Batal</button>
            <button type="submit" class="flex-1 py-2.5 text-sm font-bold text-white bg-rose-600 rounded-lg hover:bg-rose-700 shadow-md">Ya, Hapus</button>
        </form>
    </div>
</div>