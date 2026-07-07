@extends('layouts.app')

@section('title', 'Free Online Tools - Compress, Convert & Edit Images')
@section('meta_description', config('app.name') . ' is a high-performance suite of free online tools. Compress images, convert formats, and crop files directly in your browser with local security.')

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
    @include('partials.hero')

    {{--tools --}}
    <section id="tools-section" class="py-16 bg-slate-50/30 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-4 text-left">
                <h2 class="text-2xl sm:text-3xl font-space font-bold text-brand-text text-gradient-premium">All Tools</h2>
                <p class="text-brand-muted text-sm mt-1">Select from our collection of high-performance utilities.</p>
            </div>

            <!-- Filter Block: Full Width Search & Category Tabs -->
            <div class="space-y-4 mb-6">
                <div class="w-full relative group">
                    <div
                        class="absolute -inset-0.5 rounded-brand-btn bg-linear-to-r from-indigo-200 to-purple-200 opacity-10 blur group-focus-within:opacity-25 transition-all duration-300">
                    </div>
                    <div
                        class="relative flex items-center bg-brand-card border border-brand-border rounded-brand-btn px-4 py-3 focus-within:border-brand-primary focus-within:ring-1 focus-within:ring-indigo-500/20 transition-colors">
                        <div class="text-slate-400 mr-3 shrink-0">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input type="text" id="tool-search"
                            placeholder="Search 30+ free tools (e.g. compress image, SVG to PNG...)"
                            class="w-full bg-transparent border-0 p-0 text-sm text-brand-text placeholder-slate-400 focus:outline-none focus:ring-0">
                    </div>
                </div>
                <div class="flex items-center justify-between border-b border-slate-200 w-full mb-6">
                    <div class="flex flex-wrap gap-6 -mb-px">
                        <button onclick="filterTools('all', this)"
                            class="tab-btn pb-3 text-xs font-semibold border-b-2 border-brand-primary text-brand-primary transition-all focus:outline-none cursor-pointer">
                            All Tools
                        </button>
                        @foreach ($category as $cat)
                            <button onclick="filterTools('{{ $cat->slug }}', this)"
                                class="tab-btn pb-3 text-xs font-medium border-b-2 border-transparent text-brand-muted hover:text-brand-text hover:border-slate-300 transition-all focus:outline-none cursor-pointer">
                                {{ $cat->name }}
                            </button>
                        @endforeach
                    </div>
                    <a href="{{ route('all.tool') }}"
                        class="hidden md:block tab-btn pb-3 text-xs font-medium border-b-2 border-transparent text-brand-muted hover:text-brand-text hover:border-slate-300 transition-all focus:outline-none cursor-pointer">
                        View all<i class="ti ti-arrow-narrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Tools Grid - Reusable Partial -->
            <div id="tools-grid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
                @foreach ($tools as $t)
                    <x-tool-card :tool="$t" />
                @endforeach
            </div>
            <!-- Search Empty State -->
            <div id="search-empty-state" class="hidden text-center py-12">
                <svg class="mx-auto h-12 w-12 text-slate-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="text-lg font-semibold text-brand-text mb-1 font-space">No tools matched your search</h3>
                <p class="text-slate-500 text-sm">Try typing alternative keywords like 'PDF', 'Compress' or 'Image'.</p>
            </div>
        </div>
        </div>
    </section>

    <!-- Content / SEO Section -->
    <section id="about" class="py-16 md:py-24 border-t border-brand-border bg-white relative">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-10">
                @include('partials.home')
                @include('partials.faq')
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