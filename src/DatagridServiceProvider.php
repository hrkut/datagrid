<?php namespace Aginev\Datagrid;

use Collective\Html\FormFacade;
use Collective\Html\HtmlFacade;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class DatagridServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Tell Laravel where the views for a given namespace are located.
        $this->loadViewsFrom(__DIR__ . '/Views', 'datagrid');

        $this->publishes([
            __DIR__ . '/Views'                            => base_path('resources/views/vendor/datagrid'),
            base_path('vendor/aginev/datagrid/src/Views') => base_path('resources/views/vendor/datagrid'),
        ], 'views');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // Register the HtmlServiceProvider
        $this->app->register(\Collective\Html\HtmlServiceProvider::class);


        // Add aliases to Form/Html Facade
        $loader = AliasLoader::getInstance();

        // Add aliases to Form/Html Facade
        $loader->alias('Form', FormFacade::class);
        $loader->alias('Html', HtmlFacade::class);

        // Add alias for datagrid
        $loader->alias('Datagrid', Datagrid::class);

        //dd($this->app);
    }
}