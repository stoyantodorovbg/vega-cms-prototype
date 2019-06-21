<?php

namespace App\Console\Commands;

use App\Services\Interfaces\RouteServiceInterface;
use Illuminate\Console\Command;

class DestroyRoute extends Command
{
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
        $data = $this->arguments();
        unset($data['command']);

        $validationData = $this->routeService->destroy($data);

        if ($validationData === true) {
            $this->line('The route is destroyed.');
        } else {
            $this->line('Validation failed:');
            foreach($validationData as $message) {
                $this->line($message);
            }
        }
    }
}
