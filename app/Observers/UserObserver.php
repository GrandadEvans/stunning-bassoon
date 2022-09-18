<?php

namespace App\Observers;

use App\Events\UserCreated;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * 
     * @return void
     */
    public function created(User $user)
    {
        $this->userEvent($user, 'created');

        UserCreated::dispatch($user);
        // Work space quota out
        // Send email to user
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * 
     * @return void
     */
    public function updated(User $user)
    {
        $this->userEvent($user, 'updated');
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * 
     * @return void
     */
    public function deleted(User $user)
    {
        // Will this log statement work, or will it just work with a soft delete?
        $this->userEvent($user, 'deleted');
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * 
     * @return void
     */
    public function restored(User $user)
    {
        $this->userEvent($user, 'restored');
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * 
     * @return void
     */
    public function forceDeleted(User $user)
    {
        $this->userEvent($user, 'force_deleted');
    }


    /**
     * Log the events here instead of in each individual event
     * 
     * @param \App\Models\User  $user
     * @param String            $event
     * 
     * @return never
     */
    private function userEvent(User $user, String $event): never
    {
        $id = $user->id;
        Log::debug("User (${id}) has been " . strtoupper($event));
    }
}
