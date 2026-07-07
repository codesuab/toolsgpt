@extends('layouts.app')

@section('title', 'About Us')

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
                        <span class="ml-1.5 md:ml-2 text-slate-500 font-semibold">About Us</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Content Header -->
        <h1 class="text-3xl sm:text-4xl font-space font-extrabold text-slate-900 mb-4">About ToolsGPT</h1>

        <div class="space-y-4 text-slate-600 text-sm leading-relaxed">
            <p class="text-base text-slate-700 font-medium">
                {{ $data?->short }}
            </p>

            <hr class="border-slate-200 my-4" />

            {!! $data?->content !!}
        </div>
    </div>
@endsection