<?php namespace Ognestraz\Admin\Auth\Providers;

use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!$this->app->routesAreCached()) {
            require __DIR__.'/../Http/routes.php';
        }
        
        $pathViews = __DIR__.'/../../resources/views';
        $packageName = 'auth-admin';
        $this->loadViewsFrom($pathViews, $packageName);
        
        $pathPublicCss = __DIR__.'/../../public/css/' . $packageName . '.css';
        $pathUnitTest = __DIR__.'/../../tests';
        
        $this->publishes([
            $pathViews => base_path('resources/views/vendor/' . $packageName),
            $pathPublicCss => base_path('public/css/' . $packageName . '.css'),
            $pathUnitTest => base_path('tests/vendor')
        ]);
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
