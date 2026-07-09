@extends('layouts.app')

@section('title', 'All Tools - Secure Online Document & Image Utilities')
@section('meta_description', 'Search and filter all of our client-side tools. Convert, compress, crop, and edit documents and images locally and securely.')

@section('content')
    <!-- All Tools Header -->
    <section class="pt-12 pb-6 bg-slate-50/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center sm:text-left">
            <nav class="flex mb-4 text-xs font-medium text-slate-400 select-none justify-center sm:justify-start"
                aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1.5 md:space-x-2">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home') }}" class="hover:text-brand-primary transition-colors">Home</a>
                    </li>
                    @if ($filter)
                        <li>
                            <div class="flex items-center gap-1.5">
                                <svg class="h-3 w-3 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                                <a href="javascript::void(0);"
                                    class="hover:text-brand-text transition-colors">{{ $filter?->name }}</a>
                            </div>
                        </li>
                    @endif
                    <li>
                        <div class="flex items-center">
                            <svg class="h-3 w-3 text-slate-350" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                            <span class="ml-1.5 md:ml-2 text-slate-500 font-semibold">All Tools</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h1 class="text-3xl sm:text-4xl font-space font-extrabold text-slate-900 mb-2">
                All @if ($filter) {{ $filter?->name }} @else Online @endif Utilities
            </h1>
            <p class="text-xs sm:text-sm text-slate-550 max-w-2xl">
                Explore our full suite of fast, serverless tools. None of your data is uploaded; all processing runs locally
                inside your browser sandbox.
            </p>
        </div>
    </section>

    <!-- Tools Directory Section -->
    <section class="pb-12 bg-slate-50/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Filter Block: Full Width Search & Category Tabs -->
            <div class="space-y-5 mb-8">
                <!-- Search Box -->
                <div class="w-full relative group">
                    <div
                        class="absolute -inset-0.5 rounded-brand-btn bg-linear-to-r from-brand-primary/20 to-brand-secondary/20 opacity-10 blur group-focus-within:opacity-25 transition-all duration-300">
                    </div>
                    <div
                        class="relative flex items-center bg-brand-card border border-brand-border rounded-brand-btn px-4 py-3 focus-within:border-brand-primary focus-within:ring-1 focus-within:ring-brand-primary/25 transition-colors">
                        <div class="text-slate-400 mr-3 shrink-0">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input type="search" id="tool-search"
                            placeholder="Search {{ $toolsCount }}+ free tools (e.g. compress image, SVG to PNG...)"
                            class="w-full bg-transparent border-0 p-0 text-sm text-brand-text placeholder-slate-400 focus:outline-none focus:ring-0">
                    </div>
                </div>

                <!-- Category Tabs Underline Row -->
                <div class="flex border-b border-slate-200 w-full mb-6">
                    <div class="flex flex-wrap gap-4 -mb-px">
                        <button onclick="filterTools('all', this)"
                            class="tab-btn pb-3 text-xs font-semibold border-b-2 border-brand-primary text-brand-primary transition-all focus:outline-none cursor-pointer">
                            All Tools
                        </button>
                        @if ($filter)
                            <a href="{{ route('all.tool') }}"
                                class="tab-btn pb-3 text-xs font-medium border-b-2 border-transparent text-red-500 hover:border-slate-300 transition-all focus:outline-none cursor-pointer">
                                Clear Filter( {{ $filter?->name }} )
                            </a>
                        @else
                            @foreach ($category as $cat)
                                <button onclick="filterTools('{{ $cat['slug'] }}', this)"
                                    class="tab-btn pb-3 text-xs font-medium border-b-2 border-transparent text-brand-muted hover:text-brand-text hover:border-slate-300 transition-all focus:outline-none cursor-pointer">
                                    {{ $cat['name'] }}
                                </button>
                            @endforeach
                        @endif
                    </div>
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

            <div class="mt-4">
                {{ $tools->links() }}
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        // Combined live search and category filter
        const searchInput = document.getElementById('tool-search');
        if (searchInput) {
            searchInput.addEventListener('input', applySearchAndFilter);
        }

        function filterTools(category, element) {
            const buttons = document.querySelectorAll('.tab-btn');
            buttons.forEach(btn => {
                btn.classList.remove('border-brand-primary', 'text-brand-primary', 'font-semibold');
                btn.classList.add('border-transparent', 'text-brand-muted', 'hover:text-brand-text', 'font-medium');
            });

            element.classList.remove('border-transparent', 'text-brand-muted', 'hover:text-brand-text', 'font-medium');
            element.classList.add('border-brand-primary', 'text-brand-primary', 'font-semibold');

            applySearchAndFilter();
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

                    if (wasHidden) {
                        card.classList.remove('animate-filter-in');
                        void card.offsetWidth;
                        card.classList.add('animate-filter-in');
                    }

                    matchCount++;
                } else {
                    card.classList.add('hidden');
                    card.classList.remove('animate-filter-in');
                }
            });

            const emptyState = document.getElementById('search-empty-state');
            if (emptyState) {
                if (matchCount === 0) {
                    emptyState.classList.remove('hidden');
                } else {
                    emptyState.classList.add('hidden');
                }
            }
        }
    </script>
@endsection