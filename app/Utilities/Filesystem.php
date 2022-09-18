<?php

namespace App\Utilities;

use App\Exceptions\FilesystemException;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Filesystem\Filesystem as SymfonyFilesystem;

class Filesystem
{

    /**
     * Set the base directory for the user's filesystem to go into
     */
    public static $defaultUserFilesystems = 'UserFilesystems/';


    /**
     * Get the md5 hash for a directory
     *
     * @param $dir String   The directory to create the user filesystem in
     *
     * @return String
     */
    public static function md5Dir(String $dir) : String
    {
        return self::md5DirRecursively($dir);
    }


    /**
     * Create the new user's filesystem from a skeleton version
     *
     * @param $user User
     *
     * @return void
     */
    public static function createNewUserFilesystem(User $user) : void
    {
        $fs = new SymfonyFilesystem();
        $skeletonDir = 'tests/Resources/RecursiveTestSrc';
        $baseDir = self::$defaultUserFilesystems;
        $userDir = $baseDir . '/' . $user->uuid;

        try {
            $fs->mirror($skeletonDir, $userDir);
        }
        catch(\Exception $e) {
            throw new FilesystemException('Unable to create your default user space', $e);
        }
    }

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
