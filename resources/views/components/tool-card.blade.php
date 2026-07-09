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
                        <span class="inline-flex items-center rounded too-card-badge border pb-px px-2 text-[9px] font-bold uppercase select-none">
                            #1 Tool
                        </span>
                    ',

                'top_rated' => '
                        <span class="inline-flex items-center rounded too-card-badge border pb-px px-2 text-[9px] font-bold uppercase select-none">
                            Top Rated
                        </span>
                    ',

                'most_used' => '
                        <span class="inline-flex items-center rounded too-card-badge border pb-px px-2 text-[9px] font-bold uppercase select-none">
                            Most Used
                        </span>
                    ',

                'trending' => '
                        <span class="inline-flex items-center rounded too-card-badge border pb-px px-2 text-[9px] font-bold uppercase select-none">
                            Trending
                        </span>
                    ',

                'popular' => '
                        <span class="inline-flex items-center rounded too-card-badge border pb-px px-2 text-[9px] font-bold uppercase select-none">
                            Popular
                        </span>
                    ',

                'featured' => '
                        <span class="inline-flex items-center rounded too-card-badge border pb-px px-2 text-[9px] font-bold uppercase select-none">
                            Featured
                        </span>
                    ',

                'new' => '
                        <span class="inline-flex items-center rounded too-card-badge bg-indigo-50 border px-2 text-[9px] font-bold uppercase select-none">
                            New
                        </span>
                    ',

                default => '
                        <span class="inline-flex items-center tool-card-badge-none bg-slate-50 w-3 h-3 rounded-full select-none"></span>
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