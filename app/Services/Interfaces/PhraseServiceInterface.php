<?php

namespace App\Services\Interfaces;

interface PhraseServiceInterface
{
    /**
     * Get phrases by array of system name keys and groups of arrays of system name keys
     *
     * @param array $phrases
     * @return array
     */
    public function phrasesWhereIn(array $phrases): array;

    /**
     * Get a phrase text from the session phrase data by phrase system name or by group and phrase system name
     *
     * @param string $phraseSystemName
     * @param bool $phraseGroup
     * @return string
     */
    public function phraseFromSession(string $phraseSystemName, $phraseGroup = false): string;
}
