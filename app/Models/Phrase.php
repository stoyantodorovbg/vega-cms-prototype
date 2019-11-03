<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Phrase extends Model implements BasicModelInterface
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

    /**
     * Get the slug for a model instance
     *
     * @return string
     */
    public function getSlug(): string
    {
        return $this->id;
    }
}
