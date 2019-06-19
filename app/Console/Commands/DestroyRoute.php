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
    protected $description = 'Remove a route from the file system and data base.';
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
