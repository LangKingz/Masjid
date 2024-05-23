<?php

namespace App\Events;

use App\Models\post;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PostCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $post;
    public function __construct(post $post)
    {
        $this->post = $post;
    }
    
    public function broadcastOn()
    {
        return new PrivateChannel('posts');
    }    
    
    public function broadcastAs()
    {
        return 'post-created';
    }

    
}
