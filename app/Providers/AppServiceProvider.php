<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\{Category,Post,Comment};

class AppServiceProvider extends ServiceProvider
{
    
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        require_once __DIR__.'/../helper.php';

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('front-end.shared.header',function($view){
         
            $categories = Category::whereParentId(null)->get();
            $view->with(['categories'=>$categories]);

        });
        view()->composer('front-end.shared.mobile-menu',function($view){
         
            $categories = Category::whereParentId(null)->get();
            $view->with(['categories'=>$categories]);

        });
        view()->composer('front-end.shared.side-bar',function($view){
         
            $latestvideos = Post::latest()->limit(5)->get();
            $parent_categories = Category::whereParentId(null)->whereStatus('active')->with('children')->get();
            $url ='d';
            $view->with(['latestvideos'=>$latestvideos,'url'=>$url,'parent_categories'=>$parent_categories]);

        });
        view()->composer('front-end.shared.footer',function($view){
         
            $randomposts = Post::inRandomOrder()->limit(3)->get();
            $categories = Category::whereParentId(null)->get();
            $view->with(['randomposts'=>$randomposts,'categories'=>$categories]);

        });
        view()->composer('back-end.shared.header',function($view){
         
            $pendingcomments = Comment::whereStatus('Pending')->get();
            $view->with(['pendingcomments'=>$pendingcomments]);

        });
        view()->composer('front-end.template',function($view){
            $url = url()->current();
        
            $view->with(['url'=>$url]);

        });
        
        view()->composer('front-end.shared.header',function($view){
            $url = url()->current();
        
            $view->with(['url'=>$url]);

        });
        view()->composer('front-end.shared.footer',function($view){
            $url = url()->current();
        
            $view->with(['url'=>$url]);

        });
        view()->composer('front-end.shared.side-bar',function($view){
            $url = url()->current();
        
            $view->with(['url'=>$url]);

        });
    }
}
