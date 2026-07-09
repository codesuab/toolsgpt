@php
    if (!function_exists('hexToRgb')) {
        function hexToRgb(string $hex, float $opacity = null): string
        {
            $hex = ltrim($hex, '#');

            if (strlen($hex) === 3) {
                $hex = preg_replace('/(.)/', '$1$1', $hex);
            }

            if (strlen($hex) !== 6) {
                return $opacity !== null ? 'rgba(0,0,0,' . $opacity . ')' : 'rgb(0,0,0)';
            }

            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));

            return $opacity !== null
                ? "rgba($r, $g, $b, $opacity)"
                : "rgb($r, $g, $b)";
        }
    }
@endphp

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
                @if (Route::currentRouteName() !== 'home')
                    <a href="{{ route('home') }}"
                        class="text-sm font-medium transition-all {{ request()->is('home') ? 'text-brand-primary font-bold' : 'text-brand-muted hover:text-brand-primary' }}">
                        Home
                    </a>
                @endif
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
                            @foreach ($colOne as $one)
                                <a href="{{ route('tool.details', ['slug' => $one['tool']['slug']]) }}" style="
                                                        --tool-mega-color: {{ $one['tool']['color'] }};
                                                        --tool-mega-bg: {{ hexToRgb($one['tool']['color'], 0.06) }};
                                                        --tool-mega-border: {{ hexToRgb($one['tool']['color'], 0.2) }};
                                                    "
                                    class="mega-menu-card flex items-start gap-3.5 p-2 -mx-2 rounded-brand-btn hover:bg-slate-50 transition-all duration-200">
                                    <div
                                        class="h-9 w-9 rounded-brand-btn flex items-center justify-center shrink-0 transition-all duration-200 bg-orange-50 border border-orange-100 mega-menu-icon">
                                        {!! $one['tool']['icon'] !!}
                                    </div>
                                    <div class="text-left">
                                        <p
                                            class="text-xs font-bold text-slate-800 group-hover:text-brand-primary transition-colors flex items-center gap-1.5 mega-menu-title">
                                            {{ $one['tool']['name'] }}
                                        </p>
                                        <p class="text-[10px] text-brand-muted mt-0.5 leading-snug">
                                            {{ $one['tool']['category']['name'] }}
                                        </p>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                        <!-- Column 2: Blue accents -->
                        <div class="space-y-1">
                            @foreach ($colTow as $one)
                                <a href="{{ route('tool.details', ['slug' => $one['tool']['slug']]) }}" style="
                                                        --tool-mega-color: {{ $one['tool']['color'] }};
                                                        --tool-mega-bg: {{ hexToRgb($one['tool']['color'], 0.06) }};
                                                        --tool-mega-border: {{ hexToRgb($one['tool']['color'], 0.2) }};
                                                    "
                                    class="mega-menu-card flex items-start gap-3.5 p-2 -mx-2 rounded-brand-btn hover:bg-slate-50 transition-all duration-200">
                                    <div
                                        class="h-9 w-9 rounded-brand-btn flex items-center justify-center shrink-0 transition-all duration-200 bg-orange-50 border border-orange-100 mega-menu-icon">
                                        {!! $one['tool']['icon'] !!}
                                    </div>
                                    <div class="text-left">
                                        <p
                                            class="text-xs font-bold text-slate-800 group-hover:text-brand-primary transition-colors flex items-center gap-1.5 mega-menu-title">
                                            {{ $one['tool']['name'] }}
                                        </p>
                                        <p class="text-[10px] text-brand-muted mt-0.5 leading-snug">
                                            {{ $one['tool']['category']['name'] }}
                                        </p>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                        <!-- Column 3: Indigo accents -->
                        <div class="space-y-1">
                            @foreach ($colThree as $one)
                                <a href="{{ route('tool.details', ['slug' => $one['tool']['slug']]) }}" style="
                                                        --tool-mega-color: {{ $one['tool']['color'] }};
                                                        --tool-mega-bg: {{ hexToRgb($one['tool']['color'], 0.06) }};
                                                        --tool-mega-border: {{ hexToRgb($one['tool']['color'], 0.2) }};
                                                    "
                                    class="mega-menu-card flex items-start gap-3.5 p-2 -mx-2 rounded-brand-btn hover:bg-slate-50 transition-all duration-200">
                                    <div
                                        class="h-9 w-9 rounded-brand-btn flex items-center justify-center shrink-0 transition-all duration-200 bg-orange-50 border border-orange-100 mega-menu-icon">
                                        {!! $one['tool']['icon'] !!}
                                    </div>
                                    <div class="text-left">
                                        <p
                                            class="text-xs font-bold text-slate-800 group-hover:text-brand-primary transition-colors flex items-center gap-1.5 mega-menu-title">
                                            {{ $one['tool']['name'] }}
                                        </p>
                                        <p class="text-[10px] text-brand-muted mt-0.5 leading-snug">
                                            {{ $one['tool']['category']['name'] }}
                                        </p>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                        <!-- Desktop Mega Menu Footer -->
                        <div
                            class="col-span-3 -mx-6 -mb-6 mt-6 px-6 py-4 bg-slate-50 border-t border-brand-border flex items-center justify-between rounded-b-brand-card">
                            <div class="flex items-center gap-6">
                                <a href="/all-tools"
                                    class="text-xs font-bold text-brand-primary hover:text-brand-primary-hover flex items-center gap-1.5 transition-colors">
                                    Browse All {{ $toolsCount }} Utilities
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
                @if (Route::currentRouteName() !== 'home')
                    <a href="{{ route('home') }}"
                        class="flex items-center gap-3 px-3 py-2.5 text-sm font-bold text-slate-700 hover:bg-slate-50 rounded-brand-btn transition-colors">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-slate-500" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-smart-home">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M19 8.71l-5.333 -4.148a2.666 2.666 0 0 0 -3.274 0l-5.334 4.148a2.665 2.665 0 0 0 -1.029 2.105v7.2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-7.2c0 -.823 -.38 -1.6 -1.03 -2.105" />
                            <path d="M16 15c-2.21 1.333 -5.792 1.333 -8 0" />
                        </svg>
                        <span>Home</span>
                    </a>
                @endif
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
                                @foreach ($mobileMega as $mm)
                                    <a href="{{ route('tool.details', ['slug' => $mm['tool']['slug']]) }}"
                                        class="group flex items-center gap-3 px-3 py-2 rounded-brand-btn hover:bg-slate-50 transition-colors shrink-0"
                                        style="color: {{ $mm['tool']['color'] }}">
                                        {!! $mm['tool']['icon'] !!}
                                        <span
                                            class="text-xs font-semibold group-hover:text-brand-primary transition-colors">{{ $mm['tool']['name'] }}</span>
                                    </a>
                                @endforeach
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
@push('scripts')
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
@endpush