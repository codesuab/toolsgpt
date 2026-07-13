@extends('layouts.app')

@section('data-page'){{ $data->slug }}@endsection

@section('title')
    {{ $data?->meta_title}}
@endsection
@section('meta_keywords')
    {{ $data?->meta_keyword }}
@endsection
@section('meta_description')
    {{ $data?->meta_description}}
@endsection

@section('schema_markup')
    <script type="application/ld+json">
                                                                                                                                                                                                                                                                                                                {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'SoftwareApplication',
        'name' => config('app.name') . ' ' . $data->name,
        'operatingSystem' => 'All',
        'applicationCategory' => 'MultimediaApplication',
        'browserRequirements' => 'Requires HTML5, WebAssembly, and JavaScript support.',
        'offers' => [
            '@type' => 'Offer',
            'price' => '0.00',
            'priceCurrency' => 'USD',
        ],
        'description' => $data->meta_description ?? $data->taq_line,
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
                                                                                                                                                                                                                                                                                                                </script>

    @if($data->faq)
        <script type="application/ld+json">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                {!! json_encode([
                '@context' => 'https://schema.org',
                '@type' => 'FAQPage',
                'mainEntity' => collect($data->faq)->map(function ($faq) {
                    return [
                        '@type' => 'Question',
                        'name' => $faq['question'],
                        'acceptedAnswer' => [
                            '@type' => 'Answer',
                            'text' => $faq['answer'],
                        ],
                    ];
                })->values(),
            ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </script>
    @endif
@endsection

@section('content')
    <!-- Breadcrumbs & Tool Header -->
    <div class="relative pb-12 pt-10 md:pt-12 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Breadcrumbs -->
            <nav class="flex mb-4 text-xs text-brand-muted" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home') }}" class="hover:text-brand-text transition-colors">Home</a>
                    </li>
                    <li>
                        <div class="flex items-center gap-1.5">
                            <svg class="h-3 w-3 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                            <a href="{{ route('all.tool') }}" class="hover:text-brand-text transition-colors">All
                                Utilities</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center gap-1.5">
                            <svg class="h-3 w-3 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                            <a href="{{ route('all.tool', ['cat' => $data?->category?->id]) }}"
                                class="hover:text-brand-text transition-colors">{{ $data->category->name }}</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center gap-1.5">
                            <svg class="h-3 w-3 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                            <span class="text-slate-600 font-medium">{{ $data->name }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Tool Header Info -->
            <div class="max-w-3xl">
                <h1 class="text-3xl sm:text-4xl font-space font-extrabold text-brand-text mb-3 text-gradient-premium">
                    {{ $data->title }}
                </h1>
                <p class="text-sm sm:text-base text-brand-muted leading-relaxed">
                    {{ $data->short_title }}
                </p>
            </div>
        </div>
    </div>

    <!-- Compression Workspace Section -->
    <section class="pb-16 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            @include($include)
        </div>
    </section>

    <!-- SEO Content Guide Section -->
    <section class="pt-16 border-t border-brand-border bg-slate-50/50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="prose max-w-none space-y-12">
                <div class="space-y-3" id="markdown">
                    {!! $data->content !!}
                </div>

                <!-- FAQs Block -->
                <div class="space-y-6 pt-8 border-t border-brand-border">
                    <div class="mb-4">
                        <h2 class="text-2xl font-space font-bold text-brand-text text-gradient-premium">
                            Frequently Asked Questions</h2>
                        <p class="text-sm text-brand-text mt-1">Find answers to the most
                            common
                            questions about this tool, how it
                            works, and what to expect.</p>
                    </div>

                    <div class="flex flex-col gap-1">
                        @foreach ($data->faq as $a)
                            <div
                                class="faq-card group rounded-brand-card border border-slate-200/60 bg-brand-card transition-all duration-300 hover:border-brand-primary/20 hover:shadow-[0_8px_30px_rgba(99,102,241,0.02)]">
                                <button
                                    class="faq-trigger w-full flex items-center justify-between p-4.5 focus:outline-none select-none text-left">
                                    <h4
                                        class="font-semibold text-slate-800 group-hover:text-brand-primary transition-colors font-space text-sm">
                                        {{ $a['question'] }}
                                    </h4>
                                    <span
                                        class="faq-chevron relative h-5 w-5 shrink-0 flex items-center justify-center text-slate-400 group-hover:text-brand-primary transition-colors duration-300">
                                        <svg class="h-4 w-4 transform transition-transform duration-300" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </span>
                                </button>
                                <div class="faq-content grid grid-rows-[0fr] transition-all duration-300 ease-in-out overflow-hidden"
                                    style="grid-template-rows: 0fr;">
                                    <div class="min-h-0">
                                        <p class="px-4.5 pb-4.5 text-xs leading-relaxed text-brand-muted">
                                            {{ $a['answer'] }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </section>

    <section class="py-10">
        <div class="mx-auto max-w-3xl px-4 text-center">
            <div class="inline-flex items-center gap-3 rounded-brand-card border border-gray-200 bg-white px-5 py-2">
                <p class="text-sm text-gray-600">
                    Trusted since <span class="font-semibold text-brand-text pl-1">2026 - {{ now()->year }}</span>
                </p>
            </div>

            <h3 class="mt-3 text-3xl font-bold tracking-tight text-gray-900">
                <span id="toolUsagesCountView">{{ number_format($data->usages) }}</span>+ Tools Usages
                <span class="text-gray-400">—</span>
                <span class="text-gray-500">and counting</span>
            </h3>

            <p class="mt-3 text-sm text-gray-500">
                Fast, secure, and private tools trusted by users worldwide.
            </p>
        </div>
    </section>
@endsection