<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Interfaces\RouteServiceInterface;

class GenerateRoute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:route {url} {method} {action} {name} {type=web}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a route';
    /**
     * @var RouteServiceInterface
     */
    private $routeService;

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
        $data = $this->arguments();
        unset($data['command']);

        $validationData = $this->routeService->create($data);

        if($validationData === true) {
            $this->line('The route is generated successfully.');
        } else {
            $this->line('Validation failed:');
            foreach($validationData as $message) {
                $this->line($message);
            }
        }
    }
}
