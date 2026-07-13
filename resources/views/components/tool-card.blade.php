@php
    if (!function_exists('hexToRgb')) {
        function hexToRgb(string $hex, float $opacity = null): string
        {
            $hex = ltrim($hex, '#');

            if (strlen($hex) === 3) {
                $hex = preg_replace('/(.)/', '$1$1', $hex);
            }

            if (strlen($hex) !== 6) {
                return $opacity !== null ? 'rgba(0,0,0,' . $opacity . ')' : 'rgb(0,0,0)';
            }

            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));

            return $opacity !== null
                ? "rgba($r, $g, $b, $opacity)"
                : "rgb($r, $g, $b)";
        }
    }

    if (!function_exists('toolBadge')) {
        function toolBadge(?string $badge): string
        {
            return match ($badge) {
                'number_one' => '
                                    <span class="inline-flex items-center rounded border pb-px px-2 text-[9px] font-bold uppercase select-none">
                                        #1 Tool
                                    </span>
                                ',

                'top_rated' => '
                                    <span class="inline-flex items-center rounded border pb-px px-2 text-[9px] font-bold uppercase select-none">
                                        Top Rated
                                    </span>
                                ',

                'most_used' => '
                                    <span class="inline-flex items-center rounded border pb-px px-2 text-[9px] font-bold uppercase select-none">
                                        Most Used
                                    </span>
                                ',

                'trending' => '
                                    <span class="inline-flex items-center rounded border pb-px px-2 text-[9px] font-bold gap-1 uppercase select-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="h-2.5 w-2.5 mt-[0.4px]"><path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"></path></svg> Trending
                                    </span>
                                ',

                'popular' => '
                                    <span class="inline-flex items-center rounded border pb-px px-2 text-[9px] font-bold uppercase select-none gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="h-2.5 w-2.5 mt-[0.4px]"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg> Popular
                                    </span>
                                ',

                'featured' => '
                                    <span class="inline-flex items-center rounded border pb-px px-2 text-[9px] font-bold uppercase select-none">
                                        Featured
                                    </span>
                                ',

                'new' => '
                                    <span class="inline-flex items-center rounded bg-indigo-50 border px-2 text-[9px] font-bold uppercase select-none gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="h-2.5 w-2.5 mt-[0.4px]"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"></path><path d="M5 3v4"></path><path d="M19 17v4"></path><path d="M3 5h4"></path><path d="M17 19h4"></path></svg> New
                                    </span>
                                ',

                default => '',
            };
        }
    }
@endphp

<div class="tool-card relative rounded-brand-card border border-slate-200/60 bg-brand-card p-6 transition-all duration-305"
    data-categories="{{ $tool?->cat_slug }}" style="
        --tool-color: {{ $tool->color }};
        --tool-bg: {{ hexToRgb($tool->color, 0.06) }};
        --tool-border: {{ hexToRgb($tool->color, 0.2) }};
        --tool-glow: {{ hexToRgb($tool->color, 0.18) }};
    ">
    <div class="flex items-start justify-between gap-4 mb-4">
        <div
            class="h-10 w-10 rounded-brand-btn flex items-center justify-center group-hover:text-white transition-all duration-305 tool-icon">
            {!! $tool->icon !!}
        </div>
        {!! toolBadge($tool?->badge) !!}
    </div>
    <p class="text-xs text-brand-muted line-clamp-2 leading-relaxed">
        {{ $tool?->category?->name }}
    </p>
    <h3 class="text-base font-bold text-slate-800 mb-1.5 transition-colors font-space tool-title">
        <a href="{{ route('tool.details', ['slug' => $tool->slug]) }}" class="focus:outline-none">
            <span class="absolute inset-0 h-[75%]" aria-hidden="true"></span>
            {{ $tool->name }}
        </a>
    </h3>
    <p class="text-xs text-brand-muted line-clamp-2 leading-relaxed">
        {{ $tool->taq_line }}
    </p>
    <div class="flex items-center justify-between border-t border-brand-border mt-3 pt-3">
        <a href="{{ route('tool.details', ['slug' => $tool->slug]) }}"
            class="flex items-center gap-1 text-xs text-brand-muted font-bold tool-lunch-btn duration-300">
            <span>Lunch</span> <i class="ti ti-arrow-up-right tool-lunch-icon"></i>
        </a>

        <button class="btn flex items-center justify-center cursor-pointer text-[#cbd5e1]">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                class="">
                {{-- fill-brand-primary --}}
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M18 7v14l-6 -4l-6 4v-14a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4" />
            </svg>
        </button>
    </div>
</div>