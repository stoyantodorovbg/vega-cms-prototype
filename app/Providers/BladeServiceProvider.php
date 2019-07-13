<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Services\Interfaces\PhraseServiceInterface;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('getPhrase', function ($phraseSystemName) {
            return resolve(PhraseServiceInterface::class)->phraseFromSession($phraseSystemName);
        });

        Blade::directive('getGroupPhrases', function ($phraseSystemName, $phraseGroup) {
            return resolve(PhraseServiceInterface::class)->phraseFromSession($phraseSystemName, $phraseGroup);
        });

        Blade::directive('storePhrases', function ($phrases) {
            $phrases = resolve(PhraseServiceInterface::class)->phrasesWhereIn($phrases);
            session(['phrases' => $phrases]);
        });
    }
}
