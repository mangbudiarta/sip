<?php

namespace App\Providers;

use App\Models\Navbar;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Menggunakan share method untuk mengirim data ke semua view
        view()->share([
            //data from navbar model
            'navbar' => Navbar::all()
         ]);
    }
}