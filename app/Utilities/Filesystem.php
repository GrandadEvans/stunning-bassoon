<?php

namespace App\Utilities;

use App\Exceptions\FilesystemException;
use App\Models\FilesystemEntry;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Filesystem\Filesystem as SymfonyFilesystem;

class Filesystem
{

    /**
     * Get the md5 hash for a directory
     *
     * @param $dir String   The directory to create the user filesystem in
     *
     * @return String
     */
    public static function md5Dir(String $dir) : String
    {
        $hash = self::md5DirRecursively($dir);
        Log::debug("md5 hash for '${dir}' is '${hash}'");

        return $hash;
    }


    /**
     * Create the new user's filesystem from a skeleton version
     *
     * @param $user User
     * @throws \App\Exceptions\FilesystemException
     *
     * @return void
     */
    public static function createNewUserFilesystem(User $user) : void
    {
        Log::debug('Creating user ('.$user->id.') filesystem');

        $skeletonDir = config('filesystem.fs_userspace_src');
        $baseDir = config('filesystem.fs_userspace_dst');
        $userDir = $baseDir . '/' . $user->uuid;

        Log::debug('Skeleton filesystem set to '.$skeletonDir);
        Log::debug('User\'s filesystem set to '.$userDir);

        try {
            $fs = new SymfonyFilesystem();
            $fs->mirror($skeletonDir, $userDir);
        }
        catch(\Exception $e) {
            Log::error('Failed to create filesystem for user ('.$event->user->id.')');

            throw new FilesystemException('Unable to create your default user space', $e);
        }

        Log::info('Created user filesystem for user ('.$user->id.')');
    }

    // private static function listAllFiles($dir) {
    //     $array = array_diff(scandir($dir), array('.', '..'));
       
    //     foreach ($array as &$item) {
    //       $item = $dir . $item;
    //     }
    //     unset($item);
    //     foreach ($array as $item) {
    //       if (is_dir($item)) {
    //        $array = array_merge($array, listAllFiles($item . DIRECTORY_SEPARATOR));
    //       }
    //     }
    //     return $array;
    // }

    // private static function addFilesToDb() {
    //     $ls = self::listAllFiles($userDir);

    //     foreach($ls as $entry) {
    //         new FilesystemEntry($entry);
    //     }
    // }

    /**
     * Get the MD5 hash of an entire directory
     *
     * Taken from https://www.php.net/manual/en/function.md5-file.php#75393
     */
    private static function md5DirRecursively($dir)
    {
        if (!is_dir($dir))
        {
            return false;
        }

        $filemd5s = array();
        $d = dir($dir);

        while (false !== ($entry = $d->read()))
        {
            if ($entry != '.' && $entry != '..')
            {
                 if (is_dir($dir.'/'.$entry))
                 {
                     $filemd5s[] = self::md5DirRecursively($dir.'/'.$entry);
                 }
                 else
                 {
                     $filemd5s[] = md5_file($dir.'/'.$entry);
                 }
             }
        }
        $d->close();
        
        return md5(implode('', $filemd5s));
    }
}
