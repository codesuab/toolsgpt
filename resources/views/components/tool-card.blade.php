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
                        <span class="inline-flex items-center rounded border border-amber-500 text-amber-600 bg-amber-50 pb-px px-2 text-[9px] font-bold uppercase select-none">
                            #1 Tool
                        </span>
                    ',

                'top_rated' => '
                        <span class="inline-flex items-center rounded border border-emerald-500 text-emerald-600 bg-emerald-50 pb-px px-2 text-[9px] font-bold uppercase select-none">
                            Top Rated
                        </span>
                    ',

                'most_used' => '
                        <span class="inline-flex items-center rounded border border-blue-500 text-blue-600 bg-blue-50 pb-px px-2 text-[9px] font-bold uppercase select-none">
                            Most Used
                        </span>
                    ',

                'trending' => '
                        <span class="inline-flex items-center rounded border border-orange-500 text-orange-600 bg-orange-50 pb-px px-2 text-[9px] font-bold gap-1 uppercase select-none">
                            🔥 Trending
                        </span>
                    ',

                'popular' => '
                        <span class="inline-flex items-center rounded border border-yellow-500 text-yellow-600 bg-yellow-50 pb-px px-2 text-[9px] font-bold uppercase select-none gap-1">
                            ⭐ Popular
                        </span>
                    ',

                'featured' => '
                        <span class="inline-flex items-center rounded border border-purple-500 text-purple-600 bg-purple-50 pb-px px-2 text-[9px] font-bold uppercase select-none">
                            Featured
                        </span>
                    ',

                'new' => '
                        <span class="inline-flex items-center rounded border border-indigo-500 text-indigo-600 bg-indigo-50 pb-px px-2 text-[9px] font-bold uppercase select-none gap-1">
                            ✨ New
                        </span>
                    ',

                default => '',
            };
        }
    }
@endphp

<div class="tool-card {{ $class }} relative rounded-brand-card border border-slate-200/60 bg-brand-card p-6 transition-all duration-305"
    data-categories="{{ $tool?->category?->slug }}" style="
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

        <button
            class="btn flex items-center justify-center cursor-pointer text-brand-footer-text duration-300 stroke-brand-footer-text fill-transparent hover:fill-brand-primary hover:stroke-brand-primary stroke-2 hover:stroke-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" stroke="currentColor"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M18 7v14l-6 -4l-6 4v-14a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4" />
            </svg>
        </button>
    </div>
</div>