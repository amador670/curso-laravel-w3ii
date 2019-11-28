<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
     * Bootstrap any application services.
     *
     * @return void
     */
  public function boot()
  {
    //Metodo share()Permite compartir una variable en diferentes rutas (routes/web.php) y añadirla en los resources/views
    
    view()->share("variableShare", "Sitio web creado en Laravel");
  }

  /**
     * Register any application services.
     *
     * @return void
     */
  public function register()
  {
    //
  }
}
