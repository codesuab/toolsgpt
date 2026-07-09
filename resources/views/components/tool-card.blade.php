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
                <span class="inline-flex items-center rounded bg-red-50 border border-red-100 px-2 py-0.5 text-[9px] font-bold text-red-600 uppercase select-none">
                    #1 Tool
                </span>
            ',

            'top_rated' => '
                <span class="inline-flex items-center rounded bg-amber-50 border border-amber-100 px-2 py-0.5 text-[9px] font-bold text-amber-600 uppercase select-none">
                    Top Rated
                </span>
            ',

            'most_used' => '
                <span class="inline-flex items-center rounded bg-blue-50 border border-blue-100 px-2 py-0.5 text-[9px] font-bold text-blue-600 uppercase select-none">
                    Most Used
                </span>
            ',

            'trending' => '
                <span class="inline-flex items-center rounded bg-emerald-50 border border-emerald-100 px-2 py-0.5 text-[9px] font-bold text-emerald-600 uppercase select-none">
                    Trending
                </span>
            ',

            'popular' => '
                <span class="inline-flex items-center rounded bg-purple-50 border border-purple-100 px-2 py-0.5 text-[9px] font-bold text-purple-600 uppercase select-none">
                    Popular
                </span>
            ',

            'featured' => '
                <span class="inline-flex items-center rounded bg-indigo-50 border border-indigo-100 px-2 py-0.5 text-[9px] font-bold text-indigo-600 uppercase select-none">
                    Featured
                </span>
            ',

            default => '
                <span class="inline-flex items-center rounded bg-slate-50 border border-slate-100 px-2 py-0.5 text-[9px] font-bold text-slate-600 uppercase select-none">
                    New
                </span>
            ',
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
    <h3 class="text-base font-bold text-slate-800 mb-1.5 transition-colors font-space tool-title">
        <a href="{{ route('tool.details', ['slug' => $tool->slug]) }}" class="focus:outline-none">
            <span class="absolute inset-0" aria-hidden="true"></span>
            {{ $tool->name }}
        </a>
    </h3>
    <p class="text-xs text-brand-muted line-clamp-2 leading-relaxed">
        {{ $tool->taq_line }}
    </p>
</div>