<?php

namespace App\Console\Commands;

use App\Services\Interfaces\RouteServiceInterface;
use Illuminate\Console\Command;

class SyncRoutes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:routes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Synchronize routes between route files and database';

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
        foreach ($this->routeService->synchronize() as $message) {
            $this->line($message);
        }
    }
}
