@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
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
                        <span class="ml-1.5 md:ml-2 text-slate-500 font-semibold">Contact Us</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Page Title & Subtitle -->
        <div class="max-w-3xl mb-12">
            <h1 class="text-3xl sm:text-4xl font-space font-extrabold text-slate-900 leading-tight">
                We'd Love to Hear From You
            </h1>
            <p class="text-sm text-slate-500 mt-2 max-w-2xl">
                Have questions about browser-side file processing, feature ideas, or partnerships? Drop us a line. Our team
                typically replies within 24 hours.
            </p>
        </div>

        <!-- Layout Grid -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-start">

            <!-- Left Side: Info -->
            <div class="md:col-span-5 space-y-4">
                <div class="p-6 bg-white border border-brand-border rounded shadow-xs">
                    <h3 class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-4 font-space">Direct Support
                    </h3>
                    <div class="flex items-start gap-3">
                        <span class="text-lg">✉️</span>
                        <div>
                            <h4 class="font-bold text-slate-800 text-sm">Email Team</h4>
                            <p class="text-xs text-slate-400 mt-1 mb-2">Send an email to our team</p>
                            <a href="mailto:support@toolsgpt.net"
                                class="text-sm font-bold text-brand-primary hover:underline">
                                support@toolsgpt.net
                            </a>
                        </div>
                    </div>
                </div>

                <div class="p-6 bg-white border border-brand-border rounded shadow-xs">
                    <h3 class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-4 font-space">GDPR & Privacy
                    </h3>
                    <div class="flex items-start gap-3">
                        <span class="text-lg">🛡️</span>
                        <div>
                            <h4 class="font-bold text-slate-800 text-sm">Data Security</h4>
                            <p class="text-xs text-slate-400 mt-1 mb-2">Concerns regarding data security</p>
                            <a href="{{ route('privacy-policy') }}"
                                class="text-sm font-bold text-brand-primary hover:underline">
                                Read Privacy Policy
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Contact Form Card -->
            <div class="md:col-span-7 bg-white border border-brand-border p-8 rounded">
                <h3 class="text-lg font-space font-bold text-slate-800 mb-6">Send a Message</h3>
                <form action="{{ route('contact.post') }}" method="POST" class="space-y-5">
                    @csrf
                    @include('partials.alert')
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block text-xs font-bold text-slate-700 uppercase mb-1.5 font-space">
                                Full Name
                            </label>
                            <input id="name" name="name" type="text" required
                                class="appearance-none block w-full px-3.5 py-2.5 border border-brand-border rounded text-slate-900 text-sm focus:outline-none focus:border-brand-primary focus:ring-1 focus:ring-brand-primary/20 transition-all font-medium"
                                placeholder="John Doe">
                            @error('name')
                                <p class="text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-xs font-bold text-slate-700 uppercase mb-1.5 font-space">
                                Email Address
                            </label>
                            <input id="email" name="email" type="email" required
                                class="appearance-none block w-full px-3.5 py-2.5 border border-brand-border rounded text-slate-900 text-sm focus:outline-none focus:border-brand-primary focus:ring-1 focus:ring-brand-primary/20 transition-all font-medium"
                                placeholder="you@example.com">
                            @error('email')
                                <p class="text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="inquiry-type"
                            class="block text-xs font-bold text-slate-700 uppercase mb-1.5 font-space">
                            Inquiry Type
                        </label>
                        <select id="inquiry-type" name="subject"
                            class="block w-full px-3.5 py-2.5 border border-brand-border rounded text-slate-900 text-sm bg-white focus:outline-none focus:border-brand-primary focus:ring-1 focus:ring-brand-primary/20 transition-all cursor-pointer font-medium">
                            <option value="general">General Question</option>
                            <option value="bug">Bug Report / Problem</option>
                            <option value="feature">Feature Request</option>
                            <option value="partnership">Business / Partnership</option>
                        </select>
                        @error('subject')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="message" class="block text-xs font-bold text-slate-700 uppercase mb-1.5 font-space">
                            Message
                        </label>
                        <textarea id="message" name="message" rows="5" required
                            class="appearance-none block w-full px-3.5 py-2.5 border border-brand-border rounded text-slate-900 text-sm focus:outline-none focus:border-brand-primary focus:ring-1 focus:ring-brand-primary/20 transition-all font-medium"
                            placeholder="Explain how we can help you..."></textarea>
                        @error('message')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="btn-primary">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection