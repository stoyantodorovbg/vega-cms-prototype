<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Traits\CommandUtilities;
use App\Services\Interfaces\GroupServiceInterface;

class DestroyGroup extends Command
{
    use CommandUtilities;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'destroy:group {title}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        $data = $this->processArguments();

        $validationData = $this->groupService->destroy($data);

        $this->output($validationData, 'The group is destroyed.');
    }
}
