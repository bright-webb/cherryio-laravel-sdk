<?php
namespace Cherryio;

use Cherryio\Cherryio;
use Illuminate\Broadcasting\Broadcasters\Broadcaster;
use Illuminate\Support\Arr;

class CherryioBroadcaster extends Broadcaster {
    protected $cherryio;

    public function __construct(Cherryio $cherryio){
        $this->cherryio = $cherryio;
    }

    // public function channel($channel){
    //     $this->cherryio->channel($channel);
    // }

    public function broadcast($channel, $event, array $payload = []){
        $socket = Arr::pull($payload, 'socket');
        $this->cherryio->broadcast($this->formatChannels($channel), $event, $payload);
    }


    protected function formatChannels(array $channels){
        return array_map(function ($channel){
            return (string) $channel;
        }, $channels);
    }
    public function dispatch($event, $payload){
        $this->cherryio->fire($event, $payload);
    }

    public function auth($request){
        // Authoiration
    }

    public function validAuthenticationResponse($request, $result){
        return $result;
    }
}