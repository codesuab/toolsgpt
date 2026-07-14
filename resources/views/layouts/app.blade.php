<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- favicon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('media/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('media/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('media/favicon/site.webmanifest') }}">

    <!-- Dynamic SEO Meta Tags -->
    <title>{{ config('app.name') }} - @yield('title', 'AI Tools, Online Utilities & Productivity Tools')</title>
    <meta name="description"
        content="@yield('meta_description', 'Explore powerful AI tools and free online utilities for images, files, text, developers, and productivity. Fast, secure, and privacy-focused tools that work directly in your browser with no installation required.')">
    <meta name="keywords"
        content="@yield('meta_keywords', 'AI tools, free AI tools, online AI tools, AI productivity tools, browser based AI tools, image AI tools, image compressor, image converter, PDF tools, file tools, text tools, developer tools, coding tools, online utilities, productivity tools, SaaS tools, free online tools, secure tools, privacy focused tools, no upload tools, web tools, AI assistant tools, AI writing tools, AI image tools, AI generator tools, digital productivity tools')">
    <link rel="canonical" href="{{ request()->url() }}">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="author" content="{{ config('app.name') }}">
    <meta name="theme-color" content="#2563eb">
    <meta http-equiv="content-language" content="en">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="application-name" content="{{ config('app.name') }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:site_name" content="{{ config('app.name') }}">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:title"
        content="{{ config('app.name') }} - @yield('title', 'AI Tools & Free Online Productivity Utilities')">
    <meta property="og:description"
        content="@yield('meta_description', 'Explore powerful AI tools and free browser-based utilities for images, files, text, developers, and productivity. Fast, secure, and privacy-focused tools with no installation required.')">
    <meta property="og:image" content="@yield('og_image', asset('media/og/og.webp'))">


    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ request()->url() }}">
    <meta property="twitter:title"
        content="{{ config('app.name') }} - @yield('title', 'AI Tools & Free Online Productivity Utilities')">
    <meta property="twitter:description"
        content="@yield('meta_description', 'Use AI-powered tools and free online utilities for images, files, text, coding, and productivity. Secure browser-based tools with no uploads required.')">
    <meta property="twitter:image" content="@yield('og_image', asset('media/og/og_t.webp'))">
    <meta name="twitter:site" content="@toolsgpt_net">
    <meta name="twitter:creator" content="@toolsgpt_net">

    <!-- Preconnect to Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Extra Styles / Header Script -->
    @yield('styles')

    <!-- JSON-LD Schema Markup -->
    @yield('schema_markup')

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-0D5DFBQW9X"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-0D5DFBQW9X');
    </script>
</head>

<body data-page="@yield('data-page')"
    class="bg-brand-bg text-brand-text font-sans antialiased min-h-screen flex flex-col selection:bg-brand-primary selection:text-white relative overflow-x-hidden bg-dot-grid">

    <!-- Background decorative blur elements -->
    <div
        class="absolute top-[-10%] left-[-10%] hidden md:block w-[50vw] h-[50vw] rounded-full bg-indigo-200/20 blur-[120px] pointer-events-none z-0">
    </div>
    <div
        class="absolute top-[40%] right-[-10%] hidden md:block w-[40vw] h-[40vw] rounded-full bg-purple-200/15 blur-[120px] pointer-events-none z-0">
    </div>

    <!-- Top Announcement/Ad Banner -->
    @include('partials.top-ad')

    <!-- Header / Navigation -->
    @include('partials.header')

    <!-- Main Content -->
    <main class="grow z-10 relative w-full">
        @yield('content')

        <div class="hidden md:block fixed bottom-10 right-10">
            <button class="btn-primary bg-brand-text text-white shadow-2xl" id="searchToggler"><i
                    class="ti ti-command"></i> Quick search</button>
        </div>
    </main>

    <!-- Footer -->
    @include('partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/@tabler/icons@1.74.0/icons-react/dist/index.umd.min.js"></script>
    @yield('scripts')
    @stack('scripts')
</body>

</html>