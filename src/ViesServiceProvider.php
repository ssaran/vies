<?php


namespace Ssaran\Vies;

use Illuminate\Support\ServiceProvider;

class ViesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(\Illuminate\Routing\Router $router, \App\Http\Kernel $kernel)
    {

        // Add a new middleware to beginning of the stack if it does not already exist.
        //$kernel->prependMiddleware(\path\to\custom\middleware\file::class)

        // Add a new middleware to end of the stack if it does not already exist.
        //$kernel->pushMiddleware(\path\to\custom\middleware\file::class);

        // Get or set the middlewares attached to the route.
        //$router->middleware(\path\to\custom\middleware\file::class);
        $this->loadMigrationsFrom(__DIR__.'/Setup/Migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->make('Ssaran\Vies\Controller\VatTestController');
        include __DIR__ . '/register.php';
    }


}