<?php

namespace App\Events;

use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class UserCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The user instance
     * 
     * @var \App\Models\User
     */
    public $user;

    /**
     * Create a new event instance.
     *
     * @var \App\Models\User    $user
     * 
     * @return void
     */
    public function __construct(User $user)
    {
        Log::info('User ('.$user->id.') created');
        $this->user = $user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
