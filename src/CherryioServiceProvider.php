<?php
namespace Cherryio;
use illuminate\Support\ServiceProvider;
use Illuminate\Broadcasting\BroadcastManager;

class CherryioServiceProvider extends ServiceProvider {
    public function register(){
        $this->mergeConfigFrom(__DIR__.'/../config/cherryio.php', 'cherryio');
        $this->app->singleton(Cherryio::class, function($app) {
            $config = $app['config']['cherryio'];
            return new Cherryio($config['key'], $config['secret']);
        });
    }

    public function boot(){
        $this->publishes([
            __DIR__.'/../config/cherryio.php' => config_path('cherryio.php'),
        ], 'config');

        $this->app->make(BroadcastManager::class)->extend('cherryio', function($app, $config) {
            return new CherryioBroadcaster(
                new Cherryio($config['key'], $config['secret'])
            );
        });
    }
}
