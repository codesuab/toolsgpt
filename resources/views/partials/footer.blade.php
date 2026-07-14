@php
    $popularTools = [
        [
            'name' => 'PDF Split',
            'slug' => 'pdf-split'
        ],
        [
            'name' => 'PDF Merger',
            'slug' => 'pdf-merge'
        ],
        [
            'name' => 'QR Code Generator',
            'slug' => 'qr-code-generator'
        ],
        [
            'name' => 'PDF Compressor',
            'slug' => 'pdf-compressor'
        ],
        [
            'name' => 'Crop Images',
            'slug' => 'crop-images'
        ],
    ];
    $convertingTools = [
        [
            'name' => 'PNG to JPG',
            'slug' => 'png-to-jpg'
        ],
        [
            'name' => 'JPG to PNG',
            'slug' => 'jpg-to-png'
        ],
        [
            'name' => 'Compress Image',
            'slug' => 'compress-image'
        ],
        [
            'name' => 'Age Calculator',
            'slug' => 'age-calculator'
        ],
        [
            'name' => 'Word Counter',
            'slug' => 'word-counter'
        ],
    ];
    $featuresTools = [
        [
            'name' => 'Password Generator',
            'slug' => 'password-generator'
        ],
        [
            'name' => 'JSON Formatter',
            'slug' => 'json-formatter'
        ],
        [
            'name' => 'Base64 Encoder',
            'slug' => 'base64-encoder'
        ],
        [
            'name' => 'Base64 Decode',
            'slug' => 'base64-decode'
        ],
        [
            'name' => 'Meta Tag Generator',
            'slug' => 'meta-tag-generator'
        ],
    ];
@endphp

<footer class="border-t border-brand-footer-border bg-brand-footer relative overflow-hidden text-brand-footer-text">
    <!-- Ambient bottom dark purple glow -->
    <div
        class="absolute bottom-0 left-[20%] w-[35vw] h-[35vw] rounded-full bg-purple-950/15 blur-[120px] pointer-events-none z-0">
    </div>

    {{-- cta --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="space-y-2">
                <h2 class="mt-2 text-3xl font-semibold leading-tight tracking-tight text-white md:leading-[1.1]">
                    Your intelligent workspace<br class="hidden sm:block">
                    <span class="bg-linear-to-r from-white to-brand-primary bg-clip-text text-transparent"> is
                        one
                        click
                        away.</span>
                </h2>
                <p class="text-xs text-white/80 font-light">Join 1.8M+ creators and developers who replaced a dozen
                    tools
                    with one calm, beautiful workspace.</p>
            </div>
            <div class="flex items-center md:justify-end gap-3">
                <a href="" class="btn-primary">Explore all tools</a>
                <a href="" class="btn-secondary">Try AI tools</a>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 lg:pt-20 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-8 lg:gap-12">
            <!-- Branding and Description (Column 1) -->
            <div class="col-span-1 md:col-span-1 space-y-4">
                <a href="{{ route('home') }}" class="flex items-center gap-2.5 group">
                    <span class="font-bold text-lg text-white font-space">
                        ToolsGPT.
                    </span>
                </a>
                <p class="text-brand-footer-text text-xs leading-relaxed text-left">
                    Everything you need, in one intelligent workspace. AI tools, utilities and {{ number_format($toolsCount) }}+ browser-based tools
                    — beautifully unified.
                </p>
            </div>

            <!-- Column 2: Popular Tools -->
            <div>
                <h3 class="text-xs font-bold text-white uppercase mb-4.5 font-space">Ai Tools</h3>
                <ul class="space-y-2 text-sm text-left">
                    @foreach ($footer['one'] as $pt)
                        <li>
                            <a href="{{ route('tool.details', ['slug' => $pt['tool']['slug']]) }}"
                                class="text-brand-footer-text/70 hover:text-white transition-colors">{{ $pt['tool']['name'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Column 3: Converters -->
            <div>
                <h3 class="text-xs font-bold text-white uppercase mb-4.5 font-space">Popular Tools</h3>
                <ul class="space-y-2 text-sm text-left">
                    @foreach ($footer['tow'] as $pt)
                        <li>
                            <a href="{{ route('tool.details', ['slug' => $pt['tool']['slug']]) }}"
                                class="text-brand-footer-text/70 hover:text-white transition-colors">{{ $pt['tool']['name'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Column 5: Company -->
            <div>
                <h3 class="text-xs font-bold text-white uppercase mb-4.5 font-space">Trending Tools</h3>
                <ul class="space-y-2 text-sm text-left">
                   @foreach ($footer['three'] as $pt)
                        <li>
                            <a href="{{ route('tool.details', ['slug' => $pt['tool']['slug']]) }}"
                                class="text-brand-footer-text/70 hover:text-white transition-colors">{{ $pt['tool']['name'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Column 4: Learn -->
            <div>
                <h3 class="text-xs font-bold text-white uppercase mb-4.5 font-space">category</h3>
                <ul class="space-y-2 text-sm text-left">
                    @foreach ($category as $cat)
                        <li>
                            <a href="{{ route('all.tool', ['cat' => $cat['id']]) }}"
                                class="text-brand-footer-text/70 hover:text-white transition-colors">{{ $cat['name'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Additional Links Row -->
        <div
            class="border-t border-brand-footer-border mt-12 pt-8 flex justify-center md:justify-start flex-wrap gap-x-6 gap-y-2 text-xs text-brand-footer-text/75 font-space">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
            <a href="{{ route('all.tool') }}" class="hover:text-white transition-colors">Ai Tools</a>
            <a href="{{ route('all.tool') }}" class="hover:text-white transition-colors">All Utilities</a>
            <a href="{{ route('blog.index') }}" class="hover:text-white transition-colors">Blog</a>
            <a href="{{ route('about') }}" class="hover:text-white transition-colors">About Us</a>
            <a href="{{ route('contact') }}" class="hover:text-white transition-colors">Contact Us</a>
            <a href="{{ route('privacy-policy') }}" class="hover:text-white transition-colors">Privacy Policy</a>
            <a href="{{ route('terms-of-service') }}" class="hover:text-white transition-colors">Terms of Service</a>
            <a href="/sitemap.xml" class="hover:text-white transition-colors">Sitemap</a>
        </div>

        <!-- Bottom Copyright Bar -->
        <div
            class="py-8 flex flex-col md:flex-row items-center justify-between text-xs text-brand-footer-muted font-medium font-space space-y-2">
            <div>
                &copy; {{ now()->year }} {{ config('app.name') }}. All rights reserved.
            </div>
            <div class="flex items-center gap-1">
                Made by <span class="text-red-500">♥</span> <a href="https://codesuab.com" target="_blank"
                    class="text-brand-footer-text hover:text-white transition-colors">codesuab.com</a>
            </div>
        </div>
    </div>
</footer>