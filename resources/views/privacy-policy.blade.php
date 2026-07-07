@extends('layouts.app')

@section('title', 'Privacy Policy')

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
                        <span class="ml-1.5 md:ml-2 text-slate-500 font-semibold">Privacy Policy</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Content Header -->
        <h1 class="text-3xl sm:text-4xl font-space font-extrabold text-slate-900 mb-2">Privacy Policy</h1>
        <p class="text-xs text-slate-400 mb-4 font-medium">Last updated: {{ $data->created_at->format('M d, Y') }}</p>

        <div class="space-y-4 text-slate-600 text-sm leading-relaxed">
            {!! $data->content !!}
        </div>
    </div>
@endsection