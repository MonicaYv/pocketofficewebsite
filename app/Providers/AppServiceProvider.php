<?php

namespace App\Providers;
use App\Models\Country;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
  public function boot()
{
    Vite::useScriptTagAttributes([
        'crossorigin' => 'anonymous',
    ]);
    
    $countries = Schema::hasTable('countries')
        ? Country::orderBy('name')->get()
        : collect();

    View::share('countries', $countries);
}
}
