<?php
namespace Cherryio;
use Illuminate\Support\Facades\Facade;

class Cherryio extends Facade {
    protected static function getFacadeAccessor(){
        return 'cherryio';
    }
}