<?php

namespace App\Listeners;

use App\Exceptions\FilsystemException;
use App\Events\UserCreated;
use App\Models\FilesystemEntry;
use App\Utilities\Filesystem;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Uid\Uuid;

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
        $details = [
            'user_id' => $event->user->id,
            'id' => Uuid::v4(),
            'type' => 'dir',
            'name' => '/'
        ];
        Log::debug('New Filesystem entry attributes', $details);

        FilesystemEntry::create($details);
    }
}
