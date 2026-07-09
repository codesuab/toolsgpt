<?php

namespace App\Providers;

use App\Models\Category;
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
            // footer ========
            $popularTools = Cache::remember(
                'footer_popular_tools',
                now()->addHours(12),
                function () {
                    return Tool::where('status', 'active')
                        ->whereIn('badge', [
                            'popular',
                            '#1 tool',
                            'trending'
                        ])
                        ->limit(10)
                        ->get()
                        ->toArray();
                }
            );
            $convertingTools = Cache::remember(
                'footer_converting_tools',
                now()->addHours(12),
                function () {
                    return Tool::where('status', 'active')
                        ->whereIn('category_id', ['2', '6'])
                        ->limit(10)
                        ->get()
                        ->toArray();
                }
            );
            $featuresTools = Cache::remember(
                'footer_features_tools',
                now()->addHours(12),
                function () {
                    return Tool::where('status', 'active')
                        ->whereIn('badge', ['featured', 'new'])
                        ->limit(10)
                        ->get()
                        ->toArray();
                }
            );

            // navbar
            $colOne = Cache::remember(
                'header_mega_menu_colone',
                now()->addHours(12),
                function () {
                    return MegaMenu::where('col', 'one')
                        ->where('status', 'active')
                        ->with('tool.category')->get()
                        ->toArray();
                }
            );
            $colTow = Cache::remember(
                'header_mega_menu_coltow',
                now()->addHours(12),
                function () {
                    return MegaMenu::where('col', 'tow')
                        ->where('status', 'active')
                        ->with('tool.category')->get()
                        ->toArray();
                }
            );
            $colThree = Cache::remember(
                'header_mega_menu_colThree',
                now()->addHours(12),
                function () {
                    return MegaMenu::where('col', 'three')
                        ->where('status', 'active')
                        ->with('tool.category')->get()
                        ->toArray();
                }
            );
            $mobileMega = Cache::remember(
                'header_mega_mobileMega',
                now()->addHours(12),
                function () {
                    return MegaMenu::where('status', 'active')
                        ->with('tool.category')->get()
                        ->toArray();
                }
            );


            // global
            $category = Cache::remember(
                'footer_category',
                now()->addHours(12),
                function () {
                    return Category::get()
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

            $view->with([
                'popularTools' => $popularTools,
                'convertingTools' => $convertingTools,
                'featuresTools' => $featuresTools,
                'category' => $category,
                'colOne'=>$colOne,
                'colTow'=>$colTow,
                'colThree'=>$colThree,
                'mobileMega'=>$mobileMega,
                'toolsCount'=>$toolsCount
            ]);
        });
    }
}
