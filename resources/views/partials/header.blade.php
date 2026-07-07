<header
    class="sticky top-0 z-40 w-full border-b border-slate-200/50 bg-white/80 backdrop-blur-md transition-all duration-300 shadow-sm shadow-slate-100/50">
    <div class="max-w-360 mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="flex h-16 items-center justify-between">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-2.5 group">
                <span class="font-space font-bold text-lg text-brand-text">
                    Tools<span
                        class="text-brand-primary group-hover:text-brand-primary-hover transition-colors">GPT.</span>
                </span>
            </a>

            <!-- Navigation Links (Desktop) -->
            <nav class="hidden md:flex items-center gap-6.5">
                <a href="{{ route('all.tool') }}"
                    class="text-sm font-medium transition-all {{ request()->is('all-tools') ? 'text-brand-primary font-bold' : 'text-brand-muted hover:text-brand-primary' }}">
                    All Tools
                </a>

                <!-- Advanced & Modern Mega Menu Dropdown -->
                <div class="relative" id="mega-menu-wrapper">
                    <button id="mega-menu-trigger"
                        class="flex items-center gap-1.5 text-sm font-medium text-brand-muted hover:text-brand-primary transition-all focus:outline-none">
                        Tools Suite
                        <svg id="mega-menu-chevron" class="h-4 w-4 opacity-70 transition-transform duration-200"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Desktop Mega Menu Panel -->
                    <div id="mega-menu-dropdown"
                        class="absolute left-1/2 -translate-x-1/2 top-[calc(100%+23px)] w-200 bg-white border border-brand-border rounded-brand-card shadow-2xl p-6 grid grid-cols-3 gap-8 opacity-0 scale-95 pointer-events-none transition-all duration-200 z-50">

                        <!-- Column 1: Orange accents -->
                        <div class="space-y-1">
                            <!-- Compress Image -->
                            <a href="/tool/compress-image"
                                class="group flex items-start gap-3.5 p-2 -mx-2 rounded-brand-btn hover:bg-slate-50 transition-all duration-200">
                                <div
                                    class="h-9 w-9 rounded-brand-btn flex items-center justify-center shrink-0 transition-all duration-200 bg-orange-50 text-orange-500 border border-orange-100 group-hover:bg-orange-500 group-hover:text-white group-hover:border-orange-500 shadow-xs">
                                    <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div class="text-left">
                                    <p
                                        class="text-xs font-bold text-slate-800 group-hover:text-brand-primary transition-colors flex items-center gap-1.5">
                                        Compress Image
                                        <span
                                            class="inline-flex items-center rounded bg-orange-150 px-1 py-0.5 text-[8px] font-bold text-orange-700 uppercase select-none">⚡</span>
                                    </p>
                                    <p class="text-[10px] text-brand-muted mt-0.5 leading-snug">Shrink file size</p>
                                </div>
                            </a>

                            <!-- Reduce to KB -->
                            <a href="/all-tools"
                                class="group flex items-start gap-3.5 p-2 -mx-2 rounded-brand-btn hover:bg-slate-50 transition-all duration-200">
                                <div
                                    class="h-9 w-9 rounded-brand-btn flex items-center justify-center shrink-0 transition-all duration-200 bg-orange-50 text-orange-500 border border-orange-100 group-hover:bg-orange-500 group-hover:text-white group-hover:border-orange-500 shadow-xs">
                                    <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                    </svg>
                                </div>
                                <div class="text-left">
                                    <p
                                        class="text-xs font-bold text-slate-800 group-hover:text-brand-primary transition-colors">
                                        Reduce to KB</p>
                                    <p class="text-[10px] text-brand-muted mt-0.5 leading-snug">Hit exact file size</p>
                                </div>
                            </a>

                            <!-- Remove Background -->
                            <a href="/all-tools"
                                class="group flex items-start gap-3.5 p-2 -mx-2 rounded-brand-btn hover:bg-slate-50 transition-all duration-200">
                                <div
                                    class="h-9 w-9 rounded-brand-btn flex items-center justify-center shrink-0 transition-all duration-200 bg-orange-50 text-orange-500 border border-orange-100 group-hover:bg-orange-500 group-hover:text-white group-hover:border-orange-500 shadow-xs">
                                    <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 11-4.243-4.243 3 3 0 014.243 4.243z" />
                                    </svg>
                                </div>
                                <div class="text-left">
                                    <p
                                        class="text-xs font-bold text-slate-800 group-hover:text-brand-primary transition-colors">
                                        Remove Background</p>
                                    <p class="text-[10px] text-brand-muted mt-0.5 leading-snug">Transparent cutout</p>
                                </div>
                            </a>

                            <!-- EXIF Data -->
                            <a href="/all-tools"
                                class="group flex items-start gap-3.5 p-2 -mx-2 rounded-brand-btn hover:bg-slate-50 transition-all duration-200">
                                <div
                                    class="h-9 w-9 rounded-brand-btn flex items-center justify-center shrink-0 transition-all duration-200 bg-orange-550 text-orange-500 border border-orange-100 group-hover:bg-orange-500 group-hover:text-white group-hover:border-orange-500 shadow-xs">
                                    <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="text-left">
                                    <p
                                        class="text-xs font-bold text-slate-800 group-hover:text-brand-primary transition-colors">
                                        EXIF Data</p>
                                    <p class="text-[10px] text-brand-muted mt-0.5 leading-snug">View or strip metadata
                                    </p>
                                </div>
                            </a>

                            <!-- Watermark -->
                            <a href="/all-tools"
                                class="group flex items-start gap-3.5 p-2 -mx-2 rounded-brand-btn hover:bg-slate-50 transition-all duration-200">
                                <div
                                    class="h-9 w-9 rounded-brand-btn flex items-center justify-center shrink-0 transition-all duration-200 bg-orange-50 text-orange-500 border border-orange-100 group-hover:bg-orange-500 group-hover:text-white group-hover:border-orange-500 shadow-xs">
                                    <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                </div>
                                <div class="text-left">
                                    <p
                                        class="text-xs font-bold text-slate-800 group-hover:text-brand-primary transition-colors">
                                        Watermark</p>
                                    <p class="text-[10px] text-brand-muted mt-0.5 leading-snug">Text overlay</p>
                                </div>
                            </a>
                        </div>

                        <!-- Column 2: Blue accents -->
                        <div class="space-y-1">
                            <!-- Resize Image -->
                            <a href="/all-tools"
                                class="group flex items-start gap-3.5 p-2 -mx-2 rounded-brand-btn hover:bg-slate-50 transition-all duration-200">
                                <div
                                    class="h-9 w-9 rounded-brand-btn flex items-center justify-center shrink-0 transition-all duration-200 bg-blue-50 text-blue-500 border border-blue-100 group-hover:bg-blue-500 group-hover:text-white group-hover:border-blue-550 shadow-xs">
                                    <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5v-4m0 4h-4m4 0l-5-5" />
                                    </svg>
                                </div>
                                <div class="text-left">
                                    <p
                                        class="text-xs font-bold text-slate-800 group-hover:text-brand-primary transition-colors">
                                        Resize Image</p>
                                    <p class="text-[10px] text-brand-muted mt-0.5 leading-snug">Change dimensions</p>
                                </div>
                            </a>

                            <!-- Circle Crop -->
                            <a href="/all-tools"
                                class="group flex items-start gap-3.5 p-2 -mx-2 rounded-brand-btn hover:bg-slate-50 transition-all duration-200">
                                <div
                                    class="h-9 w-9 rounded-brand-btn flex items-center justify-center shrink-0 transition-all duration-200 bg-blue-50 text-blue-505 border border-blue-100 group-hover:bg-blue-500 group-hover:text-white group-hover:border-blue-500 shadow-xs">
                                    <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="text-left">
                                    <p
                                        class="text-xs font-bold text-slate-800 group-hover:text-brand-primary transition-colors">
                                        Circle Crop</p>
                                    <p class="text-[10px] text-brand-muted mt-0.5 leading-snug">Round profile picture
                                    </p>
                                </div>
                            </a>

                            <!-- Add Text -->
                            <a href="/all-tools"
                                class="group flex items-start gap-3.5 p-2 -mx-2 rounded-brand-btn hover:bg-slate-50 transition-all duration-200">
                                <div
                                    class="h-9 w-9 rounded-brand-btn flex items-center justify-center shrink-0 transition-all duration-200 bg-blue-50 text-blue-500 border border-blue-100 group-hover:bg-blue-500 group-hover:text-white group-hover:border-blue-500 shadow-xs">
                                    <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4 6h16M12 6v14m-5 0h10" />
                                    </svg>
                                </div>
                                <div class="text-left">
                                    <p
                                        class="text-xs font-bold text-slate-800 group-hover:text-brand-primary transition-colors">
                                        Add Text</p>
                                    <p class="text-[10px] text-brand-muted mt-0.5 leading-snug">Write on image</p>
                                </div>
                            </a>

                            <!-- Passport Photo -->
                            <a href="/all-tools"
                                class="group flex items-start gap-3.5 p-2 -mx-2 rounded-brand-btn hover:bg-slate-50 transition-all duration-200">
                                <div
                                    class="h-9 w-9 rounded-brand-btn flex items-center justify-center shrink-0 transition-all duration-200 bg-blue-50 text-blue-500 border border-blue-100 group-hover:bg-blue-500 group-hover:text-white group-hover:border-blue-550 shadow-xs">
                                    <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                    </svg>
                                </div>
                                <div class="text-left">
                                    <p
                                        class="text-xs font-bold text-slate-800 group-hover:text-brand-primary transition-colors">
                                        Passport Photo</p>
                                    <p class="text-[10px] text-brand-muted mt-0.5 leading-snug">US UK EU sizes</p>
                                </div>
                            </a>

                            <!-- Add Border -->
                            <a href="/all-tools"
                                class="group flex items-start gap-3.5 p-2 -mx-2 rounded-brand-btn hover:bg-slate-50 transition-all duration-200">
                                <div
                                    class="h-9 w-9 rounded-brand-btn flex items-center justify-center shrink-0 transition-all duration-200 bg-blue-50 text-blue-500 border border-blue-100 group-hover:bg-blue-500 group-hover:text-white group-hover:border-blue-500 shadow-xs">
                                    <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4 4h16v16H4V4zm2 2v12h12V6H6z" />
                                    </svg>
                                </div>
                                <div class="text-left">
                                    <p
                                        class="text-xs font-bold text-slate-800 group-hover:text-brand-primary transition-colors">
                                        Add Border</p>
                                    <p class="text-[10px] text-brand-muted mt-0.5 leading-snug">Frame your photo</p>
                                </div>
                            </a>

                            <!-- Beautifier -->
                            <a href="/all-tools"
                                class="group flex items-start gap-3.5 p-2 -mx-2 rounded-brand-btn hover:bg-slate-50 transition-all duration-200">
                                <div
                                    class="h-9 w-9 rounded-brand-btn flex items-center justify-center shrink-0 transition-all duration-200 bg-blue-50 text-blue-500 border border-blue-100 group-hover:bg-blue-500 group-hover:text-white group-hover:border-blue-500 shadow-xs">
                                    <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div class="text-left">
                                    <p
                                        class="text-xs font-bold text-slate-800 group-hover:text-brand-primary transition-colors">
                                        Beautifier</p>
                                    <p class="text-[10px] text-brand-muted mt-0.5 leading-snug">Screenshot mockup</p>
                                </div>
                            </a>

                            <!-- Bulk Resizer -->
                            <a href="/all-tools"
                                class="group flex items-start gap-3.5 p-2 -mx-2 rounded-brand-btn hover:bg-slate-50 transition-all duration-200">
                                <div
                                    class="h-9 w-9 rounded-brand-btn flex items-center justify-center shrink-0 transition-all duration-200 bg-blue-50 text-blue-500 border border-blue-100 group-hover:bg-blue-500 group-hover:text-white group-hover:border-blue-550 shadow-xs">
                                    <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 002-2h6" />
                                    </svg>
                                </div>
                                <div class="text-left">
                                    <p
                                        class="text-xs font-bold text-slate-800 group-hover:text-brand-primary transition-colors">
                                        Bulk Resizer</p>
                                    <p class="text-[10px] text-brand-muted mt-0.5 leading-snug">Resize many at once</p>
                                </div>
                            </a>
                        </div>

                        <!-- Column 3: Indigo accents -->
                        <div class="space-y-1">
                            <!-- Crop Image -->
                            <a href="/all-tools"
                                class="group flex items-start gap-3.5 p-2 -mx-2 rounded-brand-btn hover:bg-slate-50 transition-all duration-200">
                                <div
                                    class="h-9 w-9 rounded-brand-btn flex items-center justify-center shrink-0 transition-all duration-200 bg-indigo-50 text-indigo-505 border border-indigo-100 group-hover:bg-indigo-500 group-hover:text-white group-hover:border-indigo-550 shadow-xs">
                                    <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6 4v12a2 2 0 002 2h12M4 6h12a2 2 0 012 2v12" />
                                    </svg>
                                </div>
                                <div class="text-left">
                                    <p
                                        class="text-xs font-bold text-slate-800 group-hover:text-brand-primary transition-colors">
                                        Crop Image</p>
                                    <p class="text-[10px] text-brand-muted mt-0.5 leading-snug">Cut to any size</p>
                                </div>
                            </a>

                            <!-- Rotate / Flip -->
                            <a href="/all-tools"
                                class="group flex items-start gap-3.5 p-2 -mx-2 rounded-brand-btn hover:bg-slate-50 transition-all duration-200">
                                <div
                                    class="h-9 w-9 rounded-brand-btn flex items-center justify-center shrink-0 transition-all duration-200 bg-indigo-50 text-indigo-500 border border-indigo-100 group-hover:bg-indigo-500 group-hover:text-white group-hover:border-indigo-550 shadow-xs">
                                    <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 1121.21 7.89M9 11l3-3 3 3" />
                                    </svg>
                                </div>
                                <div class="text-left">
                                    <p
                                        class="text-xs font-bold text-slate-800 group-hover:text-brand-primary transition-colors">
                                        Rotate / Flip</p>
                                    <p class="text-[10px] text-brand-muted mt-0.5 leading-snug">90° or mirror</p>
                                </div>
                            </a>

                            <!-- Merge Images -->
                            <a href="/all-tools"
                                class="group flex items-start gap-3.5 p-2 -mx-2 rounded-brand-btn hover:bg-slate-50 transition-all duration-200">
                                <div
                                    class="h-9 w-9 rounded-brand-btn flex items-center justify-center shrink-0 transition-all duration-200 bg-indigo-50 text-indigo-500 border border-indigo-100 group-hover:bg-indigo-500 group-hover:text-white group-hover:border-indigo-550 shadow-xs">
                                    <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2" />
                                    </svg>
                                </div>
                                <div class="text-left">
                                    <p
                                        class="text-xs font-bold text-slate-800 group-hover:text-brand-primary transition-colors">
                                        Merge Images</p>
                                    <p class="text-[10px] text-brand-muted mt-0.5 leading-snug">Combine side by side
                                    </p>
                                </div>
                            </a>

                            <!-- Round Corners -->
                            <a href="/all-tools"
                                class="group flex items-start gap-3.5 p-2 -mx-2 rounded-brand-btn hover:bg-slate-50 transition-all duration-200">
                                <div
                                    class="h-9 w-9 rounded-brand-btn flex items-center justify-center shrink-0 transition-all duration-200 bg-indigo-50 text-indigo-500 border border-indigo-100 group-hover:bg-indigo-500 group-hover:text-white group-hover:border-indigo-500 shadow-xs">
                                    <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8 3h8a5 5 0 015 5v8a5 5 0 01-5 5H8a5 5 0 01-5-5V8a5 5 0 015-5z" />
                                    </svg>
                                </div>
                                <div class="text-left">
                                    <p
                                        class="text-xs font-bold text-slate-800 group-hover:text-brand-primary transition-colors">
                                        Round Corners</p>
                                    <p class="text-[10px] text-brand-muted mt-0.5 leading-snug">Rounded edges</p>
                                </div>
                            </a>

                            <!-- Meme Generator -->
                            <a href="/all-tools"
                                class="group flex items-start gap-3.5 p-2 -mx-2 rounded-brand-btn hover:bg-slate-50 transition-all duration-200">
                                <div
                                    class="h-9 w-9 rounded-brand-btn flex items-center justify-center shrink-0 transition-all duration-200 bg-indigo-50 text-indigo-500 border border-indigo-100 group-hover:bg-indigo-500 group-hover:text-white group-hover:border-indigo-550 shadow-xs">
                                    <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                    </svg>
                                </div>
                                <div class="text-left">
                                    <p
                                        class="text-xs font-bold text-slate-800 group-hover:text-brand-primary transition-colors">
                                        Meme Generator</p>
                                    <p class="text-[10px] text-brand-muted mt-0.5 leading-snug">Top & bottom text</p>
                                </div>
                            </a>

                            <!-- Collage Maker -->
                            <a href="/all-tools"
                                class="group flex items-start gap-3.5 p-2 -mx-2 rounded-brand-btn hover:bg-slate-50 transition-all duration-200">
                                <div
                                    class="h-9 w-9 rounded-brand-btn flex items-center justify-center shrink-0 transition-all duration-200 bg-indigo-50 text-indigo-500 border border-indigo-100 group-hover:bg-indigo-500 group-hover:text-white group-hover:border-indigo-550 shadow-xs">
                                    <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                    </svg>
                                </div>
                                <div class="text-left">
                                    <p
                                        class="text-xs font-bold text-slate-800 group-hover:text-brand-primary transition-colors">
                                        Collage Maker</p>
                                    <p class="text-[10px] text-brand-muted mt-0.5 leading-snug">Grid photo collage</p>
                                </div>
                            </a>
                        </div>

                        <!-- Desktop Mega Menu Footer -->
                        <div
                            class="col-span-3 -mx-6 -mb-6 mt-6 px-6 py-4 bg-slate-50 border-t border-brand-border flex items-center justify-between rounded-b-brand-card">
                            <div class="flex items-center gap-6">
                                <a href="/all-tools"
                                    class="text-xs font-bold text-brand-primary hover:text-brand-primary-hover flex items-center gap-1.5 transition-colors">
                                    Browse All 18 Utilities
                                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                                <span class="text-slate-300">|</span>
                                <span class="flex items-center gap-1.5 text-[10px] font-medium text-slate-500">
                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                    Zero file logging. 100% browser-side security.
                                </span>
                            </div>
                            <div
                                class="flex items-center gap-1 bg-indigo-50 border border-indigo-100/60 rounded px-2 py-0.5 select-none">
                                <span class="text-[9px] font-extrabold text-brand-primary uppercase">GDPR
                                    Ready</span>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="{{ route('home') }}#about"
                    class="text-sm font-medium text-brand-muted hover:text-brand-primary transition-all">
                    Features
                </a>
            </nav>

            <!-- Actions -->
            <div class="hidden md:flex items-center gap-5">
                <a href="{{ route('all.tool') }}" class="btn-primary">
                    Explore More
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <div class="flex md:hidden">
                <button type="button" id="mobile-menu-btn"
                    class="inline-flex items-center justify-center rounded-brand-btn p-2 text-brand-muted hover:bg-slate-100 hover:text-brand-text focus:outline-none transition-colors">
                    <svg class="h-6 w-6" id="mobile-menu-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2">
                        <path id="mobile-menu-path" stroke-linecap="round" stroke-linejoin="round"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Container (animated grid) -->
    <style>
        .mobile-scroll-container::-webkit-scrollbar {
            display: none;
        }

        .mobile-scroll-container {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
    <div id="mobile-menu-container"
        class="absolute top-16 left-0 right-0 z-50 grid grid-rows-[0fr] md:hidden transition-all duration-300 ease-in-out overflow-hidden bg-white shadow-xl">
        <div class="min-h-0">
            <div class="px-5 py-6 space-y-4">
                <!-- All Tools Link -->
                <a href="{{ route('all.tool') }}"
                    class="flex items-center gap-3 px-3 py-2.5 text-sm font-bold transition-all {{ request()->is('all-tools') ? 'text-brand-primary bg-indigo-50/40' : 'text-slate-700 hover:bg-slate-50' }} rounded-brand-btn">
                    <!-- Grid icon -->
                    <svg class="h-4.5 w-4.5 text-slate-500 {{ request()->is('all-tools') ? 'text-brand-primary' : '' }}"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    <span>All Tools</span>
                </a>

                <!-- Mobile Accordion Trigger -->
                <div class="space-y-1">
                    <button id="mobile-mega-trigger"
                        class="w-full flex items-center justify-between rounded-brand-btn px-3 py-2.5 text-sm font-bold text-slate-700 hover:bg-slate-50 transition-colors focus:outline-none">
                        <div class="flex items-center gap-3">
                            <!-- Suite icon -->
                            <svg class="h-4.5 w-4.5 text-slate-500" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            <span>Tools Suite</span>
                        </div>
                        <svg id="mobile-mega-arrow" class="h-4 w-4 text-brand-muted transition-transform duration-200"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <!-- Mobile Accordion Content Container -->
                    <div id="mobile-mega-content-container"
                        class="grid grid-rows-[0fr] transition-all duration-300 ease-in-out overflow-hidden pl-2 ml-3">
                        <div class="min-h-0 flex flex-col gap-1.5">
                            <!-- Scroll container enclosing all 18 tools -->
                            <div
                                class="flex flex-col gap-1.5 max-h-80 overflow-y-auto pr-1.5 pt-2 pb-2 mobile-scroll-container">
                                <!-- Compress Image -->
                                <a href="/tool/compress-image"
                                    class="group flex items-center gap-3 px-3 py-2 rounded-brand-btn hover:bg-slate-50 transition-colors shrink-0 {{ request()->is('tool/compress-image') ? 'text-brand-primary bg-indigo-50/20 font-bold' : 'text-slate-700' }}">
                                    <svg class="h-4.5 w-4.5 text-orange-500 shrink-0" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span
                                        class="text-xs font-semibold group-hover:text-brand-primary transition-colors">Compress
                                        Image</span>
                                </a>

                                <!-- Reduce to KB -->
                                <a href="/all-tools"
                                    class="group flex items-center gap-3 px-3 py-2 rounded-brand-btn hover:bg-slate-50 transition-colors shrink-0 text-slate-700">
                                    <svg class="h-4.5 w-4.5 text-orange-500 shrink-0" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                    </svg>
                                    <span
                                        class="text-xs font-semibold group-hover:text-brand-primary transition-colors">Reduce
                                        to KB</span>
                                </a>

                                <!-- Remove Background -->
                                <a href="/all-tools"
                                    class="group flex items-center gap-3 px-3 py-2 rounded-brand-btn hover:bg-slate-50 transition-colors shrink-0 text-slate-700">
                                    <svg class="h-4.5 w-4.5 text-orange-500 shrink-0" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 11-4.243-4.243 3 3 0 014.243 4.243z" />
                                    </svg>
                                    <span
                                        class="text-xs font-semibold group-hover:text-brand-primary transition-colors">Remove
                                        Background</span>
                                </a>

                                <!-- EXIF Data -->
                                <a href="/all-tools"
                                    class="group flex items-center gap-3 px-3 py-2 rounded-brand-btn hover:bg-slate-50 transition-colors shrink-0 text-slate-700">
                                    <svg class="h-4.5 w-4.5 text-orange-500 shrink-0" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span
                                        class="text-xs font-semibold group-hover:text-brand-primary transition-colors">EXIF
                                        Data</span>
                                </a>

                                <!-- Watermark -->
                                <a href="/all-tools"
                                    class="group flex items-center gap-3 px-3 py-2 rounded-brand-btn hover:bg-slate-50 transition-colors shrink-0 text-slate-700">
                                    <svg class="h-4.5 w-4.5 text-orange-500 shrink-0" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                    <span
                                        class="text-xs font-semibold group-hover:text-brand-primary transition-colors">Watermark</span>
                                </a>

                                <!-- Resize Image -->
                                <a href="/all-tools"
                                    class="group flex items-center gap-3 px-3 py-2 rounded-brand-btn hover:bg-slate-50 transition-colors shrink-0 text-slate-700">
                                    <svg class="h-4.5 w-4.5 text-blue-500 shrink-0" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5v-4m0 4h-4m4 0l-5-5" />
                                    </svg>
                                    <span
                                        class="text-xs font-semibold group-hover:text-brand-primary transition-colors">Resize
                                        Image</span>
                                </a>

                                <!-- Circle Crop -->
                                <a href="/all-tools"
                                    class="group flex items-center gap-3 px-3 py-2 rounded-brand-btn hover:bg-slate-50 transition-colors shrink-0 text-slate-700">
                                    <svg class="h-4.5 w-4.5 text-blue-500 shrink-0" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span
                                        class="text-xs font-semibold group-hover:text-brand-primary transition-colors">Circle
                                        Crop</span>
                                </a>

                                <!-- Add Text -->
                                <a href="/all-tools"
                                    class="group flex items-center gap-3 px-3 py-2 rounded-brand-btn hover:bg-slate-50 transition-colors shrink-0 text-slate-700">
                                    <svg class="h-4.5 w-4.5 text-blue-500 shrink-0" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4 6h16M12 6v14m-5 0h10" />
                                    </svg>
                                    <span
                                        class="text-xs font-semibold group-hover:text-brand-primary transition-colors">Add
                                        Text</span>
                                </a>

                                <!-- Passport Photo -->
                                <a href="/all-tools"
                                    class="group flex items-center gap-3 px-3 py-2 rounded-brand-btn hover:bg-slate-50 transition-colors shrink-0 text-slate-700">
                                    <svg class="h-4.5 w-4.5 text-blue-500 shrink-0" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                    </svg>
                                    <span
                                        class="text-xs font-semibold group-hover:text-brand-primary transition-colors">Passport
                                        Photo</span>
                                </a>
                                <!-- Add Border -->
                                <a href="/all-tools"
                                    class="group flex items-center gap-3 px-3 py-2 rounded-brand-btn hover:bg-slate-50 transition-colors shrink-0 text-slate-700">
                                    <svg class="h-4.5 w-4.5 text-blue-500 shrink-0" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4 4h16v16H4V4zm2 2v12h12V6H6z" />
                                    </svg>
                                    <span
                                        class="text-xs font-semibold group-hover:text-brand-primary transition-colors">Add
                                        Border</span>
                                </a>

                                <!-- Beautifier -->
                                <a href="/all-tools"
                                    class="group flex items-center gap-3 px-3 py-2 rounded-brand-btn hover:bg-slate-50 transition-colors shrink-0 text-slate-700">
                                    <svg class="h-4.5 w-4.5 text-blue-500 shrink-0" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <span
                                        class="text-xs font-semibold group-hover:text-brand-primary transition-colors">Beautifier</span>
                                </a>

                                <!-- Bulk Resizer -->
                                <a href="/all-tools"
                                    class="group flex items-center gap-3 px-3 py-2 rounded-brand-btn hover:bg-slate-50 transition-colors shrink-0 text-slate-700">
                                    <svg class="h-4.5 w-4.5 text-blue-500 shrink-0" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 002-2h6" />
                                    </svg>
                                    <span
                                        class="text-xs font-semibold group-hover:text-brand-primary transition-colors">Bulk
                                        Resizer</span>
                                </a>

                                <!-- Crop Image -->
                                <a href="/all-tools"
                                    class="group flex items-center gap-3 px-3 py-2 rounded-brand-btn hover:bg-slate-50 transition-colors shrink-0 text-slate-700">
                                    <svg class="h-4.5 w-4.5 text-indigo-500 shrink-0" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6 4v12a2 2 0 002 2h12M4 6h12a2 2 0 012 2v12" />
                                    </svg>
                                    <span
                                        class="text-xs font-semibold group-hover:text-brand-primary transition-colors">Crop
                                        Image</span>
                                </a>

                                <!-- Rotate / Flip -->
                                <a href="/all-tools"
                                    class="group flex items-center gap-3 px-3 py-2 rounded-brand-btn hover:bg-slate-50 transition-colors shrink-0 text-slate-700">
                                    <svg class="h-4.5 w-4.5 text-indigo-500 shrink-0" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 1121.21 7.89M9 11l3-3 3 3" />
                                    </svg>
                                    <span
                                        class="text-xs font-semibold group-hover:text-brand-primary transition-colors">Rotate
                                        / Flip</span>
                                </a>

                                <!-- Merge Images -->
                                <a href="/all-tools"
                                    class="group flex items-center gap-3 px-3 py-2 rounded-brand-btn hover:bg-slate-50 transition-colors shrink-0 text-slate-700">
                                    <svg class="h-4.5 w-4.5 text-indigo-500 shrink-0" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2" />
                                    </svg>
                                    <span
                                        class="text-xs font-semibold group-hover:text-brand-primary transition-colors">Merge
                                        Images</span>
                                </a>

                                <!-- Round Corners -->
                                <a href="/all-tools"
                                    class="group flex items-center gap-3 px-3 py-2 rounded-brand-btn hover:bg-slate-50 transition-colors shrink-0 text-slate-700">
                                    <svg class="h-4.5 w-4.5 text-indigo-500 shrink-0" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8 3h8a5 5 0 015 5v8a5 5 0 01-5 5H8a5 5 0 01-5-5V8a5 5 0 015-5z" />
                                    </svg>
                                    <span
                                        class="text-xs font-semibold group-hover:text-brand-primary transition-colors">Round
                                        Corners</span>
                                </a>

                                <!-- Meme Generator -->
                                <a href="/all-tools"
                                    class="group flex items-center gap-3 px-3 py-2 rounded-brand-btn hover:bg-slate-50 transition-colors shrink-0 text-slate-700">
                                    <svg class="h-4.5 w-4.5 text-indigo-500 shrink-0" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                    </svg>
                                    <span
                                        class="text-xs font-semibold group-hover:text-brand-primary transition-colors">Meme
                                        Generator</span>
                                </a>

                                <!-- Collage Maker -->
                                <a href="/all-tools"
                                    class="group flex items-center gap-3 px-3 py-2 rounded-brand-btn hover:bg-slate-50 transition-colors shrink-0 text-slate-700">
                                    <svg class="h-4.5 w-4.5 text-indigo-500 shrink-0" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                    </svg>
                                    <span
                                        class="text-xs font-semibold group-hover:text-brand-primary transition-colors">Collage
                                        Maker</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Features Link -->
                <a href="{{ route('home') }}#about"
                    class="flex items-center gap-3 px-3 py-2.5 text-sm font-bold text-slate-700 hover:bg-slate-50 rounded-brand-btn transition-colors">
                    <!-- Features icon -->
                    <svg class="h-4.5 w-4.5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.907c.961 0 1.367 1.243.583 1.83l-3.978 2.89a1 1 0 00-.364 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.978-2.89a1 1 0 00-1.176 0l-3.978 2.89c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.364-1.118L2.49 10.122c-.784-.587-.378-1.83.583-1.83h4.907a1 1 0 00.95-.69l1.519-4.674z" />
                    </svg>
                    <span>Features</span>
                </a>
            </div>
        </div>
    </div>
</header>

<!-- Interactive script to handle dropdown toggle and mobile menu -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenuContainer = document.getElementById('mobile-menu-container');
        const mobileMenuPath = document.getElementById('mobile-menu-path');

        if (mobileMenuBtn && mobileMenuContainer) {
            mobileMenuBtn.addEventListener('click', () => {
                const isClosed = mobileMenuContainer.style.gridTemplateRows === '0fr' ||
                    mobileMenuContainer.style.gridTemplateRows === '';
                if (isClosed) {
                    mobileMenuContainer.style.gridTemplateRows = '1fr';
                    if (mobileMenuPath) {
                        mobileMenuPath.setAttribute('d', 'M6 18L18 6M6 6l12 12');
                    }
                } else {
                    mobileMenuContainer.style.gridTemplateRows = '0fr';
                    if (mobileMenuPath) {
                        mobileMenuPath.setAttribute('d', 'M4 6h16M4 12h16M4 18h16');
                    }
                }
            });
        }

        // Desktop Mega Menu click behavior
        const megaTrigger = document.getElementById('mega-menu-trigger');
        const megaDropdown = document.getElementById('mega-menu-dropdown');
        const megaChevron = document.getElementById('mega-menu-chevron');

        if (megaTrigger && megaDropdown) {
            // Click behavior to toggle menu
            megaTrigger.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                const isOpen = !megaDropdown.classList.contains('opacity-0');
                if (isOpen) {
                    closeMegaMenu();
                } else {
                    openMegaMenu();
                }
            });

            // Close menu when clicking outside of it
            document.addEventListener('click', (e) => {
                if (!megaDropdown.contains(e.target) && !megaTrigger.contains(e.target)) {
                    closeMegaMenu();
                }
            });
        }

        function openMegaMenu() {
            megaDropdown.classList.remove('opacity-0', 'scale-95', 'pointer-events-none');
            megaDropdown.classList.add('opacity-100', 'scale-100', 'pointer-events-auto');
            if (megaChevron) megaChevron.classList.add('rotate-180');
        }

        function closeMegaMenu() {
            megaDropdown.classList.add('opacity-0', 'scale-95', 'pointer-events-none');
            megaDropdown.classList.remove('opacity-100', 'scale-100', 'pointer-events-auto');
            if (megaChevron) megaChevron.classList.remove('rotate-180');
        }

        // Mobile Mega Menu Accordion toggle on click
        const mobileMegaTrigger = document.getElementById('mobile-mega-trigger');
        const mobileMegaContainer = document.getElementById('mobile-mega-content-container');
        const mobileMegaArrow = document.getElementById('mobile-mega-arrow');

        if (mobileMegaTrigger && mobileMegaContainer) {
            mobileMegaTrigger.addEventListener('click', () => {
                const isClosed = mobileMegaContainer.style.gridTemplateRows === '0fr' ||
                    mobileMegaContainer.style.gridTemplateRows === '';
                if (isClosed) {
                    mobileMegaContainer.style.gridTemplateRows = '1fr';
                    if (mobileMegaArrow) mobileMegaArrow.classList.add('rotate-180');
                } else {
                    mobileMegaContainer.style.gridTemplateRows = '0fr';
                    if (mobileMegaArrow) mobileMegaArrow.classList.remove('rotate-180');
                }
            });
        }


    });
</script>