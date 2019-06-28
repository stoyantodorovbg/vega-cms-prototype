<?php

namespace App\Console\Commands;

use App\Services\Interfaces\RouteServiceInterface;
use App\Traits\CommandUtilities;
use Illuminate\Console\Command;

class DetachRouteFromGroup extends Command
{
    use CommandUtilities;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'detach:route-from-group {name} {title}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove the provided route accessibility for the group members';

    /**
     * @var RouteServiceInterface
     */
    protected $routeService;

    /**
     * Create a new command instance.
     *
     * @param RouteServiceInterface $routeService
     */
    public function __construct(RouteServiceInterface $routeService)
    {
        parent::__construct();

        $this->routeService = $routeService;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $data = $this->processArguments();

        $validationData = $this->routeService->detachRouteFromGroup($data);

        $this->output($validationData, 'The route is detached from the group successfully.');
    }
}
