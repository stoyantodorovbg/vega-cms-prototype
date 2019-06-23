<?php

namespace App\Services\Interfaces;

interface FileDestroyServiceInterface
{
    /**
     * Destroy a file
     *
     * @param string $folderPath
     * @param string $fileName
     * @param string $fileExtension
     * @return bool
     */
    public function destroyFile(string $folderPath, string $fileName, string $fileExtension): bool;
}
