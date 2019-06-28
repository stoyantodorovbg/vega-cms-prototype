<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Traits\CommandUtilities;
use App\Services\Interfaces\GroupServiceInterface;

class GenerateGroup extends Command
{
    use CommandUtilities;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:group {title} {--description=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a group';

    /**
     * @var GroupServiceInterface
     */
    protected $groupService;

    /**
     * Create a new controller creator command instance.
     *
     * @param GroupServiceInterface $groupService
     */
    public function __construct(GroupServiceInterface $groupService)
    {
        parent::__construct();

        $this->groupService = $groupService;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $data = $this->processArguments();
        $data['description'] = $this->options()['description'];

        $validationData = $this->groupService->create($data);

        $this->output($validationData, 'The group is generated successfully.');
    }
}
