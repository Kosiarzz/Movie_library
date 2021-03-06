<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\Models\Group;

class GroupsServiceProvider extends ServiceProvider
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
        View::composer(['layouts.app', 'main.filters', 'movies.create', 'movies.edit', 'scrapers.movie'], function ($view) {
            $view->with('userGroups', Group::where('user_id', request()->user()->id)->get());
        });
    }
}
