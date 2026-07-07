<footer class="border-t border-brand-footer-border bg-brand-footer relative overflow-hidden text-brand-footer-text">
    <!-- Ambient bottom dark purple glow -->
    <div
        class="absolute bottom-0 left-[20%] w-[35vw] h-[35vw] rounded-full bg-purple-950/15 blur-[120px] pointer-events-none z-0">
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 lg:pt-20 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-8 lg:gap-12">
            <!-- Branding and Description (Column 1) -->
            <div class="col-span-1 md:col-span-1 space-y-4">
                <a href="/" class="flex items-center gap-2.5 group">
                    <span class="font-bold text-lg text-white font-space">
                        ToolsGPT.
                    </span>
                </a>
                <p class="text-brand-footer-text text-xs leading-relaxed text-left">
                    ToolsGPT is your all-in-one collection of free online tools. Compress images, convert files,
                    generate content, calculate values, and simplify daily tasks with fast, secure browser-based tools.
                </p>

                <!-- GDPR Safe Box -->
                <div
                    class="rounded-brand-btn border border-slate-800 bg-slate-950/50 p-3 flex items-start gap-2.5 shadow-[3px_3px_0px_0px_#1e293b] hover:-translate-x-0.5 hover:-translate-y-0.5 hover:shadow-[5px_5px_0px_0px_#1e293b] transition-all duration-300 select-none">
                    <svg class="h-4.5 w-4.5 text-emerald-500 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    <div class="text-[11px] font-bold text-slate-200 leading-normal text-left font-space">
                        GDPR Safe. Nothing leaves your browser.
                    </div>
                </div>
            </div>

            <!-- Column 2: Popular Tools -->
            <div>
                <h3 class="text-xs font-bold text-white uppercase mb-4.5 font-space">Popular Tools
                </h3>
                <ul class="space-y-2 text-sm text-left">
                    <li><a href="/tool/compress-image"
                            class="text-brand-footer-text/70 hover:text-white transition-colors cursor-not-allowed">Compress
                            Image</a></li>
                    <li><a href="#"
                            class="text-brand-footer-text/70 hover:text-white transition-colors cursor-not-allowed">Resize
                            Image</a></li>
                    <li><a href="#"
                            class="text-brand-footer-text/70 hover:text-white transition-colors cursor-not-allowed">Crop
                            Image</a></li>
                </ul>
            </div>

            <!-- Column 3: Converters -->
            <div>
                <h3 class="text-xs font-bold text-white uppercase mb-4.5 font-space">Converters</h3>
                <ul class="space-y-2 text-sm text-left">
                    <li><a href="#"
                            class="text-brand-footer-text/70 hover:text-white transition-colors cursor-not-allowed">JPG
                            to WebP</a></li>
                    <li><a href="#"
                            class="text-brand-footer-text/70 hover:text-white transition-colors cursor-not-allowed">WebP
                            to JPG</a></li>
                    <li><a href="#"
                            class="text-brand-footer-text/70 hover:text-white transition-colors cursor-not-allowed">PNG
                            to WebP</a></li>
                    <li><a href="#"
                            class="text-brand-footer-text/70 hover:text-white transition-colors cursor-not-allowed">AVIF
                            to JPG</a></li>
                    <li><a href="#"
                            class="text-brand-footer-text/70 hover:text-white transition-colors cursor-not-allowed">HEIC
                            to JPG</a></li>
                    <li><a href="#"
                            class="text-brand-footer-text/70 hover:text-white transition-colors cursor-not-allowed">JPG
                            to PNG</a></li>
                    <li><a href="#"
                            class="text-brand-footer-text/70 hover:text-white transition-colors cursor-not-allowed">PNG
                            to JPG</a></li>
                    <li><a href="#"
                            class="text-brand-footer-text/70 hover:text-white transition-colors cursor-not-allowed">SVG
                            to PNG</a></li>
                </ul>
            </div>

            <!-- Column 4: Learn -->
            <div>
                <h3 class="text-xs font-bold text-white uppercase mb-4.5 font-space">Learn</h3>
                <ul class="space-y-2 text-sm text-left">
                    <li><a href="#"
                            class="text-brand-footer-text/70 hover:text-white transition-colors cursor-not-allowed">What
                            is AVIF?</a></li>
                    <li><a href="#"
                            class="text-brand-footer-text/70 hover:text-white transition-colors cursor-not-allowed">Lossy
                            vs Lossless</a></li>
                    <li><a href="#"
                            class="text-brand-footer-text/70 hover:text-white transition-colors cursor-not-allowed">PNG
                            vs SVG</a></li>
                    <li><a href="#"
                            class="text-brand-footer-text/70 hover:text-white transition-colors cursor-not-allowed">WebP
                            vs JPG vs PNG</a></li>
                    <li><a href="#"
                            class="text-brand-footer-text/70 hover:text-white transition-colors cursor-not-allowed">Image
                            Sizes Guide</a></li>
                </ul>
            </div>

            <!-- Column 5: Company -->
            <div>
                <h3 class="text-xs font-bold text-white uppercase mb-4.5 font-space">Company</h3>
                <ul class="space-y-2 text-sm text-left">
                    <li><a href="{{ route('contact') }}"
                            class="text-brand-footer-text/70 hover:text-white transition-colors">Contact</a>
                    <li><a href="{{ route('blog.index') }}"
                            class="text-brand-footer-text/70 hover:text-white transition-colors">Blog</a>
                    </li>
                    <li><a href="{{ route('about') }}"
                            class="text-brand-footer-text/70 hover:text-white transition-colors">About</a>
                    </li>
                    </li>
                    <li><a href="{{ route('privacy-policy') }}"
                            class="text-brand-footer-text/70 hover:text-white transition-colors">Privacy
                            Policy</a></li>
                    <li><a href="{{ route('terms-of-service') }}"
                            class="text-brand-footer-text/70 hover:text-white transition-colors">Terms of
                            Service</a></li>
                </ul>
            </div>
        </div>

        <!-- Additional Links Row -->
        <div
            class="border-t border-brand-footer-border mt-12 pt-8 flex justify-center md:justify-start flex-wrap gap-x-6 gap-y-2 text-xs text-brand-footer-text/75 font-space">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
            <a href="{{ route('all.tool') }}" class="hover:text-white transition-colors">All Tools</a>
            <a href="{{ route('blog.index') }}" class="hover:text-white transition-colors">Blog</a>
            <a href="{{ route('about') }}" class="hover:text-white transition-colors">About Us</a>
            <a href="{{ route('contact') }}" class="hover:text-white transition-colors">Contact Us</a>
            <a href="{{ route('privacy-policy') }}" class="hover:text-white transition-colors">Privacy Policy</a>
            <a href="{{ route('terms-of-service') }}" class="hover:text-white transition-colors">Terms of Service</a>
        </div>

        <!-- Bottom Copyright Bar -->
        <div
            class="py-8 flex flex-col md:flex-row items-center justify-between text-xs text-brand-footer-muted font-medium font-space space-y-2">
            <div>
                &copy; 2026-{{ now()->year }} {{ request()->getHost() }} Free forever.
            </div>
            <div class="flex items-center gap-1">
                Made by <span class="text-red-500">♥</span> <a href="https://codesuab.com" target="_blank"
                    class="text-brand-footer-text hover:text-white transition-colors">codesuab.com</a>
            </div>
        </div>
    </div>
</footer>