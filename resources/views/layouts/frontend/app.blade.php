<!DOCTYPE html>
<html lang="id"
      class="scroll-smooth">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        {{ $title ?? 'Perpustakaan USTJ' }}
    </title>

    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">
           @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    @vite([
        'resources/css/frontend.css',
        'resources/js/frontend.js'
    ])

</head>

<body
    class="bg-white text-body font-sans antialiased"
    x-data="{ mobileMenu: false, scrolled: false,showLightbox: false, activeImage: '' }"
    @scroll.window="scrolled = (window.pageYOffset > 50)">

    @include('layouts.frontend.navbar')

    <main>

        @yield('content')

    </main>

    @include('layouts.frontend.footer')

    @include('layouts.frontend.mobile')
@stack('scripts')
</body>

</html>