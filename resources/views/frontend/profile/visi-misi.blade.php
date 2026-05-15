@extends('layouts.frontend.app')

@section('title', 'Visi & Misi | Perpustakaan USTJ')

@section('content')

<style>
    .smooth-card {
        transition: all .35s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .smooth-card:hover {
        transform: translateY(-4px);
    }
</style>

<!-- HERO -->
<section
    class="relative flex min-h-screen items-center overflow-hidden border-b border-slate-200 bg-gradient-to-br from-slate-50 via-white to-slate-100">

    <!-- BACKGROUND -->
    <div class="absolute inset-0 overflow-hidden">

        <!-- Blur -->
        <div
            class="absolute -top-32 -left-24 h-[30rem] w-[30rem] rounded-full bg-slate-300/20 blur-3xl">
        </div>

        <div
            class="absolute bottom-0 right-0 h-[34rem] w-[34rem] rounded-full bg-slate-200/30 blur-3xl">
        </div>

        <!-- Grid -->
        <div
            class="absolute inset-0 opacity-[0.03]"
            style="
                background-image:
                linear-gradient(to right, #0f172a 1px, transparent 1px),
                linear-gradient(to bottom, #0f172a 1px, transparent 1px);
                background-size: 70px 70px;
            ">
        </div>

    </div>

    <!-- CONTENT -->
    <div class="container relative z-10 mx-auto max-w-6xl px-6">

        <div class="flex flex-col items-center text-center">

            <!-- BADGE -->
            <div
                class="mb-8 inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white/80 px-5 py-2 backdrop-blur-md shadow-sm">

                <span
                    class="h-2 w-2 rounded-full bg-slate-500 animate-pulse">
                </span>

                <span
                    class="text-[10px] font-bold uppercase tracking-[0.25em] text-slate-600">

                    Identitas & Komitmen

                </span>

            </div>

            <!-- TITLE -->
            <h1
                class="max-w-5xl text-5xl font-black leading-[1.05] tracking-tight text-slate-900 sm:text-6xl md:text-7xl lg:text-8xl">

                Visi

                <span class="mt-2 block text-slate-500">
                    & Misi
                </span>

            </h1>

            <!-- LINE -->
            <div
                class="mt-8 mb-8 h-[3px] w-28 rounded-full bg-slate-300">
            </div>

            <!-- DESCRIPTION -->
            <p
                class="mx-auto max-w-3xl text-base leading-8 text-slate-500 md:text-xl md:leading-9">

                Berkomitmen dalam mendukung tridharma perguruan tinggi
                melalui penyediaan layanan informasi, literasi digital,
                dan sumber pengetahuan yang modern, profesional,
                serta mudah diakses oleh seluruh civitas akademika.

            </p>

     

        </div>

    </div>

    <!-- SCROLL -->
    <div
        class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">

        <div
            class="flex h-10 w-6 items-start justify-center rounded-full border border-slate-300 p-1">

            <div
                class="h-2 w-2 rounded-full bg-slate-400">
            </div>

        </div>

    </div>

</section>

<!-- VISI MISI -->
<section
    id="visi-misi"
    class="relative overflow-hidden bg-gradient-to-b from-slate-50 via-white to-slate-50 py-24 lg:py-32">

    <!-- BACKGROUND -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">

        <div
            class="absolute top-0 left-0 h-[28rem] w-[28rem] rounded-full bg-slate-200/30 blur-3xl">
        </div>

        <div
            class="absolute right-0 bottom-0 h-[30rem] w-[30rem] rounded-full bg-slate-100 blur-3xl">
        </div>

    </div>

    <div class="container relative z-10 mx-auto max-w-7xl px-5">

        <div class="grid grid-cols-1 gap-10 lg:grid-cols-12 lg:gap-14">

            <!-- VISI -->
            <aside class="lg:col-span-5 lg:sticky lg:top-32 h-fit">

                <div
                    class="group relative overflow-hidden rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_20px_50px_rgba(15,23,42,0.05)] sm:p-10">

                    <!-- Decorative -->
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-slate-100/[0.35] to-white opacity-0 transition duration-500 group-hover:opacity-100">
                    </div>

                    <!-- Watermark -->
                    <div
                        class="absolute -top-10 -right-10 opacity-[0.03] text-slate-700">

                        <svg
                            width="200"
                            height="200"
                            viewBox="0 0 24 24"
                            fill="currentColor">

                            <path d="M11.9998 3.09082L2.55371 8.23232L11.9998 13.3738L21.4458 8.23232L11.9998 3.09082Z"/>

                        </svg>

                    </div>

                    <!-- CONTENT -->
                    <div class="relative z-10">

                        <!-- LABEL -->
                        <div
                            class="mb-8 flex items-center gap-3">

                            <span
                                class="h-1 w-8 rounded-full bg-slate-400">
                            </span>

                            <h3
                                class="text-sm font-black uppercase tracking-[0.2em] text-slate-500">

                                Visi Utama

                            </h3>

                        </div>

                        <!-- TITLE -->
                        <h2
                            class="mb-6 text-3xl font-bold leading-tight tracking-tight text-slate-900 md:text-4xl">

                            Menjadi pusat informasi
                            berbasis digital yang modern
                            dan terpercaya.

                        </h2>

                        <!-- TEXT -->
                        <p
                            class="text-[1.02rem] leading-8 text-slate-600">

                            Memberikan akses dan penyebaran informasi ilmiah
                            guna mendukung Universitas Sains dan Teknologi Jayapura
                            dalam menghasilkan sumber daya manusia
                            yang kompeten, profesional, dan bermartabat.

                        </p>

                    </div>

                </div>

            </aside>

            <!-- MISI -->
            <article class="lg:col-span-7">

                <!-- HEADER -->
                <div class="mb-12">

                    <div
                        class="mb-4 flex items-center gap-3">

                        <span
                            class="h-1 w-8 rounded-full bg-slate-400">
                        </span>

                        <h3
                            class="text-sm font-black uppercase tracking-[0.2em] text-slate-500">

                            Misi Institusi

                        </h3>

                    </div>

                    <h2
                        class="max-w-2xl text-3xl font-bold leading-tight tracking-tight text-slate-900 md:text-4xl">

                        Komitmen perpustakaan dalam
                        mendukung layanan akademik
                        dan literasi digital.

                    </h2>

                </div>

                <!-- LIST -->
                <div class="space-y-5">

                    @php
                        $misi = [
                            'Memberikan layanan informasi ilmiah kepada civitas akademika dan masyarakat.',

                            'Melestarikan seluruh hasil penelitian ilmiah dalam bentuk fisik maupun digital.',

                            'Menyediakan ruang baca dan berbagi sumber informasi untuk meningkatkan koleksi perpustakaan.',

                            'Mengelola dan menata berbagai sumber informasi ilmiah untuk kebutuhan pembelajaran.',

                            'Mengembangkan operasional perpustakaan secara efektif, efisien, dan berkelanjutan.',
                        ];
                    @endphp

                    @foreach ($misi as $index => $item)

                        <div
                            class="group flex gap-5 rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-slate-300 hover:shadow-[0_15px_40px_rgba(15,23,42,0.04)]">

                            <!-- NUMBER -->
                            <div
                                class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-slate-100 text-sm font-black tracking-tight text-slate-700 transition-all duration-300 group-hover:bg-slate-800 group-hover:text-white">

                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}

                            </div>

                            <!-- TEXT -->
                            <div class="pt-1">

                                <p
                                    class="text-[1rem] leading-8 text-slate-600">

                                    {{ $item }}

                                </p>

                            </div>

                        </div>

                    @endforeach

                </div>

            </article>

        </div>

    </div>

</section>

@endsection