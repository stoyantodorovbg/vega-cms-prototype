<?php

namespace App\Services;

use App\Traits\FileUtilities;
use Illuminate\Filesystem\Filesystem;
use App\Services\Interfaces\FileDestroyServiceInterface;

class FileDestroyService implements FileDestroyServiceInterface
{
    use FileUtilities;

    /**
     * @var Filesystem
     */
    protected $fileSystem;

    /**
     * RouteService constructor.
     * @param Filesystem $fileSystem
     */
    public function __construct(Filesystem $fileSystem)
    {
        $this->fileSystem = $fileSystem;
    }

    /**
     * Destroy a file
     *
     * @param string $folderPath
     * @param string $fileName
     * @param string $fileExtension
     * @return bool
     */
    public function destroyFile(string $folderPath, string $fileName, string $fileExtension): bool
    {
        if($this->fileExists($folderPath, $fileName, $fileExtension)) {
            unlink(base_path() . $folderPath . $fileName . $fileExtension);

            return true;
        }

        return false;
    }
}
