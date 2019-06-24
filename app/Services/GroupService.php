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
            $this->assignMiddleware($groupTitle);

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
            $route = Group::where('title', $data['title'])->first();
            $fileDestroyService = resolve(FileDestroyServiceInterface::class);
            $fileDestroyService->destroyFile('/app/Http/Middleware/', ucfirst($route->title), '.php');
            $route->delete();
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
     */
    protected function assignMiddleware(string $groupTitle): void
    {
        $kernelPath = base_path() . '/app/Http/Kernel.php';

        $kernel = file($kernelPath, FILE_IGNORE_NEW_LINES);

        $kernelContent = $this->prepareKernelContent($groupTitle, $kernel);

        file_put_contents($kernelPath, $kernelContent);
    }

    /**
     * Add a middleware registration to kernel content
     *
     * @param string $groupTitle
     * @param $kernel
     * @return string
     */
    protected function prepareKernelContent(string $groupTitle, $kernel): string
    {
        $protectedRouteMiddlewareIndex = array_search('    protected $routeMiddleware = [', $kernel, true);

        $kernelCount = count($kernel);
        $assigned = false;

        for ($index = $protectedRouteMiddlewareIndex; $index < $kernelCount; $index++) {

            if (!$assigned && $index > $protectedRouteMiddlewareIndex) {
                $middlewareArr = explode("'", $kernel[$index]);
                if (isset($middlewareArr[1])) {
                    $this->middlewareKeys[] = $middlewareArr[1];
                }
            }

            if (!$assigned && $kernel[$index] === '    ];' &&
                !in_array($groupTitle, $this->middlewareKeys, true)
            ) {
                $assigned = true;
                $this->kernelLine = $kernel[$index];
                $className = ucfirst($groupTitle);
                $kernel[$index] = "        '$groupTitle' => \App\Http\Middleware\\$className::class,";
                $index++;
            }

            if ($assigned) {
                $currentLine = $kernel[$index];
                $kernel[$index] = $this->kernelLine;
                $this->kernelLine = $currentLine;
            }
        }

        $kernel[] = $this->kernelLine;

        return implode("\n", $kernel);
    }
}
