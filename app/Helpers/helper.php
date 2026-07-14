<?php
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
