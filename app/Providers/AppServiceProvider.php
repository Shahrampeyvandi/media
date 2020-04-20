<?php

namespace App\Providers;

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
        $this->app->bind('path.public', function() {
            return base_path().'/httpdocs';
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    { view()->composer('*', function($view)
        {
            if (Auth::check()) {
                $notifications=DB::table('notifications')->where('members_id',Auth::user()->id)->latest()->take(5)->get();
                $notystatus = Db::table('notifications')->where('members_id',Auth::user()->id)->where('read',0)->count();
                $view->with(['notifications'=>$notifications,'notystatus'=>$notystatus]);
            }else {
                $view->with(['notifications'=>[],'notystatus'=>0]);
            }
        });
       
      
    }
}
