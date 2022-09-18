<?php

namespace App\Listeners;

use App\Exceptions\FilsystemException;
use App\Events\UserCreated;
use App\Utilities\Filesystem;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class CreateUserFilesystem
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserCreated  $event
     * 
     * @return void
     */
    public function handle(UserCreated $event): void
    {
        Log::info('Event "UserCreated" triggered for user ('.$event->user->id.')');
        Filesystem::createNewUserFilesystem($event->user);
    }
}
