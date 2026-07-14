<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Footer;
use App\Models\MegaMenu;
use App\Models\Tool;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // pass data in view
        View::composer('*', function ($view) {
            // navbar
            $megaMenus = Cache::remember(
                'header_mega_menus',
                now()->addHours(12),
                function () {
                    return MegaMenu::where('status', 'active')
                        ->with('tool.category')
                        ->get()
                        ->toArray();
                }
            );
            $colOne = collect($megaMenus)
                ->where('col', 'one')
                ->values()
                ->toArray();

            $colTow = collect($megaMenus)
                ->where('col', 'tow')
                ->values()
                ->toArray();

            $colThree = collect($megaMenus)
                ->where('col', 'three')
                ->values()
                ->toArray();

            $mobileMega = $megaMenus;


            // footer
            $footerMenus = Cache::remember(
                'footer_menus',
                now()->addHours(12),
                function () {
                    return Footer::where('status', 'active')
                        ->with('tool')
                        ->get()
                        ->toArray();
                }
            );
            $footerColOne = collect($footerMenus)
                ->where('col', 'one')
                ->values()
                ->toArray();

            $footerColTow = collect($footerMenus)
                ->where('col', 'tow')
                ->values()
                ->toArray();

            $footerColThree = collect($footerMenus)
                ->where('col', 'three')
                ->values()
                ->toArray();


            // global
            $category = Cache::remember(
                'footer_category',
                now()->addHours(12),
                function () {
                    return Category::withCount('tools')
                        ->orderByRaw("CASE WHEN slug = 'ai' THEN 0 ELSE 1 END")
                        ->orderBy('name')
                        ->get()
                        ->toArray();
                }
            );
            $toolsCount = Cache::remember(
                'tools_count',
                now()->addHours(12),
                function () {
                    return Tool::where('status', 'active')->count();
                }
            );


            // model search data
            $modelTrendingTools = Cache::remember(
                'model_trending_tools',
                now()->addHours(6),
                function () {
                    return Tool::where('status', 'active')
                        ->where('updated_at', '>=', now()->subDays(7))
                        ->orderByDesc('usages')
                        ->take(8)
                        ->get()
                        ->toArray();
                }
            );
            $modelPopularTools = Cache::remember(
                'model_popular_tools',
                now()->addHours(12),
                function () {
                    return Tool::where('status', 'active')
                        ->orderByDesc('usages')
                        ->take(8)
                        ->get()
                        ->toArray();
                }
            );
            $modelAllTools = Cache::remember(
                'model_all_tools',
                now()->addHours(12),
                function () {
                    return Tool::where('status', 'active')
                        ->orderByDesc('usages')
                        ->get([
                            'name',
                            'taq_line',
                            'icon',
                            'color',
                            'badge',
                            'slug'
                        ])
                        ->toArray();
                }
            );

            $view->with([
                'category' => $category,
                'toolsCount' => $toolsCount,
                'modelSearch' => [
                    'modelTrendingTools' => $modelTrendingTools,
                    'modelPopularTools' => $modelPopularTools,
                    'modelAllTools' => $modelAllTools
                ],
                'megaMenu' => [
                    'one' => $colOne,
                    'tow' => $colTow,
                    'three' => $colThree,
                    'mobileMega' => $mobileMega
                ],
                'footer' => [
                    'one' => $footerColOne,
                    'tow' => $footerColTow,
                    'three' => $footerColThree
                ]
            ]);
        });
    }
}
