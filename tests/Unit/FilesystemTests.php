<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Filesystem\Filesystem as SymfonyFilesystem;
use App\Utilities\Filesystem;

class FilesystemTests extends TestCase
{
    /**
     * Test we get a correct file hash for an empty directory
     * 
     * @test
     * 
     * @return void
     */
    public function make_sure_we_get_a_directory_hash_correctly() : void
    {
        $path = './tests/Resources/RecursiveTestSrc/test-dir-1/empty-directory';

        $md5 = Filesystem::md5Dir($path);
        $this->assertEquals('d41d8cd98f00b204e9800998ecf8427e', $md5);
    }

    /**
     * test user gets an exact copy of skeleton directory
     * 
     * @depends make_sure_we_get_a_directory_hash_correctly
     * @test
     *
     * @return void
     */
    public function make_sure_we_can_copy_the_skeleton_user_directory() : void
    {
        $filesystem = new SymfonyFilesystem();

        // Make sure we have the default test directories
        $src = './tests/Resources/RecursiveTestSrc';
        $dst = './tests/Resources/RecursiveTestDst';
        // Temp. set the destintion dir for the test
        Filesystem::$defaultUserFilesystems = $dst;

        // Assert that both base directories already exist
        $this->assertTrue($filesystem->exists($src));
        $this->assertTrue($filesystem->exists($dst));

        // Create a new UUID (normally it will coime from user)
        $uuid = Uuid::uuid4()->toString();
        //  Set the new destination dir
        $newDst = $dst . '/' . $uuid;
        // Ensure it doesn't already exist
        $this->assertFalse($filesystem->exists($newDst));

        // Perform the magic
        Filesystem::createNewUserFilesystem($uuid);

        // Assert it has been coppied acrosss
        $this->assertTrue($filesystem->exists($src));
        $this->assertTrue($filesystem->exists($newDst));

        // Confirm they both match
        $md5Src = Filesystem::md5Dir($src);
        $md5Dst = Filesystem::md5Dir($newDst);
        $this->assertEquals($md5Src, $md5Dst);
    }
}
