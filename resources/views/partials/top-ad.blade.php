@php
    $data = App\Models\TopAd::first();
@endphp

@if ($data?->status == 'show')
    <div
        class="relative bg-brand-primary/5 border-b border-brand-border px-4 py-2 text-center text-[11px] text-slate-700 z-50">
        <div class="max-w-7xl mx-auto flex items-center justify-center gap-2 flex-wrap">
            <span>{{ $data?->text }}</span>
            <a href="{{ $data?->link }}"
                class="font-bold text-brand-primary hover:text-brand-primary-hover hover:underline inline-flex items-center gap-0.5 transition-colors">
                {{ $data?->link_label }}
                <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
    </div>
@endif