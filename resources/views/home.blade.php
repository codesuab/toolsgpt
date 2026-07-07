@extends('layouts.app')

@section('title', 'Free Online Tools - Compress, Convert & Edit Images')
@section('meta_description',
    config('app.name') .
    ' is a high-performance suite of free online tools. Compress images, convert
    formats, and crop files directly in your browser with local security.')

@section('schema_markup')
    <script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "WebSite",
  "name": "{{ config('app.name') }}"
  "url": "{{ url('/') }}",
  "potentialAction": {
    "@@type": "SearchAction",
    "target": "{{ url('/') }}?q={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
</script>
    <script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "FAQPage",
  "mainEntity": [
    {
      "@@type": "Question",
      "name": "Are my files safe on FreeImageTools?",
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": "Yes, completely. FreeImageTools processes all files locally inside your browser using client-side WebAssembly and JavaScript. Your files are never uploaded to any server, guaranteeing 100% privacy and security."
      }
    },
    {
      "@@type": "Question",
      "name": "How much does FreeImageTools cost?",
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": "FreeImageTools is 100% free to use. There are no limits, no registrations, no subscription fees, and no watermarks on any of the output files."
      }
    },
    {
      "@@type": "Question",
      "name": "Do I need to install any software to use FreeImageTools?",
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": "No, you do not need to install anything. FreeImageTools is a web-based platform that works directly inside any modern browser on Windows, Mac, Linux, iOS, or Android."
      }
    }
  ]
}
</script>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="max-w-360 mx-auto px-4 sm:px-6 lg:px-8">
        <div
            class="relative pt-12 pb-16 md:pt-16 md:pb-20 overflow-hidden bg-linear-to-b from-indigo-50/40 via-blue-50/15 to-white border-x border-slate-200 rounded-b-[40px]">
            <div class="absolute inset-0 overflow-hidden pointer-events-none z-0">
                <svg class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[110%] h-[110%] opacity-25 text-indigo-300"
                    fill="none" stroke="currentColor" stroke-width="0.75">
                    <circle cx="50%" cy="50%" r="18%" />
                    <circle cx="50%" cy="50%" r="30%" stroke-dasharray="3 3" />
                    <circle cx="50%" cy="50%" r="42%" stroke-dasharray="4 4" />
                </svg>
            </div>

            <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
                <!-- Top Category Text Label -->
                <div class="text-[10px] font-bold text-slate-500 uppercase mb-3.5 font-space select-none">
                    {{ config('app.name') }} UTILITIES
                </div>

                <!-- Flat Premium Header Title -->
                <h1
                    class="text-3xl sm:text-4xl md:text-5xl font-space font-extrabold max-w-4xl mx-auto leading-[1.15] text-slate-900 mb-4">
                    Secure Online Tools for Document & Image Management
                </h1>

                <!-- Broad Subheading Copy -->
                <p class="text-xs sm:text-sm md:text-base text-slate-500 max-w-3xl mx-auto leading-relaxed mb-8">
                    Easy and efficient tools to convert, compress, edit, and crop your files instantly. Powered by
                    client-side WebAssembly, your documents never leave your device.
                </p>

                <!-- Call to Action Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                    <a href="#tools-section" class="btn-primary w-full sm:w-auto">
                        Explore Free Tools
                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Tools Directory Grid -->
    <section id="tools-section" class="py-16 bg-slate-50/30 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header Row: Title -->
            <div class="mb-4 text-left">
                <h2 class="text-2xl sm:text-3xl font-space font-bold text-brand-text text-gradient-premium">All Tools</h2>
                <p class="text-brand-muted text-sm mt-1">Select from our collection of high-performance utilities.</p>
            </div>

            <!-- Filter Block: Full Width Search & Category Tabs -->
            <div class="space-y-4 mb-10">
                <!-- Full Width Search Bar -->
                <div class="w-full relative group">
                    <div
                        class="absolute -inset-0.5 rounded-brand-btn bg-linear-to-r from-indigo-200 to-purple-200 opacity-10 blur group-focus-within:opacity-25 transition-all duration-300">
                    </div>
                    <div
                        class="relative flex items-center bg-brand-card border border-brand-border rounded-brand-btn px-4 py-3 focus-within:border-brand-primary focus-within:ring-1 focus-within:ring-indigo-500/20 transition-colors">
                        <div class="text-slate-400 mr-3 shrink-0">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input type="text" id="tool-search"
                            placeholder="Search 30+ free tools (e.g. compress image, SVG to PNG...)"
                            class="w-full bg-transparent border-0 p-0 text-sm text-brand-text placeholder-slate-400 focus:outline-none focus:ring-0">
                    </div>
                </div>

                <!-- Category Tabs Row -->
                <div class="flex border-b border-slate-200 w-full mb-6">
                    <div class="flex flex-wrap gap-6 -mb-px">
                        <button onclick="filterTools('all', this)"
                            class="tab-btn pb-3 text-xs font-semibold border-b-2 border-brand-primary text-brand-primary transition-all focus:outline-none cursor-pointer">
                            All Tools
                        </button>
                        <button onclick="filterTools('compress', this)"
                            class="tab-btn pb-3 text-xs font-medium border-b-2 border-transparent text-brand-muted hover:text-brand-text hover:border-slate-300 transition-all focus:outline-none cursor-pointer">
                            Compress
                        </button>
                        <button onclick="filterTools('convert', this)"
                            class="tab-btn pb-3 text-xs font-medium border-b-2 border-transparent text-brand-muted hover:text-brand-text hover:border-slate-300 transition-all focus:outline-none cursor-pointer">
                            Convert
                        </button>
                        <button onclick="filterTools('edit', this)"
                            class="tab-btn pb-3 text-xs font-medium border-b-2 border-transparent text-brand-muted hover:text-brand-text hover:border-slate-300 transition-all focus:outline-none cursor-pointer">
                            Edit
                        </button>
                        <button onclick="filterTools('optimize', this)"
                            class="tab-btn pb-3 text-xs font-medium border-b-2 border-transparent text-brand-muted hover:text-brand-text hover:border-slate-300 transition-all focus:outline-none cursor-pointer">
                            Optimize
                        </button>
                    </div>
                </div>
            </div>

            <!-- Tools Grid - Reusable Partial -->
            @include('partials.tools-grid')
        </div>
        </div>
    </section>

    <!-- Content / SEO Section -->
    <section id="about" class="py-16 md:py-24 border-t border-brand-border bg-white relative">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-10">
                <!-- Article Header -->
                <div class="text-center max-w-3xl mx-auto space-y-4">
                    <div
                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-indigo-50 border border-indigo-100 text-[10px] font-bold text-brand-primary uppercase select-none">
                        Guaranteed Privacy & Security
                    </div>
                    <h2 class="text-3xl sm:text-4xl md:text-5xl font-space font-bold text-brand-text text-gradient-premium">
                        Professional-Grade Document & Image Utilities
                    </h2>
                    <p class="text-brand-muted text-sm sm:text-base leading-relaxed">
                        {{ config('app.name') }} bridges the gap between desktop complexity and web ease. All operations
                        occur in sandboxed local memory on your CPU, so your files are never transmitted or processed on
                        external servers.
                    </p>
                </div>

                <!-- Features Grid -->
                <div class="space-y-8">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Feature 1 -->
                        <div
                            class="group border border-slate-200/60 bg-brand-card p-6 rounded-brand-card hover:border-brand-primary/20 hover:shadow-[0_20px_40px_rgba(99,102,241,0.03)] hover:glow-indigo transition-all duration-300">
                            <div
                                class="h-10 w-10 rounded-brand-btn bg-indigo-50 border border-indigo-100 flex items-center justify-center text-brand-primary mb-4 group-hover:scale-110 group-hover:bg-brand-primary group-hover:text-white transition-all duration-300">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <h4 class="text-base font-bold text-slate-800 mb-2 font-space">Zero Server Uploads</h4>
                            <p class="text-brand-muted text-xs leading-relaxed">
                                Privacy is absolute. All file compression, format conversion, and EXIF extraction happen
                                directly inside your browser memory.
                            </p>
                        </div>
                        <!-- Feature 2 -->
                        <div
                            class="group border border-slate-200/60 bg-brand-card p-6 rounded-brand-card hover:border-brand-primary/20 hover:shadow-[0_20px_40px_rgba(99,102,241,0.03)] hover:glow-indigo transition-all duration-300">
                            <div
                                class="h-10 w-10 rounded-brand-btn bg-indigo-50 border border-indigo-100 flex items-center justify-center text-brand-primary mb-4 group-hover:scale-110 group-hover:bg-brand-primary group-hover:text-white transition-all duration-300">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <h4 class="text-base font-bold text-slate-800 mb-2 font-space">Instant WebAssembly</h4>
                            <p class="text-brand-muted text-xs leading-relaxed">
                                High-performance compiled C++ and Rust scripts process complex binary algorithms locally on
                                your CPU thread in milliseconds.
                            </p>
                        </div>
                        <!-- Feature 3 -->
                        <div
                            class="group border border-slate-200/60 bg-brand-card p-6 rounded-brand-card hover:border-brand-primary/20 hover:shadow-[0_20px_40px_rgba(99,102,241,0.03)] hover:glow-indigo transition-all duration-300">
                            <div
                                class="h-10 w-10 rounded-brand-btn bg-indigo-50 border border-indigo-100 flex items-center justify-center text-brand-primary mb-4 group-hover:scale-110 group-hover:bg-brand-primary group-hover:text-white transition-all duration-300">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h4 class="text-base font-bold text-slate-800 mb-2 font-space">Flexible Freemium Limits</h4>
                            <p class="text-brand-muted text-xs leading-relaxed">
                                Free core features. Free tier supports files up to 50MB. Upgrade to Pro for high-resolution
                                upgrades, batch actions, and advanced formats.
                            </p>
                        </div>
                        <!-- Feature 4 -->
                        <div
                            class="group border border-slate-200/60 bg-brand-card p-6 rounded-brand-card hover:border-brand-primary/20 hover:shadow-[0_20px_40px_rgba(99,102,241,0.03)] hover:glow-indigo transition-all duration-300">
                            <div
                                class="h-10 w-10 rounded-brand-btn bg-indigo-50 border border-indigo-100 flex items-center justify-center text-brand-primary mb-4 group-hover:scale-110 group-hover:bg-brand-primary group-hover:text-white transition-all duration-300">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </div>
                            <h4 class="text-base font-bold text-slate-800 mb-2 font-space">Clean, Ad-Free UI</h4>
                            <p class="text-brand-muted text-xs leading-relaxed">
                                Clean, intuitive, and modern workflow layout designed for creators, with zero annoying ads
                                or intrusive trackers.
                            </p>
                        </div>
                        <!-- Feature 5 -->
                        <div
                            class="group border border-slate-200/60 bg-brand-card p-6 rounded-brand-card hover:border-brand-primary/20 hover:shadow-[0_20px_40px_rgba(99,102,241,0.03)] hover:glow-indigo transition-all duration-300">
                            <div
                                class="h-10 w-10 rounded-brand-btn bg-indigo-50 border border-indigo-100 flex items-center justify-center text-brand-primary mb-4 group-hover:scale-110 group-hover:bg-brand-primary group-hover:text-white transition-all duration-300">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                                </svg>
                            </div>
                            <h4 class="text-base font-bold text-slate-800 mb-2 font-space">Universal Compatibility</h4>
                            <p class="text-brand-muted text-xs leading-relaxed">
                                Support for all modern web design formats including AVIF, WebP, SVG, PNG, high-efficiency
                                HEIC, and standard JPEGs.
                            </p>
                        </div>
                        <!-- Feature 6 -->
                        <div
                            class="group border border-slate-200/60 bg-brand-card p-6 rounded-brand-card hover:border-brand-primary/20 hover:shadow-[0_20px_40px_rgba(99,102,241,0.03)] hover:glow-indigo transition-all duration-300">
                            <div
                                class="h-10 w-10 rounded-brand-btn bg-indigo-50 border border-indigo-100 flex items-center justify-center text-brand-primary mb-4 group-hover:scale-110 group-hover:bg-brand-primary group-hover:text-white transition-all duration-300">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </div>
                            <h4 class="text-base font-bold text-slate-800 mb-2 font-space">Granular Size Controls</h4>
                            <p class="text-brand-muted text-xs leading-relaxed">
                                Define absolute size ceilings (e.g. 50KB target size) and let our recursive loops optimize
                                images down to exact targets.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Client-Side pipeline workflow -->
                <div
                    class="bg-slate-50/50 border border-slate-200/60 rounded-brand-card p-6 md:p-8 relative overflow-hidden">
                    <div class="absolute inset-0 bg-dot-grid opacity-30 pointer-events-none"></div>
                    <div class="relative z-10">
                        <div class="text-center max-w-xl mx-auto mb-10">
                            <h3 class="text-xl sm:text-2xl font-space font-bold text-slate-800">
                                The In-Browser Execution Pipeline
                            </h3>
                            <p class="text-brand-muted text-xs mt-1">
                                Secure local sandboxing processes graphics on CPU threads without network latency.
                            </p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 relative">
                            <!-- Connector line for larger screens -->
                            <div class="hidden md:block absolute top-6 left-[12%] right-[12%] h-[2px] bg-slate-200 z-0">
                            </div>

                            <!-- Step 1 -->
                            <div class="flex flex-col items-center text-center space-y-3 relative z-10">
                                <div
                                    class="h-12 w-12 rounded-full bg-white border-2 border-indigo-500 flex items-center justify-center text-brand-primary font-bold text-sm font-space shadow-sm transition-all duration-300 hover:scale-110">
                                    01
                                </div>
                                <h4 class="font-bold text-sm text-slate-800 font-space">Input Buffer</h4>
                                <p class="text-brand-muted text-xs max-w-[200px] leading-relaxed">
                                    File is loaded locally into browser buffer (sandbox) using HTML5 FileReader.
                                </p>
                            </div>
                            <!-- Step 2 -->
                            <div class="flex flex-col items-center text-center space-y-3 relative z-10">
                                <div
                                    class="h-12 w-12 rounded-full bg-white border-2 border-indigo-500 flex items-center justify-center text-brand-primary font-bold text-sm font-space shadow-sm transition-all duration-300 hover:scale-110">
                                    02
                                </div>
                                <h4 class="font-bold text-sm text-slate-800 font-space">WASM Decoders</h4>
                                <p class="text-brand-muted text-xs max-w-[200px] leading-relaxed">
                                    Rust/C++ compiled binaries decode complex compression codecs locally.
                                </p>
                            </div>
                            <!-- Step 3 -->
                            <div class="flex flex-col items-center text-center space-y-3 relative z-10">
                                <div
                                    class="h-12 w-12 rounded-full bg-white border-2 border-indigo-500 flex items-center justify-center text-brand-primary font-bold text-sm font-space shadow-sm transition-all duration-300 hover:scale-110">
                                    03
                                </div>
                                <h4 class="font-bold text-sm text-slate-800 font-space">Dynamic Scaling</h4>
                                <p class="text-brand-muted text-xs max-w-[200px] leading-relaxed">
                                    Multi-threaded CPU scripts render crops, dimensions, or target sizes.
                                </p>
                            </div>
                            <!-- Step 4 -->
                            <div class="flex flex-col items-center text-center space-y-3 relative z-10">
                                <div
                                    class="h-12 w-12 rounded-full bg-white border-2 border-indigo-500 flex items-center justify-center text-brand-primary font-bold text-sm font-space shadow-sm transition-all duration-300 hover:scale-110">
                                    04
                                </div>
                                <h4 class="font-bold text-sm text-slate-800 font-space">Blob Generation</h4>
                                <p class="text-brand-muted text-xs max-w-[200px] leading-relaxed">
                                    Output is exported to a browser Blob, triggering a direct local download.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Comparison Table Matrix -->
                <div class="border border-slate-200/60 rounded-brand-card p-6 md:p-8 bg-white">
                    <h3 class="text-xl sm:text-2xl font-space font-bold text-slate-800 mb-6">
                        Comparing the Technical Difference
                    </h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-xs border-collapse">
                            <thead>
                                <tr class="border-b border-slate-200 bg-slate-50 text-slate-700 font-bold font-space">
                                    <th class="py-3 px-4 rounded-tl-brand-btn">Feature Capability</th>
                                    <th class="py-3 px-4 text-brand-primary bg-indigo-50/50">Local Browser-Based Tools</th>
                                    <th class="py-3 px-4 rounded-tr-brand-btn">Traditional Cloud Converters</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-slate-650">
                                <tr class="hover:bg-slate-50/30 transition-colors">
                                    <td class="py-3.5 px-4 font-bold text-slate-800">File Storage</td>
                                    <td class="py-3.5 px-4 font-medium text-emerald-600 bg-emerald-50/20">None (100%
                                        In-Memory Sandbox)</td>
                                    <td class="py-3.5 px-4">Remote (Temporarily saves to remote cloud drives)</td>
                                </tr>
                                <tr class="hover:bg-slate-50/30 transition-colors">
                                    <td class="py-3.5 px-4 font-bold text-slate-800">Processing Speed</td>
                                    <td class="py-3.5 px-4 font-medium text-emerald-600 bg-emerald-50/20">Instantaneous
                                        (Direct CPU computation loops)</td>
                                    <td class="py-3.5 px-4">Delayed (Queue wait times + upload/download loops)</td>
                                </tr>
                                <tr class="hover:bg-slate-50/30 transition-colors">
                                    <td class="py-3.5 px-4 font-bold text-slate-800">Security Guarantee</td>
                                    <td class="py-3.5 px-4 font-medium text-emerald-600 bg-emerald-50/20">100% Secure (Zero
                                        network file transmission)</td>
                                    <td class="py-3.5 px-4">Variable (Risk of leaks, cache retention policies)</td>
                                </tr>
                                <tr class="hover:bg-slate-50/30 transition-colors">
                                    <td class="py-3.5 px-4 font-bold text-slate-800">Offline Functionality</td>
                                    <td class="py-3.5 px-4 font-medium text-emerald-600 bg-emerald-50/20">Supported (Logic
                                        runs completely client-side)</td>
                                    <td class="py-3.5 px-4">Unsupported (Fails without an active connection)</td>
                                </tr>
                                <tr class="hover:bg-slate-50/30 transition-colors">
                                    <td class="py-3.5 px-4 font-bold text-slate-800">Usage Barriers</td>
                                    <td class="py-3.5 px-4 font-medium text-emerald-600 bg-emerald-50/20">Freemium (Free
                                        core features, optional Pro upgrades)</td>
                                    <td class="py-3.5 px-4">Restrictive (Paywalls on basic tasks, high subscriptions)</td>
                                </tr>
                                <tr class="hover:bg-slate-50/30 transition-colors">
                                    <td class="py-3.5 px-4 font-bold text-slate-800">User Interface Ads</td>
                                    <td class="py-3.5 px-4 font-medium text-emerald-600 bg-emerald-50/20">Clean UX (Zero
                                        overlay banners or popups)</td>
                                    <td class="py-3.5 px-4">Intrusive (Littered with heavy tracking and banners)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- FAQ Section -->
                <div class="space-y-6">
                    <div class="text-center max-w-xl mx-auto mb-6">
                        <h3 class="text-2xl font-bold text-brand-text text-gradient-premium font-space">
                            Frequently Asked Questions
                        </h3>
                        <p class="text-brand-muted text-xs mt-1">
                            Find answers to common questions about security, speed, and limits.
                        </p>
                    </div>

                    <div class="flex flex-col gap-2.5 max-w-3xl mx-auto">
                        <!-- FAQ 1 -->
                        <div
                            class="faq-card group rounded-brand-card border border-slate-200/60 bg-brand-card transition-all duration-300 hover:border-brand-primary/20 hover:shadow-[0_8px_30px_rgba(99,102,241,0.02)]">
                            <button
                                class="faq-trigger w-full flex items-center justify-between p-4.5 focus:outline-none select-none text-left">
                                <h4
                                    class="font-semibold text-slate-800 group-hover:text-brand-primary transition-colors font-space text-sm">
                                    Are my files stored on {{ config('app.name') }} servers?
                                </h4>
                                <span
                                    class="faq-chevron relative h-5 w-5 shrink-0 flex items-center justify-center text-slate-400 group-hover:text-brand-primary transition-colors duration-300">
                                    <svg class="h-4 w-4 transform transition-transform duration-300" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </span>
                            </button>
                            <div class="faq-content grid grid-rows-[0fr] transition-all duration-300 ease-in-out overflow-hidden"
                                style="grid-template-rows: 0fr;">
                                <div class="min-h-0">
                                    <p class="px-4.5 pb-4.5 text-xs leading-relaxed text-brand-muted">
                                        No. Unlike traditional cloud converters, {{ config('app.name') }} executes all file
                                        compilation locally inside your web browser. Utilizing progressive technology like
                                        WebAssembly and HTML5 Canvas API, your raw file contents are never transmitted
                                        across the network, remaining entirely on your local machine.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 2 -->
                        <div
                            class="faq-card group rounded-brand-card border border-slate-200/60 bg-brand-card transition-all duration-300 hover:border-brand-primary/20 hover:shadow-[0_8px_30px_rgba(99,102,241,0.02)]">
                            <button
                                class="faq-trigger w-full flex items-center justify-between p-4.5 focus:outline-none select-none text-left">
                                <h4
                                    class="font-semibold text-slate-800 group-hover:text-brand-primary transition-colors font-space text-sm">
                                    Is {{ config('app.name') }} completely free?
                                </h4>
                                <span
                                    class="faq-chevron relative h-5 w-5 shrink-0 flex items-center justify-center text-slate-400 group-hover:text-brand-primary transition-colors duration-300">
                                    <svg class="h-4 w-4 transform transition-transform duration-300" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </span>
                            </button>
                            <div class="faq-content grid grid-rows-[0fr] transition-all duration-300 ease-in-out overflow-hidden"
                                style="grid-template-rows: 0fr;">
                                <div class="min-h-0">
                                    <p class="px-4.5 pb-4.5 text-xs leading-relaxed text-brand-muted">
                                        We offer a flexible freemium model. All core tools (resizing, basic format
                                        conversion, EXIF viewing, cropping) are 100% free with generous limits. We offer
                                        premium options for users who need advanced batch processing, ultra-high resolution
                                        exports, and premium WebAssembly filters.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 3 -->
                        <div
                            class="faq-card group rounded-brand-card border border-slate-200/60 bg-brand-card transition-all duration-300 hover:border-brand-primary/20 hover:shadow-[0_8px_30px_rgba(99,102,241,0.02)]">
                            <button
                                class="faq-trigger w-full flex items-center justify-between p-4.5 focus:outline-none select-none text-left">
                                <h4
                                    class="font-semibold text-slate-800 group-hover:text-brand-primary transition-colors font-space text-sm">
                                    What are the limits on the free tier?
                                </h4>
                                <span
                                    class="faq-chevron relative h-5 w-5 shrink-0 flex items-center justify-center text-slate-400 group-hover:text-brand-primary transition-colors duration-300">
                                    <svg class="h-4 w-4 transform transition-transform duration-300" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </span>
                            </button>
                            <div class="faq-content grid grid-rows-[0fr] transition-all duration-300 ease-in-out overflow-hidden"
                                style="grid-template-rows: 0fr;">
                                <div class="min-h-0">
                                    <p class="px-4.5 pb-4.5 text-xs leading-relaxed text-brand-muted">
                                        The free tier supports files up to 50MB per upload and up to 10 files processed
                                        sequentially per session. There are no watermarks placed on your free exports.
                                        Upgrading to Premium unlocks files up to 1GB and concurrent batch operations.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 4 -->
                        <div
                            class="faq-card group rounded-brand-card border border-slate-200/60 bg-brand-card transition-all duration-300 hover:border-brand-primary/20 hover:shadow-[0_8px_30px_rgba(99,102,241,0.02)]">
                            <button
                                class="faq-trigger w-full flex items-center justify-between p-4.5 focus:outline-none select-none text-left">
                                <h4
                                    class="font-semibold text-slate-800 group-hover:text-brand-primary transition-colors font-space text-sm">
                                    Why do you charge for premium features if processing is local?
                                </h4>
                                <span
                                    class="faq-chevron relative h-5 w-5 shrink-0 flex items-center justify-center text-slate-400 group-hover:text-brand-primary transition-colors duration-300">
                                    <svg class="h-4 w-4 transform transition-transform duration-300" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </span>
                            </button>
                            <div class="faq-content grid grid-rows-[0fr] transition-all duration-300 ease-in-out overflow-hidden"
                                style="grid-template-rows: 0fr;">
                                <div class="min-h-0">
                                    <p class="px-4.5 pb-4.5 text-xs leading-relaxed text-brand-muted">
                                        While calculations occur on your local CPU to guarantee privacy, developing and
                                        maintaining advanced WASM engines, licensing specialized decoders (like HEIC or AVIF
                                        format decoders), and keeping the platform ad-free requires ongoing support.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 5 -->
                        <div
                            class="faq-card group rounded-brand-card border border-slate-200/60 bg-brand-card transition-all duration-300 hover:border-brand-primary/20 hover:shadow-[0_8px_30px_rgba(99,102,241,0.02)]">
                            <button
                                class="faq-trigger w-full flex items-center justify-between p-4.5 focus:outline-none select-none text-left">
                                <h4
                                    class="font-semibold text-slate-800 group-hover:text-brand-primary transition-colors font-space text-sm">
                                    What formats are supported on the free versus premium tier?
                                </h4>
                                <span
                                    class="faq-chevron relative h-5 w-5 shrink-0 flex items-center justify-center text-slate-400 group-hover:text-brand-primary transition-colors duration-300">
                                    <svg class="h-4 w-4 transform transition-transform duration-300" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </span>
                            </button>
                            <div class="faq-content grid grid-rows-[0fr] transition-all duration-300 ease-in-out overflow-hidden"
                                style="grid-template-rows: 0fr;">
                                <div class="min-h-0">
                                    <p class="px-4.5 pb-4.5 text-xs leading-relaxed text-brand-muted">
                                        Free tier users can convert and compress standard graphic containers like PNG, JPEG,
                                        SVG, and WebP. Premium tier users unlock advanced, high-efficiency containers such
                                        as HEIC, HEIF, and AVIF, which require heavier local decoding pipelines.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 6 -->
                        <div
                            class="faq-card group rounded-brand-card border border-slate-200/60 bg-brand-card transition-all duration-300 hover:border-brand-primary/20 hover:shadow-[0_8px_30px_rgba(99,102,241,0.02)]">
                            <button
                                class="faq-trigger w-full flex items-center justify-between p-4.5 focus:outline-none select-none text-left">
                                <h4
                                    class="font-semibold text-slate-800 group-hover:text-brand-primary transition-colors font-space text-sm">
                                    Can I use my Premium account offline?
                                </h4>
                                <span
                                    class="faq-chevron relative h-5 w-5 shrink-0 flex items-center justify-center text-slate-400 group-hover:text-brand-primary transition-colors duration-300">
                                    <svg class="h-4 w-4 transform transition-transform duration-300" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </span>
                            </button>
                            <div class="faq-content grid grid-rows-[0fr] transition-all duration-300 ease-in-out overflow-hidden"
                                style="grid-template-rows: 0fr;">
                                <div class="min-h-0">
                                    <p class="px-4.5 pb-4.5 text-xs leading-relaxed text-brand-muted">
                                        Yes! The licensing validation caches locally in your browser storage. Once
                                        validated, all premium local processing pipelines run completely offline without
                                        requiring an active internet connection.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        // Tool card interactive filtering logic
        function filterTools(category, element) {
            // Toggle Active Tab Style
            const buttons = document.querySelectorAll('.tab-btn');
            buttons.forEach(btn => {
                btn.classList.remove('border-brand-primary', 'text-brand-primary', 'font-semibold');
                btn.classList.add('border-transparent', 'text-brand-muted', 'hover:text-brand-text', 'font-medium');
            });

            element.classList.remove('border-transparent', 'text-brand-muted', 'hover:text-brand-text', 'font-medium');
            element.classList.add('border-brand-primary', 'text-brand-primary', 'font-semibold');

            // Apply filters
            applySearchAndFilter();
        }

        function selectCategory(category) {
            // Find matching tab button and trigger filter
            const tabs = document.querySelectorAll('.tab-btn');
            tabs.forEach(tab => {
                if (tab.textContent.trim().toLowerCase() === category.toLowerCase()) {
                    tab.click();
                }
            });
            // Scroll down to the tools section smoothly
            document.getElementById('tools-section').scrollIntoView({
                behavior: 'smooth'
            });
        }

        // Combined live search and category filter
        const searchInput = document.getElementById('tool-search');
        if (searchInput) {
            searchInput.addEventListener('input', applySearchAndFilter);
        }

        function applySearchAndFilter() {
            const query = searchInput.value.toLowerCase().trim();
            const activeTab = document.querySelector('.tab-btn.text-brand-primary');
            let activeCategory = 'all';
            if (activeTab) {
                activeCategory = activeTab.textContent.trim().toLowerCase().replace(' tools', '');
            }

            const cards = document.querySelectorAll('.tool-card');
            let matchCount = 0;

            cards.forEach(card => {
                const categories = card.getAttribute('data-categories').split(',');
                const title = card.querySelector('h3').textContent.toLowerCase();
                const desc = card.querySelector('p').textContent.toLowerCase();

                const matchesCategory = (activeCategory === 'all' || categories.includes(activeCategory));
                const matchesSearch = (title.includes(query) || desc.includes(query));

                if (matchesCategory && matchesSearch) {
                    const wasHidden = card.classList.contains('hidden');
                    card.classList.remove('hidden');

                    // If it was hidden or we want a fresh stagger, trigger transition
                    if (wasHidden) {
                        card.classList.remove('animate-filter-in');
                        void card.offsetWidth; // Force DOM reflow
                        card.classList.add('animate-filter-in');
                    }

                    matchCount++;
                } else {
                    card.classList.add('hidden');
                    card.classList.remove('animate-filter-in');
                }
            });

            // Toggle empty state
            const emptyState = document.getElementById('search-empty-state');
            if (emptyState) {
                if (matchCount === 0) {
                    emptyState.classList.remove('hidden');
                } else {
                    emptyState.classList.add('hidden');
                }
            }
        }

        // Custom smooth accordion implementation
        document.querySelectorAll('.faq-card').forEach(card => {
            const trigger = card.querySelector('.faq-trigger');
            const content = card.querySelector('.faq-content');
            const chevron = card.querySelector('.faq-chevron svg');

            trigger.addEventListener('click', () => {
                const isActive = card.classList.contains('active');

                // Close all other FAQ cards smoothly
                document.querySelectorAll('.faq-card').forEach(otherCard => {
                    if (otherCard !== card && otherCard.classList.contains('active')) {
                        otherCard.classList.remove('active');
                        otherCard.querySelector('.faq-content').style.gridTemplateRows = '0fr';
                        otherCard.querySelector('.faq-chevron svg').classList.remove('rotate-180');
                        otherCard.classList.remove('border-brand-primary/30',
                            'shadow-[0_12px_30px_rgba(99,102,241,0.06)]');
                    }
                });

                if (isActive) {
                    card.classList.remove('active');
                    content.style.gridTemplateRows = '0fr';
                    chevron.classList.remove('rotate-180');
                    card.classList.remove('border-brand-primary/30',
                        'shadow-[0_12px_30px_rgba(99,102,241,0.06)]');
                } else {
                    card.classList.add('active');
                    content.style.gridTemplateRows = '1fr';
                    chevron.classList.add('rotate-180');
                    card.classList.add('border-brand-primary/30',
                        'shadow-[0_12px_30px_rgba(99,102,241,0.06)]');
                }
            });
        });
    </script>
@endsection
