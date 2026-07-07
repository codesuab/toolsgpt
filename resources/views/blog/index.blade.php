@extends('layouts.app')

@section('title', 'Blog - Privacy-First Image & Document Utilities')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
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
                        <span class="ml-1.5 md:ml-2 text-slate-500 font-semibold">Blog</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Header -->
        <div class="mb-4">
            <h1 class="text-3xl sm:text-4xl font-space font-extrabold text-slate-900 leading-tight">ToolsGPT Blog</h1>
            <p class="text-sm text-slate-500 mt-2">Insights on browser-side file optimization, WebAssembly technology, and
                privacy-first web applications.</p>
        </div>

        <!-- Posts Stack -->
        <div class="space-y-4">
            @foreach($data as $post)
                <article class="p-6 bg-white border border-brand-border rounded transition-all">
                    <div class="flex items-center gap-2 text-xs text-slate-400 font-semibold mb-2">
                        <span>{{ $post->created_at->format('M d, Y') }}</span>
                    </div>
                    <h2 class="text-lg font-space font-bold text-slate-900 mb-2">
                        <a href="{{ route('blog.show', $post->slug) }}" class="hover:text-brand-primary transition-colors">
                            {{ $post->title}}
                        </a>
                    </h2>
                    <p class="text-slate-500 text-xs sm:text-sm leading-relaxed mb-4">
                        {{ $post->excerpt }}
                    </p>
                    <a href="{{ route('blog.show', $post->slug) }}"
                        class="inline-flex items-center text-xs font-bold text-brand-primary hover:text-brand-primary-hover transition-colors font-space">
                        Read Article
                        <svg class="h-3.5 w-3.5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </article>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $data->links() }}
        </div>
    </div>
@endsection