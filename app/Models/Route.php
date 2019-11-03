<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Route extends Model implements BasicModelInterface
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * The groups of the user
     *
     * @return BelongsToMany
     */
    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class);
    }

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
