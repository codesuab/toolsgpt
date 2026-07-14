@extends('layouts.app')

@section('data-page', 'home')
@section('title', 'All Online Tools - Free Image, PDF, Document & Utility Tools')
@section('meta_description', 'Access free online tools for image editing, PDF conversion, document utilities, file compression, calculators, and more. Fast, secure, and easy-to-use browser-based tools with no registration required.')
@section('meta_keywords', 'online tools, free online tools, image tools, PDF tools, document tools, file converter, image compressor, PDF converter, image editor, file compression tools, calculator tools, productivity tools, browser tools, secure online utilities, free utility tools')

@section('content')
    <!-- All Tools Header -->
    <section class="pt-12 pb-6 bg-slate-50/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-left">
            <nav class="flex mb-1 text-xs font-medium text-slate-400 select-none justify-start"
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
                            <span class="ml-1.5 md:ml-2 text-slate-500 font-semibold">All Utilities</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="w-full md:max-w-1/2">
                <h2 class="text-2xl sm:text-3xl font-space font-bold text-brand-text text-gradient-premium">Browser-native
                    utilities, zero friction</h2>
                <p class="text-brand-muted text-sm mt-1">Edit images, convert formats, format code and run calculations —
                    all locally in your browser, with no uploads and no waiting.</p>
            </div>
        </div>
    </section>

    <!-- Tools Directory Section -->
    <section class="pb-12 bg-slate-50/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
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

            <div class="mt-4">
                {{ $tools->links() }}
            </div>
        </div>
    </section>
@endsection