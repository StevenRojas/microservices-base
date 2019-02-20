<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\Resource;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        'Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider';
    }

    /**
     *
     */
    public function boot()
    {
        Resource::withoutWrapping();
    }
}
