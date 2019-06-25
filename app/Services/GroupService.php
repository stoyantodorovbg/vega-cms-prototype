<?php

namespace App\Services;

use App\Models\Group;
use App\Services\Interfaces\GroupServiceInterface;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Services\Interfaces\FileCreateServiceInterface;
use App\Services\Interfaces\ValidationServiceInterface;
use App\Services\Interfaces\FileDestroyServiceInterface;
use App\Repositories\Interfaces\GroupRepositoryInterface;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class GroupService implements GroupServiceInterface
{
    /**
     * @var ValidationServiceInterface
     */
    protected $validationService;

    /**
     * @var FileCreateServiceInterface
     */
    protected $fileCreateService;

    /**
     * @var array
     */
    protected $middlewareKeys = [];

    /**
     * @var string
     */
    protected $kernelLine = '';

    /**
     * RouteService constructor.
     * @param ValidationServiceInterface $validationService
     * @param FileCreateServiceInterface $fileCreateService
     */
    public function __construct(
        ValidationServiceInterface $validationService,
        FileCreateServiceInterface $fileCreateService
    ) {
        $this->validationService = $validationService;
        $this->fileCreateService = $fileCreateService;
    }

    /**
     * Create a group
     *
     * @param array $data
     * @return mixed
     * @throws FileNotFoundException
     */
    public function create(array $data)
    {
        $validatedData = $this->validationService->validateGroupProperties($data);

        $groupTitle = $data['title'];
        $folderPath = '/app/Http/Middleware/';
        $fileName = ucfirst($groupTitle);
        $fileExtension = '.php';

        if ($validatedData === true &&
            ! $this->fileCreateService->fileExists($folderPath, $fileName, $fileExtension) &&
            ! Group::where('title', $groupTitle)->first()
            ) {
            Group::create($data);
            $this->fileCreateService->createFile(
                $folderPath,
                $fileName,
                $fileExtension,
                '/Stubs/middleware.stub'
            );
            $this->registerMiddleware($groupTitle);

            return true;
        }

        if($validatedData === true) {
            return ['Group with name ' . $groupTitle . ' can not be created.'];
        }

        return $validatedData;
    }

    /**
     * Destroy a group
     *
     * @param array $data
     * @return mixed
     */
    public function destroy(array $data)
    {
        $validatedData = $this->validationService->validateGroupTitle($data);

        if ($validatedData === true) {
            $group = Group::where('title', $data['title'])->first();
            $fileDestroyService = resolve(FileDestroyServiceInterface::class);
            $fileDestroyService->destroyFile('/app/Http/Middleware/', ucfirst($group->title), '.php');
            $this->removeMiddlewareRegistration($group->title);
            $group->delete();
        }

        return $validatedData;

    }

    /**
     * Check if a user has a group
     *
     * @param Authenticatable $user
     * @param string $groupTitle
     * @return bool
     */
    public function userHasGroup(Authenticatable $user, string $groupTitle): bool
    {
        return resolve(GroupRepositoryInterface::class)->getUserGroupsTitles($user, $groupTitle)
            ? true : false;
    }

    /**
     * Assign a middleware in Http\Kernel.php
     *
     * @param string $groupTitle
     * @return void
     */
    protected function registerMiddleware(string $groupTitle): void
    {
        [$kernelPath, $kernelData] = $this->getKernelData();

        $kernelContent = $this->kernelContentCreateGroup($groupTitle, $kernelData);

        file_put_contents($kernelPath, $kernelContent);
    }

    /**
     * Add a middleware registration to kernel content
     *
     * @param string $groupTitle
     * @param $kernelData
     * @return string
     */
    protected function kernelContentCreateGroup(string $groupTitle, $kernelData): string
    {
        $middlewareIndex = $this->getMiddlewareRegistrationsStart($kernelData);
        $kernelCount = count($kernelData);
        $assigned = false;

        for ($index = $middlewareIndex + 1; $index < $kernelCount; $index++) {
            if (! $assigned && $kernelData[$index] === '    ];') {
                $assigned = true;
                $this->kernelLine = $kernelData[$index];
                $className = ucfirst($groupTitle);
                $kernelData[$index] = "        '$groupTitle' => \App\Http\Middleware\\$className::class,";
                $index++;
            }

            if ($assigned) {
                $currentLine = $kernelData[$index];
                $kernelData[$index] = $this->kernelLine;
                $this->kernelLine = $currentLine;
            }
        }

        $kernelData[] = $this->kernelLine;

        return implode("\n", $kernelData);
    }

    /**
     * Remove the middleware registration from the kernel
     *
     * @param string $groupTitle
     * @return void
     */
    protected function removeMiddlewareRegistration(string $groupTitle): void
    {
        [$kernelPath, $kernelData] = $this->getKernelData();

        $kernelContent = $this->kernelContentDestroyGroup($kernelData, $groupTitle);

        file_put_contents($kernelPath, $kernelContent);
    }

    /**
     * Prepare kernel content for group destroying
     *
     * @param array $kernelData
     * @param string $groupTitle
     * @return string
     */
    protected function kernelContentDestroyGroup(array $kernelData, string $groupTitle): string
    {
        $kernelCount = count($kernelData);
        $middlewareIndex = $this->getMiddlewareRegistrationsStart($kernelData);

        for ($index = $middlewareIndex + 1; $index < $kernelCount; $index++) {
            if (preg_match("/\'$groupTitle\'/", $kernelData[$index])) {
                unset($kernelData[$index]);
                break;
            }
        }

        return implode("\n", $kernelData);
    }

    /**
     * Create an array that contains all kernel lines
     *
     * @return array
     */
    protected function getKernelData(): array
    {
        $kernelPath = base_path() . '/app/Http/Kernel.php';
        $kernel = file($kernelPath, FILE_IGNORE_NEW_LINES);

        return array($kernelPath, $kernel);
    }

    /**
     * Get the beginning index of the middleware registrations
     *
     * @param array $kernel
     * @return false|int|string
     */
    protected function getMiddlewareRegistrationsStart(array $kernel)
    {
        $middlewareIndex = array_search('    protected $routeMiddleware = [', $kernel, true);

        return $middlewareIndex;
    }

    /**
     * Check if the middleware have been already registered
     *
     * @param string $groupTitle
     * @param array $middlewareKeys
     * @return bool
     */
    protected function isMiddlewareRegistered(string $groupTitle, array $middlewareKeys): bool
    {
        return ! in_array($groupTitle, $middlewareKeys, true);
    }
}
