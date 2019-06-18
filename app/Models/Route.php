<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Interfaces\RouteInterface;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Route extends Model implements RouteInterface
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
}
