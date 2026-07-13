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


            // global
            $category = Cache::remember(
                'footer_category',
                now()->addHours(12),
                function () {
                    return Category::with('tools')
                        ->withCount('tools')
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

            $view->with([
                'category' => $category,
                'colOne' => $colOne,
                'colTow' => $colTow,
                'colThree' => $colThree,
                'mobileMega' => $mobileMega,
                'toolsCount' => $toolsCount
            ]);
        });
    }
}
