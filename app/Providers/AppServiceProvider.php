<?php

namespace App\Providers;

use App\Models\Poli;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

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
    public function boot(): void
    {
        //
        // Berbagi data 'user' ke layout admin setiap kali dipanggil
    View::composer('layouts.admin', function ($view) {
        $view->with('user', Auth::user());
    });

    View::composer('layouts.main', function ($view) {
    try {
        $poli = Poli::all();
    } catch (\Exception $e) {
        $poli = collect(); // kosong supaya tidak error
    }
    $view->with('poli', $poli);
});


    }
}
