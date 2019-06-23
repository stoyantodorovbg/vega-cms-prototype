<?php

namespace App\Services;

use App\Models\Group;
use App\Services\Interfaces\GroupServiceInterface;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Services\Interfaces\FileCreateServiceInterface;
use App\Services\Interfaces\ValidationServiceInterface;
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
            ! $this->fileCreateService->alreadyExists($folderPath, $fileName, $fileExtension) &&
            ! Group::where('title', $groupTitle)->first()
            ) {
            Group::create($data);
            $this->fileCreateService->createFile($folderPath, $fileName, $fileExtension, '/Stubs/middleware.stub');

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
     */
    public function destroy(array $data)
    {

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
}
