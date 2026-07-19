@extends('layouts.app')

@section('schema_markup')
    @include('partials.home.home-schema')
@endsection
@section('data-page', 'home')

@section('content')
    @include('partials.home.hero')

    {{-- Ai tools --}}
    @if (1 == 2)
        <section class="py-16 bg-slate-50/30 relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                {{-- header --}}
                <div class="mb-6 text-left w-full md:max-w-1/2">
                    <div
                        class="inline-flex items-center mb-1 gap-1.5 px-3 py-1 rounded-brand-card bg-indigo-50 border border-indigo-100 text-[10px] font-bold text-brand-primary uppercase select-none">
                        AI Tools
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-space font-bold text-gradient-secondary">Intelligent
                        assistants for every task</h2>
                    <p class="text-brand-muted text-sm mt-1">Write, generate, translate, refactor and create with AI that
                        understands context and produces results you can ship.</p>
                </div>
                <!-- Tools Grid - Reusable Partial -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
                    @foreach ($tools as $t)
                        <x-tool-card :tool="$t" class='ai' />
                    @endforeach
                </div>
                <!-- Search Empty State -->
                <div class="hidden text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-slate-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="text-lg font-semibold text-brand-text mb-1 font-space">No tools matched your search</h3>
                    <p class="text-slate-500 text-sm">Try typing alternative keywords like 'PDF', 'Compress' or 'Image'.</p>
                </div>

                <button class="btn-secondary gap-1 mx-auto mt-8">View all AI tools<i
                        class="ti ti-arrow-narrow-right text-lg"></i></button>
            </div>
        </section>
    @endif


    {{-- category --}}
    <div class="py-16 bg-white">
        @include('partials.home.category')
    </div>

    {{-- Utilities tools --}}
    <section id="tools-section" class="py-16 bg-slate-50/30 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- header --}}
            <div class="mb-6 text-left w-full md:max-w-1/2">
                <div
                    class="inline-flex items-center mb-1 gap-1.5 px-3 py-1 rounded-brand-card bg-indigo-50 border border-indigo-100 text-[10px] font-bold text-brand-primary uppercase select-none">
                    Utilities
                </div>
                <h2 class="text-2xl sm:text-3xl font-space font-bold text-gradient-secondary">Browser-native
                    utilities, zero friction</h2>
                <p class="text-brand-muted text-sm mt-1">Edit images, convert formats, format code and run calculations —
                    all locally in your browser, with no uploads and no waiting.</p>
            </div>

            <!-- Filter Block: Full Width Search & Category Tabs -->
            <div class="space-y-4 mb-10">
                <div class="flex items-center justify-between w-full">
                    <div class="flex justify-start flex-wrap gap-y-2 md:gap-y-4 gap-x-1 -mb-px">
                        <button data-filter="all" class="tab-btn-active tab-btn-item">
                            All Tools
                        </button>
                        @foreach ($category as $cat)
                            <button data-filter="{{ $cat['slug'] }}" class="tab-btn tab-btn-item">
                                {{ $cat['name'] }}
                            </button>
                        @endforeach
                        <a href="{{ route('all.tool') }}" class="tab-btn">
                            <div class="flex items-center">
                                <span>View all</span> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-right-dashed">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12h.5m3 0h1.5m3 0h6" />
                                    <path d="M15 16l4 -4" />
                                    <path d="M15 8l4 4" />
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Tools Grid - Reusable Partial -->
            <div id="tools-grid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
                @foreach ($tools as $t)
                    <x-tool-card :tool="$t" class='utilities' />
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
    </section>

    <!-- Content / SEO Section -->
    <section id="about" class="py-16 border-t border-brand-border relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-20">
                @include('partials.home.feature')
                @include('partials.home.testimonial')
                @include('partials.home.faq')
            </div>
        </div>
    </section>
@endsection