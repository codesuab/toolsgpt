@php
    $faq = [
        [
            'question' => 'What are online image tools?',
            'answer' => 'Online image tools help you compress, resize, convert, and optimize images directly in your browser. These tools make images smaller, faster, and ready for websites, social media, and online platforms.'
        ],
        [
            'question' => 'Are these image tools free to use?',
            'answer' => 'Yes, all tools are free to use with no registration or subscription required. You can optimize your images instantly without any hidden charges.'
        ],
        [
            'question' => 'Are my images uploaded to a server?',
            'answer' => 'No. Our image tools process files directly in your browser. Your images stay on your device, ensuring better privacy and security.'
        ],
        [
            'question' => 'Which image formats are supported?',
            'answer' => 'Our tools support popular image formats including JPG, JPEG, PNG, and WebP for compression, conversion, and optimization.'
        ],
        [
            'question' => 'Can I use these tools on mobile devices?',
            'answer' => 'Yes, our browser-based image tools work on smartphones, tablets, and desktop devices without installing any application.'
        ],
        [
            'question' => 'Do I need to create an account to use the tools?',
            'answer' => 'No account is required. You can access and use all available tools instantly from your browser.'
        ],
        [
            'question' => 'How can image compression improve website performance?',
            'answer' => 'Compressed images reduce file size, improve page loading speed, save bandwidth, and help create a better user experience and SEO performance.'
        ],
        [
            'question' => 'Can I process multiple images at once?',
            'answer' => 'Yes, selected tools support batch processing, allowing you to optimize multiple images quickly and efficiently.'
        ]
    ];
@endphp
<div class="space-y-6">
    <div class="text-center max-w-xl mx-auto mb-6">
        <h3 class="text-2xl font-bold text-brand-text text-gradient-premium font-space">
            Frequently Asked Questions
        </h3>
        <p class="text-brand-muted text-xs mt-1">
            Find answers to common questions about security, speed, and limits.
        </p>
    </div>

    <div class="flex flex-col gap-2.5 max-w-3xl mx-auto">
        @foreach ($faq as $f)
            <div
                class="faq-card group rounded-brand-card border border-slate-200/60 bg-brand-card transition-all duration-300 hover:border-brand-primary/20 hover:shadow-[0_8px_30px_rgba(99,102,241,0.02)]">
                <button
                    class="faq-trigger w-full flex items-center justify-between p-4.5 focus:outline-none select-none text-left">
                    <h4
                        class="font-semibold text-slate-800 group-hover:text-brand-primary transition-colors font-space text-sm">
                        {{ $f['question'] }}
                    </h4>
                    <span
                        class="faq-chevron relative h-5 w-5 shrink-0 flex items-center justify-center text-slate-400 group-hover:text-brand-primary transition-colors duration-300">
                        <svg class="h-4 w-4 transform transition-transform duration-300" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </span>
                </button>
                <div class="faq-content grid grid-rows-[0fr] transition-all duration-300 ease-in-out overflow-hidden"
                    style="grid-template-rows: 0fr;">
                    <div class="min-h-0">
                        <p class="px-4.5 pb-4.5 text-xs leading-relaxed text-brand-muted">{{ $f['answer'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>