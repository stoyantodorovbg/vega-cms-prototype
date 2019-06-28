<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Traits\CommandUtilities;
use App\Services\Interfaces\RouteServiceInterface;

class AttachRouteToGroup extends Command
{
    use CommandUtilities;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'attach:route-to-group {name} {title}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make the route accessible for the group members';

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
     * @return mixed
     */
    public function handle()
    {
        $data = $this->processArguments();

        $validationData = $this->routeService->addRouteToGroup($data);

        $this->output($validationData, 'The route is added successfully.');
    }
}
