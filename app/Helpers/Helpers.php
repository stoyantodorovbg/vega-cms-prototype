<?php

use App\Models\Phrase;

if (!function_exists('phrase')) {
    function phrase($systemName)
    {
        return Phrase::where('system_name', $systemName)->first()->text;
    }
}
