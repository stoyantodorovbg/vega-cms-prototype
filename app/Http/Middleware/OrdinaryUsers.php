<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Services\Interfaces\GroupServiceInterface;
use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class OrdinaryUsers extends Middleware
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
        if (! auth()->check()) {
            if($request->expectsJson()) {
                return response()->json(['error' => 'Unauthenticated.'], 401);
            }

            return redirect(route('login', [], false));
        }

        if(! resolve(GroupServiceInterface::class)->userHasGroup(auth()->user(), 'ordinaryUsers')) {
            if($request->expectsJson()) {
                return response()->json(['error' => 'Unauthenticated.'], 401);
            }

            return redirect(route('welcome', [], false));
        }

        return $next($request);
    }
}
