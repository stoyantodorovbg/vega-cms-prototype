<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Group extends Model implements BasicModelInterface
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * The users which have this role
     *
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * The groups of the user
     *
     * @return BelongsToMany
     */
    public function routes(): BelongsToMany
    {
        return $this->belongsToMany(Route::class);
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
