@php
    $faq = [
        [
            'question' => 'Is ToolsGPT really free?',
            'answer' => 'Yes. Every utility tool is completely free with no usage limits. AI tools offer a generous free tier, and a Pro plan unlocks higher-volume generation and priority inference.'
        ],
        [
            'question' => 'Do my files get uploaded to a server?',
            'answer' => 'Only when necessary. Most image, PDF, developer, security, converter and calculator tools run entirely in your browser — your data never leaves your device. AI tools that require cloud inference use encrypted, zero-retention endpoints.'
        ],
        [
            'question' => 'Do I need to create an account?',
            'answer' => 'No account is required to use any utility tool. You can start using AI tools immediately; an account is only needed to save history and sync across devices.'
        ],
        [
            'question' => 'How often are new tools added?',
            'answer' => 'We ship new tools every week, driven by community requests and advances in AI. You can vote on what we build next from the roadmap.'
        ],
    ];
@endphp
<div class="space-y-6">
    <div class="text-center max-w-xl mx-auto mb-10">
        <div
            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-brand-card mb-1 bg-indigo-50 border border-indigo-100 text-[10px] font-bold text-brand-primary uppercase select-none">
            FAQ
        </div>
        <h3 class="text-2xl font-bold text-brand-text text-gradient-premium font-space">
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