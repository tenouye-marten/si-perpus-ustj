<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Dashboard Admin')
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body
    class="bg-slate-50 text-slate-500 font-sans flex overflow-hidden h-screen"
    x-data="{ sidebarOpen: window.innerWidth >= 1024 } "
>

    @include('layouts.admin.sidebar')

    <div class="flex-1 flex flex-col h-screen overflow-hidden">

        @include('layouts.admin.navbar')

        <main class="flex-1 overflow-y-auto p-4 lg:p-8">

            @yield('content')

        </main>

    </div>


      
</body>

</html>