@extends('layouts.app')

@section('title', 'Free Online Image Compressor - Reduce JPG, PNG & WebP')
@section('meta_description',
    'Compress images online for free. Reduce JPG, PNG, WebP and SVG file sizes by up to 80%
    without losing quality. Secure client-side compression on FreeImageTools.')

@section('schema_markup')
    <script type="application/ld+json">
        {
          "@@context": "https://schema.org",
          "@@type": "SoftwareApplication",
          "name": "{{ config('app.name') }} Image Compressor",
          "operatingSystem": "All",
          "applicationCategory": "MultimediaApplication",
          "browserRequirements": "Requires HTML5, WebAssembly, and JavaScript support.",
          "offers": {
            "@@type": "Offer",
            "price": "0.00",
            "priceCurrency": "USD"
          },
          "description": "A high-performance, browser-based image compression tool to optimize JPEG, PNG, and WebP files without quality loss."
        }
        </script>
    <script type="application/ld+json">
        {
          "@@context": "https://schema.org",
          "@@type": "FAQPage",
          "mainEntity": [
            {
              "@@type": "Question",
              "name": "How does the image compressor work without uploading files?",
              "acceptedAnswer": {
                "@@type": "Answer",
                "text": "FreeImageTools utilizes WebAssembly (WASM) and browser-based APIs. The compression algorithms run directly on your device using your browser's CPU thread, which is why your files are never transmitted or stored on any server."
              }
            },
            {
              "@@type": "Question",
              "name": "Does image compression reduce dimensions?",
              "acceptedAnswer": {
                "@@type": "Answer",
                "text": "By default, our image compressor reduces file weight without changing the resolution (dimensions) of the image. However, you can toggle the optional resize fields in the settings panel to decrease the width and height if needed."
              }
            },
            {
              "@@type": "Question",
              "name": "What is the maximum file size limit?",
              "acceptedAnswer": {
                "@@type": "Answer",
                "text": "Since files are processed directly on your system and do not consume server bandwidth, we support single file uploads up to 50MB."
              }
            }
          ]
        }
        </script>
@endsection

@section('content')
    <!-- Breadcrumbs & Tool Header -->
    <div class="relative pb-12 pt-10 md:pt-12 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Breadcrumbs -->
            <nav class="flex mb-4 text-xs text-brand-muted" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2">
                    <li class="inline-flex items-center">
                        <a href="/" class="hover:text-brand-text transition-colors">Home</a>
                    </li>
                    <li>
                        <div class="flex items-center gap-1.5">
                            <svg class="h-3 w-3 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                            <a href="#tools-section" class="hover:text-brand-text transition-colors">Compress</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center gap-1.5">
                            <svg class="h-3 w-3 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                            <span class="text-slate-600 font-medium">Image Compressor</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Tool Header Info -->
            <div class="max-w-3xl">
                <h1
                    class="text-3xl sm:text-4xl font-space font-extrabold text-brand-text mb-3 text-gradient-premium">
                    Professional Online Image Compressor
                </h1>
                <p class="text-sm sm:text-base text-brand-muted leading-relaxed">
                    Optimize JPEG, PNG, and WebP images by up to 80% without visible loss in quality. Fully client-side
                    processing keeps your photos 100% private.
                </p>
            </div>
        </div>
    </div>

    <!-- Compression Workspace Section -->
    <section class="pb-16 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Empty State / File Dropzone Container (Visible by default) -->
            <div id="dropzone-container" class="max-w-4xl mx-auto">
                <div onclick="document.getElementById('file-picker').click()"
                    class="group relative border-2 border-dashed border-slate-350 hover:border-brand-primary/50 bg-brand-card hover:bg-slate-50/50 rounded-brand-card p-12 text-center flex flex-col items-center justify-center transition-all duration-300 cursor-pointer shadow-sm hover:shadow-md">
                    <!-- Decorative back glow -->
                    <div
                        class="absolute inset-0 rounded-brand-card bg-linear-to-r from-brand-primary/5 to-brand-secondary/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                    </div>

                    <div
                        class="h-16 w-16 rounded-full bg-slate-50 border border-brand-border flex items-center justify-center text-slate-400 group-hover:text-brand-primary group-hover:scale-110 group-hover:bg-brand-primary/10 transition-all duration-300 mb-6 shadow-inner relative z-10">
                        <svg class="h-8 w-8 text-slate-400 group-hover:text-brand-primary transition-colors" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                        </svg>
                    </div>

                    <h3 class="text-lg font-bold text-brand-text mb-2 font-space relative z-10">
                        Drag and drop your images here
                    </h3>
                    <p class="text-sm text-brand-muted mb-6 max-w-md relative z-10 leading-relaxed">
                        Or click to browse files from your computer. Supports JPG, PNG, WebP, SVG, and HEIC formats.
                    </p>

                    <div
                        class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full bg-slate-100 border border-slate-200/60 text-[10px] font-bold text-slate-500 uppercase select-none relative z-10">
                        🔒 GDPR Compliant — Processing is 100% Client-Side
                    </div>

                    <input type="file" id="file-picker" class="hidden" multiple accept="image/*"
                        onchange="handleFileSelect(event)">
                </div>
            </div>

            <!-- Workspace / Comparison Grid (Hidden by default, shown upon file load) -->
            <div id="workspace-grid" class="grid grid-cols-1 lg:grid-cols-12 gap-8 hidden">

                <!-- Left Panel: Drag-and-Drop / Interactive Preview Area -->
                <div class="lg:col-span-8 space-y-6">
                    <!-- Workspace Container -->
                    <div
                        class="border border-slate-200/60 bg-brand-card rounded-brand-card overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">

                        <!-- Workspace Header / Status Bar -->
                        <div
                            class="border-b border-brand-border px-6 py-4 flex items-center justify-between bg-slate-50/80">
                            <div class="flex items-center gap-2.5">
                                <span class="h-2.5 w-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                <span class="text-xs font-bold text-slate-700 font-space">Ready to Download</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <button onclick="clearWorkspace()"
                                    class="text-xs text-slate-400 hover:text-slate-600 transition-colors flex items-center gap-1 cursor-pointer">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Clear File
                                </button>
                            </div>
                        </div>

                        <!-- Comparison Workspace Layout - modern gap-8 -->
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                                <!-- Left: Original Image Info -->
                                <div class="space-y-3">
                                    <div class="flex items-center justify-between text-xs font-semibold">
                                        <span class="text-brand-muted">Original File</span>
                                        <span id="original-file-size" class="text-brand-text">2.4 MB</span>
                                    </div>
                                    <div
                                        class="relative aspect-video rounded-brand-card bg-slate-50 border border-brand-border overflow-hidden flex items-center justify-center group">
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-slate-100/50 to-transparent z-10">
                                        </div>
                                        <!-- Landscape graphic mockup -->
                                        <div
                                            class="w-full h-full bg-gradient-to-tr from-slate-100 via-indigo-50 to-slate-100 flex flex-col items-center justify-center p-4">
                                            <svg class="h-10 w-10 text-slate-400 mb-2 opacity-60" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <span class="text-xs text-slate-400 font-bold uppercase">Original
                                                Preview</span>
                                        </div>

                                        <!-- Badge -->
                                        <span
                                            class="absolute bottom-3 left-3 z-20 rounded-brand-btn bg-white border border-brand-border px-2 py-1 text-[10px] font-bold text-slate-600 shadow-sm">
                                            JPG | 3840 x 2160
                                        </span>
                                    </div>
                                </div>

                                <!-- Right: Compressed Image Info -->
                                <div class="space-y-3">
                                    <div class="flex items-center justify-between text-xs font-semibold">
                                        <span class="text-brand-primary">Compressed Output</span>
                                        <span id="compressed-file-size" class="text-emerald-600 font-bold">480 KB
                                            (-80%)</span>
                                    </div>
                                    <div
                                        class="relative aspect-video rounded-brand-card bg-slate-50 border border-brand-border overflow-hidden flex items-center justify-center group">
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-slate-100/50 to-transparent z-10">
                                        </div>
                                        <!-- Optimized preview mockup -->
                                        <div
                                            class="w-full h-full bg-gradient-to-tr from-slate-100 via-indigo-50 to-slate-100 flex flex-col items-center justify-center p-4">
                                            <svg class="h-10 w-10 text-indigo-500 mb-2 opacity-60" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span
                                                class="text-xs text-brand-primary font-bold uppercase">Optimized
                                                Preview</span>
                                        </div>

                                        <!-- Badge -->
                                        <span
                                            class="absolute bottom-3 left-3 z-20 rounded-brand-btn bg-indigo-50 border border-indigo-200 px-2 py-1 text-[10px] font-bold text-brand-primary shadow-sm">
                                            WebP | 3840 x 2160
                                        </span>
                                    </div>
                                </div>

                            </div>

                            <!-- Progress Bar / Info Panel -->
                            <div
                                class="mt-6 p-4 rounded-brand-card border border-brand-border bg-slate-50/50 flex flex-col sm:flex-row items-center justify-between gap-4">
                                <div class="flex items-center gap-3 w-full sm:w-auto">
                                    <div
                                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-brand-btn bg-emerald-100 border border-emerald-200 text-emerald-600 shadow-sm">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                            stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <div class="text-left">
                                        <h4 id="active-file-name" class="text-xs font-bold text-brand-text font-space">
                                            project-hero-banner.jpg</h4>
                                        <p class="text-[10px] text-brand-muted font-medium">Finished in 184ms | Quality
                                            target: 75%</p>
                                    </div>
                                </div>

                                <!-- Individual File Actions -->
                                <div class="flex items-center gap-3 w-full sm:w-auto">
                                    <button class="btn-secondary flex-grow sm:flex-grow-0">
                                        Preview Original
                                    </button>
                                    <a href="#" class="btn-primary flex-grow sm:flex-grow-0">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                            stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                        Download File
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Secondary Drag-and-drop Area -->
                    <div
                        class="border border-dashed border-slate-300 bg-slate-50/50 hover:bg-slate-50 rounded-brand-card p-8 text-center flex flex-col items-center justify-center relative transition-colors shadow-inner">
                        <div
                            class="h-12 w-12 rounded-brand-btn bg-white border border-brand-border flex items-center justify-center text-slate-400 mb-4 shadow-sm">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                        </div>
                        <h3 class="text-sm font-bold text-brand-text mb-1 font-space">Add more files for batch compression
                        </h3>
                        <p class="text-xs text-brand-muted max-w-sm">
                            Drag and drop additional photos or click to select. Supports multi-selection up to 20 files.
                        </p>
                    </div>
                </div>

                <!-- Right Panel: Quality Control Options Panel -->
                <div class="lg:col-span-4">
                    <div
                        class="border border-slate-200/60 bg-brand-card rounded-brand-card p-6 shadow-lg hover:shadow-xl transition-shadow duration-300 space-y-6 sticky top-24">
                        <h2
                            class="text-lg font-space font-bold text-brand-text text-gradient-premium border-b border-slate-100 pb-4 font-space">
                            Parameters
                        </h2>

                        <!-- Range Quality Slider -->
                        <div class="space-y-2.5">
                            <div class="flex items-center justify-between text-xs font-semibold">
                                <label for="quality-slider" class="text-brand-muted">Quality Level</label>
                                <span class="text-brand-primary font-bold" id="quality-val">75%</span>
                            </div>
                            <input type="range" id="quality-slider" min="10" max="100" value="75"
                                class="w-full h-1.5 bg-slate-200 rounded-brand-btn appearance-none cursor-pointer accent-brand-primary"
                                oninput="document.getElementById('quality-val').innerText = this.value + '%'">
                            <div class="flex justify-between text-[10px] text-slate-400 font-medium">
                                <span>High Compression</span>
                                <span>Best Quality</span>
                            </div>
                        </div>

                        <!-- Target Formats -->
                        <div class="space-y-2">
                            <label for="format-select" class="block text-xs font-bold text-brand-muted">Output Container
                                Format</label>
                            <select id="format-select"
                                class="w-full rounded-brand-btn bg-white border border-brand-border px-3.5 py-2.5 text-xs text-slate-700 focus:outline-none focus:border-brand-primary focus:ring-1 focus:ring-indigo-500/20 transition-colors shadow-sm">
                                <option value="original">Keep Original (JPG)</option>
                                <option value="webp" selected>Convert to WebP (Recommended)</option>
                                <option value="png">Convert to PNG (Lossless)</option>
                                <option value="jpg">Convert to JPG</option>
                            </select>
                        </div>

                        <!-- Dimension Reductions (Optional Resize) -->
                        <div class="space-y-3.5">
                            <span class="block text-xs font-bold text-brand-muted">Resolution Tuning (Optional)</span>
                            <div class="grid grid-cols-2 gap-3.5">
                                <div class="space-y-1">
                                    <label for="width-resize" class="text-[10px] text-slate-400 font-bold uppercase">Max
                                        Width</label>
                                    <input type="number" id="width-resize" placeholder="e.g. 1920"
                                        class="w-full rounded-brand-btn bg-white border border-brand-border px-3.5 py-2 text-xs text-slate-700 placeholder-slate-400 focus:outline-none focus:border-brand-primary transition-colors shadow-sm">
                                </div>
                                <div class="space-y-1">
                                    <label for="height-resize" class="text-[10px] text-slate-400 font-bold uppercase">Max
                                        Height</label>
                                    <input type="number" id="height-resize" placeholder="e.g. 1080"
                                        class="w-full rounded-brand-btn bg-white border border-brand-border px-3.5 py-2 text-xs text-slate-700 placeholder-slate-400 focus:outline-none focus:border-brand-primary transition-colors shadow-sm">
                                </div>
                            </div>
                        </div>

                        <!-- Toggles -->
                        <div class="space-y-4 pt-2">
                            <div class="flex items-center justify-between">
                                <div class="flex flex-col">
                                    <span class="text-xs font-bold text-brand-text">Strip Metadata</span>
                                    <span class="text-[10px] text-brand-muted leading-normal">Remove EXIF tags, GPS
                                        locations</span>
                                </div>
                                <button type="button"
                                    class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-full border-2 border-transparent bg-brand-primary transition-colors duration-200 ease-in-out focus:outline-none"
                                    role="switch" aria-checked="true">
                                    <span
                                        class="pointer-events-none inline-block h-5 w-5 translate-x-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                                </button>
                            </div>
                        </div>

                        <!-- Total Actions -->
                        <div class="pt-4 border-t border-slate-100">
                            <button
                                onclick="alert('Settings applied locally. Simulated compression output has been rebuilt.')"
                                class="w-full text-center rounded-brand-btn bg-brand-primary hover:bg-brand-primary-hover text-xs font-bold py-3.5 text-white shadow-md shadow-brand-primary/10 transition-all flex items-center justify-center gap-2 cursor-pointer">
                                Apply Settings
                            </button>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- SEO Content Guide Section -->
    <section class="py-16 md:py-24 border-t border-brand-border bg-slate-50/50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="prose max-w-none space-y-12">
                <!-- Main Content Guide -->
                <div class="space-y-4">
                    <h2 class="text-2xl sm:text-3xl font-space font-bold text-brand-text text-gradient-premium">
                        How to Compress Images Online in 3 Simple Steps
                    </h2>
                    <p class="text-brand-muted text-sm leading-relaxed">
                        FreeImageTools' photo optimization system is engineered for speed and clarity. Compress files in
                        your browser with zero metadata leaking.
                    </p>

                    <!-- Steps Layout -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 pt-6">
                        <div
                            class="p-6 rounded-brand-card border border-slate-200/60 bg-brand-card relative shadow-sm hover:border-brand-primary/20 transition-all duration-300">
                            <div
                                class="absolute -top-3.5 left-5 h-7 w-7 rounded-brand-btn bg-brand-primary text-white font-bold flex items-center justify-center text-sm shadow-md shadow-indigo-600/15">
                                1
                            </div>
                            <h3 class="text-sm font-bold text-brand-text mt-2 mb-1.5 font-space">Upload Photo</h3>
                            <p class="text-xs text-brand-muted leading-relaxed">
                                Drag and drop your JPEG, PNG, or WebP images into the designated drop zone above.
                            </p>
                        </div>

                        <div
                            class="p-6 rounded-brand-card border border-slate-200/60 bg-brand-card relative shadow-sm hover:border-brand-primary/20 transition-all duration-300">
                            <div
                                class="absolute -top-3.5 left-5 h-7 w-7 rounded-brand-btn bg-brand-primary text-white font-bold flex items-center justify-center text-sm shadow-md shadow-indigo-600/15">
                                2
                            </div>
                            <h3 class="text-sm font-bold text-brand-text mt-2 mb-1.5 font-space">Tune Settings</h3>
                            <p class="text-xs text-brand-muted leading-relaxed">
                                Adjust quality range sliders, convert outputs to WebP, or resize maximum resolutions.
                            </p>
                        </div>

                        <div
                            class="p-6 rounded-brand-card border border-slate-200/60 bg-brand-card relative shadow-sm hover:border-brand-primary/20 transition-all duration-300">
                            <div
                                class="absolute -top-3.5 left-5 h-7 w-7 rounded-brand-btn bg-brand-primary text-white font-bold flex items-center justify-center text-sm shadow-md shadow-indigo-600/15">
                                3
                            </div>
                            <h3 class="text-sm font-bold text-brand-text mt-2 mb-1.5 font-space">Save Instantly</h3>
                            <p class="text-xs text-brand-muted leading-relaxed">
                                View the final compression stats and download optimized assets locally to your computer.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Detailed Features Article -->
                <div class="space-y-6 pt-8 border-t border-brand-border">
                    <h2 class="text-2xl sm:text-3xl font-space font-bold text-brand-text text-gradient-premium">
                        Advanced Client-Side Image Optimizer Features
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-sm">
                        <div class="space-y-2">
                            <h3 class="text-base font-bold text-brand-text font-space">Lossless & Lossy Compression Modes
                            </h3>
                            <p class="text-brand-muted text-xs leading-relaxed">
                                Fine-tune the mathematical precision of file encoding. FreeImageTools implements
                                quantization metrics to decrease redundant bytes while maintaining sharp resolutions and
                                clarity boundaries.
                            </p>
                        </div>

                        <div class="space-y-2">
                            <h3 class="text-base font-bold text-brand-text font-space">Convert to Modern Image Formats</h3>
                            <p class="text-brand-muted text-xs leading-relaxed">
                                Convert heavy PNG screenshots directly into modern WebP containers. Doing so yields file
                                weight reductions of up to 80% while retaining alpha opacity transparency channels.
                            </p>
                        </div>

                        <div class="space-y-2">
                            <h3 class="text-base font-bold text-brand-text font-space">Metadata Privacy Control</h3>
                            <p class="text-brand-muted text-xs leading-relaxed">
                                Camera model names, creation timestamps, focal lengths, and sensitive GPS geolocation
                                coordinates are safely cleared from image files before compiling output files.
                            </p>
                        </div>

                        <div class="space-y-2">
                            <h3 class="text-base font-bold text-brand-text font-space">WASM-Accelerated Multi-Core
                                Processing</h3>
                            <p class="text-brand-muted text-xs leading-relaxed">
                                Our compressor runs compiled binary scripts in multi-threaded browser background workers.
                                Process dozens of images concurrently in seconds.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- FAQs Block -->
                <div class="space-y-6 pt-10 border-t border-brand-border">
                    <h2
                        class="text-2xl font-space font-bold text-center text-brand-text mb-8 text-gradient-premium font-space">
                        Frequently Asked Questions</h2>

                    <div class="space-y-4">
                        <details
                            class="group rounded-brand-card border border-slate-200/60 bg-brand-card p-5 [&_summary::-webkit-details-marker]:hidden shadow-sm hover:border-brand-primary/20 transition-all duration-300">
                            <summary class="flex cursor-pointer items-center justify-between gap-1.5 focus:outline-none">
                                <h3
                                    class="font-semibold text-slate-700 group-hover:text-brand-primary transition-colors text-sm sm:text-base font-space">
                                    Does this image compressor reduce quality?
                                </h3>
                                <span class="relative h-5 w-5 shrink-0">
                                    <svg class="absolute inset-0 h-5 w-5 opacity-100 group-open:opacity-0 transition-opacity"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <svg class="absolute inset-0 h-5 w-5 opacity-0 group-open:opacity-100 transition-opacity"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </span>
                            </summary>
                            <p class="mt-4 text-xs leading-relaxed text-brand-muted">
                                Our optimizer uses smart compression algorithms. Quality levels between 70-80% discard data
                                invisible to the human eye while slicing file sizes by half or more.
                            </p>
                        </details>

                        <details
                            class="group rounded-brand-card border border-slate-200/60 bg-brand-card p-5 [&_summary::-webkit-details-marker]:hidden shadow-sm hover:border-brand-primary/20 transition-all duration-300">
                            <summary class="flex cursor-pointer items-center justify-between gap-1.5 focus:outline-none">
                                <h3
                                    class="font-semibold text-slate-700 group-hover:text-brand-primary transition-colors text-sm sm:text-base font-space">
                                    Is it free to compress multiple files?
                                </h3>
                                <span class="relative h-5 w-5 shrink-0">
                                    <svg class="absolute inset-0 h-5 w-5 opacity-100 group-open:opacity-0 transition-opacity"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <svg class="absolute inset-0 h-5 w-5 opacity-0 group-open:opacity-100 transition-opacity"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </span>
                            </summary>
                            <p class="mt-4 text-xs leading-relaxed text-brand-muted">
                                Yes. Batch compression is fully supported up to 20 files per run, completely free of charge
                                and with no bandwidth limitations.
                            </p>
                        </details>

                        <details
                            class="group rounded-brand-card border border-slate-200/60 bg-brand-card p-5 [&_summary::-webkit-details-marker]:hidden shadow-sm hover:border-brand-primary/20 transition-all duration-300">
                            <summary class="flex cursor-pointer items-center justify-between gap-1.5 focus:outline-none">
                                <h3
                                    class="font-semibold text-slate-700 group-hover:text-brand-primary transition-colors text-sm sm:text-base font-space">
                                    Can I compress files offline?
                                </h3>
                                <span class="relative h-5 w-5 shrink-0">
                                    <svg class="absolute inset-0 h-5 w-5 opacity-100 group-open:opacity-0 transition-opacity"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <svg class="absolute inset-0 h-5 w-5 opacity-0 group-open:opacity-100 transition-opacity"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </span>
                            </summary>
                            <p class="mt-4 text-xs leading-relaxed text-brand-muted">
                                Yes. Once the web application finishes loading in your browser, the service workers allow
                                you to continue compressing and resizing images without an active internet connection.
                            </p>
                        </details>
                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection

@section('scripts')
    <script>
        function handleFileSelect(event) {
            const files = event.target.files;
            if (files && files.length > 0) {
                simulateFileLoad(files[0]);
            }
        }

        // Add drag & drop event handlers to the dropzone
        const dropzone = document.getElementById('dropzone-container');
        if (dropzone) {
            dropzone.addEventListener('dragover', (e) => {
                e.preventDefault();
                dropzone.classList.add('border-brand-primary/50', 'bg-slate-50/50');
            });
            dropzone.addEventListener('dragleave', () => {
                dropzone.classList.remove('border-brand-primary/50', 'bg-slate-50/50');
            });
            dropzone.addEventListener('drop', (e) => {
                e.preventDefault();
                dropzone.classList.remove('border-brand-primary/50', 'bg-slate-50/50');
                const files = e.dataTransfer.files;
                if (files && files.length > 0) {
                    simulateFileLoad(files[0]);
                }
            });
        }

        function simulateFileLoad(file) {
            // Update file names, sizes and show workspace
            document.getElementById('dropzone-container').classList.add('hidden');
            document.getElementById('workspace-grid').classList.remove('hidden');

            // Set name
            document.getElementById('active-file-name').innerText = file.name;

            // Set size
            const sizeInMB = (file.size / (1024 * 1024)).toFixed(2);
            document.getElementById('original-file-size').innerText = sizeInMB + ' MB';

            // Calculate simulated compressed size (approx 75% less)
            const compressedSize = (sizeInMB * 0.22).toFixed(2);
            document.getElementById('compressed-file-size').innerText = compressedSize + ' MB (-78%)';
        }

        function clearWorkspace() {
            // Reset files inputs and state
            document.getElementById('file-picker').value = '';
            document.getElementById('workspace-grid').classList.add('hidden');
            document.getElementById('dropzone-container').classList.remove('hidden');
        }
    </script>
@endsection
