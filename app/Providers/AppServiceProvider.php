<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Model\FrontEnd\Blog;
use App\Model\Admin\Section;

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
        view()->composer('front-end.home',function ($var){
            $var->with('sections',Section::all());
              });

        view()->composer('front-end.home',function ($var){
            $var->with('blogs',Blog::where('is_blocked',0)
                                        ->orderBy('id')    
                                        ->paginate(1));
              });
    }
}
