<!-- FOOTER -->
<footer class="relative overflow-hidden bg-dark pt-24 pb-10 text-white">

    {{-- BACKGROUND --}}
    <div class="pointer-events-none absolute inset-0 overflow-hidden">

        <div
            class="absolute top-0 left-0 h-72 w-72 rounded-full bg-primary/10 blur-3xl">
        </div>

        <div
            class="absolute right-0 bottom-0 h-80 w-80 rounded-full bg-white/[0.03] blur-3xl">
        </div>

    </div>

    <div class="container relative z-10 mx-auto max-w-7xl px-4">

        {{-- TOP --}}
        <div
            class="grid grid-cols-1 gap-14 border-b border-white/10 pb-16 md:grid-cols-2 lg:grid-cols-4">

            {{-- BRAND --}}
            <div>

                {{-- LOGO --}}
                <a
                    href="{{ route('home') }}"
                    class="group mb-8 flex items-center gap-3">

                   <div
    class="flex h-12 w-12 items-center justify-center overflow-hidden rounded-xl bg-white shadow-lg shadow-primary/10">

    <img
        src="{{ asset('logo.png') }}"
        alt="Logo USTJ"
        class="h-9 w-9 object-contain">

</div>

                    <div>

                        <h3
                            class="text-xl font-black tracking-tight text-white">

                             Perpustakaan

                        </h3>

                        <p
                            class="mt-1 text-[10px] font-black uppercase tracking-[0.25em] text-primary">

                            USTJ Jayapura

                        </p>

                    </div>

                </a>

                {{-- DESC --}}
                <p
                    class="max-w-sm text-sm leading-7 text-slate-400">

                    Perpustakaan Universitas Sains dan Teknologi Jayapura
                    sebagai pusat literasi, informasi, dan referensi ilmiah
                    yang modern serta unggul di Tanah Papua.

                </p>

            </div>

            {{-- TENTANG --}}
            <div>

                <h4
                    class="mb-7 text-sm font-black uppercase tracking-[0.2em] text-white">

                    Tentang Kami

                </h4>

                <ul class="space-y-4">

                    <li>

                        <a
                            href="{{ route('sejarah') }}"
                            class="text-sm text-slate-400 transition-all hover:text-primary">

                            Sejarah Perpustakaan

                        </a>

                    </li>

                    <li>

                        <a
                            href="{{ route('visi-misi') }}"
                            class="text-sm text-slate-400 transition-all hover:text-primary">

                            Visi & Misi

                        </a>

                    </li>

                    <li>

                        <a
                            href="{{ route('struktur') }}"
                            class="text-sm text-slate-400 transition-all hover:text-primary">

                            Struktur Organisasi

                        </a>

                    </li>
                    <li>

                        <a
                            href="{{ route('alur') }}"
                            class="text-sm text-slate-400 transition-all hover:text-primary">

                            Alur

                        </a>

                    </li>

                </ul>

            </div>

            {{-- KATALOG --}}
            <div>

                <h4
                    class="mb-7 text-sm font-black uppercase tracking-[0.2em] text-white">

                    Katalog Online

                </h4>

                <ul class="space-y-4">

                    <li>

                        <a
                            href="{{ route('buku') }}"
                            class="text-sm text-slate-400 transition-all hover:text-primary">

                            Katalog Buku

                        </a>

                    </li>

                    <li>

                        <a
                            href="{{ route('skripsi') }}"
                            class="text-sm text-slate-400 transition-all hover:text-primary">

                            Skripsi / KTI

                        </a>

                    </li>

                    <li>

                        <a
                            href="#"
                            class="text-sm text-slate-400 transition-all hover:text-primary">

                            Repository Digital

                        </a>

                    </li>

                </ul>

            </div>

            {{-- KONTAK --}}
            <div>

                <h4
                    class="mb-7 text-sm font-black uppercase tracking-[0.2em] text-white">

                    Kontak Kami

                </h4>

                <div class="space-y-5">

                    {{-- ADDRESS --}}
                    <div class="flex items-start gap-3">

                        <div
                            class="mt-1 flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-xl bg-white/5 text-primary">

                            <i class="fa-solid fa-location-dot text-sm"></i>

                        </div>

                        <p
                            class="text-sm leading-7 text-slate-400">

                            Jl. Raya Sentani Km. 13,
                            Abepura, Jayapura,
                            Papua.

                        </p>

                    </div>

                    {{-- EMAIL --}}
                    <div class="flex items-center gap-3">

                        <div
                            class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-xl bg-white/5 text-primary">

                            <i class="fa-solid fa-envelope text-sm"></i>

                        </div>

                        <p class="text-sm text-slate-400">

                            perpus@ustj.ac.id

                        </p>

                    </div>

                    {{-- PHONE --}}
                    <div class="flex items-center gap-3">

                        <div
                            class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-xl bg-white/5 text-primary">

                            <i class="fa-solid fa-phone text-sm"></i>

                        </div>

                        <p class="text-sm text-slate-400">

                            (0967) 123456

                        </p>

                    </div>

                </div>

            </div>

        </div>

        {{-- BOTTOM --}}
        <div
            class="flex flex-col items-center justify-between gap-5 pt-8 text-center md:flex-row md:text-left">

            {{-- COPYRIGHT --}}
            <p
                class="text-[11px] font-medium uppercase tracking-[0.18em] text-slate-500">

                © {{ date('Y') }} Perpustakaan USTJ Jayapura.
                Hak Cipta Dilindungi.

            </p>

            {{-- SOCIAL --}}
            <div class="flex items-center gap-3">

                <a
                    href="#"
                    class="flex h-10 w-10 items-center justify-center rounded-xl border border-white/10 bg-white/5 text-slate-400 transition-all hover:border-primary/20 hover:bg-primary hover:text-white">

                    <i class="fa-brands fa-facebook-f text-sm"></i>

                </a>

                <a
                    href="#"
                    class="flex h-10 w-10 items-center justify-center rounded-xl border border-white/10 bg-white/5 text-slate-400 transition-all hover:border-primary/20 hover:bg-primary hover:text-white">

                    <i class="fa-brands fa-instagram text-sm"></i>

                </a>

                <a
                    href="#"
                    class="flex h-10 w-10 items-center justify-center rounded-xl border border-white/10 bg-white/5 text-slate-400 transition-all hover:border-primary/20 hover:bg-primary hover:text-white">

                    <i class="fa-brands fa-youtube text-sm"></i>

                </a>

            </div>

        </div>

    </div>

</footer>