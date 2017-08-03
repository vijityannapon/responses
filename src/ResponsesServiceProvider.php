<?php

namespace Vijityannapon\Responses;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class ResponsesServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {

        // $configPath = __DIR__.'/../config/logs.php';
        // $this->publishes([
        //     $configPath => config_path('logs.php'),
        // ]);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerResponses();
        $this->registerFacade();
    }

    /**
     * Register response.
     *
     * @return void
     */
    protected function registerResponses()
    {
        $this->app->singleton('responses', function($app)
        {
            $request = $this->app->request->all();
            return new Json();
            
        });
    }
    /**
     * Register facade.
     *
     * @return void
     */
    protected function registerFacade()
    {
        $this->app->booting(function()
        {
            $loader = AliasLoader::getInstance();
            $loader->alias('Responses', 'Vijityannapon\Responses\Facades\Responses');
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('responses');
    }

}