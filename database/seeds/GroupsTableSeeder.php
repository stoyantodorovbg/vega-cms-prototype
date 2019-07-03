<?php

use App\Models\Group;
use App\Services\Interfaces\FileCreateServiceInterface;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class GroupsTableSeeder extends Seeder
{
    /**
     * @var FileCreateServiceInterface
     */
    protected $fileCreateService;

    /**
     * GroupsTableSeeder constructor.
     * @param FileCreateServiceInterface $fileCreateService
     */
    public function __construct(FileCreateServiceInterface $fileCreateService)
    {
        $this->fileCreateService = $fileCreateService;
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Admins id 1
        if (! $this->middlewareExists('admins')) {
            Artisan::call("generate:group admins --description='All rights.'");
        } else {
            factory(Group::class)->create([
                'title' => 'admins',
                'description' => 'All rights.',
            ]);

        }

        // Moderators id 2
        if (! $this->middlewareExists('moderators')) {
            Artisan::call("generate:group moderators --description='Some back office rights'");
        } else {
            factory(Group::class)->create([
                'title' => 'moderators',
                'description' => 'Some back office rights',
            ]);
        }

        // Ordinary users id 3
        if (! $this->middlewareExists('ordinaryUsers')) {
            Artisan::call("generate:group ordinaryUsers --description='Only front end rights'");
        } else {
            factory(Group::class)->create([
                'title' => 'Ordinary users',
                'description' => 'Only front end rights',
            ]);
        }
    }

    /**
     * Check if the middleware already exists
     *
     * @param string $groupTitle
     * @return bool
     */
    protected function middlewareExists(string $groupTitle): bool
    {
        return $this->fileCreateService->fileExists(
            '/app/Http/Middleware/',
            ucfirst($groupTitle),
            '.php'
            );
    }
}
