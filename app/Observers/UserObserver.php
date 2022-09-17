<?php

namespace App\Observers;

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
        // Create a copy of skeleton filesystem
        // Work space quota out
        // Send email to user
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \StunningBassoon\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \StunningBassoon\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \StunningBassoon\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \StunningBassoon\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
