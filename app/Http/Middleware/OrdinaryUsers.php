<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use App\Services\Interfaces\GroupServiceInterface;

class OrdinaryUsers
{
    /**
    * @var GroupServiceInterface
    */
    protected $groupService;

    /**
    * Create a new controller creator command instance.
    *
    * @param Filesystem $files
    * @param GroupServiceInterface $groupService
    */
     public function __construct(Filesystem $files, GroupServiceInterface $groupService)
     {
        parent::__construct($files);

         $this->groupService = $groupService;
         }

    /**
    * Handle an incoming request.
    *
    * @param  Request  $request
    * @param Closure $next
    * @return mixed
    */
    public function handle($request, Closure $next)
    {
        $groupName = strtolower(get_class ($this));

        if(! auth()->check() || ! $this->groupService->userHasGroup(auth()->user(), $groupName)) {
            return redirect('home');
        }

        return $next($request);
    }
}
