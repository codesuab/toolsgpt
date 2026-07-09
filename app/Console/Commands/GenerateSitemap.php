<?php

namespace App\Console\Commands;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tool;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapIndex;
use Spatie\Sitemap\Tags\Url;

#[Signature('sitemap:generate')]
#[Description('Generate sitemap files')]
class GenerateSitemap extends Command
{
    public function handle(): int
    {
        /*
        |--------------------------------------------------------------------------
        | Tools Sitemap
        |--------------------------------------------------------------------------
        */

        $toolMap = Sitemap::create();

        Tool::where('status', 'active')
            ->latest('updated_at')
            ->each(function ($tool) use ($toolMap) {

                $toolMap->add(
                    Url::create(route('tool.details', $tool->slug))
                        ->setLastModificationDate($tool->updated_at)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                        ->setPriority(0.9)
                );

            });

        $toolMap->writeToFile(public_path('sitemap-tools.xml'));

        /*
        |--------------------------------------------------------------------------
        | Blog Sitemap
        |--------------------------------------------------------------------------
        */

        $blogMap = Sitemap::create();

        Blog::where('status', 'published')
            ->latest('updated_at')
            ->each(function ($blog) use ($blogMap) {

                $blogMap->add(
                    Url::create(route('blog.show', $blog->slug))
                        ->setLastModificationDate($blog->updated_at)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                        ->setPriority(0.8)
                );

            });

        $blogMap->writeToFile(public_path('sitemap-blog.xml'));

        /*
        |--------------------------------------------------------------------------
        | Category Sitemap
        |--------------------------------------------------------------------------
        */

        $categoryMap = Sitemap::create();

        Category::latest('updated_at')
            ->each(function ($category) use ($categoryMap) {

                $categoryMap->add(
                    Url::create(route('all.tool', [
                        'cat' => $category->slug, // use slug if available
                    ]))
                        ->setLastModificationDate($category->updated_at)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                        ->setPriority(0.7)
                );

            });

        $categoryMap->writeToFile(public_path('sitemap-categories.xml'));

        /*
        |--------------------------------------------------------------------------
        | Static Pages Sitemap
        |--------------------------------------------------------------------------
        */

        $pages = Sitemap::create();

        $pages
            ->add(
                Url::create(route('home'))
                    ->setLastModificationDate(now())
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                    ->setPriority(1.0)
            )
            ->add(
                Url::create(route('all.tool'))
                    ->setLastModificationDate(now())
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                    ->setPriority(0.9)
            )
            ->add(
                Url::create(route('blog.index'))
                    ->setLastModificationDate(now())
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                    ->setPriority(0.9)
            )
            ->add(
                Url::create(route('privacy-policy'))
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                    ->setPriority(0.3)
            )
            ->add(
                Url::create(route('terms-of-service'))
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                    ->setPriority(0.3)
            )
            ->add(
                Url::create(route('contact'))
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    ->setPriority(0.5)
            );

        $pages->writeToFile(public_path('sitemap-pages.xml'));

        /*
        |--------------------------------------------------------------------------
        | Sitemap Index
        |--------------------------------------------------------------------------
        */

        SitemapIndex::create()
            ->add(url('sitemap-pages.xml'))
            ->add(url('sitemap-tools.xml'))
            ->add(url('sitemap-blog.xml'))
            ->add(url('sitemap-categories.xml'))
            ->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully.');

        return self::SUCCESS;
    }
}