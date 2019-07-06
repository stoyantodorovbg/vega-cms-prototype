<?php

namespace App\Services\Interfaces;

interface LocaleServiceInterface
{
    /**
     * Set site locale according to selected value
     *
     * @param string $localeCode
     * @return bool
     */
    public function setSelectedLocale(string $localeCode): bool;

    /**
     * Set app locale according to session locale
     *
     * @return bool
     */
    public function setSessionLocale(): bool;
}
