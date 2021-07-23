<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Model\FrontEnd\Blog;
use App\Model\Admin\Section;
use App\Model\FrontEnd\Tag;
use DB;

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
        view()->composer('front-end.includes.sidebar',function ($var){
            $var->with('sections',Section::all());
              });
        view()->composer('front-end.includes.sidebar',function ($var){
            $var->with('tags',Tag::all());
              });
        view()->composer('front-end.home',function ($var){
            $var->with('blogs',DB::table('blogs')
                                ->join('users','users.id','blogs.user_id')
                                ->select('blogs.*','users.name')
                                ->where('blogs.is_published',0)
                                ->where('blogs.is_blocked',0)
                                ->paginate(2));
              });
    }
}
