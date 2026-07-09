<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

class SettingController extends Controller
{
    // index
    public function index()
    {
        $projectPath = base_path();
        $command = "cd {$projectPath} && php artisan schedule:run >> /dev/null 2>&1";
        return view('admin.setting', [
            'command' => $command
        ]);
    }

    public function cacheClear()
    {
        Cache::flush();

        Artisan::call('optimize:clear');

        return back()->with('success', 'Cache cleared successfully.');
    }

    public function makeSitemap()
    {
        Artisan::call('sitemap:generate');

        return back()->with('success', 'Sitemap generated successfully.');
    }
}
