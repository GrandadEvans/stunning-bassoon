<?php

namespace App\Listeners;

use App\Exceptions\FilsystemException;
use App\Events\UserCreated;
use App\Utilities\Filesystem;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
        try {
            Filesystem::createNewUserFilesystem($event->user);
        }
        catch (\Exception $e) {
            throw new FilesystemException('Could not create the user-space', $e);
        }
    }
}
