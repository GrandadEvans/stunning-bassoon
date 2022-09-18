<?php

namespace App\Observers;

use App\Events\UserCreated;
use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        UserCreated::dispatch($user);
        // Work space quota out
        // Send email to user
    }
}
