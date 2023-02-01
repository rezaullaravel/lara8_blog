<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        View::share('categories',Category::orderBy('id','DESC')->limit(20)->get());
        View::share('popular_posts',Post::orderBy('id','DESC')->limit(4)->get());
        View::share('tags',Tag::orderBy('id','DESC')->limit(10)->get());
        View::share('posts',Post::orderBy('id','DESC')->paginate(4));
    }
}
