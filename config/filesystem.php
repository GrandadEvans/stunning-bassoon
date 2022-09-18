<?php

use Illuminate\Support\Facades\Facade;

return [

    /*
    |--------------------------------------------------------------------------
    | Userspace Skeleton location
    |--------------------------------------------------------------------------
    |
    | This is the path to the skeleton files used to set up a user's
    | file space when they initially create an account. The files
    | and directories inside the ekeleton directory may change
    | over time.
    |
    */

    'fs_userspace_src' => env('FILESYSTEM_USERSPACE_SRC', 'Resources/skeleton-user-dir'),


    /*
    |--------------------------------------------------------------------------
    | Userspace destination path
    |--------------------------------------------------------------------------
    |
    | This is the path to where the skeleton files are copied.
    |
    */

    'fs_userspace_dst' => env('FILESYSTEM_USERSPACE_DST', 'UserFilesystems/'),

];
