<?php

namespace App\Services;

use App\Traits\FileUtilities;
use Illuminate\Filesystem\Filesystem;
use App\Services\Interfaces\FileCreateServiceInterface;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class FileCreateService implements FileCreateServiceInterface
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

        if ($this->fileExists($folderPath, $fileName, $fileExtension)) {
            return false;
        }

        $this->fileSystem->put(
                $this->getFilePath($folderPath, $fileName, $fileExtension),
                $this->buildFile($folderPath, $fileName, $stubPath)
            );

        return $validationData;
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
