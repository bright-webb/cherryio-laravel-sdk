<?php
namespace Cherryio;
use Cherryio\CherryioBroadcaster;
use Illuminate\Broadcasting\BroadcastManager;

class CherryioChannel{
    protected $broadcaster;

    public function __construct(CherryioBroadcaster $broadcaster){
        $this->broadcaster = $broadcaster;
    }

    public function subscribe($channel){
        return $this->broadcaster->subscribe($channel);
    }

    public function fire($event, $data){
        return $this->broadcaster->dispatch($event, $data);
    }
}