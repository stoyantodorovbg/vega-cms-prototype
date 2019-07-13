<?php

namespace App\Services;

use App\Models\Phrase;
use App\Services\Interfaces\PhraseServiceInterface;

class PhraseService implements PhraseServiceInterface
{
    /**
     * Get phrases by array of system name keys and groups of arrays of system name keys
     *
     * @param array $phrases
     * @return array
     */
    public function phrasesWhereIn(array $phrases): array
    {
        $translations = [];
        $system_names = [];

        foreach ($phrases as $key => $value) {
            if (is_string($value)) {
                $translations[$key] = '';
                $system_names[] = $value;
            } elseif (is_array($value)) {
                $translations[$key] = [];
                foreach ($value as $system_name) {
                    $translations[$key][$system_name] = '';
                    $system_names[] = $system_name;
                }
            }
        }

        $phrases = Phrase::whereIn('system_name', $system_names)->get();

        $translationsResult = [];

        foreach($translations as $key => $value) {
            if (! is_array($value)) {
                $translationsResult['key'] = $phrases->where('system_name', $value)->text;
            } else {
                foreach ($value as $phraseKey => $emptyPhraseValue) {
                    $translationsResult[$key] = $phrases->where('system_name', $phraseKey)->text;
                }
            }
        }

        return $translationsResult;
    }

    /**
     * Get a phrase text from the session phrase data by phrase system name or by group and phrase system name
     *
     * @param string $phraseSystemName
     * @param bool $phraseGroup
     * @return string
     */
    public function phraseFromSession(string $phraseSystemName, $phraseGroup = false): string
    {
        $sessionData = session('phrases');

        if ($phraseGroup && isset($sessionData[$phraseGroup][$phraseSystemName])) {
            return $sessionData[$phraseGroup][$phraseSystemName];
        }

        if (isset($sessionData[$phraseGroup])) {
            return $sessionData[$phraseGroup];
        }

        return $phraseSystemName;
    }
}
