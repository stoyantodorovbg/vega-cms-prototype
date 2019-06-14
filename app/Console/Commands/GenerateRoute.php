<?php

namespace App\Console\Commands;

use App\Models\Route;
use App\Repositories\Interfaces\RouteRepositoryInterface;
use Illuminate\Console\Command;

class GenerateRoute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:route {url} {method} {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a route';
    /**
     * @var RouteRepositoryInterface
     */
    private $routeRepository;

    /**
     * Create a new command instance.
     *
     * @param RouteRepositoryInterface $routeRepository
     */
    public function __construct(RouteRepositoryInterface $routeRepository)
    {
        parent::__construct();
        $this->routeRepository = $routeRepository;
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

        $validationData = $this->routeRepository->create($data);

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
