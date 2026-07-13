@php
    $faq = [
        [
            'question' => 'Is ToolsGPT really free?',
            'answer' => 'Yes. ToolsGPT provides free online tools with no usage limits for everyday tasks. AI tools include a generous free tier, while premium features may be available for advanced usage.'
        ],
        [
            'question' => 'Do my files get uploaded to a server?',
            'answer' => 'Most tools process your files directly in your browser. Your images, PDFs, and documents stay on your device. Tools that require AI cloud processing use secure encrypted connections.'
        ],
        [
            'question' => 'Do I need to create an account?',
            'answer' => 'No account is required to use most ToolsGPT utilities. You can access AI tools, image tools, file converters, and productivity tools instantly without registration.'
        ],
        [
            'question' => 'What kind of tools does ToolsGPT provide?',
            'answer' => 'ToolsGPT offers AI tools, image utilities, PDF tools, file converters, developer tools, text tools, calculators, and productivity solutions in one platform.'
        ],
        [
            'question' => 'Are ToolsGPT tools safe to use?',
            'answer' => 'Yes. ToolsGPT focuses on privacy and security. Browser-based tools process data locally whenever possible, reducing the need to upload your files.'
        ],
        [
            'question' => 'Can I use ToolsGPT on mobile devices?',
            'answer' => 'Yes. ToolsGPT is optimized for desktop, tablet, and mobile browsers, allowing you to use online tools from any device.'
        ],
        [
            'question' => 'How often are new tools added?',
            'answer' => 'New AI tools and online utilities are added regularly based on user needs, technology updates, and community feedback.'
        ],
        [
            'question' => 'Do ToolsGPT tools require installation?',
            'answer' => 'No. All ToolsGPT utilities work directly in your browser without installing additional software or extensions.'
        ],
    ];
@endphp
<div class="space-y-6">
    <div class="text-center max-w-xl mx-auto mb-10">
        <div
            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-brand-card mb-1 bg-indigo-50 border border-indigo-100 text-[10px] font-bold text-brand-primary uppercase select-none">
            FAQ
        </div>
        <h3 class="text-2xl font-bold text-gradient-secondary font-space">
            Frequently Asked Questions
        </h3>
        <p class="text-brand-muted text-xs mt-1">
            Find answers to common questions about security, speed, and limits.
        </p>
    </div>

    <div class="flex flex-col gap-1 max-w-3xl mx-auto">
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