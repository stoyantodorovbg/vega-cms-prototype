<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Services\Interfaces\LocaleServiceInterface;
use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class Locale extends Middleware
{
    /**
     * @var LocaleServiceInterface
     */
    protected $localeService;

    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        resolve(LocaleServiceInterface::class)->setSessionLocale();

        return $next($request);
    }
}
