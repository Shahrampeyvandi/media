<?php

namespace App\Providers;

use App\Models\Contents\Categories;
use App\Models\Members\Notes;
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
    { 
        view()->composer('*', function($view)
        {
            $view->with('categories', Categories::all());
            if (Auth::check()) {
                
              
                $mynotes = Notes::where('members_id',auth()->user()->id)->latest()->get();
                
                $notifications=DB::table('notifications')->where('members_id',Auth::user()->id)->orderBy('updated_at', 'desc')->take(10)->get();
               
                $notystatus = Db::table('notifications')->where('members_id',Auth::user()->id)->where('read',0)->count();
                $view->with(['notifications'=>$notifications,'notystatus'=>$notystatus,'mynotes'=>$mynotes]);
            }else {
                $view->with(['notifications'=>[],'notystatus'=>0,'mynotes'=>[]]);
            }
        });
       
      
    }
}
