<?php

namespace App\Traits;

trait FileUtilities
{
    /**
     * Determine if the file already exists.
     *
     * @param string $folderPath
     * @param string $fileName
     * @param string $fileExtension
     * @return bool
     */
    public function fileExists(string $folderPath, string $fileName, string $fileExtension): bool
    {
        return $this->fileSystem->exists($this->getFilePath($folderPath, $fileName, $fileExtension));
    }

    /**
     * Get file path.
     *
     * @param string $folderPath
     * @param string $fileName
     * @param $fileExtension
     * @return string
     */
    protected function getFilePath(string $folderPath, string $fileName, $fileExtension): string
    {
        return base_path() . $folderPath . ucfirst($fileName) . $fileExtension;
    }
}
