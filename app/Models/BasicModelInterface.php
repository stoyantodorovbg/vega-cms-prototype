<?php

namespace App\Models;

interface BasicModelInterface
{
    /**
     * Get the slug for a model instance
     *
     * @return string
     */
    public function getSlug(): string;
}
