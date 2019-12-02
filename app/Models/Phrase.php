<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;

class Phrase extends BasicModel
{
    use HasTranslations;

    /**
     * @var array $translatable
     */
    public $translatable = [
        'text',

    ];

    /**
     * @var array
     */
    protected $guarded = [];
}
