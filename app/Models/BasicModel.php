<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BasicModel extends Model implements BasicModelInterface
{
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
