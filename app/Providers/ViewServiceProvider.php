<?php

namespace App\Providers;

use App\Models\Page;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $pages = Page::where('is_active', true)->orderBy('created_at', 'desc')->get();

        if(!$pages) {
            $pages = [];
        }

        \Illuminate\Support\Facades\View::composer('*', function ($view) use ($pages) {
            $view->with('pages', $pages);
        });
    }
}
