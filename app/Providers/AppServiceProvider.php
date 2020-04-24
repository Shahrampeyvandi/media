<?php

namespace App\Providers;

use App\Models\Contents\Categories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
        // $this->app->bind('path.public', function() {
        //     return base_path();
        // });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    { view()->composer('*', function($view)
        {
            $view->with('categories', Categories::all());
            if (Auth::check()) {
                $notifications=DB::table('notifications')->where('members_id',Auth::user()->id)->orderBy('updated_at', 'desc')->take(5)->get();
               
                $notystatus = Db::table('notifications')->where('members_id',Auth::user()->id)->where('read',0)->count();
                $view->with(['notifications'=>$notifications,'notystatus'=>$notystatus]);
            }else {
                $view->with(['notifications'=>[],'notystatus'=>0]);
            }
        });
       
      
    }
}
