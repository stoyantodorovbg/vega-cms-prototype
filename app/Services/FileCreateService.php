<?php

namespace App\Services;

use Illuminate\Filesystem\Filesystem;
use App\Services\Interfaces\FileCreateServiceInterface;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class FileCreateService implements FileCreateServiceInterface
{
    /**
     * @var Filesystem
     */
    protected $fileSystem;

    /**
     * RouteService constructor.
     * @param Filesystem $fileSystem
     */
    public function __construct(
        Filesystem $fileSystem
    ) {
        $this->fileSystem = $fileSystem;
    }

    /**
     * Create a middleware for the group
     *
     * @param string $folderPath
     * @param string $fileName
     * @param string $fileExtension
     * @param string $stubPath
     * @return bool|array
     * @throws FileNotFoundException
     */
    public function createFile(string $folderPath, string $fileName, string $fileExtension, string $stubPath)
    {
        $validationData = [];

        if ($this->alreadyExists($folderPath, $fileName, $fileExtension)) {
            return false;
        }

        $this->fileSystem->put(
                $this->getFilePath($folderPath, $fileName, $fileExtension),
                $this->buildFile($folderPath, $fileName, $stubPath)
            );

        return $validationData;
    }

    /**
     * Determine if the file already exists.
     *
     * @param string $folderPath
     * @param string $fileName
     * @param string $fileExtension
     * @return bool
     */
    public function alreadyExists(string $folderPath, string $fileName, string $fileExtension): bool
    {
        return $this->fileSystem->exists($this->getFilePath($folderPath, $fileName, $fileExtension));
    }

    /**
     * Create a class from stub
     *
     * @param string $folderPath
     * @param string $fileName
     * @param string $stubPath
     * @return string
     * @throws FileNotFoundException
     */
    protected function buildFile (string $folderPath, string $fileName, string $stubPath): string
    {
        $stub = $this->fileSystem->get($this->getStubPath($stubPath));

        return $this->replaceNamespace($stub, $folderPath, $fileName)->replaceClass($stub, $folderPath, $fileName);
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
        return base_path(). $folderPath . ucfirst($fileName) . $fileExtension;
    }

    /**
     * Get the stub file for the generator.
     *
     * @param string $stubPath
     * @return string
     */
    protected function getStubPath(string $stubPath): string
    {
        return base_path(). $stubPath;
    }

    /**
     * Replace the namespace for the given stub.
     *
     * @param $stub
     * @param string $folderPath
     * @param string $fileName
     * @return FileCreateService
     */
    protected function replaceNamespace(&$stub, string $folderPath, string $fileName): FileCreateService
    {
        $stub = str_replace(
            'DummyNamespace',
            $this->getNamespace($folderPath, $fileName),
            $stub
        );

        return $this;
    }

    /**
     * Replace the class name for the given stub.
     *
     * @param  $stub
     * @param string $folderPath
     * @param string $fileName
     * @return string
     */
    protected function replaceClass($stub, string $folderPath, string $fileName): string
    {
        $class = str_replace($this->getNamespace($folderPath, $fileName).'\\', '', $fileName);

        return str_replace('DummyClass', $class, $stub);
    }

    /**
     * Get the full namespace for a given class, without the class name.
     *
     * @param $folderPath
     * @param string $fileName
     * @return string
     */
    protected function getNamespace($folderPath, $fileName): string
    {
        $folderPath = trim($folderPath, '/');
        $folderPath = explode('/', $folderPath);
        $folderPathCount = count($folderPath);

        for ($index = 0; $index < $folderPathCount; $index++) {
            $folderPath[$index] = ucfirst($folderPath[$index]);
        }

        return implode('\\', $folderPath) . '\\' . ucfirst($fileName);
    }
}
