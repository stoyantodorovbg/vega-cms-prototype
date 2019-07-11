<?php

namespace App\Services;

use App\Services\Interfaces\LocaleServiceInterface;

class LocaleService implements LocaleServiceInterface
{
    /**
     * Set site locale according to selected value
     *
     * @param string $localeCode
     * @return bool
     */
    public function setSelectedLocale(string $localeCode): bool
    {
        if ($localeCode !== app()->getLocale()) {
            session(['locale' => $localeCode]);
            app()->setLocale($localeCode);

            return true;
        }

        return false;
    }

    /**
     * Set app locale according to session locale
     *
     * @return bool
     */
    public function setSessionLocale(): bool
    {
        $sessionLocale = session('locale');

        if ($sessionLocale && $sessionLocale !== app()->getLocale()) {
            app()->setLocale($sessionLocale);

            return true;
        }

        return false;
    }
}
