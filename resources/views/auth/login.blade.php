<x-guest-layout>

    <div class="relative flex min-h-screen items-center justify-center overflow-hidden bg-gradient-to-br from-slate-50 via-white to-slate-100 px-4 py-6 sm:px-6 lg:px-8">

        <!-- BACKGROUND -->
        <div class="pointer-events-none absolute inset-0 overflow-hidden">

            <div class="absolute -top-24 -left-20 h-72 w-72 rounded-full bg-cyan-200/20 blur-3xl"></div>

            <div class="absolute right-0 bottom-0 h-80 w-80 rounded-full bg-yellow-100/20 blur-3xl"></div>

        </div>

        <!-- CARD -->
        <div
            class="relative z-10 flex w-full max-w-6xl flex-col overflow-hidden rounded-[32px] border border-slate-200 bg-white shadow-[0_20px_80px_rgba(0,0,0,0.08)] lg:min-h-[700px] lg:flex-row">

            <!-- LEFT -->
            <div
                class="relative flex flex-col justify-center overflow-hidden border-b border-slate-700/10 bg-slate-900 px-7 py-10 sm:px-10 sm:py-12 lg:w-5/12 lg:border-r lg:border-b-0 lg:px-12">

                <!-- BG EFFECT -->
                <div class="pointer-events-none absolute inset-0 overflow-hidden">

                    <div class="absolute -top-20 -left-14 h-72 w-72 rounded-full bg-cyan-400/20 blur-3xl"></div>

                    <div class="absolute right-0 bottom-0 h-72 w-72 rounded-full bg-yellow-300/10 blur-3xl"></div>

                </div>

                <!-- OVERLAY -->
                <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900"></div>

                <!-- CONTENT -->
                <div class="relative z-10">

                    <!-- LOGO -->
                    <div
                        class="mb-8 flex h-16 w-16 items-center justify-center rounded-2xl border border-white/10 bg-white/10 shadow-lg">

                         <img
        src="{{ asset('logo.png') }}"
        alt="Logo USTJ"
        class="h-8 w-8 object-contain">

                    </div>

                    <!-- TITLE -->
                    <h1
                        class="text-3xl font-black leading-tight tracking-tight text-white sm:text-4xl lg:text-[42px]">

                        Sistem <br>
                        Perpustakaan

                    </h1>

                    <!-- DESC -->
                    <p
                        class="mt-5 max-w-sm text-sm leading-7 text-slate-300 sm:text-[15px]">

                         Perpustakaan Universitas Sains dan Teknologi Jayapura.

                    </p>

                    <!-- LINE -->
                    <div class="my-8 h-[2px] w-16 rounded-full bg-white/10"></div>

                    <!-- BADGE -->
                    <div
                        class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-4 py-2">

                        <span class="h-2 w-2 rounded-full bg-cyan-400"></span>

                        <span
                            class="text-[10px] font-bold uppercase tracking-[0.2em] text-slate-300">

                            Administrator

                        </span>

                    </div>

                </div>

            </div>

            <!-- RIGHT -->
            <div
                class="relative flex flex-1 flex-col justify-center bg-white px-6 py-8 sm:px-10 sm:py-12 lg:px-14">

                <!-- BACK -->
                <div class="mb-8 flex justify-end">

                    <a
                        href="{{ route('home') }}"
                        class="inline-flex items-center gap-2 rounded-full bg-slate-100 px-4 py-2 text-xs font-bold text-slate-500 transition-all duration-300 hover:bg-slate-900 hover:text-white">

                        <svg
                            class="h-4 w-4"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M15 19l-7-7 7-7">
                            </path>

                        </svg>

                        Kembali

                    </a>

                </div>

                <!-- SESSION -->
                <x-auth-session-status
                    class="mb-5"
                    :status="session('status')" />

                <!-- HEADER -->
                <div class="mb-8">

                    <div
                        class="mb-4 inline-flex items-center gap-2 rounded-full bg-slate-100 px-3 py-1.5">

                        <span class="h-2 w-2 rounded-full bg-slate-700"></span>

                        <span
                            class="text-[10px] font-bold uppercase tracking-[0.2em] text-slate-600">

                            Login Administrator

                        </span>

                    </div>

                    <h2
                        class="text-3xl font-black tracking-tight text-slate-900 sm:text-4xl">

                        Masuk

                    </h2>

                    <p
                        class="mt-3 text-sm leading-7 text-slate-500 sm:text-[15px]">

                        Masuk ke sistem perpustakaan untuk mengelola data dan layanan.

                    </p>

                </div>

                <!-- FORM -->
                <form
                    method="POST"
                    action="{{ route('login') }}"
                    class="space-y-5">

                    @csrf

                    <!-- EMAIL -->
                    <div>

                        <label
                            for="email"
                            class="mb-2 block text-xs font-bold uppercase tracking-[0.15em] text-slate-500">

                            Email

                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            placeholder="nama@ustj.ac.id"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 text-sm text-slate-700 outline-none transition-all duration-300 placeholder:text-slate-400 focus:border-slate-400 focus:bg-white focus:ring-4 focus:ring-slate-100">

                        <x-input-error
                            :messages="$errors->get('email')"
                            class="mt-2" />

                    </div>

                    <!-- PASSWORD -->
                    <div>

                        <label
                            for="password"
                            class="mb-2 block text-xs font-bold uppercase tracking-[0.15em] text-slate-500">

                            Password

                        </label>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            placeholder="••••••••"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 text-sm text-slate-700 outline-none transition-all duration-300 placeholder:text-slate-400 focus:border-slate-400 focus:bg-white focus:ring-4 focus:ring-slate-100">

                        <x-input-error
                            :messages="$errors->get('password')"
                            class="mt-2" />

                    </div>

                    <!-- REMEMBER -->
                    <div
                        class="flex flex-col gap-4 pt-1 sm:flex-row sm:items-center sm:justify-between">

                        <label
                            class="flex w-max cursor-pointer items-center gap-2">

                            <input
                                type="checkbox"
                                name="remember"
                                class="h-4 w-4 rounded border-slate-300 text-slate-700 focus:ring-slate-300">

                            <span class="text-sm text-slate-500">
                                Ingat saya
                            </span>

                        </label>

                    </div>

                    <!-- BUTTON -->
                    <button
                        type="submit"
                        class="w-full rounded-2xl bg-slate-900 py-4 text-sm font-bold tracking-[0.15em] text-white transition-all duration-300 hover:bg-slate-800">

                        Masuk ke Sistem

                    </button>

                </form>

                <!-- FOOTER -->
                <div
                    class="mt-10 border-t border-slate-100 pt-5 text-center">

                    <p
                        class="text-xs leading-6 text-slate-400">

                        © {{ date('Y') }}  Perpustakaan USTJ

                    </p>

                </div>

            </div>

        </div>

    </div>

</x-guest-layout>