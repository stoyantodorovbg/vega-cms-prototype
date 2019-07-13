<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Services\Interfaces\GroupServiceInterface;
use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class Moderators extends Middleware
{
    /**
    * @var GroupServiceInterface
    */
    protected $groupService;

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

        if(! auth()->check() ||
            ! resolve(GroupServiceInterface::class)->userHasGroup(auth()->user(), $groupName)
        ) {
            return redirect('home');
        }

        return $next($request);
    }
}
