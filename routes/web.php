<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InboxController;
use App\Http\Controllers\Admin\MegaMenuController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ToolsController;
use App\Http\Controllers\Admin\TopAdController;
use App\Http\Controllers\UiController;
use Illuminate\Support\Facades\Route;


// ui 
Route::controller(UiController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/all-tools', 'allTool')->name('all.tool');
    Route::get('/about', 'about')->name('about');

    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact', 'contactRequest')->name('contact.post');

    Route::get('/privacy-policy', 'privacyPolicy')->name('privacy-policy');
    Route::get('/terms-of-service', 'terms')->name('terms-of-service');

    Route::get('/blog', 'blog')->name('blog.index');
    Route::get('/blog/{slug}', 'blogView')->name('blog.show');
    Route::get('/tool/{slug}', 'toolView')->name('tool.details');

    // update tools usages
    Route::post('/update-tool-usages', 'updateUsages');
});


// ─── Admin Panel Routes ─────────────────────────────────────────────
Route::prefix('admin')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'login')->name('login')->middleware('guest');
        Route::post('/login', 'loginLogic')->name('login.post')->middleware('guest');
        Route::get('/logout', 'logout')->name('logout')->middleware('auth');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('ux.home');

        // profile
        Route::controller(ProfileController::class)->group(function () {
            Route::get('/profile', 'index')->name('ux.profile');
            Route::post('/profile-post', 'store')->name('ux.profile.post');
        });

        // Blog
        Route::controller(BlogController::class)->group(function () {
            Route::get('/blog', 'index')->name('ux.blog');
            Route::get('/blog-add', 'add')->name('ux.blog.add');
            Route::post('/blog-add', 'store')->name('ux.blog.add.post');
            Route::get('/blog-del/{id}', 'destroy')->name('ux.blog.del');
        });

        // Pages
        Route::controller(PagesController::class)->group(function () {
            Route::get('/about', 'about')->name('ux.about.page');
            Route::post('/about', 'store')->name('ux.about.post');

            Route::get('/trams', 'trams')->name('ux.trams.page');
            Route::post('/trams', 'tramsStore')->name('ux.trams.post');

            Route::get('/policy', 'policy')->name('ux.policy.page');
            Route::post('/policy', 'policyStore')->name('ux.policy.post');
        });

        // Inbox 
        Route::controller(InboxController::class)->group(function () {
            Route::get('/inbox', 'index')->name('ux.inbox');
            Route::get('/inbox-del/{id}', 'destroy')->name('ux.inbox.del');
        });

        // Category
        Route::controller(CategoryController::class)->group(function () {
            Route::get('/category', 'index')->name('ux.category');
            Route::post('/category', 'store')->name('ux.category.post');
            Route::get('/category-del/{id}', 'destroy')->name('ux.category.del');
        });

        // Tools
        Route::controller(ToolsController::class)->group(function () {
            Route::get('/tools-list', 'index')->name('ux.tools.list');
            Route::get('/tools-add', 'add')->name('ux.tools.add');
            Route::post('/tools-add-post', 'store')->name('ux.tools.add.post');
            Route::get('/tools-add-del/{id}', 'destroy')->name('ux.tools.del');
        });

        // top ad
        Route::controller(TopAdController::class)->group(function () {
            Route::get('/top-ad', 'index')->name('ux.top.add');
            Route::post('/top-ad', 'store')->name('ux.top.post');
        });

        // mega menu
        Route::controller(MegaMenuController::class)->group(function () {
            Route::get('/mega-menu', 'index')->name('ux.mega.menu');
            Route::post('/mega-menu', 'store')->name('ux.mega.post');
            Route::get('/mega-del/{id}', 'destroy')->name('ux.mega.del');
        });

        // Setting
        Route::controller(SettingController::class)->group(function () {
            Route::get('/setting', 'index')->name('ux.setting.index');
            Route::get('/setting-cache', 'cacheClear')->name('ux.setting.cache');
            Route::get('/setting-sitemap', 'makeSitemap')->name('ux.setting.sitemap');
        });
    });
});
