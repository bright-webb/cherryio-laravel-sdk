<?php
namespace Cherryio;

use Cherryio\Cherryio;
use Illuminate\Support\Manager;

class CherryioManager extends Manager{
    protected $config;
    public function __construct($app){
        parent::__construct($app);
        $this->config = $app['config']['cherryio'];
    }
    public function getDefaultDriver(){
        return $this->config['default'];
    }

    protected function createCherryioDriver(){
        return new Cherryio(
            $this->config['api_key'],
            $this->config['secret_key']
        );
    }
}