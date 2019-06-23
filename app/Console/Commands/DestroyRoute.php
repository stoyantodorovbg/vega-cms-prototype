<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Traits\CommandUtilities;
use App\Services\Interfaces\RouteServiceInterface;

class DestroyRoute extends Command
{
    use CommandUtilities;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'destroy:route {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove a route from the php file and database.';

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

        $validationData = $this->routeService->destroy($data);

        $this->output($validationData, 'The route is destroyed.');
    }
}
