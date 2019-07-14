<?php

namespace App\Http\Middleware;

use Closure;
use ReflectionClass;
use ReflectionException;
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
     * @param Request $request
     * @param Closure $next
     * @return mixed
     * @throws ReflectionException
     */
    public function handle($request, Closure $next)
    {
        if (! auth()->check()) {
            return redirect(route('login', [], false));
        }

        $reflect = new ReflectionClass($this);
        $groupName = strtolower($reflect->getShortName());

        if(! resolve(GroupServiceInterface::class)->userHasGroup(auth()->user(), $groupName)) {
            return redirect(route('welcome', [], false));
        }

        return $next($request);
    }
}
