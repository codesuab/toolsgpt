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
            <div
                class="reveal inline-flex items-center gap-2 rounded-brand-card bg-white/70 px-3.5 py-1.5 text-[10px] md:text-xs font-medium text-brand-muted ring-1 ring-brand-border backdrop-blur is-visible">
                <span class="flex -space-x-1.5">
                    <span
                        class="flex h-4 w-4 items-center justify-center rounded-brand-card bg-white ring-1 ring-brand-border">
                        <i class="ti ti-star text-brand-primary text-xs"></i>
                    </span>
                    <span
                        class="flex h-4 w-4 items-center justify-center rounded-brand-card bg-white ring-1 ring-brand-border">
                        <i class="ti ti-shield-lock text-brand-primary text-xs"></i>
                    </span>
                    <span
                        class="flex h-4 w-4 items-center justify-center rounded-brand-card bg-white ring-1 ring-brand-border">
                        <i class="ti ti-bolt text-brand-primary text-xs"></i>
                    </span>
                </span>
                Trusted by {{ $toolsCount }}+ creators &amp;
                developers
                <span class="text-green-600">● Live</span>
            </div>

            <!-- Flat Premium Header Title -->
            <h1
                class="text-3xl sm:text-4xl mt-4 md:text-6xl font-space font-extrabold w-full md:max-w-4xl mx-auto leading-[1.15] text-slate-900 mb-4">
                <p>Everything you need.</p>
                <p class="text-gradient">One intelligent workspace.</p>
            </h1>
            <p class="text-xs sm:text-sm md:text-base text-slate-500 max-w-3xl mx-auto leading-relaxed mb-8">
                ToolsGPT brings together AI tools, image and PDF utilities, developer essentials, converters,
                calculators and {{ $toolsCount }}+ browser-based tools — beautifully unified in one place.
            </p>

            <div id="searchToggler"
                class="bg-white rounded-brand-card border max-w-xl mx-auto border-brand-border shadow-xs hover:border-brand-primary duration-300 relative">
                <i class="ti ti-search text-xl absolute left-4 top-1/2 -translate-y-1/2 text-gray-500"></i>
                <input type="text" readonly placeholder="Search {{ $toolsCount }}+ tools, AI and utilities…"
                    class="border-0 outline-0 focus:outline-0 w-full pl-12 py-3 md:py-3.5 placeholder:text-sm placeholder:text-gray-500">
                <button class="btn btn-primary absolute right-1 top-1/2 -translate-y-1/2 invisible md:visible">
                    Search
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-right">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 12l14 0" />
                        <path d="M15 16l4 -4" />
                        <path d="M15 8l4 4" />
                    </svg>
                </button>
            </div>

            <!-- Call to Action Buttons -->
            <div class="flex items-center justify-center gap-3 mt-3 md:mt-6">
                <a href="{{ route('all.tool') }}" class="btn-primary w-full sm:w-auto gap-1">
                    <span>Explore Free Tools</span>
                </a>
                <a href="#tools-section" class="btn-secondary w-full sm:w-auto gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-sparkles h-4 w-4">
                        <path
                            d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z">
                        </path>
                        <path d="M5 3v4"></path>
                        <path d="M19 17v4"></path>
                        <path d="M3 5h4"></path>
                        <path d="M17 19h4"></path>
                    </svg> <span>Try AI Tools</span>
                </a>
            </div>
        </div>
    </div>
</section>