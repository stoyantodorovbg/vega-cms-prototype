<?php

namespace App\Http\Middleware;

use App\Services\Interfaces\LocaleServiceInterface;
use Closure;
use Illuminate\Http\Request;

class Locale
{
    /**
     * @var LocaleServiceInterface
     */
    protected $localeService;

    /**
     * Locale constructor.
     * @param LocaleServiceInterface $localeService
     */
    public function __construct(LocaleServiceInterface $localeService)
    {
        $this->localeService = $localeService;
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
        $this->localeService->setSessionLocale();

        return $next($request);
    }
}
