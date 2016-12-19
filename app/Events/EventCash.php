<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class EventCash extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $users;
    protected $channel;
    protected $message;

    /**
     * Create a new event instance.
     *
     * @param  string $token
     * @param  string $channel
     * @return void
     */
    public function __construct($message,$channel)
    {

        $this->message = $message;
        $this->channel = $channel;
     
    }
    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [$this->channel];
    }

     public function broadcastWith() 
     {
       return ['message' => $this->message,'channel'=>$this->channel];
     }
    /**
     * Get the name the event should be broadcast on.
     *
     // * @return string
     */
    // public function broadcastAs()
    // {
    //     echo 'as';
    //     return 'wechat.login';
    // }
}