<!-- Sidebar -->
<aside
    class="bg-white border-r border-slate-200 h-screen transition-all duration-300 flex flex-col shrink-0 z-50 absolute lg:relative"
    :class="sidebarOpen ? 'w-[260px] translate-x-0' : '-translate-x-full lg:translate-x-0 lg:w-20'"
>

    <!-- Logo Area -->
    <div class="h-[76px] flex items-center px-5 border-b border-slate-200 gap-3 overflow-hidden shrink-0">

        <div class="w-10 h-10 bg-gradient-to-br from-indigo-600 to-blue-500 text-white flex items-center justify-center rounded-xl font-bold text-xl shadow-md shrink-0">
            U
        </div>

        <div
            x-show="sidebarOpen"
            x-transition.opacity.duration.300ms
            class="whitespace-nowrap flex flex-col justify-center"
        >

            <h1 class="text-sm font-bold text-slate-900 leading-tight">
                USTJ Library
            </h1>

            <span class="text-xs font-medium text-slate-500">
                Admin Panel
            </span>

        </div>

    </div>

    <!-- Navigation -->
    <nav class="flex-1 py-6 px-3 space-y-1 overflow-y-auto">

        <!-- MENU -->
        <p
            class="text-[10px] font-bold text-slate-400 uppercase tracking-widest px-3 mb-2"
            x-show="sidebarOpen"
        >
            Menu Utama
        </p>

        <!-- Dashboard -->
        <a
            href="{{ route('admin.dashboard') }}"
            class="flex items-center gap-3 px-3 py-3 rounded-lg transition-all
            {{ request()->routeIs('admin.dashboard')
                ? 'bg-indigo-50 text-indigo-600 font-semibold'
                : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900'
            }}"
            title="Dashboard"
        >

            <svg
                class="w-5 h-5 shrink-0"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
                ></path>

            </svg>

            <span
                class="text-sm whitespace-nowrap"
                x-show="sidebarOpen"
            >
                Dashboard
            </span>

        </a>

        <!-- DATA MASTER -->
        <div class="pt-4 pb-2" x-show="sidebarOpen">

            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest px-3">
                Data Master
            </p>

        </div>

        <!-- Fakultas -->
        <a
            href="{{ route('admin.fakultas.index') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-all group
            {{ request()->routeIs('admin.fakultas.*')
                ? 'bg-indigo-50 text-indigo-600 font-semibold'
                : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900'
            }}"
            title="Data Fakultas"
        >

            <svg
                class="w-5 h-5 shrink-0 group-hover:text-indigo-600 transition-colors"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"
                ></path>

            </svg>

            <span
                class="text-sm font-medium whitespace-nowrap"
                x-show="sidebarOpen"
            >
                Fakultas
            </span>

        </a>

        <!-- Prodi -->
        <a
            href="{{ route('admin.prodi.index') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-all group
            {{ request()->routeIs('admin.prodi.*')
                ? 'bg-indigo-50 text-indigo-600 font-semibold'
                : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900'
            }}"
            title="Data Prodi"
        >

            <svg
                class="w-5 h-5 shrink-0 group-hover:text-indigo-600 transition-colors"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"
                ></path>

            </svg>

            <span
                class="text-sm font-medium whitespace-nowrap"
                x-show="sidebarOpen"
            >
                Program Studi
            </span>

        </a>

        <!-- KOLEKSI -->
        <div class="pt-4 pb-2" x-show="sidebarOpen">

            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest px-3">
                Koleksi Pustaka
            </p>

        </div>

        <!-- Buku -->
        <a
            href="{{ route('admin.books.index') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-all group
            {{ request()->routeIs('admin.books.*')
                ? 'bg-indigo-50 text-indigo-600 font-semibold'
                : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900'
            }}"
            title="Data Buku"
        >

            <svg
                class="w-5 h-5 shrink-0 group-hover:text-indigo-600 transition-colors"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13"
                ></path>

            </svg>

            <span
                class="text-sm font-medium whitespace-nowrap"
                x-show="sidebarOpen"
            >
                Data Buku
            </span>

        </a>

        <!-- Skripsi -->
        <a
            href="{{ route('admin.skripsi.index') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-all group
            {{ request()->routeIs('admin.skripsi.*')
                ? 'bg-indigo-50 text-indigo-600 font-semibold'
                : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900'
            }}"
            title="Skripsi / KTI"
        >

            <svg
                class="w-5 h-5 shrink-0 group-hover:text-indigo-600 transition-colors"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                ></path>

            </svg>

            <span
                class="text-sm font-medium whitespace-nowrap"
                x-show="sidebarOpen"
            >
                Skripsi / KTI
            </span>

        </a>

        <!-- AKSES -->
        <div class="pt-4 pb-2" x-show="sidebarOpen">

            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest px-3">
                Manajemen Akses
            </p>

        </div>

        <!-- Staff -->
        <a
            href="{{ route('admin.staff.index') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-all group
            {{ request()->routeIs('admin.staff.*')
                ? 'bg-indigo-50 text-indigo-600 font-semibold'
                : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900'
            }}"
            title="Data Staff"
        >

            <svg
                class="w-5 h-5 shrink-0 group-hover:text-indigo-600 transition-colors"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2"
                ></path>

            </svg>

            <span
                class="text-sm font-medium whitespace-nowrap"
                x-show="sidebarOpen"
            >
                Staff
            </span>

        </a>

        <!-- Users -->
        <a
            href="{{ route('admin.users.index') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-all group
            {{ request()->routeIs('admin.users.*')
                ? 'bg-indigo-50 text-indigo-600 font-semibold'
                : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900'
            }}"
            title="Data Users"
        >

            <svg
                class="w-5 h-5 shrink-0 group-hover:text-indigo-600 transition-colors"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z"
                ></path>

            </svg>

            <span
                class="text-sm font-medium whitespace-nowrap"
                x-show="sidebarOpen"
            >
                Users
            </span>

        </a>

    </nav>

    <!-- LOGOUT -->
    <div class="pt-4 border-t border-slate-200 p-3">

        <form
            action="{{ route('logout') }}"
            method="POST"
        >
            @csrf

            <button
                type="submit"
                class="w-full flex items-center gap-3 px-3 py-2.5 rounded-lg text-red-500 hover:bg-red-50 transition-all group"
                title="Logout"
            >

                <svg
                    class="w-5 h-5 shrink-0"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                    ></path>

                </svg>

                <span
                    class="text-sm font-semibold whitespace-nowrap"
                    x-show="sidebarOpen"
                >
                    Keluar Akun
                </span>

            </button>

        </form>

    </div>

</aside>