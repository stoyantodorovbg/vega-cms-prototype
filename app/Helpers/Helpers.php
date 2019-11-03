<?php

use App\Models\Phrase;
use Illuminate\Support\Facades\Cache;

if (!function_exists('phrase')) {
    function phrase($systemName)
    {
        if($value = Cache::get('phrase_' . app()->getLocale() . '_' . $systemName)) {
            return $value;
        }

        if($phrase = Phrase::where('system_name', $systemName)->first()) {
            $phrase = Phrase::where('system_name', $systemName)->first();
            Cache::put('phrase_' . app()->getLocale() . '_' . $systemName, $phrase->text, 10000000000);

            return $phrase->text;
        }

        return $systemName;
    }
}
