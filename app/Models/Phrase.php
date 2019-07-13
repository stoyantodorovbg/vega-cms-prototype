<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Phrase extends Model
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
