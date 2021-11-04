<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Program;
use App\Models\Category;

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
        view()->composer('*', function($view) {
            //$programList = Program::where('status','active')->get();
            $categoryList = Category::where('status','active')->get();
            $view->with(['categoryList' =>$categoryList]);
        });
    }
}
