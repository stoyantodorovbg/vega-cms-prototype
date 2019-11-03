<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locale extends Model implements BasicModelInterface
{
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
