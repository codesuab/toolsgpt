@extends('layouts.app')

@section('title', $data->title)
@section('meta_description', $data?->meta_description)
@section('meta_keywords', $data?->meta_keywords)

@section('content')
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Breadcrumb -->
        <nav class="flex mb-4 text-xs font-medium text-slate-400 select-none" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1.5 md:space-x-2">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="hover:text-brand-primary transition-colors">Home</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="h-3 w-3 text-slate-350" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                        <a href="{{ route('blog.index') }}"
                            class="ml-1.5 md:ml-2 hover:text-brand-primary transition-colors">Blog</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="h-3 w-3 text-slate-350" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                        <span
                            class="ml-1.5 md:ml-2 text-slate-500 font-semibold truncate max-w-50">{{ $data->title }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Post Details -->
        <article>
            <!-- Header -->
            <header class="mb-4">
                <div class="flex items-center gap-2 text-xs text-slate-400 font-semibold mb-3">
                    <span>{{ $data->created_at->format('M d, Y') }}</span>
                    <span>•</span>
                    <span>{{ Illuminate\Support\Number::abbreviate($data?->views) }} Views</span>
                </div>
                <h1 class="text-3xl sm:text-4xl font-space font-extrabold text-slate-900 leading-tight">
                    {{ $data->title }}
                </h1>
            </header>

            <hr class="border-brand-border my-4" />

            <!-- Content -->
            <div class="space-y-4 text-slate-600 text-sm leading-relaxed blog-content">
                {!! $data->content !!}
            </div>

            <hr class="border-brand-border my-4" />

            <!-- Footer / Back Link -->
            <div class="flex items-center justify-between">
                <a href="{{ route('blog.index') }}"
                    class="inline-flex items-center text-xs font-bold text-brand-primary hover:text-brand-primary-hover transition-colors font-space">
                    <svg class="h-3.5 w-3.5 mr-1 rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                    Back to Blog
                </a>
            </div>
        </article>
    </div>
@endsection