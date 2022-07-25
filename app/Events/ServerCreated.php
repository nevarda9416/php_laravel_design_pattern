<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ServerCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $user;
    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user, $message)
    {
        $this->user = $user;
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('user.' . $this->user['id']);
    }

    /**
     * Tự định nghĩa tên broadcast
     * @return string
     */
    public function broadcastAs()
    {
        return 'server.created';
    }

    /**
     * Định nghĩa dữ liệu nào sẽ được gửi kèm trong các tin
     * @return array
     */
    public function broadcastWith()
    {
        return [
            'message' => $this->message
        ];
    }
}
