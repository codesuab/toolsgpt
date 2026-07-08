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
    <title>{{ config('app.name') }} - @yield('title', '100% Free Online Browser-Based Image Utilities')</title>
    <meta name="description"
        content="@yield('meta_description', '100% free and secure browser-based tools for image compression, conversion, resizing, cropping, and more. Local processing via WebAssembly keeps your files completely private.')">
    <meta name="keywords"
        content="@yield('meta_keywords', 'image tools, online image tools, free image tools, image compressor, image converter, image resizer, image cropper, image optimizer, image editor, image format converter, JPG to PNG, PNG to JPG, WebP converter, AVIF converter, image quality optimizer, browser image tools, WebAssembly image processing, secure image tools, privacy-focused image tools, offline image processing, no upload image tools, photo tools, online photo editor, image utilities')">
    <link rel="canonical" href="{{ request()->url() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:title"
        content="{{ config('app.name') }} - @yield('title', '100% Free Online Browser-Based Image Utilities')">
    <meta property="og:description"
        content="@yield('meta_description', '100% free and secure browser-based tools for image compression, conversion, resizing, cropping, and more.')">
    <meta property="og:image" content="@yield('og_image', asset('media/og/og.webp'))">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ request()->url() }}">
    <meta property="twitter:title"
        content="{{ config('app.name') }} - @yield('title', '100% Free Online Browser-Based Image Utilities')">
    <meta property="twitter:description"
        content="@yield('meta_description', '100% free and secure browser-based tools for image compression, conversion, resizing, cropping, and more.')">
    <meta property="twitter:image" content="@yield('og_image', asset('media/og/og_t.webp'))">

    <!-- Preconnect to Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@500;700&display=swap"
        rel="stylesheet">

    {{-- icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

    <!-- Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Extra Styles / Header Script -->
    @yield('styles')

    <!-- JSON-LD Schema Markup -->
    @yield('schema_markup')
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
    <main class="grow z-10 relative">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/@tabler/icons@1.74.0/icons-react/dist/index.umd.min.js"></script>
    @yield('scripts')
</body>

</html>