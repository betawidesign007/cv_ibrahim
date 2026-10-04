<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>@yield('title', 'Ibrahim | Web Developer & Software Engineer')</title>
    <meta name="description" content="@yield('meta_description', 'Portofolio profesional Ibrahim - Fullstack Web Developer berpengalaman dalam membangun aplikasi web modern, cepat, dan responsif.')">
    <meta name="author" content="Ibrahim Ulil Albab">

    <!-- Open Graph / Meta Sosial -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title', 'Ibrahim | Web Developer & Software Engineer')">
    <meta property="og:description" content="Portofolio profesional Ibrahim - Fullstack Web Developer.">
    <meta name="theme-color" content="#070b14">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Favicon SVG -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%236366f1'><path d='M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5'/></svg>">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <!-- Tailwind CSS Fallback CDN for instant preview -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        }
                    }
                }
            }
        </script>
    @endif
    @stack('styles')
</head>
<body class="bg-[#070b14] text-slate-100 antialiased selection:bg-indigo-600 selection:text-white flex flex-col min-h-screen overflow-x-hidden">
    
    <!-- Ambient Background Lighting / Glow Effects -->
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden">
        <div class="absolute -top-40 -left-40 w-96 h-96 bg-indigo-600/15 rounded-full blur-[128px]"></div>
        <div class="absolute top-1/3 -right-40 w-96 h-96 bg-cyan-500/10 rounded-full blur-[128px]"></div>
        <div class="absolute bottom-10 left-1/3 w-[30rem] h-[30rem] bg-violet-600/10 rounded-full blur-[140px]"></div>
    </div>

    <!-- Header / Navbar Partials -->
    @include('partials.navbar')

    <!-- Main Content Yield -->
    <main class="relative z-10 flex-grow">
        @yield('content')
    </main>

    <!-- Footer Partials -->
    @include('partials.footer')

    <!-- Back to top button -->
    <button id="backToTopBtn" aria-label="Kembali ke atas" class="fixed bottom-6 right-6 z-40 p-3 rounded-full bg-indigo-600/80 hover:bg-indigo-600 text-white shadow-lg backdrop-blur-md transition-all duration-300 opacity-0 translate-y-4 pointer-events-none hover:scale-110 active:scale-95 focus:outline-none focus:ring-2 focus:ring-indigo-400">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
        </svg>
    </button>

    <!-- Global Layout Scripts -->
    <script>
        // Back to top logic
        const backToTopBtn = document.getElementById('backToTopBtn');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 400) {
                backToTopBtn.classList.remove('opacity-0', 'translate-y-4', 'pointer-events-none');
                backToTopBtn.classList.add('opacity-100', 'translate-y-0');
            } else {
                backToTopBtn.classList.add('opacity-0', 'translate-y-4', 'pointer-events-none');
                backToTopBtn.classList.remove('opacity-100', 'translate-y-0');
            }
        });
        backToTopBtn?.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>

    @stack('scripts')
</body>
</html>
