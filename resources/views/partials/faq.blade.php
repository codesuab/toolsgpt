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
                    <svg class="h-4 w-4 transform transition-transform duration-300" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2.5">
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
                    <svg class="h-4 w-4 transform transition-transform duration-300" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2.5">
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
                    <svg class="h-4 w-4 transform transition-transform duration-300" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2.5">
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
                    <svg class="h-4 w-4 transform transition-transform duration-300" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2.5">
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
                    <svg class="h-4 w-4 transform transition-transform duration-300" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2.5">
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
    </div>
</div>