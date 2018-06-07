<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Gametype;
use App\Team;

class ComposerServiceProviders extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        View::composer('*', function($view) {
          $gametypes = Gametype::get();
          $teams = Team::get();
          $view->with(['gametypes' => $gametypes, 'teams' => $teams]);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
