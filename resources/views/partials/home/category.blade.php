<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-end justify-between mb-10">
        <div class="w-full md:max-w-1/3">
            <div
                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-brand-card mb-1 bg-indigo-50 border border-indigo-100 text-[10px] font-bold text-brand-primary uppercase select-none">
                Categories
            </div>
            <h2 class="text-2xl sm:text-3xl font-space font-bold text-gradient-secondary">
                Find the right tool, fast
            </h2>
            <p class="text-brand-muted text-sm leading-relaxed">
                Eleven curated categories span the full spectrum of everyday work — from AI and images to security and
                SEO.
            </p>
        </div>
        <div class="hidden md:flex items-center gap-2">
            <button id="prevBtn" class="btn-secondary px-2 py-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M15 6l-6 6l6 6" />
                </svg>
            </button>
            <button id="nextBtn" class="btn-secondary px-2 py-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M9 6l6 6l-6 6" />
                </svg>
            </button>
        </div>
    </div>

    <div class="relative">
        <div class="embla">
            <div class="embla__viewport overflow-hidden">
                <div class="embla__container flex">
                    @foreach ($category as $cat)
                        <div class="embla__slide flex-[0_0_80%] sm:flex-[0_0_50%] md:flex-[0_0_25%] px-1">
                            <div
                                class="h-50 rounded-brand-card bg-brand-bg duration-200 hover:bg-white border border-brand-border p-4 group cursor-pointer">
                                <div class="flex items-center justify-between">
                                    <div class="w-10 h-10 flex items-center justify-center rounded-brand-card"
                                        style="background: {{ hexToRgb($cat['color'], 0.08) }};border: 1px solid {{ hexToRgb($cat['color'], 0.1) }};color:{{ hexToRgb($cat['color'], 1) }};">
                                        {!! $cat['icon'] !!}
                                    </div>
                                    <span
                                        class="bg-white/10 border border-brand-muted/10 text-[10px] text-brand-muted rounded-brand-card px-2 py-0.5 font-bold">
                                        {{ $cat['tools_count'] }} Tools
                                    </span>
                                </div>
                                <h1 class="text-sm font-bold text-brand-text mt-5">{{ $cat['name'] }}</h1>
                                <p class="text-sm text-brand-muted mt-1">{{ $cat['taq_line'] }}</p>
                                <div class="flex items-center justify-between border-t border-brand-border/60 mt-3 pt-3">
                                    <a href=""
                                        class="flex items-center gap-1 text-xs text-brand-muted font-bold tool-lunch-btn duration-300 group-hover:text-brand-primary">
                                        <span>Explore</span> <i
                                            class="ti ti-arrow-up-right duration-300 group-hover:rotate-45"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>