<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AddTransactionEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $count;
    public $money;

    public function __construct($message,$count, $money)
    {
        $this->message = $message;
        $this->count = $count;
        $this->money = $money;
    }

    public function broadcastOn()
    {
        return ['transaction-channel'];
    }

    public function broadcastAs()
    {
        return 'add-event';
    }
}
