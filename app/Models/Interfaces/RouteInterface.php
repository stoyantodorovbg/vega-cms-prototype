<?php

namespace App\Models\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

interface RouteInterface
{
    public function groups(): BelongsToMany;
}
